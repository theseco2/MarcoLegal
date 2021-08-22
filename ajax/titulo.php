<?php 
require_once "../controladores/ctltitulo.php";
 
$ctltitulo = new ctlTitulo();

//Variables manejo campos de tabla
//$idley=isset($_POST["idley"])? limpiarCadena($_POST["idley"]):"";
$idtitulo=isset($_POST["idtitulo"])? limpiarCadena($_POST["idtitulo"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";

//recupera el id de ley
$idley = $_GET['idley'];

	/*=============================================
	 FUNCION A EJECUTAR
	=============================================*/
	switch ($_GET["op"]){
	//Guardar o editar registros	
	case 'guardaryeditar':
		
		
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
		$respuesta = $ctltitulo->ctleliminar($idtitulo,$idley);
 		echo $respuesta ? "Titulo eliminado exitosamente" : "Titulo no se puede eliminar";
	break;
	
	//Mostrar registros
	case 'mostrar':
		$respuesta = $ctltitulo->ctlmostrar($idtitulo,$idley);
 		//Codificar el resultado utilizando json
 		echo json_encode($respuesta);
	break;
	
	//Listar registros
	case 'listar':
		$respuesta = $ctltitulo->ctllistar($idley);
 		echo json_encode($respuesta);
	break;
	
	//Verifica capitulo
	case 'verificacapi':
		$respuesta = $ctltitulo->verificacapi($idtitulo,$idley);
		echo json_encode($respuesta);

	break;
}
?> 