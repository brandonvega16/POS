<?php
    //session_start();
    require_once "../../clases/conexion.php";
    require_once "../../clases/Almacen.php";

    $obj = new almacen();

        
    $id = $_POST['idcategoria'];


    $obj->eliminar($id);
?>