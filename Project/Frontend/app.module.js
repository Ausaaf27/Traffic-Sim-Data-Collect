(function() {
  'use strict';
  angular.module('myModule', ['ngRoute']);

  angular.module('myModule').config(moduleConfig);

  moduleConfig.$inject = ['$routeProvider'];

  function moduleConfig($routeProvider) {
    $routeProvider.
    when('/vehicles', {
        templateUrl: 'vehicleList.tmpl.html',
        controller: 'VehicleController',
        controllerAs: 'VehicleVm'
      })
      .when('/intersection', {
        templateUrl: 'intersections.tmpl.html',
        controller: 'IntersectionsController',
        controllerAs: 'IntersectionVm'
      })
      .when('/ttnpoint', {
        templateUrl: 'ttn.tmpl.html',
        controller: 'TimeToPoint',
        controllerAs: 'TtnVm'

      })
      .when('/collisions', {
        templateUrl: 'collision.tmpl.html',
        controller: 'CollisionsController',
        controllerAs: 'CollisionsVm'

      })
      .otherwise({
        redirectTo: '/vehicles'
      })
  }


})();