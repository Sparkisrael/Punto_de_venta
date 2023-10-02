<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
    <div class="screen">
    <h2>Validacion</h2>
    <h1>de Usuario:</h1>
        <form action="php/validar_usuario.php" method="post" class="form">
            <input type="text" name="clave" class="caja_texto" placeholder="clave" autofocus autocomplete="off">
            <input type="submit" value="Validar" class="validar">
        </form>
    </div>
    </div>
</body>
</html>
