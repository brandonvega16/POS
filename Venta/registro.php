<?php
    require_once "clases/conexion.php";
    require_once "clases/consultas.php";
    $obj = new conectar();
    $conexion = $obj->conexion();

    $sql = "select * from usuarios where nivel = 'Admin'";
    $result = mysqli_query($conexion,$sql);
    $validar = 0;
    if( mysqli_num_rows($result) > 0)
    {
        header("location:index.php");
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
                    <p class="titulo">Registro de Usuarios</p>
                    </div>
                    <div class="panel panel-body">
                    <?php
                        while ($ver = mysqli_fetch_row($result3)) :
                        ?>
                            <div class="logotipo">
                                <?php
                                $imgVer = explode("/", $ver[1]);
                                $imgRuta =  $imgVer[2] . "/" . $imgVer[3];
                                ?>
                                <img class="logo" src="<?php echo $imgRuta ?>" alt="Logo Empresa">
                                <h4 class="empresa"><?php echo $ver[0] ?></h4>
                            </div>
                        <?php
                        endwhile;
                        ?>

                        <form class="formulario" id="frmRegistro" action="#" method="post">

                            <!--<label class="etiquetas">Nombre</label>-->
                            <input class="form-control input-sm campos" type="text" placeholder="Nombre" name="nombre" id="nombre" required>

                            <!--<label class="etiquetas">Apellido</label>-->
                            <input class="form-control input-sm campos" type="text" placeholder="Apellido" name="apellido" id="apellido" required>

                            <!--<label class="etiquetas">Correo (Usuario)</label>-->
                            <input class="form-control input-sm campos" type="text" placeholder="Usuario" pattern="[A-Z]" name="usuario" id="usuario" required>

                            <!--<label class="etiquetas">Contraseña</label>-->
                            <input class="form-control input-sm campos" required type="password" pattern="[0-9-]{1,15}" placeholder="Contraseña (Digitos)" name="password" id="password">

                            <input class="form-control input-sm campos" type="text" hidden placeholder="Nivel" name="nivel" id="nivel" value="Admin">

                            <span class="btn btn-md entrar" id="registro">Registrar</span>
                            <a href="index.php" class="registro" style="text-decoration: none;">Login</a>
                            
                        </form>
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>

    <script src="librerias/jquery-3.5.1.js"></script>
    <script src="librerias/alertifyjs/alertify.js"></script>
    <script src="js/funciones.js"></script>
    <script src="js/registro.js"></script>
</body>

</html>