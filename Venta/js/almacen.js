$(document).ready(function () {
    $('#registrar').click(function () {

        vacios = validarFormVacio('frmCategoria');

        if (vacios > 0) {
            alertify.alert('Campos Vacios', 'Debes Llenar todos los Campos!');
            return false;
        }

        datos = $('#frmCategoria').serialize();
        $.ajax({
            type: "POST",
            data: datos,
            url: "../procesos/Categorias/registroCat.php",
            success: function (r) {
                if (r == "") {
                    $('#frmCategoria')[0].reset();
                    $('#tablaLoad').load("../vistas/Categoria/tabla.php");
                     alertify.success('Registro Correcto');

                }
                else {
                   alertify.error('Error');
                }

            }
        });
    });
});

function editar(idCategoria,categoria)
{
    $('#idcategoria').val(idCategoria);
    $('#categoria').val(categoria);
}

$(document).ready(function () {
    $('#guardar').click(function () {

        vacios = validarFormVacio('frmEditar');

        if (vacios > 0) {
            alertify.alert('Campos Vacios', 'Debes Llenar todos los Campos!');
            return false;
        }

        datos = $('#frmEditar').serialize();
        $.ajax({
            type: "POST",
            data: datos,
            url: "../procesos/Categorias/actualizar.php",
            success: function (r) {
                if (r == "") {
                    $('#frmEditar')[0].reset();
                    $('#tablaLoad').load("../vistas/Categoria/tabla.php");
                    alertify.success('Registro Actualizado');

                }
                else {
                    alertify.error('Error');
                }

            }
        });
    });
});

function eliminar(idCategoria)
{
    alertify.confirm('Categorias',"Desea Eliminar el Registro?",
  function(){
    $.ajax({
        type: "POST",
        data: "idcategoria=" + idCategoria,
        url: "../procesos/Categorias/eliminar.php",
        success: function (r) {
            if (r == "") {
                $('#tablaLoad').load("../vistas/Categoria/tabla.php");
                alertify.success('Registro Eliminado');

            }
            else {
                alertify.error('Error'); 
            }

        }
    });
  },
  function(){
    alertify.error('Cancelado');
  });
}

