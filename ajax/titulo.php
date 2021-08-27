<?php 
require_once "../controladores/ctltitulo.php";
 
$ctltitulo = new ctlTitulo();

//Variables manejo campos de tabla
//$idley=isset($_POST["idley"])? limpiarCadena($_POST["idley"]):"";
$idtitulo=isset($_POST["idtitulo"])? limpiarCadena($_POST["idtitulo"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";


	/*=============================================
	 FUNCION A EJECUTAR
	=============================================*/
	switch ($_GET["op"]){
	//Guardar o editar registros	
	case 'guardaryeditar':
		$idley = $_GET['idley'];
		
		$respuesta = $ctltitulo->ctlguardareditar($idtitulo,$idley,$descripcion);
		if (empty($idtitulo)){
			echo $respuesta ? "Titulo ingresado exitosamente" : "Titulo no se pudo ingresar";
		}
		else {
			echo $respuesta ? "Titulo actualizado exitosamente" : "Titulo no se pudo actualizar";
		}

	break;
	
	//Eliminar registros
	case 'eliminar':
		$idley = $_GET['idley'];
		$respuesta = $ctltitulo->ctleliminar($idtitulo,$idley);
 		echo $respuesta ? "Titulo eliminado exitosamente" : "Titulo no se puede eliminar";
	break;
	
	//Mostrar registros
	case 'mostrar':
		$idley = $_GET['idley'];
		$respuesta = $ctltitulo->ctlmostrar($idtitulo,$idley);
 		//Codificar el resultado utilizando json
 		echo json_encode($respuesta);
	break;
	
	//Listar registros
	case 'listar':
		$idley = $_GET['idley'];
		$respuesta = $ctltitulo->ctllistar($idley);
 		echo json_encode($respuesta);
	break;
	
	//Verifica capitulo
	case 'verificacapitulo':
		$idley = $_GET['idley'];
		$respuesta = $ctltitulo->ctlverificacapitulo($idtitulo,$idley);
		echo json_encode($respuesta);

	break;
	
	
		//Mostrar registros
	case 'recuperar':
		$idleyM = $_REQUEST["idleypar"];
		$idtituloM = $_REQUEST["idtitpar"];
		$respuesta = $ctltitulo->ctlmostrar($idtituloM,$idleyM);
 		//Codificar el resultado utilizando json
 		echo json_encode($respuesta);
	break;
}
?> 