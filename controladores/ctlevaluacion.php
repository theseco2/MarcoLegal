<?php
require_once "../modelos/Evaluacion.php";


$evaluacion=new Evaluacion();

class ctlEvaluacion {
	
	/*=============================================
	 METODO LISTAR
	=============================================*/
	static public function ctllistar(){
		//Obtenemos todos los permisos de la tabla permisos
		require_once "../modelos/Institucion.php";

		$rspta = Institucion::listar();
 		//Vamos a declarar un array
 		$data= Array();
		
		$url='../modulos/evaluacion2.php?idinstitucion=';

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<a target="_self" href="'.$url.$reg->idinstitucion.'"> <button class="btn btn-success">Leyes</button></a>',
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

	//Seleccion de Ley*************************************************************
	static public function ctlselectley(){
		require_once "../modelos/Ley.php";
		//$cargo = new Cargo();
 		return Ley::select();
	}

	//Seleccion de Titulo**********************************************************
	static public function ctlselecttitulo($idley){
		require_once "../modelos/Titulo.php";
		//$cargo = new Cargo();
 		return Titulo::select($idley);
	}

	//Seleccion de Capitulo********************************************************
	static public function ctlselectcapitulo($idley, $idtitulo){
		require_once "../modelos/Capitulo.php";
		//$cargo = new Cargo();
 		return Capitulo::select($idley, $idtitulo);
	}

	//Informacion para la consulta por ley, titulo y capitulo********************
	static public function ctllistar_articulos($idinstitucion,$idley,$idtitulo,$idcapitulo){
		require_once "../modelos/Articulo.php";
 		$rspta = Articulo::listar($idley,$idtitulo,$idcapitulo);
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->idinstitucion.')"><i class="fa fa-pencil"></i></button>',
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

}

?>