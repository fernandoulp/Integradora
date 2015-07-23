<?php
if(isset($_POST['submit'])){
    $dbHost = "consultic.bravoutd.com";
    $dbUser = "betobrav_consult";            //Usuario de la base de datos
    $dbPass = "consul9040";            //Contraseña de la base de datos
    $dbDatabase = "betobrav_consultic";    //Nombre de la base de datos
 
    $db = mysql_connect($dbHost,$dbUser,$dbPass)or die("Error connecting to database.");
 
    mysql_select_db($dbDatabase, $db)or die("Couldn't select the database.");
 
    /*
    El siguiente código puede ir en un archivo diferente, como puede ser 'filename.php'.
    */
 
  