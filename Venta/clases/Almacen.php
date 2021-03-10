<?php

class almacen
{
    public function registro($datos)
    {
        $c = new conectar();
        $conexion = $c->conexion();
        $fecha = date('Y-m-d');

        $sql = "INSERT INTO categorias (id_usuario, nombreCategoria, fechaCaptura) VALUES ('$datos[0]','$datos[1]','$fecha')";
        return mysqli_query($conexion, $sql);
    }

    public function actualizar($datos)
    {
        $c = new conectar();
        $conexion = $c->conexion();
        $fecha = date('Y-m-d');

        $sql = "UPDATE categorias SET nombreCategoria = '$datos[1]' WHERE id_categoria = '$datos[0]'";
        return mysqli_query($conexion, $sql);
    }

    public function eliminar($datos)
    {
        $c = new conectar();
        $conexion = $c->conexion();
        $fecha = date('Y-m-d');

        $sql = "DELETE FROM categorias WHERE id_categoria = '$datos'";
        return mysqli_query($conexion, $sql);
    }
    

}
