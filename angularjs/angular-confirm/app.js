angular.module('myApp', ['cp.ngConfirm'])
.controller('myController', function($scope, $ngConfirm){
    
    $scope.hey = 'Hello there!';
    
    $ngConfirm({
        title: 'What is up?',
        content: 'Here goes a little content, <strong>{{hey}}</strong>',
        contentUrl: 'template.html', // if contentUrl is provided, 'content' is ignored.
        scope: $scope,
        buttons: {   
            // long hand button definition
            ok: { 
                text: "ok!",
                btnClass: 'btn-primary',
                keys: ['enter'], // will trigger when enter is pressed
                action: function(scope){
                     $ngConfirm('the user clicked ok');
                }
            },
            // short hand button definition
            close: function(scope){
                $ngConfirm('the user clicked close');
            }
        },
    });

    
});