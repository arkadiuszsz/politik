'use strict';

angular.module('Politik', [
	'ngCookies',
	'ngResource',
	'ngSanitize',
	'ngRoute',
	'leaflet-directive',
	'Security',
	'Notifications',
	'Map',
	'ui.bootstrap',
	'ui.gravatar',
	'vcRecaptcha'
])
.config(function ($routeProvider) {
	$routeProvider
	.when('/', {
		templateUrl: 'views/main.html',
		controller: 'MainCtrl'
	})
	.when('/login', {
		templateUrl: 'views/login.html',
		controller: 'LoginCtrl'
	})
	.when('/create-account', {
		templateUrl: 'views/create-account.html',
		controller: 'RegistrationCtrl'
	})
	.otherwise({
		redirectTo: '/'
	});
})
.directive('goClick', function ($location) {
	var directive = function (scope, element, attrs) {
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
	return directive;
});
