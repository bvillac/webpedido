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
            //var arrayList = new Array;
            //row = new Object();
            //row.TIE_ID = data['TIE_ID'];
            //row.TIE_CUPO = data['TIE_CUPO'];
            //arrayList[0] = row;
            //sessionStorage.dts_DataTienda = JSON.stringify(arrayList);
        }
    })
}

