 <?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Capitulo
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
	public function insertar($idley,$idtitulo,$descripcion)
	{
		$sql=	"INSERT INTO capitulo (idley, idtitulo, descripcion)
				VALUES('$idley', '$idtitulo', '$descripcion')";
		return ejecutarConsulta($sql);
	}

	/*=============================================
	 METODO EDITAR REGISTROS
	=============================================*/
	public function editar($idcapitulo,$idtitulo,$idley,$descripcion)
	{
		$sql=	"UPDATE capitulo
				SET descripcion='$descripcion'
				WHERE idcapitulo='$idcapitulo' and idley='$idley' and idtitulo='$idtitulo'";
		return ejecutarConsulta($sql);
	}

	/*=============================================
	 METODO ELIMINAR REGISTROS
	=============================================*/
	public function eliminar($idcapitulo,$idtitulo,$idley)
	{
		$sql=	"DELETE FROM capitulo
				WHERE idcapitulo='$idcapitulo' and idley='$idley' and idtitulo='$idtitulo'";
		return ejecutarConsulta($sql);
	}

	/*=============================================
	 METODO MOSTRAR REGISTROS
	=============================================*/
	public function mostrar($idcapitulo,$idtitulo,$idley)
	{
		$sql=	"SELECT *
				FROM capitulo
				WHERE idcapitulo='$idcapitulo' and idley='$idley' and idtitulo='$idtitulo'";
		return ejecutarConsultaSimpleFila($sql);
	}

	/*=============================================
	 METODO LISTAR REGISTROS
	=============================================*/
	public function listar($idley,$idtitulo)
	{
		$sql=	"SELECT a.idcapitulo as IDCAPI, b.descripcion as NOMLEY, c.descripcion as NOMTITULO, a.descripcion  as descripcionCAP
				FROM capitulo a
				INNER JOIN ley b ON a.idley = b.idley
				INNER JOIN titulo c ON a.idtitulo = c.idtitulo
				WHERE a.idley='$idley' and a.idtitulo='$idtitulo'";
				
		return ejecutarConsulta($sql);		
	}
	
	/*=============================================
	 METODO LISTAR REGISTROS SELECT
	=============================================*/
	public function select($idley,$idtitulo)
	{
		$sql=	"SELECT idcapitulo, descripcion
				FROM capitulo
				WHERE idley='$idley' and idtitulo='$idtitulo'";
		return ejecutarConsulta($sql);		
	}

}

?>
