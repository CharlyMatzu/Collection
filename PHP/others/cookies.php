<?php
/**
 * Created by PhpStorm.
 * User: Emcor
 * Date: 22/10/2018
 * Time: 02:24 PM
 */

if( isset($_GET['lang']) ){
    if( !empty($_GET['lang']) ){
        //si es para limpiar
        if( $_GET['lang'] === 'clean' ){
            unset($_COOKIE['idioma']); //limpia variable
            setcookie("idioma", null, -1, '/'); //setea a null y expiracion
        }
        //Se asigna idioma
        else if( !isset($_COOKIE['idioma']) ) {
            setcookie("idioma", $_GET['lang']);
//            setcookie("idioma", $_GET['ang'], time()+3600);
        }

//        echo $_SERVER['REQUEST_URI'];
        header("Location: http://localhost/otros/cookies/");
    }
}


//Usando  IP
$ip = $_SERVER['REMOTE_ADDR']; // This will contain the ip of the request
$dataArray_1 = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip), true);
//Autodetectando
$dataArray_2 = json_decode(file_get_contents("http://www.geoplugin.net/json.gp"), true);


//------------http://php.net/setcookie
// setcookie() define una cookie para ser enviada junto con el resto de las cabeceras de HTTP. Al igual que otras cabeceras,
// las cookies deben ser enviadas antes de que el script genere ninguna salida (es una restricción del protocolo).
// Ésto implica que las llamadas a esta función se coloquen antes de que se genere cualquier salida,
// incluyendo las etiquetas <html> y <head> al igual que cualquier espacio en blanco.
if( isset($_COOKIE['idioma']) )
    echo $_COOKIE["idioma"];
else
    echo "Sin idioma seteado";

$country = $dataArray_2['geoplugin_countryCode'];
echo "<br><br>";
echo "Pais detectado: ".$country;
echo "<br><br>";

// Formulario
echo <<< EOL
<form action="" method="get">
    <button type="submit" name="lang" value="$country">Setear $country</button>
    <button type="submit" name="lang" value="clean">Limpiar $country</button>
</form>
EOL;



//header("Content-Type: text/html; charset=UTF-8");
//var_dump($dataArray_1);
//var_dump($dataArray_2);
