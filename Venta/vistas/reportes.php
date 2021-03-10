<?php
session_start();
if (isset($_SESSION['usuario'])) {

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reportes</title>
        <link rel="stylesheet" href="../css/categoria.css">
        <link rel="stylesheet" href="../librerias/alertifyjs/css/alertify.css">
        <link rel="stylesheet" href="../librerias/alertifyjs/css/themes/default.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    </head>

    <body>
        <?php require_once "menu.php"; ?>
        <div class="container">
            <h1>Reportes de Ventas</h1>
            <div id="ventasHechas"></div>
        </div>
    </body>
    <script src="../librerias/jquery-3.5.1.js"></script>
    <script src="../librerias/alertifyjs/alertify.js"></script>
    <script src="../js/funciones.js"></script>
    <script src="../js/ventas.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
            $(document).ready(function() {
                $('#ventasHechas').load('ventas/ventasReportes.php');
            });
        </script>
    </html>
<?php
} else {
    header("location:../index.php");
}
?>