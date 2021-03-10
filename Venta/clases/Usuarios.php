<?php

class usuarios
{
    public function registro($datos)
    {
        $c = new conectar();
        $conexion = $c->conexion();
        $fecha = date('Y-m-d');

        $sql = "INSERT INTO usuarios (nombre, apellido, email, password, fechaCaptura) VALUES ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$fecha')";
        return mysqli_query($conexion, $sql);
    }

    public function login($datos)
    {
        $c = new conectar();
        $conexion = $c->conexion();
        $_SESSION['usuario'] = $datos[0];
        $_SESSION['iduser'] = self::traerId($datos);

        $sql = "SELECT * FROM usuarios WHERE email = '$datos[0]' AND password = '$datos[1]";

        $result = mysqli_query($conexion, $sql);

        if (!empty($result) AND mysqli_num_rows($result) > 0) 
        {
            return 1;
        } else 
        {
            return 0;
        }
    }

    public function traerId($datos)
    {
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "SELECT id_usuario from usuarios where email = '$datos[0]' and password = '$datos[1]'";

        $result = mysqli_query($conexion, $sql);

        return mysqli_fetch_row($result)[0];
    }

    public function actualizar($datos)
    {
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "UPDATE usuarios SET nombre = '$datos[1]', apellido = '$datos[1]', email = '$datos[3]', password = '$datos[4]' WHERE id_usuario = '$datos[0]'";
        return mysqli_query($conexion, $sql);
    }

    public function eliminar($datos)
    {
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "DELETE FROM usuarios WHERE id_usuario = '$datos'";
        return mysqli_query($conexion, $sql);
    }
}
