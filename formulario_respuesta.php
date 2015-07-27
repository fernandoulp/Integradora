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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
  $updateSQL = sprintf("UPDATE contacto SET email=%s WHERE id=%s",
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());

  $updateGoTo = "inicio_admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}



/*CONFIGURACIONES DEL SEGUNDO JUEGO DE CONSULTA (RECORDSET2).*/
$varCategoria_Recordset2 = "0";
if (isset($_GET["recordID"])) {
  $varCategoria_Recordset2 = $_GET["recordID"];
}
mysql_select_db($database_conexion, $conexion);
$query_Recordset2 = sprintf("SELECT * FROM contacto WHERE contacto.id = %s", GetSQLValueString($varCategoria_Recordset2, "int"));
$Recordset2 = mysql_query($query_Recordset2, $conexion) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
?>
<!DOCTYPE HTML>
<!--
	Helios by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Responder- ConsulTIC</title>
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
								<li><a href="contactanos.html">Contáctanos</a></li>
							</ul>
						</nav>

				</div>

			<!-- Main -->
				<div class="wrapper style1">

					<div class="container">
						<article id="main" class="special">
							<header>
								<h2><a href="#">Responder</a></h2>
								<p>
									Para responder solo escribe el mensaje y da clic en enviar.
								</p>
							</header>
							
							
								</header>
								<p>

								<title>Formulario de respuesta</title>
								</head>
								<body>


									<!-- Formulario -->
								<section class="formulario">
								<form action="respuesta_admin.php"  method="post" id="form2">

									 <label for="email">Email:</label>
									 <input id="email" type="email" value="<?php echo htmlentities($row_Recordset2['email'], ENT_COMPAT, 'iso-8859-1'); ?>" name="email" placeholder="ejemplo@correo.com" required/>

									 <label for="mensaje">Mensaje:</label>
									 <textarea id="mensaje" name="mensaje" placeholder="Mensaje" required/></textarea>

									 <input id="submit" type="submit" name="submit" value="Enviar" />
									 <input type="hidden" name="MM_update" value="form2" />
  <input type="hidden" name="id" value="<?php echo $row_Recordset2['id']; ?>" />
                                </form>
							    </section>

									<!-- Fin del formulario -->

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
<?php


mysql_free_result($Recordset2);
?>