<?php
require 'conexion.php';

$clave=$_POST['clave'];

$consulta="SELECT * FROM usuario WHERE clave='$clave'";
$result=mysqli_query($con,$consulta);

if(mysqli_num_rows($result)>0){
    echo "
    <script>
        location.href ='../paginas/panel_principal.php';
    </script>
    ";
}else{
    echo "
    <script>
    alert('La clave no existe');
        location.href ='../index.php';
    </script>
    ";
}
?>