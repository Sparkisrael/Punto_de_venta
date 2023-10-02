<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos</title>
</head>
<body>
<h2>datos del producto</h2>
    <?php
require '../php/conexion.php';

$clave=$_POST['clave'];

$query = "SELECT * FROM productos Where id_producto='$clave'";
$resultado=mysqli_query($con,$query);
    $no=1;
    if(mysqli_num_rows($resultado)>0){
    if ($result = $con->query($query)) {
        $row = $result->fetch_assoc();
        ?>
        <form action="../php/metodo_modificar_producto.php" method="post">
            <a>Clave:</a>
            <input type="text" value="<?php echo $row["id_producto"]; ?>" disabled>
            <input type="hidden" name="clave" value="<?php echo $row["id_producto"]; ?>">
            <a>Nombre:</a>
            <input type="text" name="nombre" value="<?php echo $row["nombre"]; ?>">
            <a>Precio unitario:</a>
            <input type="text" name="preciou" value="<?php echo $row["precio_unitario"]; ?>">
            <a>Precio venta:</a>
            <input type="text" name="preciov" value="<?php echo $row["precio_venta"]; ?>">
            <a>inventario:</a>
            <input type="text" name="inventario" value="<?php echo $row["inventario"]; ?>">
            <a>Proveedor:</a>
            <input type="text" name="proveedor" value="<?php echo $row["proveedor"]; ?>">
            <input type="submit" value="Actualizar inventario">
        </form>
        <?php
    }
}else{
    echo "
    <script>
        alert('No existe un REGISTRO con esta clave, favor de verificar.');
        location.href ='../paginas/surtir_producto.php';
    </script>
    ";
}
?>
  <a href="opcion_product.php">Menu principal</a>  
</body>
</html>