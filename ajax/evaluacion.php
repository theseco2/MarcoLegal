<?php 
require_once "../controladores/ctlevaluacion.php";
 
$ctlevaluacion = new ctlEvaluacion();

//Variables manejo campos de tabla
$idley=isset($_POST["idley"])? limpiarCadena($_POST["idley"]):"";
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

		//$idley = $_REQUEST["idley"];
		//$idtitulo = $_REQUEST["idtitulo"];
		//$idcapitulo = $_REQUEST["idcapitulo"];
		$idinstitucion = 1;
		$idley = 1;
		$idtitulo = 1;
		$idcapitulo = 1;
	
		$rspta=$ctlevaluacion->ctllistar_articulos($idinstitucion,$idley,$idtitulo,$idcapitulo);
 		echo json_encode($rspta);

	break;
	
}
?> 