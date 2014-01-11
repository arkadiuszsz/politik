'use strict';

/* Map
 * ===
 * Service providing map data i.e. GeoJSON objects and sector information
 * from backend. All functions return $q promises.
 */

angular.module('UiApp')
	.service('Map', function ($q, $http, MapRepository, MapStyle) {
	
	/* Fetch GeoJSON data i.e. vector objects representing sectors on the map. */
	this.geoPromise = $http.get('scripts/map.geojson').then(function (response) {
		return response.data;
	});
		
	/* Generate map object to be passed to leaflet. */
	this.getMapPromise = function (style) {
		var promise = $q.all([
			this.geoPromise,
			MapStyle.styleFactoryPromise,
			MapRepository.sectorsWithStatesPromise,
		])
		.then(function (responses) {
			var geo = responses[0];
			var styleFactory = responses[1];
			var sectors = responses[2];

			var map = {};
			map.data = geo;
			map.style = styleFactory(style);
			map.onEachFeature = function (feature, layer) {
				var iso = feature.properties.ISO;
				if (iso in sectors) {
					var sector = sectors[iso];
					layer.bindPopup('<h5>'+sector.state.name+'</h5>');
				}
			};
			return map;
		});

		return promise;
	};
});
