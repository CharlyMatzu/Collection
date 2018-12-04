<?php

// -------------- 
// METHODS
// -------------- 

/*
    Callbacks can be denoted by callable type hint as of PHP 5.4. This documentation used callback type information for the same purpose.
    Some functions like call_user_func() or usort() accept user-defined callback functions as a parameter. Callback functions can not only be simple functions, but also object methods, including static class methods.

    http://php.net/manual/en/language.types.callable.php
*/


function helloWorld(){
    echo "Hello";
}


class MyClass{
    public static function helloWorld(){
        echo "Hello";
    }
}

// Type 1: Simple callback
call_user_func('helloWorld');

// Type 2: Static class method call
call_user_func(array('MyClass', 'helloWorld'));

// Type 3: Object method call
$obj = new MyClass();
call_user_func(array($obj, 'helloWorld'));

// Type 4: Static class method call (As of PHP 5.2.3)
call_user_func('MyClass::helloWorld');




// -------------- 
// EXAMPLE
// -------------- 


// -------------- FUNCTIONS

function name($name, $callback)
{
    $result =  [
        'lower' => strtolower($name),
        'upper' => strtoupper($name)
    ];

    if( is_callable($callback) )
        call_user_func($callback, $result);
    else
        die("$callback is not a callable function");
}



function printRes($result)
{
    print_r($result);
}


// -------------- FUNCTIONS CALLS AND CALLBACKS

// call function with callback using anonymous function
name('Carlos', function ($result){
    print_r($result);
});

// call function with callback using anonymous function
// name('Carlos', );