var app = angular.module('app', [])
 
.controller('appCtrl', ['$scope', function ($scope) 
{
 //inicializamos count
 $scope.count = 0;
 
 //al pulsar el botón llamamos al evento to_childrens para actualizar todos los hijos
 $scope.updateCounter1 = function()
 {
 $scope.$broadcast('to_childrens', 1);
 }
 
 $scope.$on('to_parent', function(event, data) 
 {
      	$scope.count += data;
    });
}])
 
.controller('homeCtrl', ['$scope', function ($scope) 
{
 $scope.count = 0;
 $scope.$on("to_childrens", function(event, data)
 {
 $scope.count += data;
 })
 
 $scope.updateCounter2 = function()
 {
 $scope.$emit('to_parent', 1);
 }
}])
 
.controller('profileCtrl', ['$scope', function ($scope) 
{
 $scope.count = 0;
 $scope.$on("to_childrens", function(event, data)
 {
 $scope.count += data;
 })
 
 $scope.updateCounter3 = function()
 {
 $scope.$emit('to_parent', 1);
 }
}])