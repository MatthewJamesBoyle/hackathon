angular.module('starter.controllers', [])

.controller('AppCtrl', function($scope, $ionicModal) {
  $ionicModal.fromTemplateUrl("templates/login.html", function(modal) {
    $scope.loginModal = modal
  }, {
    scope: $scope,
    animation: 'slide-in-up'
  });

  $scope.login = function() {
    $scope.loginModal.show();
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
