angular.module('starter.controllers', [])
.factory("Auth", function($rootScope) {
  return {
    checkLogin: function() {
      console.log(this.isLoggedIn());
      if(this.isLoggedIn()) {
        $rootScope.$broadcast("app.loggedIn");
      } else {
        $rootScope.$broadcast("app.loggedOut");
      }
    },
    isLoggedIn: function() {
      surname = localStorage.getItem("surname");
      pin = localStorage.getItem("pin");
      console.log(surname, pin);
      return (surname != null && pin != null)
    },
    login: function(surname, pin) {
      localStorage.setItem("surname", surname);
      localStorage.setItem("pin", pin);
      $rootScope.$broadcast("app.login");
    },
    logout: function() {
      localStorage.removeItem("surname");
      localStorage.removeItem("pin");
      $rootScope.$broadcast("app.logout");
    }
  }
})

.controller('AppCtrl', function($scope, $ionicModal, Auth) {
  $ionicModal.fromTemplateUrl("templates/login.html", function(modal) {
    $scope.loginModal = modal;
    Auth.checkLogin();
  }, {
    scope: $scope,
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


    //$scope.checkCredentials(user);
    Auth.login(user.surname, user.pin);
    $scope.loginModal.hide();
  }

  $scope.logout=function(){
    Auth.logout();
    $scope.showLoginModal;
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
