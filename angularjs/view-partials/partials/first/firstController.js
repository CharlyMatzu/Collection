angular.module('myApp')

    .controller('FirstController', function($scope, LoadFactory){

        $scope.data = [];

        (function(){
            console.log("First");
            LoadFactory.getData()
                .then(
                    function(data){
                        $scope.data = data;
                    }
                );
        })();

    });