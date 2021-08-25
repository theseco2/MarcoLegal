 <?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Ley
{
	/*=============================================
	 METODO CONSTRUCTOR
	=============================================*/
	public function __construct()
	{

	}
	/*=============================================
	 METODO INSERTAR REGISTROS
	=============================================*/
	public function insertar($descripcion)
	{
		$sql=	"INSERT INTO ley (descripcion)
				VALUES('$descripcion')";
		return ejecutarConsulta($sql);
	}

	/*=============================================
	 METODO EDITAR REGISTROS
	=============================================*/
	public function editar($idley,$descripcion)
	{
		$sql=	"UPDATE ley
				SET descripcion='$descripcion'
				WHERE idley='$idley'";
		return ejecutarConsulta($sql);
	}

	/*=============================================
	 METODO ELIMINAR REGISTROS
	=============================================*/
	public function eliminar($idley)
	{
		$sql=	"DELETE FROM ley
				WHERE idley='$idley'";
		return ejecutarConsulta($sql);
	}

	/*=============================================
	 METODO MOSTRAR REGISTROS
	=============================================*/
	public function mostrar($idley)
	{
		$sql=	"SELECT *
				FROM ley
				WHERE idley='$idley'";
				
		return ejecutarConsultaSimpleFila($sql);
	}

	/*=============================================
	 METODO LISTAR REGISTROS
	=============================================*/
	public function listar()
	{
		$sql=	"SELECT *
				FROM ley";
		return ejecutarConsulta($sql);		
	}
	
	/*=============================================
	 METODO LISTAR REGISTROS SELECT
	=============================================*/
	public function select()
	{
		$sql=	"SELECT *
				FROM ley";;
		return ejecutarConsulta($sql);		
	}
	
	/*========================================================
	 METODO VERIFICA SI HAY REGISTROS EN TABLAS DEPENDIENTES
	==========================================================*/
	public function verificatitulo($idley)
	{		
		$sql=	"SELECT DISTINCT idley
				FROM titulo
				WHERE idley ='$idley'";
		return ejecutarConsultaSimpleFila($sql);
	}
}

?>
