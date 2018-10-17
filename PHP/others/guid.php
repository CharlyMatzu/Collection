<?php

// echo uniqid('php_');

function getGUID(){
    if (function_exists('com_create_guid')){
        return com_create_guid();
    }else{
        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = chr(123)// "{"
            .substr($charid, 0, 8).$hyphen
            .substr($charid, 8, 4).$hyphen
            .substr($charid,12, 4).$hyphen
            .substr($charid,16, 4).$hyphen
            .substr($charid,20,12)
            .chr(125);// "}"
        return $uuid;
    }
}


$GUID = getGUID();
echo $GUID;



// if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
//     // echo 'This is a server using Windows!';
//     //Windows Based
//     $guid = com_create_guid();
//     echo $guid;
// } else {
//     // echo 'This is a server not using Windows!';
//     $GUID = getGUID();
//     echo $GUID;
// }




