$(document).ready(function () {
    $('#registrar').click(function () {

        vacios = validarFormVacio('frmUsuarios');

        if (vacios > 0) {
            alertify.alert('Campos Vacios', 'Debes Llenar todos los Campos!');
            return false;
        }

        datos = $('#frmUsuarios').serialize();
        $.ajax({
            type: "POST",
            data: datos,
            url: "../procesos/Registro/registroUsuarios.php",
            success: function (r) {
                if (r == "") {
                    alertify.alert('Registro', 'Registro Correcto!', function () { alertify.success('Ok'); });
                    $('#frmUsuarios')[0].reset();
                    $('#tablaLoad').load("../vistas/Usuarios/tabla.php");

                }
                else {
                    alertify.alert('Registro', 'Error en Registro!', function () { alertify.error('Error'); });
                }

            }
        });
    });
});


function obtenerDato(id,nombre, apellido, usuario) 
{
    $('#id').val(id);
    $('#Unombre').val(nombre);
    $('#Uapellido').val(apellido);
    $('#Uusuario').val(usuario);
}

$(document).ready(function () {
    $('#guardar').click(function () {

        vacios = validarFormVacio('frmMUsuarios');

        if (vacios > 0) {
            alertify.alert('Campos Vacios', 'Debes Llenar todos los Campos!');
            return false;
        }

        datos = $('#frmMUsuarios').serialize();
        $.ajax({
            type: "POST",
            data: datos,
            url: "../procesos/Usuarios/actualizar.php",
            success: function (r) {
                if (r == "") {
                    $('#frmMUsuarios')[0].reset();
                    $('#tablaLoad').load("../vistas/Usuarios/tabla.php");
                    alertify.success('Registro Actualizado');

                }
                else {
                    alertify.error('Error');
                }

            }
        });
    });
});

function eliminar(idUsuario)
{
    alertify.confirm('Usuarios',"Desea Eliminar el Registro?",
  function(){
    $.ajax({
        type: "POST",
        data: "idusuario=" + idUsuario,
        url: "../procesos/Usuarios/eliminar.php",
        success: function (r) {
            if (r == "") {
                $('#tablaLoad').load("../vistas/Usuarios/tabla.php");
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