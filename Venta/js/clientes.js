$(document).ready(function () {
    $('#registrar').click(function () {

        vacios = validarFormVacio('frmClientes');

        if (vacios > 0) {
            alertify.alert('Campos Vacios', 'Debes Llenar todos los Campos!');
            return false;
        }

        datos = $('#frmClientes').serialize();
        $.ajax({
            type: "POST",
            data: datos,
            url: "../procesos/Clientes/insertar.php",
            success: function (r) {
                if (r == "") {
                    $('#frmClientes')[0].reset();
                    $('#tablaLoad').load("../vistas/Clientes/tabla.php");
                     alertify.success('Registro Correcto');

                }
                else {
                   alertify.error('Error');
                }

            }
        });
    });
});

function obtenerDato(idCliente)
{
	$.ajax({
		type: "POST",
		data: "idcli=" + idCliente,
		url: "../procesos/Clientes/obtenerDato.php",
		success: function (r) {
			//alert(r);
			dato = jQuery.parseJSON(r);
			$('#idCliente').val(dato['id_cliente']);
			$('#Mnombre').val(dato['nombre']);
			$('#Mapellido').val(dato['apellido']);
			$('#Mdireccion').val(dato['direccion']);
			$('#Mcorreo').val(dato['email']);
			$('#Mtelefono').val(dato['telefono']);
            $('#Mrfc').val(dato['rfc']);

		}
	});
}

$(document).ready(function () {
    $('#guardar').click(function () {

        vacios = validarFormVacio('frmClientesU');

        if (vacios > 0) {
            alertify.alert('Campos Vacios', 'Debes Llenar todos los Campos!');
            return false;
        }

        datos = $('#frmClientesU').serialize();
        $.ajax({
            type: "POST",
            data: datos,
            url: "../procesos/Clientes/actualizar.php",
            success: function (r) {
                if (r == "") {
                    $('#frmClientesU')[0].reset();
                    $('#tablaLoad').load("../vistas/Clientes/tabla.php");
                    alertify.success('Registro Actualizado');

                }
                else {
                    alertify.error('Error');
                }

            }
        });
    });
});

function eliminar(idCliente)
{
    alertify.confirm('Clientes',"Desea Eliminar el Registro?",
  function(){
    $.ajax({
        type: "POST",
        data: "idcli=" + idCliente,
        url: "../procesos/Clientes/eliminar.php",
        success: function (r) {
            if (r == "") {
                $('#tablaLoad').load("../vistas/Clientes/tabla.php");
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