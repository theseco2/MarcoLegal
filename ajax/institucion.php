<?php 
require_once "../controladores/ctlinstitucion.php";
 
$ctlinstitucion = new ctlInstitucion();

//Variables manejo campos de tabla
$idinstitucion=isset($_POST["idinstitucion"])? limpiarCadena($_POST["idinstitucion"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";

	/*=============================================
	 FUNCION A EJECUTAR
	=============================================*/
	switch ($_GET["op"]){
	//Guardar o editar registros	
	case 'guardaryeditar':

		$respuesta = $ctlinstitucion->ctlguardareditar($idinstitucion,$descripcion);
		if (empty($idinstitucion)){
			echo $respuesta ? "Institucion ingresada exitosamente" : "Institucion no se pudo ingresar";
		}
		else {
			echo $respuesta ? "Institucion actualizada exitosamente" : "Institucion no se pudo actualizar";
		}

	break;
	
	//Eliminar registros
	case 'eliminar':
		$respuesta = $ctlinstitucion->ctleliminar($idinstitucion);
 		echo $respuesta ? "Institucion eliminada exitosamente" : "Institucion no se puede eliminar";
	break;
	
	//Mostrar registros
	case 'mostrar':
		$respuesta = $ctlinstitucion->ctlmostrar($idinstitucion);
 		//Codificar el resultado utilizando json
 		echo json_encode($respuesta);
	break;
	
	//Listar registros
	case 'listar':
		$respuesta = $ctlinstitucion->ctllistar();
 		echo json_encode($respuesta);
	break;
	
	
	case 'verificaevalua':
		//$idinstitucioncom=$_GET[$idinstitucion];
		//echo $idinstitucion;
		$respuesta = $ctlinstitucion->ctlverificaevalua($idinstitucion);
		//$fetch=$respuesta->fetch_object();
		echo json_encode($respuesta);

	break;
	
		//Mostrar registros
	case 'recuperar':
		$idinstM = $_REQUEST["idinstpar"];
		$respuesta = $ctlinstitucion->ctlmostrar($idinstM);
 		//Codificar el resultado utilizando json
 		echo json_encode($respuesta);
	break;
}
?> 