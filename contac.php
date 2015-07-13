
<?php

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];
$para = 'consultic@gmail.com';
$titulo = 'Cliente';
$header = 'From: ' . $email;
$msjCorreo = "Nombre: $nombre\n E-Mail: $email\n Mensaje:\n $mensaje";
  
if ($_POST['submit']) {
if (mail($para, $titulo, $msjCorreo, $header)) {
echo "<script language='javascript'>
alert('Mensaje enviado, responderemos a la brevedad...Gracias!.');
window.location.href = 'http://google.com';
</script>";
} else {
echo 'Falló el envio, intenta de nuevo.';
}
}

?>