<?php 

	$usuario = $_GET['usuario'];
	$persona = $_GET['persona'];


	$sql = new mysqli("localhost", "root", "", "prueba" );

    ///Manejo de error
    if( mysqli_connect_error() ) {
        trigger_error("Error al tratar de conectar con MySQL: " . mysqli_connect_error(),
            E_USER_ERROR);
        exit;
    }


	$sql->autocommit( false );
	$response = true;
	try{
		$res = $sql->query("INSERT INTO usuario(nombre) VALUES ('".$usuario."')");
		if( !$res )
			$response = false;

		$res = $sql->query("SELECT id FROM usuario ORDER BY id DESC LIMIT 1");
		if( !$res )
			$response = false;
		else{
			$id = mysqli_fetch_assoc($res);
			$id = $id['id'];
		}

		//Dato vacio
		if( empty($persona) )
			$response = false;

		$res = $sql->query("INSERT INTO persona(nombre, FK_user) VALUES ('".$persona."', ".$id.")");
		if( !$res )
			$response = false;

		if( $response ){
			$sql->commit();
			echo "Agregado con éxito";
		}
		else{
			$sql->rollback();
			echo "Rollback";
		}
				
		
	// }catch(Exception $ex){
 //        //TODO: retornar valor para control
 //        $sql->rollback();
 //        echo 'algo fallo: ',  $ex->getMessage(), "\n";
 //    }

    $sql->close();


 ?>