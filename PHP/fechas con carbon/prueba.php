<?php

	require 'vendor/autoload.php';
	use Carbon\Carbon;

	
	//cualquierFecha-> = String

	// $hoy = Carbon::today();
	//$hoy2 = Carbon::now();
	// $fechaX = Carbon::parse("2017-08-27 23:03:51");

	// var_dump( $hoy );
	// var_dump( $hoy2 );
	// var_dump( $fechaX );

	//el segundo parametro es positivo
	// echo $hoy->diffInDays( $fechaX, false);


	// $fecha = Carbon::today();
	// var_dump($fecha);
	// echo $fecha;

	// echo "Fecha con today(): ".Carbon::today();
	// echo "<br>";
	// echo "Fecha con now(): ".Carbon::now();
	// echo "<br>";
	// //http://php.net/manual/es/timezones.america.php
	// echo " ".Carbon::today( 'America/Mexico_City' );
	// echo "<br>";
	// echo "Fecha con Now() y zona horaria de CDMX: ".Carbon::now( 'America/Mexico_City' );
	// $hoy = Carbon::now( 'America/Hermosillo' )->format('D d-m-Y');


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Fechas utilizando Carbon</h1>
	<a href="https://carbon.nesbot.com/docs/">Carbon PHP</a>

	<h2>Fecha actual</h2>
	<p>Fecha con Carbon::today() <?= Carbon::today() ?></p>	
	<p>Fecha con Carbon::now() <?= Carbon::now() ?></p>	

	<h2>Fecha actual y Zona Horaria</h2>
	<p>Fecha con Carbon::today() y zona horaria de CDMX: <?= Carbon::today( 'America/Mexico_City' ) ?></p>
	<p>Fecha con Carbon::now() y zona horaria de CDMX: <?= Carbon::today( 'America/Mexico_City' ) ?></p>

	<h2>Creacion de fechas</h2>
	<p>
		Carbon::createFromDate( año, mes, dia, 'Zona horaria' ) =  Fecha con hora
		<br>
		<?= Carbon::createFromDate(2017,8,28, 'America/Hermosillo'); ?>
	</p>
	<p>
		Carbon::parse("yyyy-mm-dd hh:mm:ss");
		<br>
		<?= Carbon::parse("2017-08-27 23:03:51"); ?>
	</p>

	<h2>Formatos</h2>
	<p>Revisar: <a href="http://php.net/manual/es/function.date.php">http://php.net/manual/es/function.date.php</a></p>
	<p>
		<h3>Año mes día</h3>
		Para mostrar dia-mes-año --object->format("d-m-Y")--
		<br>
		<?= Carbon::today()->format("d-m-Y"); ?>
		<br><br>
		Igual que el anterior pero con 2 digitos --object->format("d-m-y")--
		<br>
		<?= Carbon::today()->format("d-m-y"); ?>
	</p>
	<p>
		<h3>Texto</h3>
		Para mostrar el día actual en texto (ingles) object->format("D")
		<br>
		<strong><?= Carbon::today()->format("D"); ?></strong>
		<br><br>
		Para mostrar el número de la semana object->format("w") (comenzando desde Domingo): 0 = domingo, 6 = Sabado
		<br>
		<strong><?= Carbon::today()->format("w"); ?></strong>
	</p>

	<h3>Unix</h3>
    <p>con Carbon::now()->timestamp</p>
    <?php
		//https://www.epochconverter.com/
        //Define zona horaria
        $hoy = Carbon::now('America/Phoenix');
        echo "fecha $hoy <br>";
        echo "Unix $hoy->timestamp ";

        //echo Carbon::now()->timestamp;
    ?>


	
</body>
</html>