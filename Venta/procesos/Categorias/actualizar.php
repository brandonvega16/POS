<?php
    //session_start();
    require_once "../../clases/conexion.php";
    require_once "../../clases/Almacen.php";

    $obj = new almacen();

    $datos = array(
        
        $_POST['idcategoria'],
        $_POST['categoria']
    );

    $obj->actualizar($datos);
?>