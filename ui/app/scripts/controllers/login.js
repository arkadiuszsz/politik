'use strict';

angular.module('Politik')
.controller('LoginCtrl', function ($scope, $http, $location, AuthService, NotificationQueue) {
	$scope.login = function (user) {
		AuthService.login(user.email, user.password).then(function (success) {
			if (success) {
				$location.path('/');
			}
			else {
				NotificationQueue.push('Invalid login/password. Please try again.');
			}
		});
	};
});
