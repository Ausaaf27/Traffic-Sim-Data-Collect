(function() {
  'use strict';
  angular.module('myModule').controller('CollisionsController', CollisionsController);

  CollisionsController.$inject = ['vehicleService'];

  function CollisionsController(vehicleService) {
     var CollisionsVm = this;
     CollisionsVm.title="List";
    vehicleService.getCollisions().then(function(response) {

      CollisionsVm.cars = response;
      console.log(    CollisionsVm.cars);
    }, function(error) {
      console.log(error);
    });

   
    
    CollisionsVm.sorter={
      sortBy:'year',
      sortOrder:'true'
    };




  }

})();