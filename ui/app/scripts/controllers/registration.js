'use strict';

angular.module('Politik')
.controller('RegistrationCtrl', function ($scope, $http, map) {

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
	map.getMapPromise($scope).then(function (map) {
		angular.extend($scope, {
			geojson: map
		});
	});
	
});
