'use strict';

angular.module('Api', [])
.value('apiUrl', {
	login: '/api/login',
	logout: '/api/logout',
	isLoggedIn: '/api/user',
	isEmailAvailable: '/api/create-account/is-email-available'
});
