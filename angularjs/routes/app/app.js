var app = angular.module('app', []);

app.controller('MyController', function($scope){

    $scope.nombre = "Carlos";

    //Después de 2 segundos se cambiara el valor del scope.nombre, sin embargo
    //El valor no se vera reflejado en pantalla ya que el valor cambia dentro de un contexto
    //que angular no espera, por lo tanto el Watcher generado por el mismo no puede
    //Actualizar la informacion
    //Para ello se utiliza $apply, pasandole una funcion como parametro en el cual se realicen los cambios
    //mandando a llamar a $digest
    setTimeout(function () {
        $scope.$apply( function () {
           $scope.nombre = "Roberto";
        });
    }, 2000);

});