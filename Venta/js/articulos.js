$('#registrar').click(function () {
	vacios = validarFormVacio('frmArticulos');

	if (vacios > 0) {
		alertify.alert('Campos Vacios', 'Debes Llenar todos los Campos!');
		return false;
	}
	var formData = new FormData(document.getElementById("frmArticulos"));

	$.ajax({
		url: "../procesos/Articulos/insertar.php",
		type: "post",
		dataType: "html",
		data: formData,
		cache: false,
		contentType: false,
		processData: false,

		success: function (data) {
			//alert(data);
			if (data == "1") {
				$('#frmArticulos')[0].reset();
				$('#tablaLoad').load("../vistas/Articulos/tabla.php");
				alertify.success('Registro Correcto');
			} else {
				alertify.error('Error');
			}
		}
	});
});

function obtenerDato(idArticulo)
{
	$.ajax({
		type: "POST",
		data: "idart=" + idArticulo,
		url: "../procesos/Articulos/obtenerDato.php",
		success: function (r) {
			//alert(r);
			dato = jQuery.parseJSON(r);
			$('#idArticulo').val(dato['id_producto']);
			$('#Mcategoria').val(dato['id_categoria']);
			$('#Mnombre').val(dato['nombre']);
			$('#Mdescripcion').val(dato['descripcion']);
			$('#Mcantidad').val(dato['cantidad']);
			$('#Mprecio').val(dato['precio']);

		}
	});
}

$(document).ready(function () {
    $('#guardar').click(function () {

        vacios = validarFormVacio('frmArticulosM');

        if (vacios > 0) {
            alertify.alert('Campos Vacios', 'Debes Llenar todos los Campos!');
            return false;
        }

        datos = $('#frmArticulosM').serialize();
        $.ajax({
            type: "POST",
            data: datos,
            url: "../procesos/Articulos/actualizar.php",
            success: function (r) {
				if (r == "") {
					$('#frmArticulosM')[0].reset();
					$('#tablaLoad').load("../vistas/Articulos/tabla.php");
					alertify.success('Registro Correcto');
				} else {
					alertify.error('Error');
				}
            }
        });
    });
});

function eliminar(idCategoria)
{
    alertify.confirm('Articulos',"Desea Eliminar el Registro?",
  function(){
    $.ajax({
        type: "POST",
        data: "idart=" + idCategoria,
        url: "../procesos/Articulos/eliminar.php",
        success: function (r) {
            if (r == "") {
                $('#tablaLoad').load("../vistas/Articulos/tabla.php");
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