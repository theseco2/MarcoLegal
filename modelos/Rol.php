 <?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Rol
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($nombre)
	{
		$sql="INSERT INTO rol (nombre)
		VALUES ('$nombre')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idrol,$nombre)
	{
		$sql="UPDATE rol SET nombre='$nombre' WHERE idrol = '$idrol'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para eliminar registros
	public function eliminar($idrol)
	{
		$sql="DELETE FROM rol WHERE idrol = '$idrol'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idrol)
	{
		$sql="SELECT * FROM rol WHERE idrol='$idrol'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM rol";
		return ejecutarConsulta($sql);		
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT * FROM rol";
		return ejecutarConsulta($sql);		
	}
}

?>
