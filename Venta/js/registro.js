$(document).ready(function(){
$('#registro').click(function(){

    vacios = validarFormVacio('frmRegistro');

    if(vacios > 0 )
    {
        alertify.alert('Campos Vacios', 'Debes Llenar todos los Campos!');
        return false;
    }
    
    datos=$('#frmRegistro').serialize();
    $.ajax({
        type:"POST",
        data:datos,
        url:"procesos/Registro/registroUsuarios.php",
        success:function(r){
            if(r == "")
            {
                alertify.alert('Registro', 'Registro Correcto!', function(){ alertify.success('Ok'); });
				setTimeout(function(){
                    window.location = "index.php";
                 }, 2000);
                

            }
            else
            {
                alertify.alert('Registro', 'Error en Registro!', function(){ alertify.error('Error'); });
            }
            
        }
    });
});
});
$(document).ready(function(){
$('#registroEmpresa').click(function () {
	vacios = validarFormVacio('frmRegistroEmp');

	if (vacios > 0) {
		alertify.alert('Campos Vacios', 'Debes Llenar todos los Campos!');
		return false;
	}
	var formData = new FormData(document.getElementById("frmRegistroEmp"));

	$.ajax({
		url: "procesos/Registro/registroEmpresa.php",
		type: "post",
		dataType: "html",
		data: formData,
		cache: false,
		contentType: false,
		processData: false,

		success: function (data) {
			//alert(data);
			if (data == "") {
				//$('#frmRegistroEmp')[0].reset();
				//$('#tablaLoad').load("../vistas/Articulos/tabla.php");
				alertify.success('Registro Correcto');
				setTimeout(function(){
                    window.location = "registro.php";
                 }, 2000);
			} else {
				alertify.error('Error');
			}
		}
	});
});
});