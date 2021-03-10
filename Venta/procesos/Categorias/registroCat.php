<?php
    session_start();
    require_once "../../clases/conexion.php";
    require_once "../../clases/Almacen.php";

    $obj = new almacen();

    $datos = array(
        
        $_SESSION['iduser'],
        $_POST['categoria']
    );

    $obj->registro($datos);
?>