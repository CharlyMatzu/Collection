var app = angular.module('app', []);

app.controller('PostsController', function($scope, $http){
    $scope.titulo = "Utilizando HTTP";
    $scope.posts = [];
    $scope.newPost = {};

    $scope.loading = true; //Comienza cargando el contenido

    //https://docs.angularjs.org/api/ng/service/$http
    //Al cargar controllador obtiene contenido
    $http({
        method: 'GET',
        url: "https://jsonplaceholder.typicode.com/posts"
        // data: {}
    }).then(function (response){
        $scope.loading = false;
        console.log(response.data);
        $scope.posts = response.data;
    },function (response){
        $scope.loading = false;
        console.log(response);
    });

    //----FUNCION POST para agregar publicacion
    $scope.addPost = function(){
        $http({
            method: 'POST',
            url: "https://jsonplaceholder.typicode.com/posts",
            data: {
                title: $scope.newPost.title,
                body: $scope.newPost.body,
                userId: 1
            }
        }).then(function (response){
            //Guarda en array de posts
            $scope.posts.push( $scope.newPost );
            //Limpia
            $scope.newPost = {};

            console.log(response);
        },function (response){
            console.log(response);
        });
    }

});