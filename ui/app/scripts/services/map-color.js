'use strict';

/* MapColor
 * ========
 * Service providing colors for the map.
 */
   
angular.module('UiApp').service('MapColor', function () {
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
