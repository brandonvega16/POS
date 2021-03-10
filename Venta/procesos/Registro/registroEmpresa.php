<?php
    require_once "../../clases/conexion.php";
    require_once "../../clases/Usuarios.php";

    $obj = new usuarios();

    $datos = array();
  
    $nombreImg = $_FILES['imagen']['name'];
    $ruta =  $_FILES['imagen']['tmp_name'];
    $carpeta = "../../Archivos/";
    $rutaFinal = $carpeta.$nombreImg;

    $datosImg = array(
        $_POST['nombre'],
        //$nombreImg,
        $rutaFinal
    );
    

    if(move_uploaded_file($ruta, $rutaFinal))
    {
        $idImagen = $obj->imagen($datosImg);
    }

    //print_r($datos);
    //$obj->insertarArticulo($datos);
?>