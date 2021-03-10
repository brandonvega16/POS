<?php
    session_start();
    require_once "../../clases/conexion.php";
    require_once "../../clases/Clientes.php";

    $obj = new clientes();

    $datos = array(
        
        $_SESSION['iduser'],
        $_POST['nombre'],
        $_POST['apellido'],
        $_POST['direccion'],
        $_POST['correo'],
        $_POST['telefono'],
        $_POST['rfc']
    );

    $obj->agregar($datos);

?>