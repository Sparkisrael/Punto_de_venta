<?php
require_once 'conexion.php';
$clave=$_POST['clave'];

$consulta_producto="DELETE FROM productos WHERE id_producto = '$clave'";
if(mysqli_query($con,$consulta_producto)){
    echo "
            <script>
                alert('Registro eliminado de manera correcta');
                location.href ='../paginas/consulta_producto_elim.php';
            </script>
            ";
}else{
    echo "
            <script>
                alert('No se pudo eliminar');
                location.href ='../paginas/consulta_producto_elim.php';
            </script>
            ";
}
?>