angular.module('myApp')

    .controller('MainController', function($scope, $window, $routeParams){

        $scope.showDef = false;
        $scope.showFirst = false;
        $scope.showSecond = false;


        (function(){
            switch( $routeParams.partial ){
                case 'first': $scope.showFirst = true; break;
                case 'second': $scope.showSecond = true; break;
                case 'default': $scope.showDef = true; break;

                //Para cualquier otra
                default: $window.location = "default";  break;
            }
        })();

    });