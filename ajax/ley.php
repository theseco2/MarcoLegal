<?php 
require_once "../controladores/ctlley.php";
 
$ctlley = new ctlLey();

//Variables manejo campos de tabla
$idley=isset($_POST["idley"])? limpiarCadena($_POST["idley"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";

	/*=============================================
	 FUNCION A EJECUTAR
	=============================================*/
	switch ($_GET["op"]){
	//Guardar o editar registros	
	case 'guardaryeditar':

		$respuesta = $ctlley->ctlguardareditar($idley,$descripcion);
		if (empty($idley)){
			echo $respuesta ? "Ley ingresada exitosamente" : "Ley no se pudo ingresar";
		}
		else {
			echo $respuesta ? "Ley actualizada exitosamente" : "Ley no se pudo actualizar";
		}

	break;
	
	//Eliminar registros
	case 'eliminar':
		$respuesta = $ctlley->ctleliminar($idley);
 		echo $respuesta ? "Ley eliminada exitosamente" : "Ley no se puede eliminar";
	break;
	
	//Mostrar registros
	case 'mostrar':
		$respuesta = $ctlley->ctlmostrar($idley);
 		//Codificar el resultado utilizando json
 		echo json_encode($respuesta);
	break;
	
	//Listar registros
	case 'listar':
		$respuesta = $ctlley->ctllistar();
 		echo json_encode($respuesta);
	break;
	
	
	case 'verificatitulo':
		//$idleycom=$_GET[$idley];
		//echo $idley;
		$respuesta = $ctlley->ctlverificatitulo($idley);
		//$fetch=$respuesta->fetch_object();
		echo json_encode($respuesta);

	break;
	
	
	//Mostrar registros
	case 'recuperar':
		$idleyM = $_REQUEST["idleypar"];
		$respuesta = $ctlley->ctlmostrar($idleyM);
 		//Codificar el resultado utilizando json
 		echo json_encode($respuesta);
	break;
}
?> 