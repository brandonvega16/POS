<?php
include "Usuarios/modal.php";
session_start();
if (isset($_SESSION['usuario'])) {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Usuarios</title>
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
                    <h2 class="titulo">Admon. Usuarios</h2>
                    <form id="frmUsuarios" action="#" method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Apellido</label>
                            <input type="text" class="form-control" name="apellido" id="apeliido">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Usuario</label>
                            <input type="text" class="form-control" name="usuario" id="usuario">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>

                        <div class="mb-3">
                            <input type="text" hidden class="form-control" name="nivel" id="nivel" value="Comun">
                        </div> 

                        <span class="btn btn-primary btn-md entrar" id="registrar">Registrar</span>
                    </form>
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-6 tabla">
                    <div id="tablaLoad"></div>
                </div>
            </div>
        </div>



        <script src="../librerias/jquery-3.5.1.js"></script>
        <script src="../librerias/alertifyjs/alertify.js"></script>
        <script src="../js/funciones.js"></script>
        <script src="../js/usuarios.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#tablaLoad').load("Usuarios/tabla.php");
            });
        </script>
    </body>

    </html>
<?php
} else {
    header("location: ../index.php");
}
?>