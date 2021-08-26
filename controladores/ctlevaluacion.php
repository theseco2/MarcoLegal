<?php
require_once "../modelos/Evaluacion.php";


$evaluacion=new Evaluacion();

class ctlEvaluacion {

	/*=============================================
	 METODO GUARDAR O EDITAR
	=============================================*/
	static public function ctlguardareditar($idevaluacion,$idinstitucion,$idley,$idtitulo,$idcapitulo,$idarticulo,$marca,$observacion){

		if (empty($idevaluacion)){
			return Evaluacion::insertar($idinstitucion,$idley,$idtitulo,$idcapitulo,$idarticulo,$marca,$observacion);
		}
		else {
			return Evaluacion::editar($idevaluacion,$idinstitucion,$idley,$idtitulo,$idcapitulo,$idarticulo,$marca,$observacion);
		}

	}
	
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
 		$rspta = Articulo::select($idley,$idtitulo,$idcapitulo);
 		//Vamos a declarar un array
 		$data= Array();

 		$idinstitucionint = (int)$idinstitucion;

 		while ($reg=$rspta->fetch_object()){
 			//Recupera la marca
 			$rspta1 = Evaluacion::comarca($idinstitucion,$idley,$idtitulo,$idcapitulo,$reg->idarticulo);

 			$prueba=$rspta1;
 			if ($prueba==1) {
 				$etiqueta='<span class="label bg-green">Completado</span>';
 			}elseif ($prueba==2) {
 				$etiqueta='<span class="label bg-yellow">Parcialmento Completado</span>';
 			}elseif ($prueba==3) {
 				$etiqueta='<span class="label bg-red">No Completado</span>';
 			}else $etiqueta='<span class="label bg-gray">No Evaluado</span>';
 			
 			$data[]=array(
 				"0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->idarticulo.','.$idinstitucionint.')"><i class="fa fa-pencil"></i></button>',
 				"1"=>$reg->numero,
 				"2"=>$reg->nombre,
 				"3"=>$reg->descripcion,
 				"4"=>$etiqueta
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		return $results;
	}

	//Mostrar******************************************************
	static public function ctlmostrar($idinstitucion,$idley,$idtitulo,$idcapitulo,$idarticulo){
		return Evaluacion::mostrar($idinstitucion,$idley,$idtitulo,$idcapitulo,$idarticulo);
	}	
	/**************************************************************/

	//Mostrar******************************************************
	static public function ctlmostrar2($idinstitucion,$idley,$idtitulo,$idcapitulo,$idarticulo){
		return Evaluacion::mostrar2($idinstitucion,$idley,$idtitulo,$idcapitulo,$idarticulo);
	}	
	/**************************************************************/

}

?>