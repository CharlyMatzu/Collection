<?php 


	require "Conexion.php";
	use Database\Conexion;
	$con = new Conexion();
	//MySQL
	$res = $con->doQuery("SELECT * FROM mensajes");
	if( $res == false ) {
		echo "Error: ".$con->getError();
		exit();
	}
	$datos = array();
	while( $dato = mysqli_fetch_assoc( $res ) ){
	    $datos[] = $dato;
	}
	$con->cerrarConexion();

	//Mostrar
	if( count($datos) == 0 )
		echo "No hay mensajes";
	else{
		echo "<strong>Mensajes encontrados: ".count($datos)."</strong><br><br>";
		foreach( $datos as $dato ){
			echo "Mensaje escrito a las ".$dato['fecha'].": ".$dato['mensaje']."<br>\n";
		}
	}


	
	
 ?>
