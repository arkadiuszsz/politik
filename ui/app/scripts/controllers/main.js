'use strict';
    
angular.module('uiApp')
  .controller('MainCtrl', function ($scope, $http, mapRepository) {
    
    /* Set map tiles. */
    angular.extend($scope, {
      tiles: {
        url: 'http://{s}.tile.cloudmade.com/7ba62ab411f443599beb2d5a22980f90/118392/256/{z}/{x}/{y}.png'
      },
      center: {
        lat: 49,
        lng: 12,
        zoom: 5
      }
    });
    
    /* Generate map. */
    var style = {
      fillColor: 'white',
      weight: 2,
      opacity: 0.25,
      color: '#b9c6d0',
      fillOpacity: 1
    };
    mapRepository.generateMap(style).then(function (map) {
      angular.extend($scope, {
        geojson: map
      });
    });
  });
