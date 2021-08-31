<?php 
require_once "../controladores/ctlevaluacion.php";
 
$ctlevaluacion = new ctlEvaluacion();

//Variables manejo campos de tabla
$idarticulo=isset($_POST["idarticulo"])? limpiarCadena($_POST["idarticulo"]):"";
$idevaluacion=isset($_POST["idevaluacion"])? limpiarCadena($_POST["idevaluacion"]):"";
$marca=isset($_POST["marca"])? limpiarCadena($_POST["marca"]):"";
$observacion=isset($_POST["observacion"])? limpiarCadena($_POST["observacion"]):"";


	/*=============================================
	 FUNCION A EJECUTAR
	=============================================*/
	switch ($_GET["op"]){
	
	//Guardar o editar registros	
	case 'guardaryeditar':

		$idleyM = $_GET['idley'];
		$idtituloM = $_GET['idtitulo'];
		$idcapituloM = $_GET['idcapitulo'];
		$idinstitucionM = $_GET['idinstitucion'];
		$file = $_GET['file'];
		$file2 = $_GET['file2'];
		$file3 = $_GET['file3'];

		$respuesta = $ctlevaluacion->ctlguardareditar($idevaluacion,$idinstitucionM ,$idleyM,$idtituloM,$idcapituloM,$idarticulo,$marca,$observacion,$file,$file2,$file3);
		if (empty($idevaluacion)){
			echo $respuesta ? "Evaluacion ingresada exitosamente" : "Evaluacion no se pudo ingresar";
		}
		else {
			echo $respuesta ? "Evaluacion actualizada exitosamente" : "Evaluacion no se pudo actualizar";
		}

	break;

	//Listar registros
	case 'listar':
		$respuesta = $ctlevaluacion->ctllistar();
 		echo json_encode($respuesta);
	break;

	case 'selectLey':

		$rspta = $ctlevaluacion->ctlselectley();

		while ($reg = $rspta->fetch_object())
			{
				echo '<option value="'.$reg->idley.'">'.$reg->descripcion.'</option>';	
			}

	break;	

	case 'selectTitulo':

		$idley=$_GET['idley'];

		$rspta = $ctlevaluacion->ctlselecttitulo($idley);

		while ($reg = $rspta->fetch_object())
			{
				echo '<option value="'.$reg->idtitulo.'">'.$reg->descripcion.'</option>';	
			}

	break;	

	case 'selectCapitulo':

		$idley=$_GET['idley'];
		$idtitulo=$_GET['idtitulo'];

		$rspta = $ctlevaluacion->ctlselectcapitulo($idley, $idtitulo);

		while ($reg = $rspta->fetch_object())
			{
				echo '<option value="'.$reg->idcapitulo.'">'.$reg->descripcion.'</option>';	
			}

	break;	

	case 'listar_articulos':

		$idleyM = $_REQUEST["idley"];
		$idtituloM = $_REQUEST["idtitulo"];
		$idcapituloM = $_REQUEST["idcapitulo"];
		$idinstitucionM = $_REQUEST["idinstitucionpar"];
/*
		$idleyM = 1;
		$idtituloM = 1;
		$idcapituloM = 1;
		$idinstitucionM = 1;
*/	
		$rspta=$ctlevaluacion->ctllistar_articulos($idinstitucionM,$idleyM,$idtituloM,$idcapituloM);
 		echo json_encode($rspta);

	break;

	case 'mostrar':

		$idarticuloM = $_REQUEST["idarticulo"];
		$idleyM = $_GET['idley'];
		$idtituloM = $_GET['idtitulo'];
		$idcapituloM = $_GET['idcapitulo'];
		$idinstitucionM = $_GET['idinstitucion'];
		//$idarticuloM=1;

		$rspta=$ctlevaluacion->ctlmostrar($idinstitucionM,$idleyM,$idtituloM,$idcapituloM,$idarticuloM);
		if (is_null($rspta)) {
			$rspta=$ctlevaluacion->ctlmostrar2($idinstitucionM,$idleyM,$idtituloM,$idcapituloM,$idarticuloM);
		}
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;
	
	case 'desinstitucion':

		$idinstitucionM = $_GET['idinstitucion'];

		$rspta=$ctlevaluacion->ctldesintitucion($idinstitucionM);
 		echo json_encode($rspta);
	break;

	case 'cargaarchivo':
		$nombre = 'prueba';
		// Cómo subir el archivo
		$fichero = $_FILES["file"];
		$fichero2 = $_FILES["file2"];
		$fichero3 = $_FILES["file3"];

		$nombrefile = $_GET['filen'];
		$nombrefile2 = $_GET['filen2'];
		$nombrefile3 = $_GET['filen3'];

		// Cargando el fichero en la carpeta "subidas"
		move_uploaded_file($fichero["tmp_name"], "../vistas/documentos/subidas/".$nombrefile);
		move_uploaded_file($fichero2["tmp_name"], "../vistas/documentos/subidas/".$nombrefile2);
		move_uploaded_file($fichero3["tmp_name"], "../vistas/documentos/subidas/".$nombrefile3);
		// Redirigiendo hacia atrás
		header("Location: " . $_SERVER["HTTP_REFERER"]);
	break;

	case 'eliminaarchivo':
		// Usamos el comando "unlink" para borrar el fichero
		unlink($_GET['name']);

		// Redirigiendo hacia atrás	
		header("Location: " . $_SERVER["HTTP_REFERER"]);
	break;

}
?> 