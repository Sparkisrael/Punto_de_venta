<?php
require_once 'conexion.php';

$clave=$_POST['clave'];
$nombre=$_POST['nombre'];
$precioc=$_POST['preciou'];
$preciov=$_POST['preciov'];
$almacen=$_POST['inventario'];
$proveedor=$_POST['proveedor'];


    $modif="UPDATE productos SET nombre='$nombre',precio_unitario='$precioc',precio_venta='$preciov',inventario='$almacen',proveedor='$proveedor' WHERE id_producto='$clave'";
    $result_modif=mysqli_query($con,$modif);
    echo "
            <script>
                alert('El registro se modifico de manera exitosa');
                location.href ='../paginas/opcion_product.php';
            </script>
            ";

?>












