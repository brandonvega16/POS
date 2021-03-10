<?php
require_once "../../clases/Conexion.php";
require_once "../../clases/Ventas.php";
require_once "../../clases/consultas.php";

$objv = new ventas();


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
<html>

<head>
	<title>Reporte de venta</title>
	<style type="text/css">
		@page {
			margin-top: 0.3em;
			margin-left: 0.6em;
		}

		body {
			font-size: xx-small;
		}

		.logo {
			margin: auto;
			width: 30px;
			/*display: block;
			margin: auto;
			width: 50%;
			margin-top: 20px;*/
			/*margin-left: 140px;*/
		}

		.empresa {
			text-transform: uppercase;
		}
	</style>

</head>

<body>
	<?php
	while ($ver = mysqli_fetch_row($result3)) :
	?>
		<?php
		$imgVer = explode("/", $ver[1]);
		$imgRuta = $imgVer[0] . "/" . $imgVer[1] . "/" . $imgVer[2] . "/" . $imgVer[3];
		?>
		<img class="logo" src="<?php echo $imgRuta ?>" alt="Logo Empresa">
		<br>
		<h4 class="empresa"><?php echo $ver[0] ?></h4>
	<?php
	endwhile;
	?>
	<p>
		Fecha: <?php echo $fecha; ?>
	</p>
	<p>
		Folio: <?php echo $folio ?>
	</p>
	<p>
		Cliente: <?php echo $objv->nombreCliente($idcliente); ?>
	</p>

	<table class="table table-hover" style="text-align:center;">
		<tr>
			<td>Nombre</td>
			<td>Precio</td>
			<td>Cantidad</td>
		</tr>
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
		?>
			<tr>
				<td><?php echo $mostrar[3]; ?></td>
				<td><?php echo $mostrar[4] ?></td>
				<td><?php echo $mostrar[6] ?></td>
			</tr>
			<?php
			$total = $total + $mostrar[4];

			?>
			<tr>
				<td>Total: <?php echo "$" . $mostrar[7] ?></td>
			</tr>
		<?php endwhile; ?>
	</table>


</body>

</html>