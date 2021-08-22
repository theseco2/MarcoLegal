<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Usuario
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}
	
	//Implementamos un método para insertar registros
	public function insertar($idrol,$nombre,$apellido,$telefono,$login,$clave,$permisos)
	{
		$sql="INSERT INTO usuario (idrol,nombre,apellido,telefono,login,clave,condicion)
		VALUES ('$idrol','$nombre','$apellido','$telefono','$login','$clave','1')";
		//return ejecutarConsulta($sql);
		$idusuarionew=ejecutarConsulta_retornarID($sql);

		$num_elementos=0;
		$sw=true;

		while ($num_elementos < count($permisos))
		{
			$sql_detalle = "INSERT INTO permiso_usuario (idpermiso_fk, idusuario_fk) VALUES ('$permisos[$num_elementos]','$idusuarionew')";
			ejecutarConsulta($sql_detalle) or $sw = false;
			$num_elementos=$num_elementos + 1;
		}

		return $sw;
	}

	//Implementamos un método para editar registros
	public function editar($idusuario,$idrol,$nombre,$apellido,$telefono,$login,$clave,$permisos)
	{
		$sql="UPDATE usuario SET idrol = '$idrol',nombre='$nombre',apellido='$apellido',telefono='$telefono',login='$login',clave='$clave' WHERE idusuario='$idusuario'";
		ejecutarConsulta($sql);

		//Eliminamos todos los permisos asignados para volverlos a registrar
		$sqldel="DELETE FROM permiso_usuario WHERE idusuario_fk='$idusuario'";
		ejecutarConsulta($sqldel);

		$num_elementos=0;
		$sw=true;

		while ($num_elementos < count($permisos))
		{
			$sql_detalle = "INSERT INTO permiso_usuario(idpermiso_fk,idusuario_fk) VALUES('$permisos[$num_elementos]','$idusuario')";
			ejecutarConsulta($sql_detalle) or $sw = false;
			$num_elementos=$num_elementos + 1;
		}

		return $sw;

	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idusuario)
	{
		$sql="UPDATE usuario SET condicion='0' WHERE idusuario='$idusuario'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idusuario)
	{
		$sql="UPDATE usuario SET condicion='1' WHERE idusuario='$idusuario'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idusuario)
	{
		$sql="SELECT * FROM usuario WHERE idusuario='$idusuario'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT u.idusuario,u.idrol,c.nombre AS rol,u.nombre,u.apellido,u.telefono,u.login,u.clave,u.condicion FROM usuario u INNER JOIN rol c ON u.idrol = c.idrol";
		return ejecutarConsulta($sql);		
	}
	//Implementar un método para listar los permisos marcados
	public function listarmarcados($idusuario)
	{
		$sql="SELECT * FROM permiso_usuario WHERE idusuario_fk='$idusuario'";
		return ejecutarConsulta($sql);
	}

	//Función para verificar el acceso al sistema
	public function verificar($login,$clave)
    {
    	$sql="SELECT idusuario,idrol,nombre,apellido,telefono,login FROM usuario WHERE login='$login' AND clave='$clave' AND condicion='1'"; 
    	return ejecutarConsulta($sql);  
    }

    public function select()
    {
    	$sql="SELECT idusuario, nombre FROM usuario WHERE condicion='1'"; 
    	return ejecutarConsulta($sql); 
    }

     // encriptar clave de usuario
    public function encryption($clave)
    {
    	$claveencry=false;
    	$key=hash('sha256', SECRET_KEY);
    	$iv=substr(hash('sha256', SECRET_IV), 0, 16);
    	$claveencry=openssl_encrypt($clave, METHOD, $key, 0, $iv);
    	$claveencry=base64_encode($claveencry);
    	return $claveencry;
    }

    // desencriptar clave de usuario
    public function decryption($clave)
    {
    	$key=hash('sha256', SECRET_KEY);
    	$iv=substr(hash('sha256', SECRET_IV), 0, 16);
    	$claveencry=openssl_decrypt(base64_decode($clave), METHOD, $key, 0, $iv);
    	return $claveencry;
    }

    //Verifica que e login no exista
	public function verificarexistencialogin($login)
    {
    	$sql="SELECT login FROM usuario WHERE login='$login'"; 
    	return ejecutarConsulta($sql);  
    }
}

?>