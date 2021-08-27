<?php
require_once "../modelos/Documento2.php";


$documento2=new Documento2();

class ctlDocumento2 {

	/*=============================================
	 METODO GUARDAR O EDITAR
	=============================================*/
	static public function ctlguardareditar($iddocumento,$idinst,$idley,$idtitulo,$idcapitulo,$nombre){

		if (empty($iddocumento)){
			return Documento2::insertar($idinst,$idley,$idtitulo,$idcapitulo,$nombre);
		}
		else {
			return Documento2::editar($iddocumento,$idinst,$idley,$idtitulo,$idcapitulo,$nombre);
		}

	}
	
	/*=============================================
	 METODO ELIMINAR
	=============================================*/
	static public function ctleliminar($iddocumento,$idinst,$idley,$idtitulo,$idcapitulo){
		return Documento2::eliminar($iddocumento,$idinst,$idley,$idtitulo,$idcapitulo);
	}
	
	/*=============================================
	 METODO MOSTRAR
	=============================================*/
	//static public function ctlmostrar($iddocumento,$idinst,$idley,$idtitulo,$idcapitulo){
	//	return Documento2::mostrar($iddocumento,$idinst,$idley,$idtitulo,$idcapitulo);
	//}	

	/*=============================================
	 METODO LISTAR
	=============================================*/
	static public function ctllistar($idinst,$idley,$idtitulo,$idcapitulo){
		
		$idinstint = (int)$idinst;
		$idleyint = (int)$idley;
		$idtituloint = (int)$idtitulo;
		$idcapituloint = (int)$idcapitulo;

		
		$rspta = Documento2::listar($idinstint,$idleyint,$idtituloint,$idcapituloint);
 		//Vamos a declarar un array
 		$data= Array();
		
		

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<button class="btn btn-info" onclick="descargar('.$reg->iddocumento.')"><i class="fa fa-download"></i></button>'.
 					'<button class="btn btn-danger" onclick="eliminar('.$reg->iddocumento.')"><i class="fa fa-trash"></i></button>',
 				"1"=>$reg->nombre,
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