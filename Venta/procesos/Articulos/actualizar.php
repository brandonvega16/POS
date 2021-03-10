<?php
require_once "../../clases/conexion.php";
require_once "../../clases/articulos.php";

$obj = new articulos();

 $datos = array(
    $_POST['idArticulo'],
    $_POST['Mcategoria'],
    $_POST['Mnombre'],
    $_POST['Mdescripcion'],
    $_POST['Mcantidad'],
    $_POST['Mprecio']
 );

 $obj->actualizar($datos);

 
?>