<?php 
require_once "../controladores/ctlevaluacion.php";
 
$ctlevaluacion = new ctlEvaluacion();

//Variables manejo campos de tabla
//$idregion=isset($_POST["idregion"])? limpiarCadena($_POST["idregion"]):"";
//$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";

	/*=============================================
	 FUNCION A EJECUTAR
	=============================================*/
	switch ($_GET["op"]){
	
	//Listar registros
	case 'listar':
		$respuesta = $ctlevaluacion->ctllistar();
 		echo json_encode($respuesta);
	break;
	
}
?> 