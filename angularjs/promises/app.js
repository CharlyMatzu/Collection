angular.module('myApp', ['ngRoute'])

    // .config(function($routeProvider){

    //     $routeProvider
    //         .when("/",{
    //             controller: "RepoController",
    //             templateUrl: "templates/home.html"
    //         })
    //         .when("/data", {
    //             controller: "RepoController",
    //             templateUrl: "templates/repo.html"
    //         })
    //         .otherwise("/"); //para cualquier otra ruta

    // });



    .factory('LoadFactory', function($timeout, $q){
        var data = [
            {id: 1, name: "carlos", age: 24},
            {id: 2, name: "Roberto", age: 23},
            {id: 3, name: "Zuñiga", age: 25},
            {id: 1, name: "carlos", age: 24},
            {id: 2, name: "Roberto", age: 23},
            {id: 3, name: "Zuñiga", age: 25},
            {id: 1, name: "carlos", age: 24},
            {id: 2, name: "Roberto", age: 23},
            {id: 3, name: "Zuñiga", age: 25},
            {id: 1, name: "carlos", age: 24},
            {id: 2, name: "Roberto", age: 23},
            {id: 3, name: "Zuñiga", age: 25},
            {id: 4, name: "Martinez", age: 21}
        ];

    

        return {
            getData: function(){
                //Creamos promesa
                var defered = $q.defer();
                var promise = defered.promise;
            
                //Simulando asincrono
                $timeout(function(){
                    //NOTA: solo se ejecuta uno a la vez
                    
                    //Valor a devolver si se ejecuto bien
                    defered.resolve(data);
                    //Valor a devolver si se ejecuto mal
                    // defered.reject("Mensaje de error");
                },3000);

                //Retornamos promesa, ya que esta llamara al callback una vez obtenga los datos
                return promise;
            },
        }
    })



    .controller('MyController', function($scope, LoadFactory){

        $scope.data = [];

        (function(){
            console.log("Esperando datos");
            //Se obtiene promesa
            var promise = LoadFactory.getData();
            //Se espera dato
            promise
                .then(
                    function(data){
                        console.log("Primera promesa");
                        //Se llama de nuevo a la funcion lo que regresa otra promesa y se encadena
                        return LoadFactory.getData();
                    }
                )
                .then(function(data){
                    $scope.data = data;
                    console.log("Segunda promesa");
                })
                .finally(function() {
                    console.log('Finished at:', new Date())
                });
        })();

    });
    