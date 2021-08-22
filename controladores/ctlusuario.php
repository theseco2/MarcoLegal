<?php
require_once "../modelos/Usuario.php";

$usuario=new Usuario();
class ctlUsuario {


	//Guardar o editar ****************************************
	static public function ctlguardareditar($idusuario,$idrol,$nombre,$apellido,$telefono,$login,$clave,$permisos){

		//Hash SHA256 en la contraseña
		$clavehash= Usuario::encryption($clave);

		if (empty($idusuario)){
			return Usuario::insertar($idrol,$nombre,$apellido,$telefono,$login,$clavehash,$permisos);
		}
		else {
			return Usuario::editar($idusuario,$idrol,$nombre,$apellido,$telefono,$login,$clavehash,$permisos);	
		}

	}
	/*************************************************************/

	//Desactivar***************************************************
	static public function ctldesactivar($idusuario){
		return Usuario::desactivar($idusuario);
	}
	/**************************************************************/

	//Activar******************************************************
	static public function ctlactivar($idusuario){
		return Usuario::activar($idusuario);
	}
	/**************************************************************/

	//Mostrar******************************************************
	static public function ctlmostrar($idusuario){
		return Usuario::mostrar($idusuario);
	}	
	/**************************************************************/

	//Listar********************************************************
	static public function ctllistar(){
		$rspta = Usuario::listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idusuario.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idusuario.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idusuario.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idusuario.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->nombre,
 				"2"=>$reg->apellido,
 				"3"=>$reg->rol,
 				"4"=>$reg->telefono,
 				"5"=>$reg->login,
 				"6"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
 				'<span class="label bg-red">Desactivado</span>'
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

	//Listar Permisos****************************************************
	static public function ctllistarpermisos(){
		//Obtenemos todos los permisos de la tabla permisos
		require_once "../modelos/Permiso.php";
		
		$permiso = new Permiso();

		return Permiso::listar();
	}	
	/********************************************************************/

	//Listar Permisos Marcados********************************************
	static public function ctllistarmarcados($id){
		return Usuario::listarmarcados($id);
	}	
	/********************************************************************/

	//Verificar contraseña y login***************************************
	static public function ctlverificar($logina, $clave){

		//Hash SHA256 en la contraseña
		$clavehash=Usuario::encryption($clave);
		//$clavehash=$clave;

		return Usuario::verificar($logina,$clavehash);
	}	
	/********************************************************************/

	//Seleccionar Cargo**************************************************
	static public function ctlselecrol(){

		require_once "../modelos/Rol.php";
		$rol = new Rol();

		return Rol::select();
	}	
	/********************************************************************/

	//Desincriptar*******************************************************
	static public function ctldesincriptar($idcla){
		return Usuario::decryption($idcla);
	}	
	/********************************************************************/

	//Verifica existencia de login***************************************
	static public function ctlverificaexistencialogin($logincom){
		return Usuario::verificarexistencialogin($logincom);
	}	
	/********************************************************************/
}

?>