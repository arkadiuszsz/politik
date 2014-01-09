'use strict';
    
angular.module('uiApp')
  .controller('MainCtrl', function ($scope, $http, mapRepository) {
    
    /* Set map tiles. */
    angular.extend($scope, {
      tiles: {
        url: 'http://{s}.tile.stamen.com/toner-background/{z}/{x}/{y}.png'
      }
    });
    
    /* Generate map. */
    var style = {
      fillColor: 'grey',
      weight: 2,
      opacity: 1,
      color: 'black',
      dashArray: '3',
      fillOpacity: 1
    };
    mapRepository.generateMap(style).then(function (map) {
      angular.extend($scope, {
        geojson: map
      });
    });
  });
