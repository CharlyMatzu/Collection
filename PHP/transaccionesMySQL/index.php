<?php 

	$sql = new mysqli("localhost", "root", "", "prueba" );

    ///Manejo de error
    if( mysqli_connect_error() ) {
        trigger_error("Error al tratar de conectar con MySQL: " . mysqli_connect_error(),
            E_USER_ERROR);
        exit;
    }

    //---------------
    $res = $sql->query("SELECT 
	    				u.id as 'user_id', 
	    				u.nombre as 'user_nombre',
	    				p.id as 'persona_id',
	    				p.nombre as 'persona_nombre'
    				 FROM usuario u INNER JOIN persona p ON p.FK_user = u.id");
    if( !$res ){
    	echo "Ocurrio un error: ".$sql->error;
    	exit;
    }

    $sql->close();

    if( $res->num_rows == 0 )
    	echo "Sin valores";
    else{
	    while( $row = mysqli_fetch_assoc($res) ){
	    	echo "<br>Usuario Id: ".$row['user_id'];
	    	echo "<br>Usuario Nombre: ".$row['user_nombre'];
	    	echo "<br>Persona Id: ".$row['persona_id'];
	    	echo "<br>Persona Nombre: ".$row['persona_nombre'];
	    	echo "<br><br>";
	    }
    }


    


 ?>