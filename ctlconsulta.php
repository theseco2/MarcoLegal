<?php
require_once "../modelos/Evaluacion.php";

$evaluacion=new Evaluacion();

class ctlEvaluacion {
	
	/*=============================================
	 METODO LISTAR
	=============================================*/
	static public function ctllistar(){
		//Obtenemos todos los permisos de la tabla permisos
		require_once "../modelos/Institucion.php";

		$rspta = Institucion::listar();
 		//Vamos a declarar un array
 		$data= Array();
		
		$url='../modulos/consulta2.php?idinstitucion=';

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<a target="_self" href="'.$url.$reg->idinstitucion.'"> <button class="btn btn-success">Leyes</button></a>',
 				"1"=>$reg->descripcion
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		return $results;
	}

}

?>