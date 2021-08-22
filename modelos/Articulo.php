 <?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Articulo
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
	public function insertar($idley,$idtitulo,$idcapitulo,$numero,$nombre,$descripcion)
	{
		$sql=	"INSERT INTO articulo (idley, idtitulo, idcapitulo, numero, nombre, descripcion)
				VALUES('$idley', '$idtitulo', '$idcapitulo', '$numero', '$nombre', '$descripcion')";
		return ejecutarConsulta($sql);
	}

	/*=============================================
	 METODO EDITAR REGISTROS
	=============================================*/
	public function editar($idarticulo,$idley,$idtitulo,$idcapitulo,$numero,$nombre,$descripcion)
	{
		$sql=	"UPDATE articulo
				SET descripcion='$descripcion', numero='$numero', nombre='$nombre'
				WHERE idarticulo='$idarticulo' and idley='$idley' and idtitulo='$idtitulo' and idcapitulo='$idcapitulo'";
		return ejecutarConsulta($sql);
	}

	/*=============================================
	 METODO ELIMINAR REGISTROS
	=============================================*/
	public function eliminar($idarticulo,$idley,$idtitulo,$idcapitulo)
	{
		$sql=	"DELETE FROM articulo
				WHERE idarticulo='$idarticulo' and idley='$idley' and idtitulo='$idtitulo' and idcapitulo='$idcapitulo'";
		return ejecutarConsulta($sql);
	}

	/*=============================================
	 METODO MOSTRAR REGISTROS
	=============================================*/
	public function mostrar($idarticulo,$idley,$idtitulo,$idcapitulo)
	{
		$sql=	"SELECT *
				FROM articulo
				WHERE idarticulo='$idarticulo' and idley='$idley' and idtitulo='$idtitulo' and idcapitulo='$idcapitulo'";
		return ejecutarConsultaSimpleFila($sql);
	}

	/*=============================================
	 METODO LISTAR REGISTROS
	=============================================*/
	public function listar($idley,$idtitulo,$idcapitulo)
	{
		$sql=	"SELECT a.idarticulo, b.descripcion as NOMLEY, c.descripcion as NOMTITULO, d.descripcion as NOMCAPITULO, a.descripcion  as descripcionCAP
				FROM articulo a
				INNER JOIN ley b ON a.idley = b.idley
				INNER JOIN titulo c ON a.idtitulo = c.idtitulo
				INNER JOIN capitulo d ON a.capitulo = d.capitulo
				WHERE a.idley='$idley' and a.idtitulo='$idtitulo' and idcapitulo='$idcapitulo'";
				
		return ejecutarConsulta($sql);		
	}
	
	/*=============================================
	 METODO LISTAR REGISTROS SELECT
	=============================================*/
	public function select($idley,$idtitulo,$idcapitulo)
	{
		$sql=	"SELECT idarticulo, numero, nombre, descripcion
				FROM articulo
				WHERE idley='$idley' and idtitulo='$idtitulo' and idcapitulo='$idcapitulo'";
		return ejecutarConsulta($sql);		
	}
	
//pendiente integridad referencial

}

?>
