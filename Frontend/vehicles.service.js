(function() {
  'use strict';
  angular.module('myModule').service('vehicleService', vehicleService);

  vehicleService.$inject = ['$http', '$q'];

  function vehicleService($http, $q) {
    var self = this;
    self.get = getAll;
    self.getIntersection = getAllIntersection;
    self.getTime = getNextPoint;
    self.getCollisions = getAllCollisions;
  

   
    function getAll() {
      return $http.get('https://dcm.uhcl.edu/capf19g1/php_rest/api/vehicles/read.php').then(successfn, errorfn);
    }

    function getAllIntersection() {
      return $http.get('https://dcm.uhcl.edu/capf19g1/php_rest/api/intersections/read.php' ).then(successfn, errorfn);
    }
    function getNextPoint(){
      return $http.get('https://dcm.uhcl.edu/capf19g1/php_rest/api/nextpoint/read.php').then(successfn,errorfn);
    }
    
    function getAllCollisions(){
      return $http.get('https://dcm.uhcl.edu/capf19g1/php_rest/api/collisions/read.php').then(successfn,errorfn);
    }
    
    

    function successfn(response) {
   //   console.log(response.data);
      return response.data;
    }

    function errorfn(error) {
      return $q.reject(error);
    }

  }


})();