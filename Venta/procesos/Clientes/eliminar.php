<?php
    //session_start();
    require_once "../../clases/conexion.php";
    require_once "../../clases/Clientes.php";

    $obj = new clientes();

        
    $id = $_POST['idcli'];


    $obj->eliminar($id);
?>