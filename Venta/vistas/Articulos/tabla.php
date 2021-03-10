<?php
require_once "../../clases/conexion.php";
$c = new conectar();
$conexion = $c->conexion();

$sql = "SELECT articulos.id_producto, articulos.nombre,articulos.descripcion,articulos.cantidad, articulos.precio, imagenes.ruta, categorias.nombreCategoria FROM `articulos` INNER JOIN
imagenes on articulos.id_imagen = imagenes.id_imagen INNER JOIN categorias on articulos.id_categoria = categorias.id_categoria;";
$result = mysqli_query($conexion, $sql);
?>
<div class="table-responsive">
    <table id="articulos" class="table table-hover" >
        <thead>
            <tr style="text-align: center;">
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
                <th scope="col">Imagen</th>
                <th scope="col">Categoria</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($ver = mysqli_fetch_row($result)) :
            ?>
                <tr>
                    <td><?php echo $ver[1] ?></td>
                    <td><?php echo $ver[2] ?></td>
                    <td><?php echo $ver[3] ?></td>
                    <td><?php echo $ver[4] ?></td>
                    <td><?php $imgVer = explode("/", $ver[5]);
                              $imgRuta = $imgVer[1]."/".$imgVer[2]."/".$imgVer[3];
                        ?>
                        <img style="width: 125px; height: 100px;" src="<?php echo $imgRuta ?>" alt="Producto">
                    </td>
                    <td><?php echo $ver[6] ?></td>
                    <td style="text-align: center;">
                        <span class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal1" onclick="obtenerDato('<?php echo $ver[0] ?>')">
                            <span><i class="far fa-edit"></i></span>
                        </span>
                    </td>
                    <td style="text-align: center;">
                        <span class="btn btn-danger btn-sm" onclick="eliminar('<?php echo $ver[0] ?>')">
                            <span><i class="far fa-trash-alt"></i></span>
                        </span>
                    </td>
                </tr>
            <?php
            endwhile;
            ?>
        </tbody>
    </table>
</div>

<script>
$(document).ready( function () {
    $('#articulos').DataTable();
} );
</script>