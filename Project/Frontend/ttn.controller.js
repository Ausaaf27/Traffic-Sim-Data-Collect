(function() {
  'use strict';
  angular.module('myModule').controller('TimeToPoint', TimeToPoint);

  TimeToPoint.$inject = ['vehicleService'];

  function TimeToPoint(vehicleService) {
     var TtnVm = this;
     TtnVm.title="List";
    vehicleService.getTime().then(function(response) {

      TtnVm.cars = response;
      console.log(TtnVm.cars);
    }, function(error) {
      console.log(error);
    });

   
    
    TtnVm.sorter={
      sortBy:'year',
      sortOrder:'true'
    };




  }

})();