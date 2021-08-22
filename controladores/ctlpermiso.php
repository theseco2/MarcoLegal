<?php
require_once "../modelos/Permiso.php";

$permiso=new Permiso();
class ctlpermiso {

	//Listar********************************************************
	static public function ctllistar(){
		
		$rspta= Permiso::listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>$reg->nombre
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		return $results;
	}
	/********************************************************************/
}
?>