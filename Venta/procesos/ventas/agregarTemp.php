<?php
    session_start();
    require_once "../../clases/conexion.php";
    $c = new conectar();
    $conexion = $c->conexion();

    $idcliente=$_POST['cliente'];
	$idproducto=$_POST['producto'];
	$descripcion=$_POST['descripcion'];
	$cantidad=$_POST['cantidad'];
	$precio=$_POST['precio'];

    $sql="SELECT id_cliente,nombre,apellido 
			from clientes 
			where id_cliente='$idcliente'";
	$result=mysqli_query($conexion,$sql);

	$c=mysqli_fetch_row($result);

	$ncliente=$c[1]." ".$c[2];

	$sql="SELECT nombre 
			from articulos 
			where id_producto='$idproducto'";
	$result=mysqli_query($conexion,$sql);

	$nombreproducto=mysqli_fetch_row($result)[0];

	$articulo=  $idproducto."||".
				$nombreproducto."||".
				$descripcion."||".
				$precio."||".
				$ncliente."||".
				$cantidad."||".
				$idcliente;

	$_SESSION['tablaComprasTemp'][]=$articulo;

?>