<?php
require_once "../modelos/Grafica1.php";


$grafica1 = new Grafica1();

class ctlGrafica1 {
	
//Recupera la realizando las consultas a la base de datos

	static public function ctlgrafica($idinstitucion,$idley,$idtitulo,$idcapitulo){
	

	$idinstitucion = 1;
	$idley = 1;
	$idtitulo = 1;
	$idcapitulo = 1;
		
 		$rspta = Grafica1::select($idley,$idtitulo,$idcapitulo);

 		$idinstitucionint = (int)$idinstitucion;
		$contacomple = 0;
		$contaparcom = 0;
		$contanocomp = 0;
		$contanoeval = 0;
 		while ($reg=$rspta->fetch_object()){
 			//Recupera la marca
 			$rspta1 = Grafica1::comarca($idinstitucion,$idley,$idtitulo,$idcapitulo,$reg->idarticulo);

 			$prueba=$rspta1;
 			if ($prueba==1) {
 				$contacomple = $contacomple + 1;
 			}elseif ($prueba==2) {
 				$contaparcom = $contaparcom + 1;
 			}elseif ($prueba==3) {
 				$contanocomp = $contanocomp + 1;
 			}else $contanoeval = $contanoeval + 1;

 		}
 		
		$stat='Completado,Parcialmento Completado,No Completado,No Evaluado,';
		$cantidad=$contacomple.','.$contaparcom.','.$contanocomp.','.$contanoeval.',';
	
		// Quitamos la última coma
		$stat=substr($stat, 0, -1);
		$cantidad=substr($cantidad, 0, -1);	
		//$stat= '['.$stat.']';
		//$cantidad= '['.$cantidad.']';
		
		//$respuesta = [
		//"etiquetas" => $stat,
		//"cantidad" => $cantidad,
		//];
		
		$respuesta = Array("etiquetas" => $stat,"cantidad" => $cantidad);
		
	return $respuesta;
	}
}

?>