'use strict';

angular.module('Security', ['Api'])
.factory('AuthService', ['$http', 'apiUrl', '$rootScope', function ($http, api, $rootScope) {
		
	$rootScope.auth = {
		isLoggedIn: false,
		user: {},
	};

	return {
			
		/**
		 * Perform the login operation.
		 * @return promise
		 */
		login: function (email, password) {
			console.log(email);
			var promise = $http.post(api.login, { email: email, password: password })
			.then(
				function (user) {
					$rootScope.auth.isLoggedIn = true;
					$rootScope.auth.user = user;
					return true;
				},
				function (error) {
					return false;
				}
			);
			return promise;
		},

		/**
		 * Perform the logout operation.
		 * @return promise
		 */
		logout: function () {
			var promise = $http.post(api.logout, {})
			.then(function (data, status, headers, promise) {
				$rootScope.auth.isLoggedIn = false;
				$rootScope.auth.user = {};
			});
			return promise;
		},

		/**
		 * Check if the cookie refers to an active session on backend.
		 * @return null
		 */
		cookieLogin: function () {
			$http.get(api.isLoggedIn, {})
			.success(function (user) {
				$rootScope.auth.isLoggedIn = true;
				$rootScope.auth.user = user;
			});
		}
	};
}])
.run(function (AuthService) {
	AuthService.cookieLogin();
});
