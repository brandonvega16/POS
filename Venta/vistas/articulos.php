<?php
//include "Articulos/modal.php";
include "../clases/conexion.php";
$c = new conectar();
$conexion = $c->conexion();

$sql = "SELECT id_categoria, nombreCategoria FROM categorias";
$result = mysqli_query($conexion, $sql);
session_start();
if (isset($_SESSION['usuario'])) {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Articulos</title>
        <link rel="stylesheet" href="../css/categoria.css">
        <link rel="stylesheet" href="../librerias/alertifyjs/css/alertify.css">
        <link rel="stylesheet" href="../librerias/alertifyjs/css/themes/default.css">
        <link rel="stylesheet" href="../librerias/boostrap/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    </head>

    <body>
        <?php require_once "menu.php" ?>

        <div class="container">
            <div class="row">
                <div class="col-sm-4 formulario">
                    <h2 class="titulo">Admon. Articulos</h2>
                    <form id="frmArticulos" action="#" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Seleccionar Categoria</label>
                            <select class="form-select" name="categoria" id="categoria">
                            <option selected>Seleccionar</option>
                                <?php while ($ver = mysqli_fetch_row($result)) : ?>
                                    
                                    <option value="<?php echo $ver[0] ?>"><?php echo $ver[1] ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre">
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

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Imagen</label>
                            <input type="file" class="form-control" name="imagen" id="imagen">
                        </div>

                        <span class="btn btn-primary btn-md entrar" id="registrar">Registrar</span>
                    </form>
                </div>
                <div class="col-sm-8 tabla">
                    <div id="tablaLoad"></div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modificar Articulos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="frmArticulosM" action="#" method="post" enctype="multipart/form-data">

                            <div class="mb-3">
                                <input type="text" hidden class="form-control" name="idArticulo" id="idArticulo">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Seleccionar Categoria</label>
                                <?php
                                $sql = "SELECT id_categoria, nombreCategoria FROM categorias";
                                $result = mysqli_query($conexion, $sql); ?>
                                <select class="form-select" name="Mcategoria" id="Mcategoria">
                                <option selected>Seleccionar</option>
                                    <?php while ($ver = mysqli_fetch_row($result)) : ?>
                                        
                                        <option value="<?php echo $ver[0] ?>"><?php echo $ver[1] ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="Mnombre" id="Mnombre">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Descripcion</label>
                                <input type="text" class="form-control" name="Mdescripcion" id="Mdescripcion">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Cantidad</label>
                                <input type="number" class="form-control" name="Mcantidad" id="Mcantidad">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Precio</label>
                                <input type="number" class="form-control" name="Mprecio" id="Mprecio">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="guardar" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="../librerias/jquery-3.5.1.js"></script>
        <script src="../librerias/alertifyjs/alertify.js"></script>
        <script src="../js/funciones.js"></script>
        <script src="../js/articulos.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#tablaLoad').load("Articulos/tabla.php");
            });
        </script>
    </body>

    </html>
<?php
} else {
    header("location: ../index.php");
}
?>