var app = angular.module('app', ['ngRoute']);

app.config(function ($routeProvider) {
    $routeProvider
        .when("/",{
            // controller: "RepoController",
            templateUrl: "templates/home.html"
        })
        .when("/repo/:name", {
            controller: "RepoController",
            templateUrl: "templates/repo.html"
        })
        .otherwise("/"); //para cualquier otra ruta
});

app.controller('RepoController', function($scope, $routeParams){

    $scope.repo = $routeParams.name;

});