<?php 

	//-----------CON ARREGLOS
	// $arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
	// echo json_encode($arr);
	// echo "<br>";
	// echo "<br>";

	//----------- CON STRING
	// $val = '{ "tag" : "valor", "tag2" : "valor" }';
	// $obj = json_encode($val);
	// echo json_decode($obj);
	// echo "<br>";
	// echo "<br>";

	
	// $fruteria = '[{"0":"1","id_fruta":"1","1":"Manzana","nombre_fruta":"Manzana","2":"100","cantidad":"100"},{"0":"2","id_fruta":"2","1":"Platano","nombre_fruta":"Platano","2":"167","cantidad":"167"},{"0":"3","id_fruta":"3","1":"Pera","nombre_fruta":"Pera","2":"820","cantidad":"820"}]';
	
	//Se codifica para poder usarse como JSON
	// $json = json_decode($fruteria);
	// echo $json[0]->nombre_fruta."<br>";
	// echo $json[1]->nombre_fruta."<br>";
	// echo $json[2]->nombre_fruta."<br>";
	// echo "<br>";
	
	// foreach($json as $obj){
 //        $id_fruta = $obj->id_fruta;
 //        $nombre_fruta = $obj->nombre_fruta;
 //        $cantidad = $obj->cantidad;
 //        echo $id_fruta." ".$nombre_fruta." ".$cantidad;
 //        echo "<br>";
	// }
	// echo "<br>";
	// echo "<br>";



	// $json_horario = 
	// 	'[
	// 		{ "id_dia" : "1", "nom_dia": "Lunes", "horas": [9,10,13,15] },
	// 		{ "id_dia" : "2", "nom_dia": "Martes", "horas": [9,10,13,15] },
	// 		{ "id_dia" : "3", "nom_dia": "Miercoles", "horas": [9,10,13,15] }
	// 	]';

	// $obj = json_decode($json_horario);
	// // echo $obj[0]->dia;
	// // echo implode(", ", $obj[0]->horas);

	// echo $json_horario;
	// echo "<br>";
	// echo "<br>";

	// foreach($obj as $array){
	// 	echo "<strong>ID:</strong> ".$array->id_dia;
	// 	echo "<br>";
	// 	echo "<strong>Dia:</strong> ".$array->nom_dia;
	// 	echo "<br>";
	// 	echo "<strong>Horas:</strong> ";
	// 	//Imprimir horas
	// 	foreach( $array->horas as $hora ){
	// 		echo $hora.", ";
	// 	}
	// 	echo "<br>";
	// 	echo "<br>";
	// }


	$json = 
	'{
		"horario_materia":
		{
			"estudiante":2,
			"horario":
			[
				{"DiaID":1,"HoraID":1},
				{"DiaID":3,"HoraID":1},
				{"DiaID":5,"HoraID":1},
				{"DiaID":1,"HoraID":5},
				{"DiaID":3,"HoraID":5},
				{"DiaID":5,"HoraID":5}
			],
			"materias":[2]
		}
	}';

	$objD = json_decode($json);
	$obj = $objD->horario_materia;
	$id = $obj->estudiante;
	$horario = $obj->horario;
	$materias = $obj->materias;
	//echo $horario[0]->DiaNombre;

	echo "Estudiante: ".$id."<br>";

	foreach( $horario as $hm ){
		echo "Dia: ".$hm->DiaID." - ".$hm->HoraID."<br>";
	}
	echo "<br>";
	foreach( $materias as $mat ){
		echo "ID materia: ".$mat."<br>";
	}
	// echo $obj->materias[0];

 ?>