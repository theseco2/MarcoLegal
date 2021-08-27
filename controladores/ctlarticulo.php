<?php
require_once "../modelos/Articulo.php";


$articulo=new Articulo();

class ctlArticulo {

	/*=============================================
	 METODO GUARDAR O EDITAR
	=============================================*/
	static public function ctlguardareditar($idarticulo,$idley,$idtitulo,$idcapitulo,$numero,$nombre,$descripcion){

		if (empty($idarticulo)){
			return Articulo::insertar($idley,$idtitulo,$idcapitulo,$numero,$nombre,$descripcion);
		}
		else {
			return Articulo::editar($idarticulo,$idley,$idtitulo,$idcapitulo,$numero,$nombre,$descripcion);
		}

	}
	
	/*=============================================
	 METODO ELIMINAR
	=============================================*/
	static public function ctleliminar($idarticulo,$idley,$idtitulo,$idcapitulo){
		return Articulo::eliminar($idarticulo,$idley,$idtitulo,$idcapitulo);
	}
	
	/*=============================================
	 METODO MOSTRAR
	=============================================*/
	static public function ctlmostrar($idarticulo,$idley,$idtitulo,$idcapitulo){
		return Articulo::mostrar($idarticulo,$idley,$idtitulo,$idcapitulo);
	}	

	/*=============================================
	 METODO LISTAR
	=============================================*/
	static public function ctllistar($idley,$idtitulo,$idcapitulo){
		
		$idleyint = (int)$idley;
		$idtituloint = (int)$idtitulo;
		$idcapituloint = (int)$idcapitulo;

		
		$rspta = Articulo::listar($idleyint,$idtituloint,$idcapituloint);
 		//Vamos a declarar un array
 		$data= Array();
		
		

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->idarticulo.')"><i class="fa fa-pencil"></i></button>'.
 					'<button class="btn btn-danger" onclick="verificaevalua('.$reg->idarticulo.')"><i class="fa fa-trash"></i></button>',
 				"1"=>$reg->numero,
				"2"=>$reg->nombre,
				"3"=>$reg->descripcion
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		return $results;
	}
	
	/*=============================================
	 METODO MOSTRAR
	=============================================*/
	static public function ctlverificaevalua($idarticulo,$idley,$idtitulo,$idcapitulo){
		return Articulo::verificaevalua($idarticulo,$idley,$idtitulo,$idcapitulo);
	}

}

?>