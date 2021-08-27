<?php

require_once "../modelos/rol.php";

$rol=new Rol();

class ctlrol {


	//Guardar o editar ****************************************
	static public function ctlguardareditar($idrol, $nombre){

		if (empty($idrol)){
			return Rol::insertar($nombre);
		}
		else {
			return Rol::editar($idrol,$nombre);
		}

	}
	/*************************************************************/

	//Eliminar*****************************************************
	static public function ctleliminar($idrol){
			return Rol::eliminar($idrol);
	}
	/**************************************************************/

	//Mostrar******************************************************
	static public function ctlmostrar($idrol){
		return Rol::mostrar($idrol);
	}	
	/**************************************************************/

	//Listar********************************************************
	static public function ctllistar(){
		$rspta = Rol::listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->idrol.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="eliminar('.$reg->idrol.')"><i class="fa fa-trash"></i></button>',
 				"1"=>$reg->nombre
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