'use strict';

angular.module('Politik')
.controller('NotificationsCtrl', function ($scope, NotificationQueue) {

	$scope.notifications = [];
	$scope.$on('notification.ready', function (event) {
		$scope.notifications = $scope.notifications.concat(NotificationQueue.pop());
	});

	$scope.closeNotification = function(index) {
		$scope.notifications.splice(index, 1);
	};

});
