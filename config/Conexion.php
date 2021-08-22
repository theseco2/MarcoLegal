<?php 
require_once "global.php";

$conexion_Cale = new PDO("mysql:dbname=".DB_NAME.";".DB_HOST,DB_USERNAME,DB_PASSWORD);

//function ejecutarConsulta_Calendario($sql){
//		global $conexion_Cale;
//		$query = $conexion_Cale->prepare($sql);
//		$query->execute();
//		return $query->fetchAll(PDO::FETCH_ASSOC);
//	}



$conexion = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

mysqli_query( $conexion, 'SET NAMES "'.DB_ENCODE.'"');

//Si tenemos un posible error en la conexión lo mostramos
if (mysqli_connect_errno())
{
	printf("Falló conexión a la base de datos: %s\n",mysqli_connect_error());
	exit();
}

if (!function_exists('ejecutarConsulta'))
{
	function ejecutarConsulta($sql)
	{
		global $conexion;
		$query = $conexion->query($sql);
		return $query;
	}

	function ejecutarConsultaSimpleFila($sql)
	{
		global $conexion;
		$query = $conexion->query($sql);		
		$row = $query->fetch_assoc();
		return $row;
	}

	function ejecutarConsulta_retornarID($sql)
	{
		global $conexion;
		$query = $conexion->query($sql);		
		return $conexion->insert_id;	
	}

	function limpiarCadena($str)
	{
		global $conexion;
		$str = mysqli_real_escape_string($conexion,trim($str));
		return htmlspecialchars($str);
	}
	function ejecutarConsulta_Calendario($sql){
		global $conexion_Cale;
		$query = $conexion_Cale->prepare($sql);
		$query->execute();
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
}
?>