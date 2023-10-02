<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>venta</title>
</head>
<body>
    <form action="agregar_venta.php" method="post">
    <a>codigo:</a><input type="text" name="clave" autofocus><input type="submit" value="agregar">
    </form>
    <input type="button" value="Regresar" onclick="location.href='panel_principal.php'">
    <?php
    require '../php/conexion.php';

    $consulta_producto="SELECT * FROM venta_temporal";
    $resultado=mysqli_query($con,$consulta_producto);

    $total_precio_pago=0;
    if(mysqli_num_rows($resultado)==0){
        echo "NO HAY NADA POR COBRAR!!";
    }else{
            $query = "SELECT * FROM venta_temporal";
    
        if ($result = $con->query($query)) {
        /* fetch associative array */
        ?>
        <table border=1>
            <tr>
                <td>CODIGO</td>
                <td>NOMBRE PRODUCTO</td>
                <td>PRECIO</td>
                <td>CANTIDAD</td>
                <td>TOTAL</td>
            </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>";
            echo $row["clave"];
            echo "</td>";
            echo "<td>";
            echo $row["nombre"];
            echo "</td>";
            echo "<td>";
            echo $row["precio"];
            echo "</td>";
            echo "<td>";
            echo $row["cantidad"];
            echo "</td>";
            echo "<td>";
            echo $row["total"];
            $total_precio_pago=$total_precio_pago+$row['total'];
            echo "</td>";
        }
        }
    
        
        ?>
        </table>
    
        <?php
        echo "<h2>TOTAL: $ $total_precio_pago .00</h2>";
        /* free result set */
        $result->free();
        echo "  <form action='../php/registar_venta.php' method='post'> 
                    <input type='submit' value='Cobrar'>
                </form>
                <form action='../php/cancelar_venta.php' method='post'>
                    <input type='submit' value='Cancelar'>
                </form>";
    }
    ?>
</body>
</html>