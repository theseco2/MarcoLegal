 <?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Institucion
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($descripcion)
	{
		$sql="INSERT INTO institucion (descripcion)
		VALUES ('$descripcion')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idinstitucion,$descripcion)
	{
		$sql="UPDATE institucion SET descripcion='$descripcion' WHERE idinstitucion = '$idinstitucion'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para eliminar registros
	public function eliminar($idinstitucion)
	{
		$sql="DELETE FROM institucion WHERE idinstitucion = '$idinstitucion'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idinstitucion)
	{
		$sql="SELECT * FROM institucion WHERE idinstitucion='$idinstitucion'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM institucion";
		return ejecutarConsulta($sql);		
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT * FROM institucion";
		return ejecutarConsulta($sql);		
	}
		/*========================================================
	 METODO VERIFICA SI HAY REGISTROS EN TABLAS DEPENDIENTES
	==========================================================*/
	public function verificaevalua($idinstitucion)
	{		
		$sql=	"SELECT DISTINCT idinstitucion
				FROM evaluacion
				WHERE idinstitucion='$idinstitucion'";
		return ejecutarConsultaSimpleFila($sql);
	}
}

?>
