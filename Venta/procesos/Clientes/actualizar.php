<?php
    //session_start();
    require_once "../../clases/conexion.php";
    require_once "../../clases/Clientes.php";

    $obj = new clientes();

    $datos = array(
        
        $_POST['idCliente'],
        $_POST['Mnombre'],
        $_POST['Mapellido'],
        $_POST['Mdireccion'],
        $_POST['Mcorreo'],
        $_POST['Mtelefono'],
        $_POST['Mrfc']
    );

    $obj->actualizar($datos);
?>