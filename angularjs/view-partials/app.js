angular.module('myApp', ['ngRoute'])

    .config(function($routeProvider){

        $routeProvider
            .when("/:partial",{
                controller: "MainController",
                templateUrl: "views/mainView.html"
            })
            .otherwise("/default");

    })



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

