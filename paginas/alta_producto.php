<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Alta de productos</h1>
    <form action="../php/registrar_producto.php" method="post">
    <a>Codigo:</a><input type="text" name="codigo" required autofocus autocomplete="false"><br>
    <a>Nombre:</a><input type="text" name="nombre" required><br>
    <a>Precio compra:</a><input type="text" name="precioc" required><br>
    <a>Precio venta:</a><input type="text" name="preciov" required><br>
    <a>Almacen:</a><input type="text" name="almacen" required><br>
    <a>Proveedor:</a><input type="text" name="proveedor" required><br>
    <input type="submit" value="Registrar">
    </form>
    <a href="opcion_product.php">Menu principal</a>
</body>
</html>