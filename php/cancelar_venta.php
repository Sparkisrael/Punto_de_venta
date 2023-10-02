<?php
require_once 'conexion.php';

$limpiar_tabla="DELETE FROM venta_temporal";
if(mysqli_query($con,$limpiar_tabla)){
    echo "
            <script>
                alert('Registro eliminado de manera correcta');
                location.href ='../paginas/venta.php';
            </script>
            ";
}else{
    echo "
            <script>
                alert('No se pudo Limpiar la tabla');
                location.href ='../paginas/venta.php';
            </script>
            ";
}
?>