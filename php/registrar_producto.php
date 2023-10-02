<?php
require_once 'conexion.php';

$clave=$_POST['codigo'];
$nombre=$_POST['nombre'];
$precioc=$_POST['precioc'];
$preciov=$_POST['preciov'];
$almacen=$_POST['almacen'];
$proveedor=$_POST['proveedor'];

$consulta_producto="SELECT * FROM productos WHERE id_producto = '$clave'";
$resultado=mysqli_query($con,$consulta_producto);

if(mysqli_num_rows($resultado)>0){
    echo "
        <script>
            alert('Error existe un REGISTRO igual');
            location.href ='../paginas/alta_producto.php';
        </script>
        ";
}else{
    $registro_producto="INSERT INTO productos(id_producto,nombre,precio_unitario,precio_venta,inventario,proveedor)
        VALUES('$clave','$nombre','$precioc','$preciov','$almacen','$proveedor')";
    if(mysqli_query($con,$registro_producto)){
        echo "
        <script>
            alert('se registro de manera correcta');
            location.href ='../paginas/alta_producto.php';
        </script>
        ";
    }else{
        echo "
        <script>
            alert('Error al registrar este registro');
            location.href ='../paginas/alta_producto.php';
        </script>
        ";
    }
}


?>