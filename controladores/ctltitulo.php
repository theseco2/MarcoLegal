<?php
require_once "../modelos/Titulo.php";


$titulo=new Titulo();

class Titulo {

	/*=============================================
	 METODO GUARDAR O EDITAR
	=============================================*/
	static public function ctlguardareditar($idtitulo,$idregion,$nombre){

		if (empty($idtitulo)){
			return Titulo::insertar($idregion,$nombre);
		}
		else {
			return Titulo::editar($idtitulo,$idregion,$nombre);
		}

	}
	
	/*=============================================
	 METODO ELIMINAR
	=============================================*/
	static public function eliminar_controlador($idtitulo,$idregion){
		return Titulo::eliminar($idtitulo,$idregion);
	}
	
	/*=============================================
	 METODO MOSTRAR
	=============================================*/
	static public function mostrar_controlador($idtitulo,$idregion){
		return Titulo::mostrar($idtitulo,$idregion);
	}	
	
	/*=============================================
	 METODO LISTAR
	=============================================*/
	static public function listar_controlador($idregion){
		$rspta = Titulo::listar($idregion);
 		//Vamos a declarar un array
 		$data= Array();
		
		$url='../vistas/municipio.php?iddep=';
		$url2='?idreg=';
		
 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->ID.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="verificamuni('.$reg->ID.')"><i class="fa fa-trash"></i></button>'.
					'<a target="_self" href="'.$url.$reg->ID.$url2.$idregion.'"> <button class="btn btn-success">Municipios</button></a>',
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
	static public function verificamuni_controlador($idtitulo,$idregion){
		return Titulo::verificamuni($idtitulo,$idregion);
	}	
}

?>