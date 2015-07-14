
<?php

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];
$para = 'consultic9@gmail.com';
$titulo = 'Mensaje enviado desde contáctanos en consultic.bravoutd.com';
$header = 'From: ' . $email;
$msjCorreo = "Nombre: $nombre\n E-Mail: $email\n Mensaje:\n $mensaje";

// Variables para conexión a base de datos de pruebas
$hostname = 'localhost';
$dbname = 'pruebas';
$username = 'root':
$password = '';
// --->  
if ($_POST['submit']) 
{

if (mail($para, $titulo, $msjCorreo, $header)) {
echo "<script language='javascript'>
alert('Mensaje enviado, responderemos a la brevedad...Gracias!.');
window.location.href = 'http://google.com';
</script>";
} else {
echo 'Falló el envio, intenta de nuevo porfavor.';
}


// Intento para conexión a bases de datos e inserción
try {
  $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);

  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $dbh->prepare("INSERT INTO contacto(nombre, email, mensaje) VALUES (:nombre, :email, :mensaje)");



  }
// -->



}

?>