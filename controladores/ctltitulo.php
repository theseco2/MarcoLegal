<?php
require_once "../modelos/Titulo.php";


$titulo=new Titulo();

class Titulo {

	/*=============================================
	 METODO GUARDAR O EDITAR
	=============================================*/
	static public function ctlguardareditar($idtitulo,$idley,$nombre){

		if (empty($idtitulo)){
			return Titulo::insertar($idley,$nombre);
		}
		else {
			return Titulo::editar($idtitulo,$idley,$nombre);
		}

	}
	
	/*=============================================
	 METODO ELIMINAR
	=============================================*/
	static public function eliminar_controlador($idtitulo,$idley){
		return Titulo::eliminar($idtitulo,$idley);
	}
	
	/*=============================================
	 METODO MOSTRAR
	=============================================*/
	static public function mostrar_controlador($idtitulo,$idley){
		return Titulo::mostrar($idtitulo,$idley);
	}	
	
	/*=============================================
	 METODO LISTAR
	=============================================*/
	static public function listar_controlador($idley){
		$rspta = Titulo::listar($idley);
 		//Vamos a declarar un array
 		$data= Array();
		
		$url='../vistas/municipio.php?iddep=';
		$url2='?idreg=';
		
 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->ID.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="verificamuni('.$reg->ID.')"><i class="fa fa-trash"></i></button>'.
					'<a target="_self" href="'.$url.$reg->ID.$url2.$idley.'"> <button class="btn btn-success">Municipios</button></a>',
				"1"=>$reg->NOMREGION,
 				"2"=>$reg->NOMBRE
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
	static public function verificamuni_controlador($idtitulo,$idley){
		return Titulo::verificamuni($idtitulo,$idley);
	}	
}

?>