(function() {
  'use strict';
  angular.module('myModule').controller('IntersectionsController', IntersectionsController);

  IntersectionsController.$inject = ['vehicleService'];

  function IntersectionsController(vehicleService) {
     var IntersectionVm = this;
     IntersectionVm.title="List";
    vehicleService.getIntersection().then(function(response) {

      IntersectionVm.cars = response;
      console.log(      IntersectionVm.cars);
    }, function(error) {
      console.log(error);
    });

   
    
    IntersectionVm.sorter={
      sortBy:'year',
      sortOrder:'true'
    };




  }

})();