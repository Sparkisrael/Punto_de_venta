<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>PRODUCTOS</h2>
    <input type="button" value="Nuevo producto" onclick="location.href='alta_producto.php'">
    <input type="button" value="Regresar" onclick="location.href='panel_principal.php'">
    <?php
    require '../php/conexion.php';

    $query = "SELECT * FROM productos";
    $no=1;
    if ($result = $con->query($query)) {
    /* fetch associative array */
    ?>
    <table border=1>
        <tr>
            <td>No.</td>
            <td>CODIGO</td>
            <td>NOMBRE PRODUCTO</td>
            <td>PRECIO COMPRA</td>
            <td>PRECIO VENTA</td>
            <td>ALMACEN</td>
            <td>PROVEEEDOR</td>
        </tr>
    <?php
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>";
        echo $no;
        echo "</td>";
        echo "<td>";
        echo $row["id_producto"];
        echo "</td>";
        echo "<td>";
        echo $row["nombre"];
        echo "</td>";
        echo "<td>";
        echo $row["precio_unitario"];
        echo "</td>";
        echo "<td>";
        echo $row["precio_venta"];
        echo "</td>";
        echo "<td>";
        echo $row["inventario"];
        echo "</td>";
        echo "<td>";
        echo $row["proveedor"];
        echo "</td>";
        echo "<td>
                <form method='post' action='modificar_producto.php'>
                    <input type='hidden' value=".$row['id_producto']." name='clave'>
                    <input type='submit' value='Modificar'>
                </form>
            </td>";
        echo "<td>
                <form method='post' action='../php/eliminar_producto.php'>
                    <input type='hidden' value=".$row['id_producto']." name='clave'>
                    <input type='submit' value='Eliminar'>
                </form>
            </td>";
            $no=$no+1;
    }
    ?>
    </table>
    <?php
    /* free result set */
    $result->free();
}
    ?>
</body>
</html>