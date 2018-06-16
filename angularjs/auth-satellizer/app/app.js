//-------------------
// CONFIGURACION
//-------------------

angular
    .module('myApp',['satellizer', 'ngRoute'])
    //CONSTANTES
    .constant('SERVERS',
        {  
            DEVELOPMENT:    "http://api.asesoriaspar.com",
            PRODUCTION:     "http://asesoriaspar.ronintopics.com",
            USE_DEVELOP:    true
        }
    )
    //INJECCION DE authProvider para enviar token de authenticacion a esos elementos
    //Injeccion de Server (constantes) para indicar ruta de server
    .config(['$authProvider', '$routeProvider', 'SERVERS', function($authProvider, $routeProvider, SERVERS){
        
        // Parametros de configuración
        var url = "";
        if( SERVERS.USE_DEVELOP == true )
            url = SERVERS.DEVELOPMENT;
        else
            url = SERVERS.PRODUCTION;

            console.log( "HOST: "+url );

        //Parametros
        $authProvider.loginUrl = url+"/auth/signin";
        $authProvider.signupUrl = url+"/auth/signup";
        $authProvider.tokenName = "token",
        $authProvider.tokenPrefix = "par"



        //-------------ROUTING
        $routeProvider
            .when("/signin", {
                controller: "SigninController",
                controllerAs: "login",
                templateUrl: "views/signin/signinView.html"
            })
            // .when("/signup", {
            //     controller: "SignupController",
            //     controllerAs: "signup",
            //     templateUrl: "views/signup/signupView.html"
            // })
            .when("/private", {
                controller: null,
                templateUrl: "views/private/privateView.html"
            })
            .otherwise("/signin");

        

    }]);
    
//-------------------
// CONTROLLERS
//-------------------

angular
	.module("myApp.controllers", [])
    // .controller("SignupController", SignupController)
    .controller("SigninController", SigninController)
    .controller("LogoutController", LogoutController); //end module
    

// function SignupController($auth, $location) {
// 	var vm = this;
//     this.signup = function() {
//     	$auth.signup({
//         	email: vm.email,
//             password: vm.password
//         })
//         .then(function() {
//         	// Si se ha registrado correctamente,
//             // Podemos redirigirle a otra parte
//             $location.path("/private");
//         })
//         .catch(function(response) {
//         	// Si ha habido errores, llegaremos a esta función
//         });
//     }
// }

function SigninController($auth, $location) {
	var vm = this;
    this.login = function(){
    	$auth.login({
        	email: vm.email,
            password: vm.password
        })
        .then(function(){
        	// Si se ha logueado correctamente, lo tratamos aquí.
            // Podemos también redirigirle a una ruta
            $location.path("/private")
        })
        .catch(function(response){
        	// Si ha habido errores llegamos a esta parte
        });
    }
}

function LogoutController($auth, $location) {
	$auth.logout()
    	.then(function() {
        	// Desconectamos al usuario y lo redirijimos
            $location.path("/")
        });
}