<?php


// for show errors
error_reporting(E_ALL); 
ini_set("display_errors", 1);

$wsdl = "https://UGCLive.SBPaymentSystems.com/esvc/V201/UGC_RPMT.cfc?WSDL";

// echo file_get_contents( $wsdl ); // works
// die();

//-------------------------- Does not work
// try {
//     $options = array( 
//         'soap_version'=>SOAP_1_1, 
//         'exceptions'=>true, 
//         'trace'=>1, 
//         'cache_wsdl'=>WSDL_CACHE_NONE 
//     ); 
//     $soap = new SoapClient($wsdl, $options);

// } catch (\SoapFault $e) {
//     echo $e->getMessage();
// }

// $soap = new SoapClient($wsdl, array('local_cert' => "cacert.pem"));
// var_dump($soap);


//-------------------------- SoapClient using TLS and CERT (WORKS)

$stream_context = stream_context_create(array(
    'ssl' => array(
        'crypto_method' => STREAM_CRYPTO_METHOD_TLSv1_2_CLIENT
//        'cafile' => "cacert.pem",
)));

$options = array(
    'trace' => true,
    'features' => SOAP_SINGLE_ELEMENT_ARRAYS,
    'soap_version' => 'SOAP_1_1',
    'stream_context' => $stream_context
);

$soap = new SoapClient( $wsdl, $options );
//$soap = new SoapClient( $wsdl, null );
var_dump($soap);

//------------------------------- WORKS
// $options=array(
//     'ssl'=>array(
//         'cafile' => 'cacert.pem', // need to request (it should not be needed)
//         'verify_peer' => true,
//         'verify_peer_name' => true,
//     ),
// );

// $context = stream_context_create( $options );
// $res = file_get_contents($wsdl, false, $context);
// echo $res;

//// $soap = new SoapClient($res); //crash
//// var_dump($soap);
//// die();




// ------------------------------------- NuSOAP (WORKS)
// $wsdl = "http://localhost:8080/SoapServer/webService?WSDL";
// require_once "vendor/autoload.php";


// try
// {
//     // new instance
//     $client = new nusoap_client( $wsdl, true );
//     // check simple error message
//     if ( $client->getError() ){
//         echo $client->getError();
//         die();
//     }

//     // WSDL method call and result
//     $result = $client->call('suma', array( 'valorA' => 1, 'valorB' => 2 ));
//     if( !$result ) {
//         echo $client->getError();
//         die();
//     }

//     // print result
//     echo "Resultado de la suma: " . $result['return'];
// }
// catch (SoapFault $fault) {
//     trigger_error("SOAP Fault: (faultcode: {$fault->faultcode}, faultstring: {$fault->faultstring})", E_USER_ERROR);
// }

