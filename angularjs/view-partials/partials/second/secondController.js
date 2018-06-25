angular.module('myApp')

    .controller('SecondController', function($scope, LoadFactory){

        $scope.data = [];

        (function(){
            console.log("Second");
            LoadFactory.getData()
                .then(
                    function(data){
                        $scope.data = data;
                    }
                );
        })();

    });