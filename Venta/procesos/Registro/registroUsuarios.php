<?php

    require_once "../../clases/conexion.php";
    require_once "../../clases/Usuarios.php";

    $obj = new usuarios();

    $datos = array(
        $_POST['nombre'],
        $_POST['apellido'],
        $_POST['usuario'],
        $_POST['password']
    );

    $obj->registro($datos);
?>