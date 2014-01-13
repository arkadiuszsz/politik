'use strict';

angular.module('Notifications', [])
.factory('NotificationQueue', function ($rootScope) {
	var notifications = [];
	return {
		push: function (message, type) {
			type = (type === undefined) ? 'danger' : type;
			notifications.push({
				message: message,
				type: type
			});
			$rootScope.$broadcast('notification.ready');
		},
		pop: function () {
			var n = notifications;
			notifications = [];
			return n;
		}
	};	
});
