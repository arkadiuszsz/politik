'use strict';

angular.module('Politik')
.controller('NavbarCtrl', function ($scope, $location, AuthService) {
	$scope.logout = function () {
		AuthService.logout().then(function () {
			$location.path('/');
		});
	};
});
