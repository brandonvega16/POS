<?php
require_once "../../clases/conexion.php";
$c = new conectar();
$conexion = $c->conexion();

$sql = "SELECT id_cliente, nombre, apellido, direccion, email, telefono, rfc from clientes";
$result = mysqli_query($conexion, $sql);
?>
<div class="table-responsive">
    <table id="clientes" class="table table-hover" >
        <thead>
            <tr style="text-align: center;">
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Direccion</th>
                <th scope="col">Correo</th>
                <th scope="col">Telefono</th>
                <th scope="col">RFC</th>
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
                    <td><?php echo $ver[5] ?></td>
                    <td><?php echo $ver[6] ?></td>
                    <td style="text-align: center;">
                        <span class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Clientes" onclick="obtenerDato('<?php echo $ver[0] ?>')">
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
    $('#clientes').DataTable();
} );
</script>