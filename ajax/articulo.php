<?php 
require_once "../controladores/ctlarticulo.php";
 
$ctlarticulo = new ctlArticulo();

//Variables manejo campos de tabla
$idarticulo=isset($_POST["idarticulo"])? limpiarCadena($_POST["idarticulo"]):"";
$numero=isset($_POST["numero"])? limpiarCadena($_POST["numero"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";


	/*=============================================
	 FUNCION A EJECUTAR
	=============================================*/
	switch ($_GET["op"]){
	//Guardar o editar registros	
	case 'guardaryeditar':
		$idley= $_GET['idley'];
		$idtitulo= $_GET['idtit'];
		$idcapitulo= $_GET['idcap'];
		$respuesta = $ctlarticulo->ctlguardareditar($idarticulo,$idley,$idtitulo,$idcapitulo,$numero,$nombre,$descripcion);
		if (empty($idarticulo)){
			echo $respuesta ? "Articulo ingresado exitosamente" : "Articulo no se pudo ingresar";
		}
		else {
			echo $respuesta ? "Articulo actualizado exitosamente" : "Articulo no se pudo actualizar";
		}

	break;
	
	//Eliminar registros
	case 'eliminar':
		$idley= $_GET['idley'];
		$idtitulo= $_GET['idtit'];
		$idcapitulo= $_GET['idcap'];
		$respuesta = $ctlarticulo->ctleliminar($idarticulo,$idley,$idtitulo,$idcapitulo);
 		echo $respuesta ? "Articulo eliminado exitosamente" : "Articulo no se puede eliminar";
	break;
	
	//Mostrar registros
	case 'mostrar':
		$idley= $_GET['idley'];
		$idtitulo= $_GET['idtit'];
		$idcapitulo= $_GET['idcap'];
		$respuesta = $ctlarticulo->ctlmostrar($idarticulo,$idley,$idtitulo,$idcapitulo);
 		//Codificar el resultado utilizando json
 		echo json_encode($respuesta);
	break;
	
	//Listar registros
	case 'listar':
		$idley= $_GET['idley'];
		$idtitulo= $_GET['idtit'];
		$idcapitulo= $_GET['idcap'];
		$respuesta = $ctlarticulo->ctllistar($idley,$idtitulo,$idcapitulo);
 		echo json_encode($respuesta);
	break;
	
	//Falta verificación de integridad con la tabla de evaluaciónPENDIENTE
}
?> 