<?php 
require_once "../controladores/ctlcapitulo.php";
 
$ctlcapitulo = new ctlCapitulo();

//Variables manejo campos de tabla
$idcapitulo=isset($_POST["idcapitulo"])? limpiarCadena($_POST["idcapitulo"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";


	/*=============================================
	 FUNCION A EJECUTAR
	=============================================*/
	switch ($_GET["op"]){
	//Guardar o editar registros	
	case 'guardaryeditar':
		$idley= $_GET['idley'];
		$idtitulo= $_GET['idtit'];
		$respuesta = $ctlcapitulo->ctlguardareditar($idcapitulo,$idley,$idtitulo,$descripcion);
		if (empty($idcapitulo)){
			echo $respuesta ? "Capitulo ingresado exitosamente" : "Capitulo no se pudo ingresar";
		}
		else {
			echo $respuesta ? "Capitulo actualizado exitosamente" : "Capitulo no se pudo actualizar";
		}

	break;
	
	//Eliminar registros
	case 'eliminar':
		$idley= $_GET['idley'];
		$idtitulo= $_GET['idtit'];
		$respuesta = $ctlcapitulo->ctleliminar($idcapitulo,$idley,$idtitulo);
 		echo $respuesta ? "Capitulo eliminado exitosamente" : "Capitulo no se puede eliminar";
	break;
	
	//Mostrar registros
	case 'mostrar':
		$idley= $_GET['idley'];
		$idtitulo= $_GET['idtit'];
		$respuesta = $ctlcapitulo->ctlmostrar($idcapitulo,$idley,$idtitulo);
 		//Codificar el resultado utilizando json
 		echo json_encode($respuesta);
	break;
	
	//Listar registros
	case 'listar':
		$idley= $_GET['idley'];
		$idtitulo= $_GET['idtit'];
		$respuesta = $ctlcapitulo->ctllistar($idley,$idtitulo);
 		echo json_encode($respuesta);
	break;
	
	//Verifica articulo
	case 'verificaarticulo':
		$idley= $_GET['idley'];
		$idtitulo= $_GET['idtit'];
		$respuesta = $ctlcapitulo->ctlverificaarticulo($idcapitulo,$idley,$idtitulo);
		echo json_encode($respuesta);
		
					//Mostrar registros
	case 'recuperar':
		$idleyM = $_REQUEST["idleypar"];
		$idtituloM = $_REQUEST["idtitpar"];
		$idcapituloM = $_REQUEST["idcappar"];
		$respuesta = $ctlcapitulo->ctlmostrar($idcapituloM,$idleyM,$idtituloM);
 		//Codificar el resultado utilizando json
 		echo json_encode($respuesta);
	break;
}
?> 