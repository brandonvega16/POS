$(document).ready(function () {
    $('#ventaProductosBtn').click(function () {
        esconderSeccionVenta();
        $('#ventaProductos').load('ventas/ventasProducto.php');
        $('#ventaProductos').show();
    });
    $('#ventasHechasBtn').click(function () {
        esconderSeccionVenta();
        $('#ventasHechas').load('ventas/ventasReportes.php');
        $('#ventasHechas').show();
    });
});

function esconderSeccionVenta() {
    $('#ventaProductos').hide();
    $('#ventasHechas').hide();
}


$(document).ready(function () {
    $('#cliente').select2();
    $('#producto').select2();
});

// Obtener Info del Producto
$(document).ready(function(){
    $('#producto').change(function(){
        $.ajax({
            type: "POST",
            data: "idproducto=" + $('#producto').val(),
            url: "../procesos/ventas/llenarForm.php",
            success: function(r)
            {
                //alert(r);
                dato = jQuery.parseJSON(r);
                $('#descripcion').val(dato['descripcion']);
                $('#cantidad').val(1);
                $('#precio').val(dato['precio']);
                //$('#imgProducto').prepend('<img class="img-thumbnail" id="imgp" src="' + dato['ruta'] + '" />');
            }
        });
    });
});

// Agregar al Carrito
$('#btnAgregaVenta').click(function(){
    vacios=validarFormVacio('frmVentas');

    if(vacios > 0){
        alertify.alert("Debes llenar todos los campos!!");
        return false;
    }

    datos=$('#frmVentas').serialize();
    $.ajax({
        type:"POST",
        data:datos,
        url:"../procesos/ventas/agregarTemp.php",
        success:function(r){
            //alert(r);
            $('#tablaVentasTempLoad').load("../vistas/Ventas/tablaTemp.php");
        }
    });
});

// Vaciar Tabla
$('#btnVaciarVentas').click(function(){

    $.ajax({
        url:"../procesos/ventas/vaciarTabla.php",
        success:function(r){
            $('#tablaVentasTempLoad').load("../vistas/Ventas/tablaTemp.php");
        }
    });
});

// Quitar Producto de Tabla
function quitarP(index){
    $.ajax({
        type:"POST",
        data:"ind=" + index,
        url:"../procesos/ventas/quitarProducto.php",
        success:function(r){
            $('#tablaVentasTempLoad').load("../vistas/Ventas/tablaTemp.php");
            alertify.success("Producto Eliminado");
        }
    });
}

// Hacer Venta
function crearVenta(){
    $.ajax({
        url:"../procesos/ventas/crearVenta.php",
        success:function(r){
            //alert(r);
            if(r > 0){
                $('#tablaVentasTempLoad').load("../vistas/Ventas/tablaTemp.php");
                $('#frmVentas')[0].reset();
                alertify.alert("Caja","Venta creada con exito");
                setTimeout(function(){
                    window.location.reload(1);
                 }, 2000);
                
            }else if(r==0){
                alertify.alert("Caja","No hay lista de venta!!");
            }else{
                alertify.error("Caja","No se pudo crear la venta");
            }
        }
    });
}



