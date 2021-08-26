 <?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Titulo
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
	public function insertar($idley,$descripcion)
	{
		$sql=	"INSERT INTO titulo (idley,descripcion)
				VALUES('$idley','$descripcion')";
		return ejecutarConsulta($sql);
	}

	/*=============================================
	 METODO EDITAR REGISTROS
	=============================================*/
	public function editar($idtitulo,$idley,$descripcion)
	{
		$sql=	"UPDATE titulo
				SET descripcion='$descripcion'
				WHERE idtitulo='$idtitulo' and idley='$idley'";
		return ejecutarConsulta($sql);
	}

	/*=============================================
	 METODO ELIMINAR REGISTROS
	=============================================*/
	public function eliminar($idtitulo,$idley)
	{
		$sql=	"DELETE FROM titulo
				WHERE idtitulo='$idtitulo' and idley='$idley'";
		return ejecutarConsulta($sql);
	}

	/*=============================================
	 METODO MOSTRAR REGISTROS
	=============================================*/
	public function mostrar($idtitulo,$idley)
	{
		$sql=	"SELECT *
				FROM titulo
				WHERE idtitulo='$idtitulo' and idley='$idley'";
		return ejecutarConsultaSimpleFila($sql);
	}

	/*=============================================
	 METODO LISTAR REGISTROS
	=============================================*/
	public function listar($idley)
	{
		$sql=	"SELECT a.idtitulo, b.descripcion as NOMLEY, a.descripcion
				FROM titulo a
				INNER JOIN ley b ON a.idley = b.idley
				WHERE a.idley='$idley'";
		return ejecutarConsulta($sql);		
	}
	
	/*=============================================
	 METODO LISTAR REGISTROS SELECT
	=============================================*/
	public function select($idley)
	{
		$sql=	"SELECT idtitulo, descripcion
				FROM titulo
				WHERE idley='$idley'";
		return ejecutarConsulta($sql);		
	}
	
	/*========================================================
	 METODO VERIFICA SI HAY REGISTROS EN TABLAS DEPENDIENTES
	==========================================================*/
	public function verificacapitulo($idtitulo,$idley)
	{		
		$sql=	"SELECT DISTINCT idtitulo
				FROM capitulo
				WHERE idtitulo='$idtitulo' and idley ='$idley'";
		return ejecutarConsultaSimpleFila($sql);
	}
}

?>
