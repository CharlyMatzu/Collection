var app = angular.module('ToDo', ['LocalStorageModule']);

app.controller('TodoController', function($scope, localStorageService){
    var localstorageName = "todo-list";
    //Verificar localstorage para ver si ya hay datos guardados
    if( localStorageService.get( localstorageName ) ){
        //Si existe, se inicializa lista con lo que esta guardado
        $scope.todo = localStorageService.get( localstorageName );
    }
    else{
        //Si no hay nada (si no existe localstorage) se inicializa vacio
        //array de listas
        $scope.todo = [];
    }

    //Watcher para no reescribir codigo. Este se activa cada vez que el arreglo 'todo' tiene cambios
    //Watcher para arreglos (array, funcion)
    $scope.$watchCollection('todo', function(newValue, oldValue){
        localStorageService.set(localstorageName, $scope.todo);
    });
    //Funcion para agregar nueva actividad
    $scope.addActividad = function () {
        //Agrega
        $scope.todo.push( $scope.newAct );
        //Limpia
        $scope.newAct = {};
        //Se guarda lista en localstorage
        // localStorageService.set(localstorageName, $scope.todo);
    };
    $scope.limpiar = function () {
        //Se vacia lista
        $scope.todo = [];
        //Se guarda lista en localstorage
        // localStorageService.set(localstorageName, $scope.todo);
    };

});