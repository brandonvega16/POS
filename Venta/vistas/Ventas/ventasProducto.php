<?php
include "../../clases/consultas.php";
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

<h4>Caja</h4>
<div class="row">
    <div class="col-sm-4 formulario">
        <form id="frmVentas" action="#" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Seleccionar Cliente</label>
                <select class="form-select" name="cliente" id="cliente">
                    <option selected>Seleccionar</option>
                    <?php while ($ver = mysqli_fetch_row($result0)) : ?>
                        <option value="<?php echo $ver[0] ?>"><?php echo $ver[1] . " " . $ver[2] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Seleccionar Producto</label>
                <select class="form-select" name="producto" id="producto">
                    <option selected>Seleccionar</option>
                    <?php while ($ver = mysqli_fetch_row($result1)) : ?>

                        <option value="<?php echo $ver[0] ?>"><?php echo $ver[1] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Descripcion</label>
                <input type="text" class="form-control" name="descripcion" id="descripcion">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Cantidad</label>
                <input type="number" class="form-control" name="cantidad" id="cantidad">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Precio</label>
                <input type="number" class="form-control" name="precio" id="precio">
            </div>

            <span class="btn btn-primary btn-md entrar" id="btnAgregaVenta"><i class="fas fa-shopping-cart"></i> Agregar</span>
            <span class="btn btn-danger btn-md entrar" id="btnVaciarVentas"><i class="far fa-trash-alt"></i> Vaciar Tabla</span>
            <span class="btn btn-secondary btn-md entrar" data-bs-toggle="modal" data-bs-target="#Tickets"><i class="far fa-trash-alt"></i> Tickets</span>


        </form>
    </div>

    <!--<div class="col-sm-3">
        <div id="imgProducto"></div>
    </div>-->

    <div class="col-sm-8">
        <div id="tablaVentasTempLoad"></div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="Tickets" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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


<script src="../librerias/jquery-3.5.1.js"></script>
<script src="../js/funciones.js"></script>
<script src="../js/ventas.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>