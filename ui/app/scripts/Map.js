'use strict';

angular.module('Map', [])
.factory('map', function ($q, $http, mapRepository, mapStyle) {
	
	/* Fetch GeoJSON data i.e. vector objects representing sectors on the map. */
	var geoPromise = $http.get('scripts/map.geojson').then(function (response) {
		return response.data;
	});
		
	/* Generate map object to be passed to leaflet. */
	var getMapPromise = function ($scope) {
		var promise = $q.all([
			geoPromise,
			mapRepository.sectorsWithStatesPromise,
		])
		.then(function (responses) {
			/* GeoJSON object */
			var geo = responses[0];
			/* Array of sector data */
			var sectors = responses[1];
			
			/* Functions triggering highlight of a feature on the map */
			var highlightFeature = function (e) {
				var layer = e.target;
				layer.setStyle({
					fillOpacity: 0.5
				});
			};

			var resetHighlight = function (e) {
				var layer = e.target;
				layer.setStyle(mapStyle(sectors)(layer.feature));
			};

			/* Function setting up scope models on click event */
			var setupModel = function (e) {
				var iso = e.target.feature.properties.ISO;	
				$scope.sectorFocus = sectors[iso];
			};

			/* Function run on each feature (sector) on the map */
			var onEachFeature = function (feature, layer) {
				var iso = feature.properties.ISO;
				layer.on({
					mouseover: highlightFeature,
					mouseout: resetHighlight,
					click: setupModel
				});
				layer.bindPopup('<h5>'+sectors[iso].state.name+'</h5>');
			};
			
			/* Prepare map object to be returned */
			var map = {};
			map.data = geo;
			map.style = mapStyle(sectors);
			map.onEachFeature = onEachFeature;
			
			return map;
		});

		return promise;
	};

	return {
		getMapPromise: getMapPromise
	};
})
.service('mapRepository', function ($http, $q) {
	
	/* Fetch sectors data from backend. */
	this.sectorsPromise = $http.get('api/sector', {cache: true}).then(
		function (response) {
			var sectors = {};
			response.data.forEach(function (sector) {
				sectors[sector.id] = sector;
			});
			return sectors;
		}
	);
	
	/* Fetch states data from backend. */
	this.statesPromise = $http.get('api/state', {cache: true}).then(
		function (response) {
			var states = {};
			response.data.forEach(function (state) {
				states[state.id] = state;
			});
			return states;
		}
	);

	/* Combine sectors and states. */
	this.sectorsWithStatesPromise = $q.all([this.sectorsPromise, this.statesPromise]).then(function (responses) {
		var sectors = responses[0];
		var states = responses[1];
		for(var id in sectors){
			var sector = sectors[id];
			sector.state = states[sector.state_id];
		}
		return sectors;
	});

})
.factory('mapStyle', function (mapRepository, mapColor) {

	var factory = function(sectors) {
		/* Function generating style of a feature */
		var style = function (feature) {
			var fillColor = 'white';
					
			/* Change color if needed. */
			var iso = feature.properties.ISO;
			if (iso in sectors) {
				var stateId = sectors[iso].state_id;
				if (stateId !== null) {
					fillColor = mapColor.getColor(stateId);
				}
			}

			return {
				fillColor: fillColor,
				weight: 2,
				opacity: 0.5,
				color: '#b9c6d0',
				fillOpacity: 1
			};	
		};

		return style;
	};

	return factory;
})
.service('mapColor', function () {
	/* Define available colors. */
	this.colors = ['rgb(251,180,174)','rgb(179,205,227)','rgb(204,235,197)',
		'rgb(222,203,228)','rgb(254,217,166)','rgb(255,255,204)',
		'rgb(229,216,189)','rgb(253,218,236)','rgb(242,242,242)'];
	this.colorIndex = 0;
	this.stateColor = {};

	/* Assigns a color to the given state and return it. */
	this.getColor = function (stateId) {
		/* If not yet assigned */
		if (!(stateId in this.stateColor)) {
			/* Assign color to the state */
			this.stateColor[stateId] = this.colors[this.colorIndex];
			/* Increment index */
			this.colorIndex = (this.colorIndex + 1) % this.colors.length;
		}
		/* Return color */
		return this.stateColor[stateId];
	};
});
