'use strict';

/* MapStyle
 * ========
 * Service providing map style generator.
 */
   
angular.module('UiApp').service('MapStyle', function (MapSectorRepository, MapColor) {

	/* Returns a promise of a style factory. */
	this.styleFactoryPromise = MapSectorRepository.sectorsPromise.then(function (sectors) {
		var factory = function (style) {
			var styleFunc = function (feature) {
				
				/* Clone style. */
				var localStyle = {};
				for (var key in style) {
					localStyle[key] = style[key];
				}
			
				/* Change color if needed. */
				var iso = feature.properties.ISO;
				if (iso in sectors) {
					var stateId = sectors[iso].state_id;
					if (stateId !== null) {
						localStyle.fillColor = MapColor.getColor(stateId);
					}
				}
			
				return localStyle;
			};
			return styleFunc;
		};
		return factory;
	});
});
