<?php 
require_once "../controladores/ctlevaluacion.php";
 
$ctlevaluacion = new ctlEvaluacion();

//Variables manejo campos de tabla
$idinstitucion=isset($_POST["idinstitucion"])? limpiarCadena($_POST["idinstitucion"]):"";
$idley=isset($_POST["idley"])? limpiarCadena($_POST["idley"]):"";
$idtitulo=isset($_POST["idtitulo"])? limpiarCadena($_POST["idtitulo"]):"";
$idcapitulo=isset($_POST["idcapitulo"])? limpiarCadena($_POST["idcapitulo"]):"";
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

		$respuesta = $ctlevaluacion->ctlguardareditar($idevaluacion,$idinstitucion,$idley,$idtitulo,$idcapitulo,$idarticulo,$marca,$observacion);
		//$respuesta = $ctlevaluacion->ctlguardareditar($idevaluacion,1,1,1,1,1,$marca,$observacion);
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

		$idley = $_REQUEST["idley"];
		$idtitulo = $_REQUEST["idtitulo"];
		$idcapitulo = $_REQUEST["idcapitulo"];

		$rspta=$ctlevaluacion->ctllistar_articulos($idinstitucion,$idley,$idtitulo,$idcapitulo);
 		echo json_encode($rspta);

	break;

	case 'mostrar':

		//$idinstitucionM = $_REQUEST["idinstitucion"];
		//$idley = $_REQUEST["idley"];
		//$idtituloM = $_REQUEST["idtitulo"];
		//$idcapituloM = $_REQUEST["idcapitulo"];
		$idarticuloM = $_REQUEST["idarticulo"];
		$idleyM = $_GET['idley'];

		$idinstitucionM = 1;
		//$idleyM = 1;
		$idtituloM = 1;
		$idcapituloM = 1;
		//$idarticuloM =1;

		$rspta=$ctlevaluacion->ctlmostrar($idinstitucionM,$idleyM,$idtituloM,$idcapituloM,$idarticuloM);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;
	
}
?> 