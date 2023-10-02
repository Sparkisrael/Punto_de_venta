<?php
require_once 'conexion.php';

$clave=$_POST['clave'];
$cantidad=$_POST['cantidad'];
$consulta_producto="SELECT * FROM productos WHERE id_producto = '$clave'";
$resultado=mysqli_query($con,$consulta_producto);
$row = $resultado->fetch_assoc();

if(mysqli_num_rows($resultado)>0){
    $total_producto=$row["inventario"];
    $cantidad=$cantidad+$total_producto;
    $modif="UPDATE productos SET inventario='$cantidad' WHERE id_producto='$clave'";
    $result_modif=mysqli_query($con,$modif);
    echo "
            <script>
                alert('El registro se modifico de manera exitosa');
                location.href ='../paginas/surtir_producto.php';
            </script>
            ";
}else{
    echo "
        <script>
            alert('No existe un REGISTRO igual');
            location.href ='../paginas/surtir_producto.php';
        </script>
        ";
}


?>