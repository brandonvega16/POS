<?php

require_once "../clases/Conexion.php";
require_once "../clases/Ventas.php";

$c = new conectar();
$conexion = $c->conexion();

$obj = new ventas();

$sql = "SELECT id_venta,
				fechaCompra,
				id_cliente 
			from ventas group by id_venta";
$result = mysqli_query($conexion, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Modal</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Imprimir Ticket</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
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
							<a href="../procesos/ventas/crearReportePdf.php?idventa=<?php echo $ver[0] ?>" class="btn btn-danger btn-sm">
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
      </div>
    </div>
  </div>
</div>


</body>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#Ticket > .modal-body').css({
			width: 'auto',
			height: 'auto',
			'max-height': '100%'
		});
		$("#ventas").dataTable();
	});
</script>

</html>