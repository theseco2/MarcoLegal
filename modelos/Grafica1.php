<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class grafica1
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}
	//CONSULTAS PARA LAS GRAFICAS
	//Consulta estatus por evaluacion 
	
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
	

	
}

?>