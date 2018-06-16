<?php 

/*
	if( !isset($_GET['mensaje']) ){
		echo "No hay variable mensaje";
		exit();
	}
	$mensaje = $_GET['mensaje'];
*/
	$palabras = [
		"Carlos",
		"Noriega",
		"Rafa",
		"Miguel",
		"Arturo",
		"Jesus",
		"Baes",
		"Omar",
		"Aldo",
		"Algo",
		"asdlamsda",
		"parece que si",
		"jaajajaja",
		"ya weeee!"
	];

	$num = rand(0, count($palabras));
	$mensaje = $palabras[ $num ];

		
	require "Conexion.php";
	use Database\Conexion;
	$con = new Conexion();
	//MySQL
	$res = $con->doQuery("INSERT INTO mensajes(mensaje) VALUES('Mensaje: ".$mensaje." de la posicion: ".$num."')");
	if( $res == false ) {
		echo "Error: ".$con->getError();
		exit();
	}
	else
		echo "Valor agregado\n";
	
	
 ?>
