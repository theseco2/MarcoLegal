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
		$sql=	"SELECT idarticulo, numero, nombre, descripcion
				FROM articulo 
				WHERE idley='$idley' and idtitulo='$idtitulo' and idcapitulo='$idcapitulo'";
				
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
	
	/*=============================================
	 METODO LISTAR REGISTROS SELECT2
	=============================================*/
	public function select2($idley)
	{
		$sql=	"SELECT a.idtitulo, a.idcapitulo, a.idarticulo, a.numero, a.nombre, a.descripcion, b.descripcion as titulo, c.descripcion as capitulo
				FROM articulo a
				INNER JOIN titulo b ON a.idtitulo = b.idtitulo
			    INNER JOIN capitulo c ON a.idcapitulo = c.idcapitulo
				WHERE a.idley='$idley' ";
		return ejecutarConsulta($sql);		
	}
	/*========================================================
	 METODO VERIFICA SI HAY REGISTROS EN TABLAS DEPENDIENTES
	==========================================================*/
	public function verificaevalua($idarticulo,$idley,$idtitulo,$idcapitulo)
	{		
		$sql=	"SELECT DISTINCT idarticulo
				FROM evaluacion
				WHERE idarticulo='$idarticulo' and idcapitulo='$idcapitulo' and idtitulo='$idtitulo' and idley ='$idley'";
		return ejecutarConsultaSimpleFila($sql);
	}

}

?>
