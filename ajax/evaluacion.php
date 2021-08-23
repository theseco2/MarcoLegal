<?php 
require_once "../controladores/ctlevaluacion.php";
 
$ctlevaluacion = new ctlEvaluacion();

//Variables manejo campos de tabla
$idinstitucion=isset($_POST["idinstitucion"])? limpiarCadena($_POST["idinstitucion"]):"";
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

		$rspta=$ctlevaluacion->ctllistar_articulos($idley,$idtitulo,$idcapitulo);
 		echo json_encode($rspta);

	break;

	case 'mostrar':

		$idinstitucion = $_REQUEST["idinstitucion"];
		$idley = $_REQUEST["idley"];
		$idtitulo = $_REQUEST["idtitulo"];
		$idcapitulo = $_REQUEST["idcapitulo"];
		$idarticulo = $_REQUEST["idarticulo"];

		$rspta=$ctlevaluacion->ctlmostrar($idinstitucion,$idley,$idtitulo,$idcapitulo,$idarticulo);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;
	
}
?> 