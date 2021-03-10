<?php
require_once "../../clases/conexion.php";
$c = new conectar();
$conexion = $c->conexion();

$sql = "SELECT id_categoria, nombreCategoria FROM categorias";
$result = mysqli_query($conexion, $sql);
?>
<div class="table-responsive">
    <table id="categorias" class="table table-hover">
        <thead>
            <tr style="text-align: center;">
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
                    <td style="text-align: center;">
                        <span class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="editar('<?php echo $ver[0]?>' , '<?php echo $ver[1]?>')">
                            <span><i class="far fa-edit"></i></span>
                        </span>
                    </td>
                    <td style="text-align: center;">
                        <span class="btn btn-danger btn-sm" onclick="eliminar('<?php echo $ver[0]?>')">
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
    $('#categorias').DataTable();
} );
</script>