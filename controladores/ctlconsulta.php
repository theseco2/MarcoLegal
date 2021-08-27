<?php
require_once "../modelos/Evaluacion.php";


$evaluacion=new Evaluacion();

class ctlConsulta {
	
	/*=============================================
	 METODO LISTAR
	=============================================*/
	static public function ctllistar(){
		//Obtenemos todos los permisos de la tabla permisos
		require_once "../modelos/Institucion.php";

		$rspta = Institucion::listar();
 		//Vamos a declarar un array
 		$data= Array();
		
		$url='../modulos/ConsultaEvaluacion2.php?idinstitucion=';

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

 			//Recupera la observacion
 			$observacion = Evaluacion::coobservacion($idinstitucion,$idley,$idtitulo,$idcapitulo,$reg->idarticulo);

 			$data[]=array(
 				"0"=>$reg->numero,
 				"1"=>$reg->nombre,
 				"2"=>$observacion,
 				"3"=>$etiqueta
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