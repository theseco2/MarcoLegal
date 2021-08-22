<?php 
require_once "../controladores/ctlpermiso.php";

$ctlpermiso=new ctlpermiso();

switch ($_GET["op"]){
 	
	case 'listar':
		$rspta=$ctlpermiso->ctllistar();
 		echo json_encode($rspta);
	break;
}
?>