<?php require_once('Connections/conexion.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_conexion, $conexion);
$query_Recordset1 = "SELECT * FROM contacto ORDER BY contacto.nombre ASC";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $conexion) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;
?>

<!DOCTYPE HTML>
<!--
	Helios by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Administrador- ConsulTIC</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->

<link type="text/css" rel="stylesheet" href="main.css">




	</head>
	<body class="no-sidebar">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header">

					<!-- Inner -->
						<div class="inner">
							<header>
								<h1><a href="index.html" id="logo">ConsulTIC</a></h1>
							</header>
						</div>

					<!-- Nav -->
						<nav id="nav">
							<ul>
							<li><a href="index.html">Inicio</a></li>
								<li><a href="portafolio.html">Portafolio</a></li>
								<li><a href="quienes.html">Quiénes somos</a></li>
								<li><a href="contactanos.php">Contáctanos</a></li>
							</ul>
						</nav>

				</div>

			<!-- Main -->
				<div class="wrapper style1">

					<div class="container">
						<article id="main" class="special">
							<header>
								<h2><a href="#">Bienvenido                              <?php  
 if ((isset($_SESSION['MM_Username'])) && ($_SESSION['MM_Username'] != ""))
  {
	  echo "";
  echo ObtenerNombreUsuario ($_SESSION['MM_idusuario']);
  ?></font></p>
<?php 
  }
  else
  {?><br />
<?php }?></a></h2>
                                
								<p>
									Desde aqui puedes dar respuesta a los comentarios de los usuarios.
								</p>
      
							</header>
							
							
								</header>
								<p>

								<title>Formulario respuesta de comentarios</title>

								 <table border="1">
    <tr >
      <td align="center" >Nombre</td>
      <td align="center">Email</td>
      <td align="center">Mensaje</td>
      <td align="center">Opciones</td>
    </tr>
    <tr>
     
    </tr>
    <?php do { ?>
  <tr class="brillo">
    <td align="center" width="100"><?php echo $row_Recordset1['nombre']; ?></td>
    <td align="center" width="310"><?php echo $row_Recordset1['email']; ?></td>
    <td align="center" width="600"><?php echo $row_Recordset1['mensaje']; ?></td>
    <td align="center" width="170" class="special" id="main"><a href="eliminar_mensaje.php?recordID=<?php echo $row_Recordset1['id']; ?>"onclick="pregunta_eliminar();">Eliminar</a>- <a href="responder.php?recordID=<?php echo $row_Recordset1['id']; ?>">Responder</a></td>

  
  </tr>
  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
  </table>
  <?php echo $totalRows_Recordset1 ?> Total de mensajes

<script>
  function pregunta_eliminar()
{
if(confirm("Desea realmente eliminar el mensaje seleccionado?"))
{
return true;
}
else return false;
}
</script>
								</head>
								<body>


									

							    </p>
								
								
							</section>
							




						</article>
						
					
					</div>

				</div>
			<!-- Footer -->
				<div id="footer">
					<div class="container">
						<div class="row">

					
						

							

						</div>
						<hr />
						
						<div class="row">
							<div class="12u">

								<!-- Contact -->
									<section class="contact">
										<header>
											<h3>Contáctanos</h3>
										</header>
										<p>Contáctanos a través de cualquiera de nuestras redes sociales.</p>
										<ul class="icons">
									<li><a href="https://twitter.com/ConsulTIC_UTD" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
											<li><a href="https://www.facebook.com/pages/Consultic/1683349825231228?fref=ts" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
										</ul>
									</section>

								<!-- Copyright -->
									<div class="copyright">
										<ul class="menu">
													<li>&copy; Todos los derechos reservados.</li><li>Consul<a href="index.html">TIC</a></li><li><a href="cerrar_sesion.php">Cerrar Sesión</a></li>
										</ul>
									</div>

							</div>

						</div>
					</div>
				</div>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.onvisible.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>