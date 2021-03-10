<?php
    //session_start();
    require_once "../../clases/conexion.php";
    require_once "../../clases/Usuarios.php";

    $obj = new usuarios();

        
    $id = $_POST['idusuario'];


    $obj->eliminar($id);
?>