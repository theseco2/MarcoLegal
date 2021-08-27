 <?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Documento2
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
	public function insertar($idinstitucion,$idley,$idtitulo,$idcapitulo,$nombre)
	{
		$sql=	"INSERT INTO documento (idinstitucion, idley, idtitulo, idcapitulo, nombre)
				VALUES('$idinstitucion', '$idley', '$idtitulo', '$idcapitulo', '$nombre')";
		return ejecutarConsulta($sql);
	}

	/*=============================================
	 METODO EDITAR REGISTROS
	=============================================*/
	public function editar($iddocumento,$idley,$idtitulo,$idcapitulo,$numero,$nombre,$descripcion)
	{
		$sql=	"UPDATE documento
				SET nombre='$nombre'
				WHERE idinstitucion='$idinstitucion' and iddocumento='$iddocumento' and idley='$idley' and idtitulo='$idtitulo' and idcapitulo='$idcapitulo'";
		return ejecutarConsulta($sql);
	}

	/*=============================================
	 METODO ELIMINAR REGISTROS
	=============================================*/
	public function eliminar($iddocumento,$idinstitucion,$idley,$idtitulo,$idcapitulo)
	{
		$sql=	"DELETE FROM documento
				WHERE iddocumento='$iddocumento' and idinstitucion='$idinstitucion' and idley='$idley' and idtitulo='$idtitulo' and idcapitulo='$idcapitulo'";
		return ejecutarConsulta($sql);
	}

	/*=============================================
	 METODO MOSTRAR REGISTROS
	=============================================*/
	//public function mostrar($iddocumento,$idley,$idtitulo,$idcapitulo)
	//{
	//	$sql=	"SELECT *
	//			FROM documento
	//			WHERE iddocumento='$iddocumento' and idley='$idley' and idtitulo='$idtitulo' and idcapitulo='$idcapitulo'";
	//	return ejecutarConsultaSimpleFila($sql);
	//}

	/*=============================================
	 METODO LISTAR REGISTROS
	=============================================*/
	public function listar($idinstitucion,$idley,$idtitulo,$idcapitulo)
	{
		$sql=	"SELECT iddocumento, nombre
				FROM documento 
				WHERE idinstitucion='$idinstitucion' and idley='$idley' and idtitulo='$idtitulo' and idcapitulo='$idcapitulo'";
				
		return ejecutarConsulta($sql);		
	}
	
	/*=============================================
	 METODO LISTAR REGISTROS SELECT
	=============================================*/
	public function select($idinstitucion,$idley,$idtitulo,$idcapitulo)
	{
		$sql=	"SELECT iddocumento, nombre
				FROM documento
				WHERE idinstitucion='$idinstitucion' and idley='$idley' and idtitulo='$idtitulo' and idcapitulo='$idcapitulo'";
		return ejecutarConsulta($sql);		
	}

}

?>
