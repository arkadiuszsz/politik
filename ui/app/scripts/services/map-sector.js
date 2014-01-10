'use strict';

/* MapSectorRepository
 * ===================
 * Service providing interface for sectors.
 */
   
angular.module('UiApp').service('MapSectorRepository', function ($http) {
	
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

});
