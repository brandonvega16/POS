<?php
    require_once "../../clases/conexion.php";
    require_once "../../clases/articulos.php";

    $obj = new articulos();

        
    $id = $_POST['idart'];


    $obj->eliminar($id);
?>