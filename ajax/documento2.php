<?php 
require_once "../controladores/ctldocumento2.php";
 
$ctldocumento2 = new ctlDocumento2();

//Variables manejo campos de tabla
$iddocumento=isset($_POST["iddocumento"])? limpiarCadena($_POST["iddocumento"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";


	/*=============================================
	 FUNCION A EJECUTAR
	=============================================*/
	switch ($_GET["op"]){
	//Guardar o editar registros	
	case 'guardaryeditar':
		$idinstitucion= $_GET['idinst'];
		$idley= $_GET['idley'];
		$idtitulo= $_GET['idtit'];
		$idcapitulo= $_GET['idcap'];
		$respuesta = $ctldocumento2->ctlguardareditar($iddocumento,$idinstitucion,$idley,$idtitulo,$idcapitulo,$nombre);
		if (empty($iddocumento)){
			echo $respuesta ? "Archivo cargado exitosamente" : "Archivo no se pudo cargar";
		}
		else {
			//echo $respuesta ? "Articulo actualizado exitosamente" : "Articulo no se pudo actualizar";
		}

	break;
	
	//Eliminar registros
	case 'eliminar':
		$idinstitucion= $_GET['idinst'];
		$idley= $_GET['idley'];
		$idtitulo= $_GET['idtit'];
		$idcapitulo= $_GET['idcap'];
		$respuesta = $ctldocumento2->ctleliminar($iddocumento,$idinstitucion,$idley,$idtitulo,$idcapitulo);
 		echo $respuesta ? "Archivo eliminado exitosamente" : "Archivo no se puede eliminar";
	break;
	
	//Mostrar registros
	//case 'mostrar':
	//	$idley= $_GET['idley'];
	//	$idtitulo= $_GET['idtit'];
	//	$idcapitulo= $_GET['idcap'];
	//	$respuesta = $ctldocumento2->ctlmostrar($iddocumento,$idley,$idtitulo,$idcapitulo);
 	//	//Codificar el resultado utilizando json
 	//	echo json_encode($respuesta);
	//break;
	
	//Listar registros
	case 'listar':
		$idinstitucion= $_GET['idinst'];
		$idley= $_GET['idley'];
		$idtitulo= $_GET['idtit'];
		$idcapitulo= $_GET['idcap'];
		$respuesta = $ctldocumento2->ctllistar($idinstitucion,$idley,$idtitulo,$idcapitulo);
 		echo json_encode($respuesta);
	break;
	

}
?> 