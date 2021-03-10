<?php

require_once "../../clases/Conexion.php";
require_once "../../clases/Ventas.php";

$c = new conectar();
$conexion = $c->conexion();

$obj = new ventas();

$sql = "SELECT id_venta,
				fechaCompra,
				id_cliente 
			from ventas group by id_venta";
$result = mysqli_query($conexion, $sql);
?>


<br>
<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-10">
		<div class="table-responsive">
			<table id="ventas" class="table table-hover" style="text-align: center;">
				<thead>
					<tr style="text-align: center;">
						<td>Folio</td>
						<td>Fecha</td>
						<td>Cliente</td>
						<td>Total de compra</td>
						<td>Ticket</td>
						<td>Reporte</td>
					</tr>
				</thead>
				<tbody>
				<?php while ($ver = mysqli_fetch_row($result)) : ?>
					<tr>
						<td><?php echo $ver[0] ?></td>
						<td><?php echo $ver[1] ?></td>
						<td>
							<?php
							echo $obj->nombreCliente($ver[2]);
							?>
						</td>
						<td>
							<?php
							echo "$" . $obj->obtenerTotal($ver[0]);
							?>
						</td>
						<td>
							<a href="../procesos/ventas/crearTicket.php?idventa=<?php echo $ver[0] ?>" class="btn btn-danger btn-sm">
								Ticket <span class="glyphicon glyphicon-list-alt"></span>
							</a>
						</td>
						<td>
							<a href="../procesos/ventas/crearReporte.php?idventa=<?php echo $ver[0] ?>" class="btn btn-danger btn-sm">
								Reporte <span class="glyphicon glyphicon-file"></span>
							</a>
						</td>
					</tr>
				<?php endwhile; ?>
				</tbody>
				
			</table>
		</div>
	</div>
	<div class="col-sm-1"></div>
</div>
<script>
$(document).ready( function () {
    $('#ventas').DataTable();
} );
</script>