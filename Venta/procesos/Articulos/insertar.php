<?php
    session_start();
    $iduser = $_SESSION['iduser'];
    require_once "../../clases/conexion.php";
    require_once "../../clases/Articulos.php";

    $obj = new articulos();

    $datos = array();
  
    $nombreImg = $_FILES['imagen']['name'];
    $ruta =  $_FILES['imagen']['tmp_name'];
    $carpeta = "../../Archivos/";
    $rutaFinal = $carpeta.$nombreImg;

    $datosImg = array(
        $_POST['categoria'],
        $nombreImg,
        $rutaFinal
    );
    

    if(move_uploaded_file($ruta, $rutaFinal))
    {
        $idImagen = $obj->imagen($datosImg);

        if($idImagen > 0 )
        {
            $datos[0] = $_POST['categoria'];
            $datos[1] = $idImagen;
            $datos[2] = $iduser;
            $datos[3] = $_POST['nombre'];
            $datos[4] = $_POST['descripcion'];
            $datos[5] = $_POST['cantidad'];
            $datos[6] = $_POST['precio'];

            echo $obj->insertarArticulo($datos);
        }
        else
        {
            echo 0;
        }
    }

    //print_r($datos);
    //$obj->insertarArticulo($datos);
?>