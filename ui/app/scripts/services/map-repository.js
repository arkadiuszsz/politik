'use strict';

/* MapRepository
 * ===================
 * Service providing interface for map data.
 */

angular.module('UiApp').service('MapRepository', function ($http, $q) {
	
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

});
