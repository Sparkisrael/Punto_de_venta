<?php
$servername="localhost";
$database="pv_misc_rosita";
$username="root";
$password="";

//creamos la conexion
$con=mysqli_connect($servername,$username,$password,$database);
//comprobamos la conexion
if(!$con){
    die("la conexion ha fallado:".mysqli_connect_error());
}
//echo "conexion establecida";
?>