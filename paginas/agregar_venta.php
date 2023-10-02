<?php
require '../php/conexion.php';

$clave=$_POST['clave'];
$consulta_producto="SELECT * FROM productos WHERE id_producto = '$clave'";
    $resultado=mysqli_query($con,$consulta_producto);
    /* VERIFICA SI EL CODIGO EXISTE EN LA TABLA DE PRODUCTOS */
    if(mysqli_num_rows($resultado)==0){
        //CASO DE QUE NO EXISTA
        echo "
            <script>
                alert('NO existe un REGISTRO igual');
                location.href ='venta.php';
            </script>
            ";
    }else{
        //CASO QUE SI EXISTE EL PRODUCTO EN LA BD
        //se valida si el producto tiene existencia
        $row = $resultado->fetch_assoc();
        if($row["inventario"]==0){
            echo "
            <script>
                alert('El producto no tiene existencia');
                location.href ='venta.php';
            </script>
            ";
        }else{
        //recupera todos los datos importantes del producto
        $query = "SELECT * FROM productos WHERE id_producto='$clave'";
        $result = mysqli_query($con,$query);
        while ($row = $result->fetch_assoc()) {
            $clave = $row["id_producto"];
            $nombre= $row["nombre"];
            $precio= $row["precio_venta"];
        }
        echo $clave;
        echo $nombre;
        echo $precio;
        /*consulta si ya existe el producto en la tabla temporal*/
        $consulta_producto_temporal="SELECT * FROM venta_temporal WHERE clave = '$clave'";
        $resultado_temporal=mysqli_query($con,$consulta_producto_temporal);
        while ($rows_datos_temp = $resultado_temporal->fetch_assoc()) {
            $cantidad = $rows_datos_temp["cantidad"];
            $total= $rows_datos_temp["total"];
        }

        if(mysqli_num_rows($resultado_temporal)>0){
            //OPCION PARA MODIFICAR LA CANTIDAD Y TOTAL
            $cantidad++;
            $total_precio=$precio*$cantidad;
            $modif="UPDATE venta_temporal SET cantidad='$cantidad',total='$total_precio' WHERE clave='$clave'";
            $result_modif=mysqli_query($con,$modif);
            echo "
            <script>
                location.href ='venta.php';
            </script>
            ";
        }else{
            /** se realiza el registro de la venta nueva */
            $registro_producto_venta="INSERT INTO venta_temporal(clave,nombre,precio,cantidad,total)
            VALUES('$clave','$nombre','$precio','1','$precio')";
            if(mysqli_query($con,$registro_producto_venta)){
                echo "
                <script>
                    location.href ='venta.php';
                </script>
                ";
            }
  
        }
      }
    }
?>