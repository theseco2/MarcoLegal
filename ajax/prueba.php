<?php

header('Content-Type: application/json');
require_once "../controladores/ctlcalendario.php";


////require_once "../config/global.php";

/////$conexion_ss = new PDO("mysql:dbname=".DB_NAME.";".DB_HOST,DB_USERNAME,DB_PASSWORD);

/////$conexion = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
/////mysqli_query( $conexion, 'SET NAMES "'.DB_ENCODE.'"');

  
$ctlcalendario =new ctlcalendario();


$respuesta = $ctlcalendario->ctllistar();
		
		
		/////$sente = $conexion_ss->prepare("SELECT id, start, descripcion  FROM expediente_audiencia");
		/////$sente->execute();

		//////$respuesta= $sente->fetchAll(PDO::FETCH_ASSOC);
 		echo json_encode($respuesta);


?>