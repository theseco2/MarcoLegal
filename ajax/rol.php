<?php 
require_once "../controladores/ctlrol.php";
 
$ctlrol =new ctlrol();

$idrol=isset($_POST["idrol"])? limpiarCadena($_POST["idrol"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':

		$respuesta = $ctlrol->ctlguardareditar($idrol,$nombre);
		if (empty($idrol)){
			echo $respuesta ? "Rol registrada" : "Rol no se pudo registrar";
		}
		else {
			echo $respuesta ? "Rol actualizada" : "Rol no se pudo actualizar";
		}

	break;

	case 'eliminar':
		$respuesta = $ctlrol->ctleliminar($idrol);
 		echo $respuesta ? "Rol eliminado" : "Rol no se puede eliminar";
	break;

	case 'mostrar':
		$respuesta = $ctlrol->ctlmostrar($idrol);
 		//Codificar el resultado utilizando json
 		echo json_encode($respuesta);
	break;

	case 'listar':
		$respuesta = $ctlrol->ctllistar();
 		echo json_encode($respuesta);
	break;
}
?> 