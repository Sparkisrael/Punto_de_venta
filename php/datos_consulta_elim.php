<?php
require_once 'conexion.php';

$clave=$_POST['clave'];

$query = "SELECT * FROM productos Where id_producto='$clave'";

if ($result = $con->query($query)) {
    /* fetch associative array */
    ?>
    <table border=1>
        <tr>
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
    }
    ?>
    </table>
    <form action="eliminar_producto.php" method="post">
    <input type="hidden" name="clave" value="<?php echo $clave;  ?>">
    <input type="submit" value="Eliminar">
    </form>
    <?php
    /* free result set */
    $result->free();
}else{
    echo "
            <script>
                alert('No existe ningun registro con esa clave');
                location.href ='../paginas/consulta_producto_elim.php';
            </script>
            ";
}

?>
<a href="../paginas/opcion_product.php">Regresar al menu principal</a>