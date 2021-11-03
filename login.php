<?php
require('scripts/Funciones.php');

$conexion = mysqli_connect('localhost', 'root', '', 'Instituto');
	$usuario = $conexion->real_escape_string($_POST['txtUsuario']); //evito caracteres especiales 
	$clave = $conexion->real_escape_string($_POST['txtClave']);    //evito inyeccion sql 'or '1'='1
	//decodifico
	$pass= sha1($clave);
	
	conectar();

	if( validarLogin($usuario, $pass) ) {
	// Accedemos al sistema
		if( esAdmin() ){
			header('Location: menu.php');
		}
	} else {
	// Sino volvemos al formulario inicial
?>
	<script>
	alert('Los datos ingresados son incorrectos.')
	location.href = "index.html";
	</script>
<?php
	desconectar();
}
?>