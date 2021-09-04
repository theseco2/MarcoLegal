<?php 
require_once "../controladores/ctlgrafica1.php";
 
$ctlgrafica1 = new ctlGrafica1();


	/*=============================================
	 FUNCION A EJECUTAR
	=============================================*/
	switch ($_GET["op"]){
	
	//Mostrar datos de graficas
	case 'grafica':
		$idinstitucion= $_GET['idinstitucion'];
		$idley= $_GET['idley'];
		$idtitulo= $_GET['idtitulo'];
		$idcapitulo= $_GET['idcapitulo'];
		$respuesta = $ctlgrafica1->ctlgrafica($idinstitucion,$idley,$idtitulo,$idcapitulo);
 		//Codificar el resultado utilizando json
 		echo json_encode($respuesta);
		//echo $respuesta;
	break;

}
?> 