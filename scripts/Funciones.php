
<?php

$conexion = null;

function conectar()
{
	global $conexion;
	$conexion = mysqli_connect('localhost', 'root', '', 'Instituto') //datos de servidor, usuario, contraseña y nombre de la base de datos 
		or die("no se puede conectar");
	mysqli_set_charset($conexion, 'utf8');
}

function haIniciadoSesion()
{
	session_start();
	return isset($_SESSION['usuario']);
}


function validarLogin($usuario, $pass) //valido sesión
{
	global $conexion;
	$consulta = "SELECT * FROM usuarios WHERE usuario='" . $usuario . "' AND clave='" . $pass . "'";
	$respuesta = mysqli_query($conexion, $consulta);

	if ($fila = mysqli_fetch_row($respuesta)) {
		session_start();
		$_SESSION['usuario'] = $usuario;
		$_SESSION['admin'] = $fila[2];
		return true;
	}
	return false;
}
function esAdmin()
{
	return $_SESSION['admin'];
}

function desconectar()
{
	global $conexion;
	mysqli_close($conexion);
}

?>


