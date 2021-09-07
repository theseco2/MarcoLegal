<?php 
require_once "../controladores/ctlconsulta.php";
 
$ctlconsulta = new ctlConsulta();

	/*=============================================
	 FUNCION A EJECUTAR
	=============================================*/
	switch ($_GET["op"]){

	//Listar registros
	case 'listar':
		$respuesta = $ctlconsulta->ctllistar();
 		echo json_encode($respuesta);
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
		$rspta=$ctlconsulta->ctllistar_articulos($idinstitucionM,$idleyM,$idtituloM,$idcapituloM);
 		echo json_encode($rspta);

	break;
	
	case 'listar_articulos2':

		$idleyM = $_REQUEST["idleypar"];
		$idinstitucionM = $_REQUEST["idinstpar"];
	
		$rspta=$ctlconsulta->ctllistar_articulos2($idinstitucionM,$idleyM);
 		echo json_encode($rspta);

	break;

}
?> 