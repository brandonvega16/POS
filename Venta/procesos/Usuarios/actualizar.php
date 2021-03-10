<?php
    //session_start();
    require_once "../../clases/conexion.php";
    require_once "../../clases/Usuarios.php";

    $obj = new usuarios();

    $datos = array(
        
        $_POST['id'],
        $_POST['Unombre'],
        $_POST['Uapellido'],
        $_POST['Uusuario'],
        $_POST['Upassword']
    );

    $obj->actualizar($datos);
?>