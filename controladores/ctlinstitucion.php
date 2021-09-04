<?php
require_once "../modelos/Institucion.php";


$institucion=new Institucion();

class ctlInstitucion {

	/*=============================================
	 METODO GUARDAR O EDITAR
	=============================================*/
	static public function ctlguardareditar($idinstitucion, $descripcion){

		if (empty($idinstitucion)){
			return Institucion::insertar($descripcion);
		}
		else {
			return Institucion::editar($idinstitucion,$descripcion);
		}

	}
	
	/*=============================================
	 METODO ELIMINAR
	=============================================*/
	static public function ctleliminar($idinstitucion){
		return Institucion::eliminar($idinstitucion);
	}
	
	/*=============================================
	 METODO MOSTRAR
	=============================================*/
	static public function ctlmostrar($idinstitucion){
		return Institucion::mostrar($idinstitucion);
	}	
	
	/*=============================================
	 METODO LISTAR
	=============================================*/
	static public function ctllistar(){
		$rspta = Institucion::listar();
 		//Vamos a declarar un array
 		$data= Array();
		
		

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->idinstitucion.')"><i class="fa fa-pencil"></i></button>'.
 					'<button class="btn btn-danger" onclick="verificaevalua('.$reg->idinstitucion.')"><i class="fa fa-trash"></i></button>',
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
	/********************************************************************/
	
	/*=============================================
	 METODO MOSTRAR
	=============================================*/
	static public function ctlverificaevalua($idinstitucion){
		return Institucion::verificaevalua($idinstitucion);
	}	
	
		//Seleccion de Instituciones*************************************************************
	static public function ctlselectinstitucion(){
		
 		return Institucion::select();
	}
}

?>