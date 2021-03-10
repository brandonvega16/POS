<?php
class ventas
{
    public function obterDato($idArticulo)
    {
        $c = new conectar();
        $conexion = $c->conexion();

        //$sql = "SELECT id_producto, nombre, descripcion, cantidad, precio from articulos where id_producto = '$idArticulo'";

        $sql = "SELECT articulos.id_producto, articulos.nombre, articulos.descripcion, articulos.cantidad, articulos.precio, imagenes.ruta 
        FROM `articulos` INNER JOIN
        imagenes on articulos.id_imagen = imagenes.id_imagen and articulos.id_producto = '$idArticulo'";
        $result = mysqli_query($conexion, $sql);

        $ver = mysqli_fetch_row($result);

        $d = explode('/', $ver[5]);
        $img = $d[1] . '/' . $d[2] . '/' . $d[3];

        $datos = array(
            //"id_producto" => $ver[0],
            "nombre" => $ver[1],
            "descripcion" => $ver[2],
            "cantidad" => $ver[3],
            "precio" => $ver[4],
            "ruta" => $img
        );

        return $datos;
    }

    public function crearVenta()
    {
        $c = new conectar();
        $conexion = $c->conexion();

        $fecha = date('Y-m-d');
        $idventa = self::creaFolio();
        $datos = $_SESSION['tablaComprasTemp'];
        $idusuario = $_SESSION['iduser'];
        $r = 0;

        for ($i = 0; $i < count($datos); $i++) {
            $d = explode("||", $datos[$i]);

            $sql = "INSERT into ventas (id_venta,
										id_cliente,
										id_producto,
										id_usuario,
										precio,
										fechaCompra)
							values ('$idventa',
									'$d[6]',
									'$d[0]',
									'$idusuario',
									'$d[3]',
									'$fecha')";
            $r = $r + $result = mysqli_query($conexion, $sql);
        }

        return $r;
    }

    public function creaFolio()
    {
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT id_venta from ventas group by id_venta desc";

        $resul = mysqli_query($conexion, $sql);
        $id = mysqli_fetch_row($resul)[0];

        if ($id == "" or $id == null or $id == 0) {
            return 1;
        } else {
            return $id + 1;
        }
    }

    public function nombreCliente($idCliente)
    {
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT apellido,nombre 
			from clientes 
			where id_cliente='$idCliente'";
        $result = mysqli_query($conexion, $sql);

        $ver = mysqli_fetch_row($result);

        return $ver[0] . " " . $ver[1];
    }

    public function obtenerTotal($idventa)
    {
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT precio 
				from ventas 
				where id_venta='$idventa'";
        $result = mysqli_query($conexion, $sql);

        $total = 0;

        while ($ver = mysqli_fetch_row($result)) {
            $total = $total + $ver[0];
        }

        return $total;
    }
}
