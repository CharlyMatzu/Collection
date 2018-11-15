<?php

// -------------------------- TEST 1
$ch = curl_init();

//------GET
curl_setopt($ch, CURLOPT_URL,"http://localhost/otros/curl/plain/response.php?test=prueba1");

//------POST
// curl_setopt($ch, CURLOPT_URL,"http://localhost/otros/curl/plain/response.php");
    //curl_setopt($ch, CURLOPT_POST, 1); // not required if POSTFIELDS are set
// curl_setopt($ch, CURLOPT_POSTFIELDS, "test=prueba");


// Receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$server_output = curl_exec($ch); // make request
curl_close ($ch); // close and clean resources

// output
if ( $server_output )
   echo $server_output;
else
   echo "FAIL";

echo "<br>";

// -------------------------- TEST 2

// Get cURL resource
$curl = curl_init();
// Set some options - we are passing in a useragent too here
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://localhost/otros/curl/plain/response.php?test=prueba2',
    CURLOPT_USERAGENT => 'PHP Curl Example'
));
// Send the request & save response to $resp
$resp = curl_exec($curl);
// Close request to clear up some resources
curl_close($curl);

if ( $resp )
   echo $resp;
else
   echo "FAIL";

echo "<br>";

// Close request to clear up some resources
// curl_close($curl);



// Get cURL resource
$curl = curl_init();
// Set some options - we are passing in a useragent too here
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://localhost/otros/curl/plain/response.php',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request',
    CURLOPT_POST => 1,
    CURLOPT_POSTFIELDS => array(
        'test' => 'esta es una prueba 3',
    )
));
// Send the request & save response to $resp
$resp = curl_exec($curl);


if ( $resp )
   echo $resp;
else
   echo "FAIL";


echo "<br>";

// Close request to clear up some resources
curl_close($curl);