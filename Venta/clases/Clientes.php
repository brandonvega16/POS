<?php

class clientes
{
    public function agregar($datos)
    {
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "INSERT INTO clientes (id_usuario, nombre, apellido, direccion, email, telefono, rfc) 
                VALUES ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]')";
        return mysqli_query($conexion, $sql);
    }

    public function obterDato($idCliente)
    {
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT id_cliente, nombre, apellido, direccion, email, telefono, rfc from clientes where id_cliente = '$idCliente'";

        $result = mysqli_query($conexion,$sql);

        $ver = mysqli_fetch_row($result);

        $datos = array(
            "id_cliente" => $ver[0],
            "nombre" => $ver[1],
            "apellido" => $ver[2],
            "direccion" => $ver[3],
            "email" => $ver[4],
            "telefono" => $ver[5],
            "rfc" => $ver[6]
        );

        return $datos;
    }

    public function actualizar($datos)
    {
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "UPDATE clientes SET nombre = '$datos[1]', apellido = '$datos[2]', direccion = '$datos[3]',email = '$datos[4]',
                telefono = '$datos[5]', rfc = '$datos[6]' WHERE id_cliente = '$datos[0]'";
        return mysqli_query($conexion, $sql);
    }

    public function eliminar($datos)
    {
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "DELETE FROM clientes WHERE id_cliente = '$datos'";
        return mysqli_query($conexion, $sql);
    }
    

}