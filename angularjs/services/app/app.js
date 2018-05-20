var app = angular.module('ToDo', ['LocalStorageModule']);


//A diferencia de los factories, no se regresa un objeto el cual
//se injecta en un controllador, este se ejecuta como POO, es decir
//como una nueva instancia de una clase (cinstructor)
app.service('TodoService', function(localStorageService){

    this.key = "todo-list";

    //Verificar localstorage para ver si ya hay datos guardados
    if( localStorageService.get( this.key ) )
        this.activities = localStorageService.get( this.key );
    else
        this.activities = [];

    //---FUNCIONES
    this.add = function (newAct) {
        this.activities.push( newAct );
        this.uploadLocalStorage();
    };
    //Reemplazo del watcher
    this.uploadLocalStorage = function () {
        localStorageService.set(this.key, this.activities);
    };
    this.clean = function () {
        this.activities = [];
        //Actualiza el storage
        this.uploadLocalStorage();
        return this.getAll();
    };
    this.getAll = function () {
        return this.activities;
    };
    this.removeItem = function (item) {
        //El filter itera en cada uno de los elementos del array en este caso
        //siendo activity cada elemento del mismo individualmente
        //Si la iteracion da "false", eliminará el elemento
        this.activities = this.activities.filter(function (activity) {
            return activity !== item;
        });
        //Actualiza db
        this.uploadLocalStorage();
        //retorna elementos
        return this.getAll();
    };

});

app.controller('TodoController', function($scope, TodoService){

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