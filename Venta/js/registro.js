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
                window.location = "index.php";

            }
            else
            {
                alertify.alert('Registro', 'Error en Registro!', function(){ alertify.error('Error'); });
            }
            
        }
    });
});
});