angular.module('starter.controllers', [])
.factory("Auth", function($rootScope, $http, $ionicLoading) {
  return {
    checkLogin: function() {
      if(this.isLoggedIn()) {
        $rootScope.$broadcast("app.loggedIn");
        return true;
      } else {
        $rootScope.$broadcast("app.loggedOut");
        return false;
      }
    },
    isLoggedIn: function() {
      surname = localStorage.getItem("surname");
      pin = localStorage.getItem("pin");
      return (surname != null && pin != null)
    },
    login: function(surname, pin) {
      var error = false;
      var order_id = -1;
      localStorage.setItem("surname", surname);
      localStorage.setItem("pin", pin);
      $http.defaults.headers.common["Authorization"] = 'Basic ' +btoa(surname+":"+pin);
      $ionicLoading.show({
        template: "Logging in... please wait"
      })
      $http.post("http://10.0.1.5:5001/v1/login/", {})
      .success(function(data) {
        localStorage.setItem("latest_order_id", data["latest_order_id"]);
        order_id = data["latest_order_id"];
        
        $http.get("http://10.0.1.5:5001/v1/settings/"+order_id, {})
        .success(function(data) {
          localStorage.setItem("settings.push", data.push);
          localStorage.setItem("settings.text", data.text);
          localStorage.setItem("settings.email", data.email);
          $ionicLoading.hide();
        })
      })
      .error(function(data) {
        $ionicLoading.hide();
        alert("Login failed. Please try again")
        error = true;
      });

      
      if(error) return false;
      $rootScope.$broadcast("app.login");
      return true;
    },
    logout: function() {
      localStorage.removeItem("surname");
      localStorage.removeItem("pin");
      $http.defaults.headers.common["Authorization"] = "";
      $rootScope.$broadcast("app.logout");
    },
    setHeaders: function() {
      surname = localStorage.getItem("surname");
      pin = localStorage.getItem("pin");
      $http.defaults.headers.common["Authorization"] = "Basic " + btoa(surname+":"+pin);
    }
  }
})

.controller('AppCtrl', function($scope, $ionicModal, Auth) {
  $ionicModal.fromTemplateUrl("templates/login.html", function(modal) {
    $scope.loginModal = modal;
    if(Auth.checkLogin()) {
      Auth.setHeaders();
    }
  }, {
    scope: $scope,backdropClickToClose:false,
    animation: 'slide-in-up'
  });

  $scope.showLoginModal = function() {
    $scope.loginModal.show();
  };

  $scope.$on("app.loggedOut", function(e) {
    $scope.loginModal.show();
  });

  $scope.authenticate = function(user) {
    if(typeof user == "undefined") {
      alert("Surname and/or PIN are empty");
      return;
    }

    if(user.surname == "" || user.pin == "") {
      alert("Surname and/or PIN are empty");
      return;
    }

    statusA = Auth.login(user.surname, user.pin);
    if(!statusA) return;
    $scope.loginModal.hide();
  }

  $scope.logout=function(){
    Auth.logout();
    $scope.showLoginModal();
  }
})


.controller('PlaylistsCtrl', function($scope) {
  $scope.playlists = [
    { title: 'test2', id: 1 },
    { title: 'Chill', id: 2 },
    { title: 'Dubstep', id: 3 },
    { title: 'Indie', id: 4 },
    { title: 'Rap', id: 5 },
    { title: 'Cowbell', id: 6 }
  ];
})

.controller('PlaylistCtrl', function($scope, $stateParams) {
})

.controller("OrderCtrl", function($scope, $http, $ionicLoading) {
  $ionicLoading.show({
    template: "Loading..."
  });
  $http.get("http://10.0.1.5:5001/v1/order/", {}).success(function(data) {
    $ionicLoading.hide();
    $scope.orders = data;
  }).error(function(data) {
    $ionicLoading.hide();
    alert("Error loading data");
  });
})

.controller("OrderLatestCtrl", function($scope, $http, $ionicLoading) {
  order_id = localStorage.getItem("latest_order_id");
  if(order_id === null) {
    alert("done fooked");
  }
  $ionicLoading.show({
    template: "Loading..."
  });
  $http.get("http://10.0.1.5:5001/v1/order/"+order_id, {})
  .success(function(data) {
    $scope.orderData = data;
  }).error(function(data) {
    alert("Error loading data");
  });
  $ionicLoading.hide();
})

.controller("SettingsCtrl", function($scope, $http, $ionicLoading) {
  $scope.checked = function(name) {
    tmp = localStorage.getItem(name);
    if(tmp == "N") {
      return false;
    } else {
      return true;
    }
  };

  $scope.flip = function(name) {
    tmp = localStorage.getItem(name);
    order_id = localStorage.getItem("latest_order_id")
    if(tmp == "N") {
      console.log("asd");
      tmp = "Y";
    } else {
      tmp = "N"
    }
    localStorage.setItem(name, tmp);

    data = {
      "email": localStorage.getItem("settings.email"),
      "text": localStorage.getItem("settings.text"),
      "push": localStorage.getItem("settings.push")
    }
    $http.post("http://localhost:5001/v1/settings/"+order_id, data)
    .success(function(data) {
    })
  }

  $scope.sendSettings = function(email, text, push) {
  
  };  
})
