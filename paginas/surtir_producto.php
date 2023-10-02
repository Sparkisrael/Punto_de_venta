<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surtir</title>
</head>
<body>
    <h2>Agregar Productos al inventario</h2>
    <form action="datos_product.php" method="post">
    <a>Clave producto:</a>
    <input type="text" name="clave" id="clave" placeholder="clave" autofocus>
    <input type="submit" value="Buscar en inventario" id="boton">
    </form>
    <a href="opcion_product.php">Terminar</a>
</body>
<script>
        document.getElementById('clave').addEventListener('keydown', inputCharacters);
        function inputCharacters(event) {
        if (event.keyCode == 13) {
            document.getElementById('cantidad').focus();
        }
        }
    </script>
</html>