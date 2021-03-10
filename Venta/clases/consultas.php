<?php
require_once "conexion.php";
$c = new conectar();
$conexion = $c->conexion();

$sql0 = "SELECT id_cliente, nombre, apellido FROM clientes";
$result0 = mysqli_query($conexion, $sql0);

$sql1 = "SELECT id_producto, nombre, descripcion, cantidad, precio FROM articulos";
$result1 = mysqli_query($conexion, $sql1);

$sql2 = "SELECT id_venta, fechaCompra, id_cliente from ventas ORDER BY id_venta DESC";
$result2 = mysqli_query($conexion, $sql2);

$sql3 = "SELECT nombre, logo from empresa";
$result3 = mysqli_query($conexion, $sql3);
?>