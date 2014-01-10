'use strict';

angular.module('UiApp', [
  'ngCookies',
  'ngResource',
  'ngSanitize',
  'ngRoute',
  'leaflet-directive'
])
  .config(function ($routeProvider) {
    $routeProvider
      .when('/', {
        templateUrl: 'views/main.html',
        controller: 'MainCtrl'
      })
      .when('/login', {
        templateUrl: 'views/login.html',
        controller: 'MainCtrl'
      })
      .otherwise({
        redirectTo: '/'
      });
  })
  .directive( 'goClick', function ($location) {
    return function (scope, element, attrs) {
      var path;

      attrs.$observe('goClick', function (val) {
        path = val;
      });

      element.bind('click', function () {
        scope.$apply( function () {
          $location.path(path);
        });
      });
    };
  });
