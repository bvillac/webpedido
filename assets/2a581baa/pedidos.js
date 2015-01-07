/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function pedidoEnterGrid(valor,control,Ids){
    if (valor) {//Si el usuario Presiono Enter= True
         control.value = redondea(control.value, Ndecimal);
         //var p_venta=parseFloat(control.value);
         var cant=control.value;
         calculaTotal(cant,Ids);
    }
}
function calculaTotal( cant,Ids) {
    var precio = 0;
    var valor=0;
    var total=0;
    var vtot=0;
    var TbGtable = 'TbG_PEDIDO';
    $('#' + TbGtable + ' tr').each(function () {
        var idstable = $(this).find("td").eq(0).html();
        if (idstable==Ids) {
            precio = $(this).find("td").eq(4).html();
            valor=redondea(precio * cant, Ndecimal);
            $(this).find("td").eq(5).html(valor);
        }
        if (idstable!='') {
            vtot=parseFloat($(this).find("td").eq(5).html());
            total+=(vtot>0)?vtot:0;
        }
    });
    $('#lbl_total').text(redondea(total, Ndecimal))
}

function mostrarListaTienda(ids) {
    var link=$('#txth_controlador').val()+"/listar";
    $.fn.yiiGridView.update('TbG_PEDIDO', {
        type: 'POST',
        url:link,
        data:{
            ids: ids
        }
    });
    if ($('#cmb_tienda option:selected').val()!=0) {
        autocompletarBuscarItems(ids);
    }
}

function autocompletarBuscarItems(ids) {
    var link = $('#txth_controlador').val() + "/DataTienda";
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: link,
        data: {
            ids: ids,
        },
        success: function (data) {
            $('#lbl_cupo').text(redondea(data['TIE_CUPO'], Ndecimal))
        }
    })
}

/**************** GUARDAR DATOS PEDIDOS  ******************/
function guardarTiendasPrecio(accion) {
    if (validateForm()) {
        //var ID = (accion == "Update") ? $('#txth_CDOR_ID').val() : 0;
        var cliId=$('#cmb_tienda option:selected').val();
        var link = $('#txth_controlador').val() + "/Save";
        $.ajax({
            type: 'POST',
            url: link,
            data: {
                "DTS_PRECIO_TIENDA": sessionStorage.dts_precioTienda,
                "CLI_ID": cliId,
                "ACCION": accion
            },
            success: function (data) {
                if (data.status == "OK") {
                    $("#messageInfo").html(data.message+buttonAlert); 
                    alerMessage();
                } else {
                    $("#messageInfo").html(data.message+buttonAlert); 
                    alerMessage();
                }
            },
            dataType: "json"
        });
    }
}

function listaPedido() {
    var TbGtable = 'TbG_PEDIDO';
    $('#' + TbGtable + ' tr').each(function () {
        var idstable = $(this).find("td").eq(0).html();
        if (idstable != '') {
            var rowGrid = new Object();
            rowGrid.ARTIE_ID = idstable;
            precio = $(this).find("td").eq(4).html();
            valor = redondea(precio * cant, Ndecimal);
            $(this).find("td").eq(5).html(valor);
        }
        if (idstable != '') {
            vtot = parseFloat($(this).find("td").eq(5).html());
            total += (vtot > 0) ? vtot : 0;
        }
    });
}
