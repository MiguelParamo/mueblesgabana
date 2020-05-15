<?php
error_reporting(E_ALL);
//error_reporting(0);//No muestra ningun mensaje de errores

$strNombreUsuario = $_POST['nombreUsuario'];
$strContrasena = $_POST['contrasena'];

if($strContrasena=="Admin123")
{
    $strContrasena ="bdHtoyy0mCnMuoUzgdCsEA==";
}
elseif($strContrasena=="QWERTYadmin123")
{
    $strContrasena ="MYTcMxMZk0iioGyOhM+yCg==";
}
elseif($strContrasena=="Administrador456")
{
    $strContrasena ="Og1MLUJt7KeCFfVZtaf6Dge61BMixrg2glapz6xD720=";
}  

function startsWith ($string, $startString) 
{ 
    $len = strlen($startString); 
    return (substr($string, 0, $len) === $startString); 
} 


$servidor = "localhost";
$basedatos = "crese";
$usuario = "root";
$contrasena = "Admin123";

try {
    $conexionMysql = new mysqli($servidor,$usuario,$contrasena,$basedatos);
    if ($conexionMysql->connect_errno) {
		echo "Fallo la conexion con MySQL: (".$conexionMysql->connect_errno.")" . $conexionMysql->connect_errno;
	} else {

        if($strNombreUsuario == null || $strContrasena == null)
        {
            ?>
            <script>
                Swal.fire({
            title: 'Campo(s) Vacío(s)',
            text: 'Falta ingresar el usuario y/o contraseña',
            type: 'error',
            confirmButtonText: 'OK',
            allowOutsideClick: false,
            animation: true
          });
          </script>
            <?php
        }
        else
        {
            ///////////// RECUPERAR CREDENCIALES USUARIO
            $obtenerCredenciales = utf8_decode("select * from usuarios where usuario='".$strNombreUsuario."' and contrasena ='".$strContrasena."'");
            $resultado = $conexionMysql->query($obtenerCredenciales);
            $row=$resultado->fetch_assoc();
            $nombreUsuario = $row['usuario'];
            $contrasena = $row['contrasena'];
            entrar($nombreUsuario, $contrasena);
        }

}
}catch (Exception $e) {
	throw $e;	
}

function entrar($user, $pass){

if($user != null && $pass != null)
{

    ?>
    <script>
       window.location = 'panel.php';
    </script>
    <?php
}
else
{
    ?>
    <script>
        Swal.fire({
    title: 'Error',
    text: 'El usuario y/o contraseña es incorrecto',
    type: 'error',
    confirmButtonText: 'OK',
    allowOutsideClick: false,
    animation: true
  });
  </script>
    <?php
}

}



?>