 <?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class ley
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
	public function insertar($idregion,$nombre)
	{
		$sql=	"INSERT INTO departamentos (REGION_ID,NOMBRE)
				VALUES('$idregion','$nombre')";
		return ejecutarConsulta($sql);
	}

	/*=============================================
	 METODO EDITAR REGISTROS
	=============================================*/
	public function editar($iddepartamento,$idregion,$nombre)
	{
		$sql=	"UPDATE departamentos
				SET NOMBRE='$nombre'
				WHERE ID='$iddepartamento' and REGION_ID='$idregion'";
		return ejecutarConsulta($sql);
	}

	/*=============================================
	 METODO ELIMINAR REGISTROS
	=============================================*/
	public function eliminar($iddepartamento,$idregion)
	{
		$sql=	"DELETE FROM departamentos
				WHERE ID='$iddepartamento' and REGION_ID='$idregion'";
		return ejecutarConsulta($sql);
	}

	/*=============================================
	 METODO MOSTRAR REGISTROS
	=============================================*/
	public function mostrar($iddepartamento,$idregion)
	{
		$sql=	"SELECT *
				FROM departamentos
				WHERE ID='$iddepartamento' and REGION_ID='$idregion'";
		return ejecutarConsultaSimpleFila($sql);
	}

	/*=============================================
	 METODO LISTAR REGISTROS
	=============================================*/
	public function listar($idregion)
	{
		$sql=	"SELECT a.ID, b.NOMBRE as NOMREGION, a.NOMBRE
				FROM departamentos a
				INNER JOIN regiones b ON a.REGION_ID = b.ID
				WHERE a.REGION_ID='$idregion'";
		return ejecutarConsulta($sql);		
	}
	
	/*=============================================
	 METODO LISTAR REGISTROS SELECT
	=============================================*/
	public function select($idregion)
	{
		$sql=	"SELECT ID, NOMBRE
				FROM departamentos
				WHERE REGION_ID='$idregion'";
		return ejecutarConsulta($sql);		
	}
	
	/*========================================================
	 METODO VERIFICA SI HAY REGISTROS EN TABLAS DEPENDIENTES
	==========================================================*/
	public function verificamuni($iddepartamento,$idregion)
	{		
		$sql=	"SELECT DISTINCT DEPARTAMENTO_ID, REGION_ID
				FROM municipios
				WHERE DEPARTAMENTO_ID='$iddepartamento' and REGION_ID ='$idregion'";
		return ejecutarConsultaSimpleFila($sql);
	}
}

?>
