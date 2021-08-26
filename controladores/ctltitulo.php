<?php
require_once "../modelos/Titulo.php";


$titulo=new Titulo();

class ctlTitulo {

	/*=============================================
	 METODO GUARDAR O EDITAR
	=============================================*/
	static public function ctlguardareditar($idtitulo,$idley,$descripción){

		if (empty($idtitulo)){
			return Titulo::insertar($idley,$descripción);
		}
		else {
			return Titulo::editar($idtitulo,$idley,$descripción);
		}

	}
	
	/*=============================================
	 METODO ELIMINAR
	=============================================*/
	static public function ctleliminar($idtitulo,$idley){
		return Titulo::eliminar($idtitulo,$idley);
	}
	
	/*=============================================
	 METODO MOSTRAR
	=============================================*/
	static public function ctlmostrar($idtitulo,$idley){
		return Titulo::mostrar($idtitulo,$idley);
	}	
	
	/*=============================================
	 METODO LISTAR
	=============================================*/
	static public function ctllistar($idley){
		$rspta = Titulo::listar($idley);
 		//Vamos a declarar un array
 		$data= Array();
		
		$url='../modulos/capitulo.php?idtit=';
		$url2='?idley=';
		
 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->idtitulo.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="verificacapitulo('.$reg->idtitulo.')"><i class="fa fa-trash"></i></button>'.
					'<a target="_self" href="'.$url.$reg->idtitulo.$url2.$idley.'"> <button class="btn btn-success">Capitulos</button></a>',
				"1"=>$reg->NOMLEY,
 				"2"=>$reg->descripcion
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
	static public function ctlverificacapitulo($idtitulo,$idley){
		return Titulo::verificacapitulo($idtitulo,$idley);
	}	
}

?>