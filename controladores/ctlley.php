<?php
require_once "../modelos/Ley.php";


$ley=new Ley();

class ctlLey {

	/*=============================================
	 METODO GUARDAR O EDITAR
	=============================================*/
	static public function ctlguardareditar($idley, $descripcion){

		if (empty($idley)){
			return Ley::insertar($descripcion);
		}
		else {
			return Ley::editar($idley,$descripcion);
		}

	}
	
	/*=============================================
	 METODO ELIMINAR
	=============================================*/
	static public function ctleliminar($idley){
		return Ley::eliminar($idley);
	}
	
	/*=============================================
	 METODO MOSTRAR
	=============================================*/
	static public function ctlmostrar($idley){
		return Ley::mostrar($idley);
	}	
	
	/*=============================================
	 METODO LISTAR
	=============================================*/
	static public function ctllistar(){
		$rspta = Ley::listar();
 		//Vamos a declarar un array
 		$data= Array();
		
		$url='../vistas/modulos/titulo.php?idreg=';

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->idley.')"><i class="fa fa-pencil"></i></button>'.
 					'<button class="btn btn-danger" onclick="verificadepa('.$reg->idley.')"><i class="fa fa-trash"></i></button>'.
					'<a target="_self" href="'.$url.$reg->idley.'"> <button class="btn btn-success">Titulos</button></a>',
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
	static public function ctlverificadepa($idley){
		return Ley::verificadepa($idley);
	}	
}

?>