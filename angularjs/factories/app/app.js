var app = angular.module('ToDo', ['LocalStorageModule']);


//Se crea un objeto el cual es retornado al final a diferencia de los services
app.factory('TodoService', function(localStorageService){
    var todoService = {};

    todoService.key = "todo-list";

    //Verificar localstorage para ver si ya hay datos guardados
    if( localStorageService.get( todoService.key ) )
        todoService.activities = localStorageService.get( todoService.key );
    else
        todoService.activities = [];

    //---FUNCIONES
    todoService.add = function (newAct) {
        todoService.activities.push( newAct );
        todoService.uploadLocalStorage();
    };
    //Reemplazo del watcher
    todoService.uploadLocalStorage = function () {
        localStorageService.set(todoService.key, todoService.activities);
    };
    todoService.clean = function () {
        todoService.activities = [];
        //Actualiza el storage
        todoService.uploadLocalStorage();
        return todoService.getAll();
    };
    todoService.getAll = function () {
        return todoService.activities;
    };
    todoService.removeItem = function (item) {
        //El filter itera en cada uno de los elementos del array en este caso
        //siendo activity cada elemento del mismo individualmente
        //Si la iteracion da "false", eliminará el elemento
        todoService.activities = todoService.activities.filter(function (activity) {
            return activity !== item;
        });
        //Actualiza db
        todoService.uploadLocalStorage();
        //retorna elementos
        return todoService.getAll();
    };

    return todoService;
});

app.controller('EventController', function($scope, TodoService){

    $scope.todo = TodoService.getAll();
    $scope.newAct = {};

    $scope.addAct = function () {
        TodoService.add( $scope.newAct );
        $scope.newAct = {};
    };
    $scope.removeAct = function (item) {
        $scope.todo = TodoService.removeItem(item);
    };
    $scope.clean = function () {
        $scope.todo = TodoService.clean();
    };

});