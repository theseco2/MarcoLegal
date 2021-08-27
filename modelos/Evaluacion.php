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

	//Inserta Evaluacion
	public function insertar($idinstitucion,$idley,$idtitulo,$idcapitulo,$idarticulo,$marca,$observacion)
	{
		$sql=	"INSERT INTO evaluacion (idusuario,idinstitucion,idley,idtitulo,idcapitulo,idarticulo,marca,observacion)
				VALUES(1,'$idinstitucion','$idley','$idtitulo','$idcapitulo','$idarticulo','$marca','$observacion')";
		return ejecutarConsulta($sql);
	}

	//Actualiza Evaluacion
	public function editar($idevaluacion,$idinstitucion,$idley,$idtitulo,$idcapitulo,$idarticulo,$marca,$observacion)
	{
		$sql=	"UPDATE evaluacion
				SET marca='$marca', observacion='$observacion'
				WHERE idevaluacion='$idevaluacion'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idinstitucion,$idley,$idtitulo,$idcapitulo,$idarticulo)
	{
		$sql="SELECT e.idevaluacion,e.idarticulo, e.marca,e.observacion, i.descripcion AS descripcionIns, l.descripcion AS descripcionLey, 
			         t.descripcion AS descripcionTit, c.descripcion AS descripcionCap,
			         a.nombre AS descripcionArt 
			  FROM evaluacion e 
			  INNER JOIN institucion i ON e.idinstitucion = i.idinstitucion
			  INNER JOIN ley l ON e.idley = l.idley
			  INNER JOIN titulo t ON e.idtitulo = t.idtitulo
			  INNER JOIN capitulo c ON e.idcapitulo = c.idcapitulo
			  INNER JOIN articulo a ON e.idarticulo = a.idarticulo
			  WHERE e.idinstitucion='$idinstitucion' AND e.idley='$idley' 
			  AND e.idtitulo='$idtitulo' AND e.idcapitulo='$idcapitulo' AND e.idarticulo='$idarticulo'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar2($idinstitucion,$idley,$idtitulo,$idcapitulo,$idarticulo)
	{
		$sql="SELECT a.idarticulo, l.descripcion AS descripcionLey, 
		 		     t.descripcion AS descripcionTit, c.descripcion AS descripcionCap,
		     		 a.nombre AS descripcionArt
			  FROM articulo a
			  INNER JOIN ley l ON a.idley = l.idley
			  INNER JOIN titulo t ON a.idtitulo = t.idtitulo
			  INNER JOIN capitulo c ON a.idcapitulo = c.idcapitulo
			  WHERE a.idley='$idley' 
			  AND a.idtitulo='$idtitulo' AND a.idcapitulo='$idcapitulo' AND a.idarticulo='$idarticulo'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Trae Marca
	public function comarca($idinstitucion,$idley,$idtitulo,$idcapitulo,$idarticulo)
	{
		$campo = 'marca';
		$sql="SELECT marca
			  FROM evaluacion 
			  WHERE idinstitucion='$idinstitucion' AND idley='$idley' 
			  AND idtitulo='$idtitulo' AND idcapitulo='$idcapitulo' AND idarticulo='$idarticulo'";
		return ejecutarConsultaCampo($campo,$sql);
		//return ejecutarConsultaSimpleFila($sql);
	}

	//Trae Marca
	public function coobservacion($idinstitucion,$idley,$idtitulo,$idcapitulo,$idarticulo)
	{
		$campo = 'observacion';
		$sql="SELECT observacion
			  FROM evaluacion 
			  WHERE idinstitucion='$idinstitucion' AND idley='$idley' 
			  AND idtitulo='$idtitulo' AND idcapitulo='$idcapitulo' AND idarticulo='$idarticulo'";
		return ejecutarConsultaCampo($campo,$sql);
		//return ejecutarConsultaSimpleFila($sql);
	}

	//Descripcion de Institucion
	public function desinstitucion($idinstitucion)
	{
		$campo = 'descripcion';
		$sql="SELECT descripcion
			  FROM institucion
			  WHERE idinstitucion='$idinstitucion'";
		return ejecutarConsultaSimpleFila($sql);
		//return ejecutarConsultaSimpleFila($sql);
	}
	
}

?>
