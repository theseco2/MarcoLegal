<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../../config/Conexion.php";

Class consultas
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
	
	/*=============================================
	 Recupera Documento 1
	=============================================*/
	public function documento1($idinstitucion,$idley,$idtitulo,$idcapitulo,$idarticulo)
	{
		$campo = 'nombredocumento1';
		$sql="SELECT nombredocumento1
			  FROM evaluacion 
			  WHERE idinstitucion='$idinstitucion' AND idley='$idley' 
			  AND idtitulo='$idtitulo' AND idcapitulo='$idcapitulo' AND idarticulo='$idarticulo'";
		return ejecutarConsultaCampo($campo,$sql);		
	}

	/*=============================================
	 Recupera Documento 2
	=============================================*/
	public function documento2($idinstitucion,$idley,$idtitulo,$idcapitulo,$idarticulo)
	{
		$campo = 'nombredocumento2';
		$sql="SELECT nombredocumento2
			  FROM evaluacion 
			  WHERE idinstitucion='$idinstitucion' AND idley='$idley' 
			  AND idtitulo='$idtitulo' AND idcapitulo='$idcapitulo' AND idarticulo='$idarticulo'";
		return ejecutarConsultaCampo($campo,$sql);		
	}

	/*=============================================
	 Recupera Documento 3
	=============================================*/
	public function documento3($idinstitucion,$idley,$idtitulo,$idcapitulo,$idarticulo)
	{
		$campo = 'nombredocumento3';
		$sql="SELECT nombredocumento3
			  FROM evaluacion 
			  WHERE idinstitucion='$idinstitucion' AND idley='$idley' 
			  AND idtitulo='$idtitulo' AND idcapitulo='$idcapitulo' AND idarticulo='$idarticulo'";
		return ejecutarConsultaCampo($campo,$sql);		
	}
	
}

?>