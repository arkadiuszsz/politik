'use strict';

angular.module('Politik')
.controller('RegistrationCtrl', function ($scope, $http, map, vcRecaptchaService) {

	$scope.user = {};
	$scope.recaptcha_public_key = '6LdMBO0SAAAAANYqlimNtPp9ZTw5kTyBO6ohzPks';

	/* Set map tiles to run empty map early. */
	angular.extend($scope, {
		tiles: {
			url: 'http://{s}.tile.cloudmade.com/7ba62ab411f443599beb2d5a22980f90/118392/256/{z}/{x}/{y}.png'
		},
		center: {
			lat: 49,
			lng: 12,
			zoom: 4
		}
	});
	
	/* Draw GetJSON layer on the existing map */
	map.getMapPromise($scope.user).then(function (map) {
		angular.extend($scope, {
			geojson: map
		});
	});

	$scope.submit = function (user) {
	};	
})
.directive('ngIsEmailAvailable', ['$http', 'apiUrl', function ($http, api) {
	return {
		require: 'ngModel',
		link: function (scope, elem, attrs, ctrl) {
			elem.on('blur', function (e) {
				scope.$apply(function () {
					var email = elem.val();
					$http.post(api.isEmailAvailable, { email: email })
					.success(function (data) {
						ctrl.$setValidity('isEmailAvailable', data.isValid);
					});
				});
			});
		}
	};
}]);
