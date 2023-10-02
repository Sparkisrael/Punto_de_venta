<?php

require_once 'conexion.php';

$query = "SELECT * FROM venta_temporal";
$result = mysqli_query($con,$query);
date_default_timezone_set('America/Mexico_City');
$fecha_hora= date("Y-m-s h:i:s"); 

    while ($row = $result->fetch_assoc()) {
           $clave = $row["clave"];
           $nombre= $row["nombre"];
           $cantidad= $row["cantidad"];
           $precio= $row["precio"];
           $total= $row["total"];
            //se realiza una consulta para poder consultar su existencia y poder llevar el control del inventario
            $consulta_producto="SELECT * FROM productos WHERE id_producto = '$clave'";
            $resultadop=mysqli_query($con,$consulta_producto);
            $row = $resultadop->fetch_assoc();
            $total_inventario=$row["inventario"];
            $total_ingresar=$total_inventario-$cantidad;
            //se actualiza el valor del proucto en el einventario
            $modif="UPDATE productos SET inventario='$total_ingresar' WHERE id_producto='$clave'";
            $result_modif=mysqli_query($con,$modif);
           /** se Realiza el traspaso de la tabla temporal a la tabla de ventas */
           $registro_producto="INSERT INTO ventas(clave,nombre,cantidad,total,fecha_hora)
        VALUES('$clave','$nombre','$cantidad','$total','$fecha_hora')";
        mysqli_query($con,$registro_producto);
    }
$elim="DELETE FROM venta_temporal";
$resultado_elim=mysqli_query($con,$elim);
echo "
<script>
    alert('VENTA GUARDADA');
    location.href ='../paginas/venta.php';
</script>
";

?>