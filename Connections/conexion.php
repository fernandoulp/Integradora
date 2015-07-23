<?php 
if (!isset($_SESSION)) {
  session_start();
}?>
<?php 
/*Conexión a la base de datos.*/
$hostname_conexion = "www.bravoutd.com";
$database_conexion = "betobrav_consultic";
$username_conexion = "betobrav_consult";
$password_conexion = "consul9040";
$conexion = mysql_pconnect($hostname_conexion, $username_conexion, $password_conexion) or trigger_error(mysql_error(),E_USER_ERROR); 
?>
<?php 
/*Archivo funciones.*/
if (is_file("includes/funciones.php")) {
	include ("includes/funciones.php");
}
else 
{
	include ("../includes/funciones.php");
}
?>