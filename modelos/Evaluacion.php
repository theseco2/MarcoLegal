 <?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Evaluacion
{
	/*=============================================
	 METODO CONSTRUCTOR
	=============================================*/
	public function __construct()
	{

	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idinstitucion,$idley,$idtitulo,$idcapitulo,$idarticulo)
	{
		$sql="SELECT * FROM usuario WHERE idusuario='$idusuario'";
		return ejecutarConsultaSimpleFila($sql);
	}
	
}

?>
