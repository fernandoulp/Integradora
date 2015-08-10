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
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}
$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['email'])) {
  $loginUsername=$_POST['email'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "inicio_admin.php";
  $MM_redirectLoginFailed = "error_inicio.html";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_conexion, $conexion);
  
  $LoginRS__query=sprintf("SELECT idusuario, email, password FROM usuario WHERE email=%s AND password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $conexion) or die(mysql_error());
  $row_LoginRS = mysql_fetch_assoc($LoginRS);
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      
	$_SESSION['MM_idusuario'] = $row_LoginRS["idusuario"];	 

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml">
<!--CONNECTION TO THE DATABASE.-->

<html>
	<head>
		<title>Acceso- ConsulTIC</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->

<link type="text/css" rel="stylesheet" href="main.css">


 
<script>
function enlaces(dir) {
window.location.replace(dir)
}
</script>

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
								<h2><a href="#">Acceso administradores</a></h2>
								<p>
									Ingresa tu email y contraseña para acceder.
								</p>
							</header>
							
							
								</header>
								<p>

								<title>Formulario de contacto</title>
								</head>
								<body>


									<!-- Formulario -->
								<section class="formulario">
								<form  id="form1" name="form1" method="POST" action="<?php echo $loginFormAction; ?>">

									 <label >Email:</label>
									 <input type="email" name="email" placeholder="ejemplo@correo.com" required />

									 <label >Password:</label>
									 <input type="password" name="password" placeholder="password" required/>


									 <a href="javascript:enlaces('index.html')"><input id="submit" type="submit" name="submit" value="Aceptar" /></a>
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
										<h3>Nuestra ubicación</h3>
										</header>
										<p>Carretera Durango - Mezquital K.M 4.5.. Gabino Santillán, C.P. 34308.
											<br>
												También puedes contáctarnos a través de nuestras redes sociales, correo eléctronico consultic9@gmail.com o al teléfono (+52) 618-159-34-96.


										</p>
										<ul class="icons">
									<li><a href="https://twitter.com/ConsulTIC_UTD" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
											<li><a href="https://www.facebook.com/pages/Consultic/1683349825231228?fref=ts" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
										</ul>
									</section>

								<!-- Copyright -->
									<div class="copyright">
										<ul class="menu">
													<li>&copy; Todos los derechos reservados.</li><li>Consul<a href="index.html">TIC</a></li>
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