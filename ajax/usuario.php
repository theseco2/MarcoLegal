<?php
session_start(); 

require_once "../controladores/ctlusuario.php";
 
$ctlusuario =new ctlUsuario();

$idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$idrol=isset($_POST["idrol"])? limpiarCadena($_POST["idrol"]):"";
$apellido=isset($_POST["apellido"])? limpiarCadena($_POST["apellido"]):"";
$telefono=isset($_POST["telefono"])? limpiarCadena($_POST["telefono"]):"";
$login=isset($_POST["login"])? limpiarCadena($_POST["login"]):"";
$clave=isset($_POST["clave"])? limpiarCadena($_POST["clave"]):"";


switch ($_GET["op"]){
	case 'guardaryeditar':

		$rspta=$ctlusuario->ctlguardareditar($idusuario,$idrol,$nombre,$apellido,$telefono,$login,$clave,$_POST['permiso']);

		if (empty($idusuario)){
			echo $rspta ? "Usuario registrado" : "No se pudieron registrar todos los datos del usuario";
		}
		else {
			echo $rspta ? "Usuario actualizado" : "Usuario no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$ctlusuario->ctldesactivar($idusuario);
 		echo $rspta ? "Usuario Desactivado" : "Usuario no se puede desactivar";
	break;

	case 'activar':
		$rspta=$ctlusuario->ctlactivar($idusuario);
 		echo $rspta ? "Usuario activado" : "Usuario no se puede activar";
	break;

	case 'mostrar':
		$rspta=$ctlusuario->ctlmostrar($idusuario);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$respuesta = $ctlusuario->ctllistar();
 		echo json_encode($respuesta);

	break;

	case 'permisos':

		$rspta = $ctlusuario->ctllistarpermisos();

		//Obtener los permisos asignados al usuario
		$id=$_GET['id'];

		$marcados = $ctlusuario->ctllistarmarcados($id);
		//Declaramos el array para almacenar todos los permisos marcados
		$valores=array();

		//Almacenar los permisos asignados al usuario en el array
		while ($per = $marcados->fetch_object())
			{
				array_push($valores, $per->idpermiso_fk);
			}

		//Mostramos la lista de permisos en la vista y si están o no marcados
		while ($reg = $rspta->fetch_object())
				{
					$sw=in_array($reg->idpermiso,$valores)?'checked':'';
					echo '<li> <input type="checkbox" '.$sw.'  name="permiso[]" value="'.$reg->idpermiso.'">'.$reg->nombre.'</li>';
				}
	break;

	case 'verificar':
		$logina=$_POST['logina'];
	    $clavea=$_POST['clavea']; 

		$rspta = $ctlusuario->ctlverificar($logina, $clavea); 

		$fetch=$rspta->fetch_object();

		if (isset($fetch))
	    {
	        //Declaramos las variables de sesión
	        $_SESSION['idusuario']=$fetch->idusuario;
	        $_SESSION['nombre']=$fetch->nombre;
	        $_SESSION['login']=$fetch->login;

	        //Obtenemos los permisos del usuario
	    	$marcados = $ctlusuario->ctllistarmarcados($fetch->idusuario);

	    	//Declaramos el array para almacenar todos los permisos marcados
			$valores=array();

			//Almacenamos los permisos marcados en el array
			while ($per = $marcados->fetch_object())
				{
					array_push($valores, $per->idpermiso_fk);
				}

			//Determinamos los accesos del usuario
			in_array(1,$valores)?$_SESSION['administrar']=1:$_SESSION['administrar']=0;
			in_array(2,$valores)?$_SESSION['seguridad']=1:$_SESSION['seguridad']=0;
			in_array(3,$valores)?$_SESSION['evaluacion']=1:$_SESSION['evaluacion']=0;
			in_array(4,$valores)?$_SESSION['consultas']=1:$_SESSION['consultas']=0;
			in_array(5,$valores)?$_SESSION['grafica']=1:$_SESSION['grafica']=0;
	    }
	    echo json_encode($fetch);
	break;

	case 'salir':
		//Limpiamos las variables de sesión   
        session_unset();
        //Destruìmos la sesión
        session_destroy();
        //Redireccionamos al login
        header("Location: ../index.php");

	break;

	case "selectRol":

		$rspta = $ctlusuario->ctlselecrol();

		while ($reg = $rspta->fetch_object())
			{
				echo '<option value=' . $reg->idrol . '>' . $reg->nombre . '</option>';
			}
	break;

	case 'desincriptar':
		//Recuperamos la variable
		$idcla=$_GET['idcla'];
		//Desincriptamos la contraseña
		$clave=$ctlusuario->ctldesincriptar($idcla);
 		//Regresamos la clave Desencriptada
 		echo $clave;
 		
	break;

	case 'verificaexistencialogin':
		
		$logincom=$_GET['idlogin'];
	
		$rspta=$ctlusuario->ctlverificaexistencialogin($logincom);

		$fetch=$rspta->fetch_object();

		echo json_encode($fetch);

	break;
}
?>