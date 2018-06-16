angular.module('myApp', ['ui.router'])

    .config(['$urlRouterProvider', '$stateProvider', function ($urlRouterProvider, $stateProvider) {
        
        $stateProvider
            .state("/public", {
                controller: null,
                templateUrl: "views/public.html",
                authorize: false
                //Ejemplo de un uso diferente
                //Aqui podria ir la funcionalidad del auth y demas pero
                //requeriria revisar las situaciones asincronas
                // resolve: {
                //     objName: function() {
                //         console.log('it Works');
                //         return 'muajajaja';
                //     }
                // }
            })
            .state("/private", {
                controller: null,
                templateUrl: "views/private.html",
                authorize: true
            });
            
            $urlRouterProvider.otherwise("/public");
    }])

    .factory('AuthFactory', function(){

        this.authenticated = false;

        this.checkAuth = function(){
            //Podria checarse el sessionStorage o Localstorage
            return this.authenticated;
        };

        this.setAuthenticate = function(flag){
            this.authenticated = flag;
        }

        return {
            isAuthenticated: function(){
                return checkAuth();
            }
        };

    })


    .run(['$rootScope','$location', '$routeParams', 'AuthFactory', function($rootScope, $location, $routeParams, AuthFactory) {

        //https://docs.angularjs.org/api/ngRoute/service/$route#events

        //Detecta evento de ngRoute que indica cuando se cambio de ruta
        $rootScope.$on("$routeChangeStart", function(evt, next, current) {
            // requires authorization?
            if (next.authorize === true)
            {
                // next.resolve = next.resolve || {};
                // if (!next.resolve.authorizationResolver)
                // {
                //     // inject resolver
                //     next.resolve.authorizationResolver = ["authService", function(authService) {
                //         return authService.authorize();
                //     }];
                // }
            }
        });

        //Evento cuando ha cambiado con éxito
        // $rootScope.$on('$routeChangeSuccess', function(event, next, current) {
            
        //     console.log('Current route name: ' + $location.path());
            
        //     //Evita que continue
        //     event.preventDefault();

        //     // Get all URL parameter
        //     // console.log($routeParams);
        // });


        // $rootScope.$on("$routeChangeError", function(evt, to, from, error) {
        //     if (error instanceof AuthorizationError)
        //     {
        //         // redirect to login with original path we'll be returning back to
        //         // $location
        //         //     .path("/login")
        //         //     .search("returnTo", to.originalPath);
        //     }
        // });


    }]);