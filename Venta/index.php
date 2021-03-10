<?php
    require_once "clases/conexion.php";
    $obj = new conectar();
    $conexion = $obj->conexion();

    $sql = "select * from usuarios where email = 'admin'";
    $result = mysqli_query($conexion,$sql);
    $validar = 0;
    if( mysqli_num_rows($result) > 0)
    {
        $validar = 1;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Session</title>
    <link rel="stylesheet" href="librerias/boostrap/css/bootstrap.css">
    <link rel="stylesheet" href="librerias/alertifyjs/css/alertify.css">
    <link rel="stylesheet" href="librerias/alertifyjs/css/themes/default.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <br><br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel panel-heading">
                        <p class="titulo">Sistema de Ventas y Almacen</p>
                    </div>
                    <div class="panel panel-body">
                        <p class="logo">
                        <img class="logotipo" src="img/logo.png" alt="Logo Empresa">
                        <p class="nombre">Nombre de la Empresa</p>
                        </p>

                        <form class="formulario" id="frmLogin" action="#" method="post">
                            <!--<label class="etiquetas">Usuario</label>-->
                            <input class="form-control input-sm campos" type="text" placeholder="Usuario" name="usuario" id="usuario">

                            <!--<label class="etiquetas">Contraseña</label>-->
                            <input class="form-control input-sm campos" type="password" placeholder="Contraseña" name="password" id="password">

                            <span class="btn btn-md entrar" id="entrar">Entrar</span>
                            <?php if(!$validar) : ?>
                            <a href="registro.php" class=" registro" style="text-decoration: none;" >Registrar</a>
                            <?php endif; ?>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>

    <script src="librerias/jquery-3.5.1.js"></script>
    <script src="librerias/alertifyjs/alertify.js"></script>
    <script src="js/funciones.js"></script>
    <script src="js/login.js"></script>
</body>

</html>