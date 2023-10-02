<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos</title>
</head>
<body>
<h2>datos del prodcuto</h2>
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
        <form action="../php/consulta_inventario.php" method="post">
            <a>Clave:</a>
            <input type="text" value="<?php echo $row["id_producto"]; ?>" disabled>
            <input type="hidden" name="clave" value="<?php echo $row["id_producto"]; ?>">
            <a>Nombre:</a>
            <input type="text" name="nombre" value="<?php echo $row["nombre"]; ?>" disabled>
            <a>cantidad:</a>
            <input type="text" name="cantidad" autofocus>
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
    
</body>
</html>