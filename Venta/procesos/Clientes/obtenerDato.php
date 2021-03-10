<?php
require_once "../../clases/conexion.php";
require_once "../../clases/Clientes.php";

$obj = new clientes();

$idart = $_POST['idcli'];

echo json_encode($obj->obterDato($idart));
?>