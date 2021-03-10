<?php

class articulos
{
    public function insertarArticulo($datos)
    {
        $c = new conectar();
        $conexion = $c->conexion();
        $fecha = date('Y-m-d');

        $sql = "INSERT INTO articulos (id_categoria,id_imagen,id_usuario,nombre,descripcion,cantidad,precio,fechaCaptura) 
                VALUES ('$datos[0]', '$datos[1]', '$datos[2]', '$datos[3]', '$datos[4]', '$datos[5]', '$datos[6]', '$fecha')";
                
        return mysqli_query($conexion,$sql);

    }

    public function imagen($datos)
    {
        $c = new conectar();
        $conexion = $c->conexion();
        $fecha = date('Y-m-d');

        $sql = "INSERT INTO imagenes (id_categoria,nombre,ruta,fechaSubida) VALUES ('$datos[0]', '$datos[1]', '$datos[2]', '$fecha')";
        $result = mysqli_query($conexion,$sql);
        return mysqli_insert_id($conexion);
    }

    public function obterDato($idArticulo)
    {
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT id_producto, id_categoria, nombre, descripcion, cantidad, precio from articulos where id_producto = '$idArticulo'";

        $result = mysqli_query($conexion,$sql);

        $ver = mysqli_fetch_row($result);

        $datos = array(
            "id_producto" => $ver[0],
            "id_categoria" => $ver[1],
            "nombre" => $ver[2],
            "descripcion" => $ver[3],
            "cantidad" => $ver[4],
            "precio" => $ver[5]
        );

        return $datos;
    }

    public function actualizar($datos)
    {
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "UPDATE articulos SET id_categoria = '$datos[1]', nombre = '$datos[2]', descripcion = '$datos[3]', cantidad = '$datos[4]', precio = '$datos[5]' where id_producto = '$datos[0]'";

        return mysqli_query($conexion, $sql);
    }

    public function eliminar($datos)
    {
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "DELETE FROM articulos WHERE id_producto = '$datos'";
        return mysqli_query($conexion, $sql);
    }
}
?>