<?php
require_once "../modelos/Capitulo.php";


$capitulo=new Capitulo();

class ctlCapitulo {

	/*=============================================
	 METODO GUARDAR O EDITAR
	=============================================*/
	static public function ctlguardareditar($idcapitulo,$idley,$idtitulo,$descripcion){

		if (empty($idcapitulo)){
			return Capitulo::insertar($idley,$idtitulo,$descripcion);
		}
		else {
			return Capitulo::editar($idcapitulo,$idley,$idtitulo,$descripcion);
		}

	}
	
	/*=============================================
	 METODO ELIMINAR
	=============================================*/
	static public function ctleliminar($idcapitulo,$idley,$idtitulo){
		return Capitulo::eliminar($idcapitulo,$idley,$idtitulo);
	}
	
	/*=============================================
	 METODO MOSTRAR
	=============================================*/
	static public function ctlmostrar($idcapitulo,$idley,$idtitulo){
		return Capitulo::mostrar($idcapitulo,$idley,$idtitulo);
	}	

	/*=============================================
	 METODO LISTAR
	=============================================*/
	static public function ctllistar($idley,$idtitulo){
		
		$idleyint = (int)$idley;
		$idtituloint = (int)$idtitulo;

		
		$rspta = Capitulo::listar($idleyint,$idtituloint);
 		//Vamos a declarar un array
 		$data= Array();
		
		$url='../modulos/articulo.php?idcap=';
		$url2='?idley=';
		$url3='?idtit=';
		

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->idcapitulo.')"><i class="fa fa-pencil"></i></button>'.
					'<button class="btn btn-danger" onclick="verificaarticulo('.$reg->idcapitulo.')"><i class="fa fa-trash"></i></button>'.						
					'<a target="_self" href="'.$url.$reg->idcapitulo.$url2.$idleyint.$url3.$idtituloint.'"> <button class="btn btn-success">Articulos</button></a>',			
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
	
		
	/*=============================================
	 METODO MOSTRAR
	=============================================*/
	static public function ctlverificaarticulo($idcapitulo,$idley,$idtitulo){
		return Capitulo::verificaarticulo($idcapitulo,$idley,$idtitulo);
	}
}

?>