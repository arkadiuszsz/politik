'use strict';

/* mapRepository
 * =============
 * Service providing map data i.e. GeoJSON objects and sector information
 * from backend. All functions return $q promises.
 */
   
angular.module('uiApp')
  .service('mapRepository', function ($q, $http) {
  
    /* Fetch GeoJSON data i.e. vector objects representing sectors on the map. */
    this.fetchGeoJSON = $http.get('scripts/map.json');
      
    /* Fetch sectors data from backend. */
    this.fetchMap = $http.get('scripts/sample.json').then(function (response) {
    
      /* Define a list of available colors. */
      var colors = ['rgb(251,180,174)','rgb(179,205,227)','rgb(204,235,197)',
        'rgb(222,203,228)','rgb(254,217,166)','rgb(255,255,204)',
        'rgb(229,216,189)','rgb(253,218,236)','rgb(242,242,242)'];
      var colorIndex = 0;
      
      /* Put sectors and state colors on associative arrays. */
      var sectors = {};
      var stateColors = {};
      response.data.forEach(function (sector) {
      
        sectors[sector.iso] = sector;
          
        /* If state has not assigned color yet, pick the next on the list. */
        if (!(sector.state in stateColors)) {
          stateColors[sector.state] = colors[colorIndex];
          colorIndex = (colorIndex+1)%colors.length;
        }
          
      });
      
      return {
        sectors: sectors,
        stateColors: stateColors
      };
      
    });
    
    /* Combine promises for concurrent processing. */
    this.fetchAll = function () {
    
      /* On success, this promise returns combined objects returned by
         fetchGeoJSON and fetchMap. */
      var promise = $q.all([this.fetchGeoJSON, this.fetchMap]).then(function (responses) {
        var data = {};
        data.geo = responses[0].data;
        data.sectors = responses[1].sectors;
        data.stateColors = responses[1].stateColors;
        return data;
      });
      
      return promise;
      
    };
    
    /* Generate map object to be passed to leaflet. */
    this.generateMap = function (styles) {
      return this.fetchAll().then(function (data) {
      
        var map = {};
        map.data = data.geo;
        map.style = function (feature) {
        
          /* Clone style. */
          var localStyle = {};
          for (var key in styles) {
            localStyle[key] = styles[key];
          }
          
          /* Change color if needed. */
          var iso = feature.properties.ISO;
          if (iso in data.sectors) {
            var state = data.sectors[iso].state;
            if (state in data.stateColors) {
              localStyle.fillColor = data.stateColors[state];
            }
          }
          else{
            localStyle.fillColor = 'none';
            localStyle.color = 'none';
          }
          
          return localStyle;
          
        };
        map.onEachFeature = function (feature, layer) {
        
          /* Bind popup box with state data. */
          var iso = feature.properties.ISO;
          if (iso in data.sectors) {
            // TODO: Displaying state info on the map.
            var state = data.sectors[iso].state;
            layer.bindPopup(state);
          }
            
        };
        
        return map;
        
      });
    };
    
  });
