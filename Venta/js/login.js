$(document).ready(function(){
    $('#entrar').click(function(){
    
        vacios = validarFormVacio('frmLogin');
    
        if(vacios > 0 )
        {
            alertify.alert('Campos Vacios', 'Debes Llenar todos los Campos!');
            return false;
        }
        
        datos=$('#frmLogin').serialize();
        $.ajax({
            type:"POST",
            data:datos,
            url:"procesos/Login/login.php",
            success:function(r){
                if(r == "")
                {
                    window.location = "vistas/inicio.php";
    
                }
                else
                {
                    alertify.alert('Iniciar Session', 'Error en Inicio de Session !', function(){ alertify.error('Error'); });
                }
                
            }
        });
    });
    });