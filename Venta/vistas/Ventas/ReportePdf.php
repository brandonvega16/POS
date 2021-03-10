<?php

require_once "../../clases/conexion.php";
require_once "../../clases/ventas.php";
require_once "../../clases/consultas.php";

$obj = new ventas();

$c = new conectar();
$conexion = $c->conexion();
$idventa = $_GET['idventa'];

$sql = "SELECT ve.id_venta,
		ve.fechaCompra,
		ve.id_cliente,
		art.nombre,
        art.precio,
        art.descripcion,
        ve.cantidad,
        ve.precio
	from ventas  as ve 
	inner join articulos as art
	on ve.id_producto=art.id_producto
	and ve.id_venta='$idventa'";

$result = mysqli_query($conexion, $sql);

$ver = mysqli_fetch_row($result);

$folio = $ver[0];
$fecha = $ver[1];
$idcliente = $ver[2];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Ventas</title>
    <link rel="stylesheet" href="../../librerias/tabla/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../librerias/lista.css">
</head>

<body>
    <?php while ($ver1 = mysqli_fetch_row($result3)) : ?>
        <?php
        $imgVer = explode("/", $ver1[1]);
        $imgRuta = $imgVer[0] . "/" . $imgVer[1] . "/" . $imgVer[2] . "/" . $imgVer[3];
        ?>
        <img src="<?php echo $imgRuta ?>" class="rounded-circle" style="margin-right: 100px; border-radius: 50%;" width="100px" height="80px" alt="">
    <?php endwhile; ?>
    <h2 style="text-align:center;">Reporte de Ventas</h2>
    <br>
    <table class="table table-hover" style="text-align:left;">
        <thead class="thead-dark">
            <tr>
                <td>Fecha: <?php echo $fecha; ?></td>
            </tr>
            <tr>
                <td>Folio: <?php echo $folio ?></td>
            </tr>
            <tr>
                <td>Cliente: <?php echo $obj->nombreCliente($idcliente); ?></td>
            </tr>
        </thead>
    </table>
    <br>
    <h4 style="text-align:center;">Detalle General</h4>
    <table class="table table-hover" style="text-align:left;">
        <thead class="thead-dark">
            <tr>
                <td>Producto</td>
                <td>Precio</td>
                <td>Cantidad</td>
                <td>Descripcion</td>
                <td>Total</td>
            </tr>
        </thead>
        <?php
        $sql = "SELECT ve.id_venta,
        ve.fechaCompra,
        ve.id_cliente,
        art.nombre,
        art.precio,
        art.descripcion,
        ve.cantidad,
        ve.precio
    from ventas  as ve 
    inner join articulos as art
    on ve.id_producto=art.id_producto
    and ve.id_venta='$idventa'";

        $result = mysqli_query($conexion, $sql);
        $total = 0;
        while ($mostrar = mysqli_fetch_row($result)) :
            $final = $ver[4] * $ver[6];
            $total = $total + $final;

        ?>

            <tr>
                <td><?php echo $ver[3]; ?></td>
                <td><?php echo $ver[4]; ?></td>
                <td><?php echo $ver[6]; ?></td>
                <td><?php echo $ver[5]; ?></td>
                <td><?php echo "$" . $ver[7] ?></td>
            </tr>
        <?php
        endwhile;
        ?>
    </table>
</body>

</html>