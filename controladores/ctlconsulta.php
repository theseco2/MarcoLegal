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


 			//////Recuper Documentos//////////////////////////////////////////////////////////////////////////////
 			//require_once "../modelos/Consultas.php";
 			$docume1 = Evaluacion::documento1($idinstitucion,$idley,$idtitulo,$idcapitulo,$reg->idarticulo);
 			$docume2 = Evaluacion::documento2($idinstitucion,$idley,$idtitulo,$idcapitulo,$reg->idarticulo);
 			$docume3 = Evaluacion::documento3($idinstitucion,$idley,$idtitulo,$idcapitulo,$reg->idarticulo);
 			$catdoc1=''; $catdoc2=''; $catdoc3=''; 
 			if ($docume1!=''&&$docume1!=null) {$catdoc1='<a title="'.$docume1.'" href="../documentos/subidas/'.$docume1.'" download="'.$docume1.'" style="color: blue; font-size:18px;"> <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> </a>';}
 			if ($docume2!=''&&$docume2!=null) {$catdoc2='<a title="'.$docume2.'" href="../documentos/subidas/'.$docume2.'" download="'.$docume2.'" style="color: blue; font-size:18px;"> <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> </a>';}
 			if ($docume3!=''&&$docume3!=null) {$catdoc3='<a title="'.$docume3.'" href="../documentos/subidas/'.$docume3.'" download="'.$docume3.'" style="color: blue; font-size:18px;"> <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> </a>';}
 			$catdoc = $catdoc1.$catdoc2.$catdoc3;
 			//////////////////////////////////////////////////////////////////////////////////////////////////////

 			$data[]=array(
 				"0"=>$reg->numero,
 				"1"=>$reg->nombre,
 				"2"=>$observacion,
 				"3"=>$etiqueta,
 				"4"=>$catdoc
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		return $results;
	}


//Informacion para la consulta por ley********************
	static public function ctllistar_articulos2($idinstitucion,$idley){
		require_once "../modelos/Articulo.php";
 		$rspta = Articulo::select2($idley);
 		//Vamos a declarar un array
 		$data= Array();

 		$idinstitucionint = (int)$idinstitucion;

 		while ($reg=$rspta->fetch_object()){
 			//Recupera la marca
 			$rspta1 = Evaluacion::comarca($idinstitucion,$idley,$reg->idtitulo,$reg->idcapitulo,$reg->idarticulo);

 			$prueba=$rspta1;
 			if ($prueba==1) {
 				$etiqueta='<span class="label bg-green">Completado</span>';
 			}elseif ($prueba==2) {
 				$etiqueta='<span class="label bg-yellow">Parcialmento Completado</span>';
 			}elseif ($prueba==3) {
 				$etiqueta='<span class="label bg-red">No Completado</span>';
 			}else $etiqueta='<span class="label bg-gray">No Evaluado</span>';

 			//Recupera la observacion
 			$observacion = Evaluacion::coobservacion($idinstitucion,$idley,$reg->idtitulo,$reg->idcapitulo,$reg->idarticulo);


 			//////Recuper Documentos//////////////////////////////////////////////////////////////////////////////
 			//require_once "../modelos/Consultas.php";
 			$docume1 = Evaluacion::documento1($idinstitucion,$idley,$reg->idtitulo,$reg->idcapitulo,$reg->idarticulo);
 			$docume2 = Evaluacion::documento2($idinstitucion,$idley,$reg->idtitulo,$reg->idcapitulo,$reg->idarticulo);
 			$docume3 = Evaluacion::documento3($idinstitucion,$idley,$reg->idtitulo,$reg->idcapitulo,$reg->idarticulo);
 			$catdoc1=''; $catdoc2=''; $catdoc3=''; 
 			if ($docume1!=''&&$docume1!=null) {$catdoc1='<a title="'.$docume1.'" href="../documentos/subidas/'.$docume1.'" download="'.$docume1.'" style="color: blue; font-size:18px;"> <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> </a>';}
 			if ($docume2!=''&&$docume2!=null) {$catdoc2='<a title="'.$docume2.'" href="../documentos/subidas/'.$docume2.'" download="'.$docume2.'" style="color: blue; font-size:18px;"> <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> </a>';}
 			if ($docume3!=''&&$docume3!=null) {$catdoc3='<a title="'.$docume3.'" href="../documentos/subidas/'.$docume3.'" download="'.$docume3.'" style="color: blue; font-size:18px;"> <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> </a>';}
 			$catdoc = $catdoc1.$catdoc2.$catdoc3;
 			//////////////////////////////////////////////////////////////////////////////////////////////////////

 			$data[]=array(
 				"0"=>$reg->numero,
 				"1"=>$reg->nombre,
 				"2"=>$observacion,
 				"3"=>$etiqueta,
 				"4"=>$catdoc
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