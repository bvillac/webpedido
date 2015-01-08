/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function fun_Nuevo(accion){
    var link="";
    link=$('#txth_controlador').val()+"/create";
    $('#btn_nuevo').attr("href", link);
}

function verificaAcciones(){
    var ids = String($.fn.yiiGridView.getSelection('TbG_PEDIDO'));
    var count=ids.split(",");
    if(count.length>0 && ids!=""){
        if(count.length==1){
            $("#btn_Update").removeClass("disabled");
        }else{
            $("#btn_Update").addClass("disabled");
        }
        $("#btn_anular").removeClass("disabled");
    }else{
        $("#btn_Update").addClass("disabled");
        $("#btn_anular").addClass("disabled");
    }
}

function accionPedido(){
    var ids = String($.fn.yiiGridView.getSelection('TbG_PEDIDO'));
    var count=ids.split(",");
    if(count.length>0 && ids!=""){
        $("#btn_anular").removeClass("disabled");
    }else{
        $("#btn_anular").addClass("disabled");
    }
}

function pedidoEnterGrid(valor,control,Ids){
    if (valor) {//Si el usuario Presiono Enter= True
         control.value = redondea(control.value, Ndecimal);
         //var p_venta=parseFloat(control.value);
         var cant=control.value;
         calculaTotal(cant,Ids);
    }
}
function pedidoEnterGridTemp(valor,control,Ids){
    if (valor) {//Si el usuario Presiono Enter= True
         control.value = redondea(control.value, Ndecimal);
         //var p_venta=parseFloat(control.value);
         var cant=control.value;
         calculaTotalPedTemp(cant,Ids);
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
            precio = $(this).find("td").eq(5).html();
            valor=redondea(precio * cant, Ndecimal);
            $(this).find("td").eq(6).html(valor);
        }
        if (idstable!='') {
            vtot=parseFloat($(this).find("td").eq(6).html());
            total+=(vtot>0)?vtot:0;
        }
    });
    $('#lbl_total').text(redondea(total, Ndecimal))
}

function calculaTotalPedTemp(cant,Ids) {
    var precio = 0;
    var valor=0;
    var total=0;
    var vtot=0;
    var TbGtable = 'TbG_PEDIDO';
    $('#' + TbGtable + ' tr').each(function () {
        var idstable = $(this).find("td").eq(1).html();
        if (idstable==Ids) {
            precio = $(this).find("td").eq(6).html();
            valor=redondea(precio * cant, Ndecimal);
            $(this).find("td").eq(7).html(valor);
        }
        if (idstable!='') {
            vtot=parseFloat($(this).find("td").eq(7).html());
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
        buscarDataTienda(ids);
    }
}

function buscarDataTienda(ids) {
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
            $('#lbl_pedido').text('Pedido Nº');
            $('#lbl_total').text('0.00');
        }
    })
}

/**************** GUARDAR DATOS PEDIDOS  ******************/
function guardarListaPedido(accion) {
    if ($('#cmb_tienda option:selected').val()!=0) {
        var ID = (accion == "Update") ? $('#txth_PedID').val() : 0;
        var tieId=(accion == "Create") ?$('#cmb_tienda option:selected').val():ID;//Cuando Es Actualizacion Retorno el Id Cabecera
        var link = $('#txth_controlador').val() + "/Save";
        $.ajax({
            type: 'POST',
            url: link,
            data: {
                "DTS_LISTA": (accion == "Create") ?listaPedido():listaPedidoDetTemp(),
                "TIE_ID": tieId,
                "TOTAL": $('#lbl_total').text(),
                "ACCION": accion
            },
            success: function (data) {
                if (data.status == "OK") {
                    $("#messageInfo").html(data.message+data.documento+buttonAlert);
                    $('#lbl_pedido').text(data.documento);
                    alerMessage();
                } else {
                    $("#messageInfo").html(data.message+buttonAlert); 
                    $('#lbl_pedido').text('');
                    alerMessage();
                }
            },
            dataType: "json"
        });
    }
}

function fun_DeletePedido(){
    var ids = String($.fn.yiiGridView.getSelection('TbG_PEDIDO'));
    var count=ids.split(",");
    if(count.length>0 && ids!=""){
        if(!confirm(mgEliminar)) return false;
        var link=$('#txth_controlador').val()+"/Delete";
        //var encodedIds = base64_encode(ids);  //Verificar cofificacion Base
        $.ajax({
            type: 'POST',
            url: link,
            data:{
                "ids": ids
            } ,
            success: function(data){
                if (data.status=="OK"){ 
                    $("#messageInfo").html(data.message+buttonAlert); 
                    alerMessage();
                    actualizarTbG_PEDIDO();
                }
            },
            dataType: "json"
        });
    }
    return true;
}

function actualizarTbG_PEDIDO(){
    $.fn.yiiGridView.update('TbG_PEDIDO');
    /*var link=$('#txth_controlador').val()+"/Index";
    $.fn.yiiGridView.update('TbG_COMPANIA', {
        type: 'POST',
        url:link,
        data:{
            //"CONT_BUSCAR": controlBuscarIndex(control,op)
        }
    }); */
}

function fun_Update(){
    var link="";
    var id = base64_encode(String($.fn.yiiGridView.getSelection('TbG_PEDIDO')));
    var count=id.split(",");
    if(count.length==1 && id!=""){
        link=$('#txth_controlador').val()+"/Update?";
        $('#btn_Update').attr("href", link+"id="+id); 
        //alert(link+"id="+id);
        //window.location =  link+"id="+id;
    }
}


function listaPedido() {
    var TbGtable = 'TbG_PEDIDO';
    var arrayList = new Array;
    var i = -1;
    $('#' + TbGtable + ' tr').each(function () {
        var idstable = $(this).find("td").eq(0).html();
        if (idstable != '') {
            var subtotal = parseFloat($(this).find("td").eq(6).html());
            if (subtotal > 0) {
                var rowGrid = new Object();
                i += 1;
                rowGrid.ARTIE_ID = idstable;
                rowGrid.ART_ID = $(this).find("td").eq(1).html();
                rowGrid.CANT = $('#txt_cat_' + idstable).val();
                rowGrid.PRECIO = $(this).find("td").eq(5).html();
                rowGrid.TOTAL = redondea(subtotal, Ndecimal);
                rowGrid.OBSERV = $('#txt_obs_' + idstable).val();
                arrayList[i] = rowGrid;
            }

        }
    });
    return JSON.stringify(arrayList);
}

function listaPedidoDetTemp() {
    var TbGtable = 'TbG_PEDIDO';
    var arrayList = new Array;
    var i = -1;
    $('#' + TbGtable + ' tr').each(function () {
        var idstable = $(this).find("td").eq(1).html();
        if (idstable != '') {
            var subtotal = parseFloat($(this).find("td").eq(7).html());
            if (subtotal > 0) {
                var rowGrid = new Object();
                i += 1;
                rowGrid.DetId = idstable;
                rowGrid.CANT = $('#txt_cat_' + idstable).val();
                rowGrid.TOTAL = redondea(subtotal, Ndecimal);
                rowGrid.OBSERV = $('#txt_obs_' + idstable).val();
                arrayList[i] = rowGrid;
            }

        }
    });
    return JSON.stringify(arrayList);
}

/**********************  PEDIDOS TEMPORALES  *********************/

function fun_AnularItemPedido(){
    var ids = String($.fn.yiiGridView.getSelection('TbG_PEDIDO'));
    var count=ids.split(",");
    if(count.length>0 && ids!=""){
        if(!confirm(mgEliminar)) return false;
        var link=$('#txth_controlador').val()+"/AnuItemPedTemp";
        //var encodedIds = base64_encode(ids);  //Verificar cofificacion Base
        $.ajax({
            type: 'POST',
            url: link,
            data:{
                "ids": ids
            } ,
            success: function(data){
                if (data.status=="OK"){ 
                    $("#messageInfo").html(data.message+buttonAlert); 
                    alerMessage();
                    anularItemPedidoTemp(ids);
                    //actualizarTbG_PEDIDO();
                    //$.fn.yiiGridView.update('TbG_PEDIDO');
                }
            },
            dataType: "json"
        });
    }
    return true;
}

function anularItemPedidoTemp(Ids) {
    var elem=Ids.split(",")
    var i=0;
    var TbGtable = 'TbG_PEDIDO';
    $('#' + TbGtable + ' tr').each(function () {
        var idstable = $(this).find("td").eq(1).html();
        if (idstable!='') {
            if(idstable==elem[i]){
                $(this).find("td").eq(9).html('Inactivo');
                $('#txt_cat_' + idstable).val(redondea(0, Ndecimal));
                $('#txt_cat_' + idstable).attr("disabled", true);
                calculaTotalPedTemp(0,idstable);
                i++;
            }
        }
    });
}

/************************ BUSCAR PERSONALIZADO PEDIDO TEMPORALES *******************/
function buscarDataIndex(op){ 
    var link=$('#txth_controlador').val()+"/BuscaDataIndex";
    $.fn.yiiGridView.update('TbG_PEDIDO', {
        type: 'POST',
        url:link,
        data:{
            "CONT_BUSCAR": controlBuscarIndex(op)
        }
    }); 
}

function controlBuscarIndex(op){
    var buscarArray = new Array();
    var buscarIndex=new Object();
    buscarIndex.OP=op;
    buscarIndex.TIE_ID=$('#cmb_tienda option:selected').val();
    buscarIndex.EST_LOG=$('#cmb_estado option:selected').val();
    buscarIndex.F_INI=$('#dtp_fec_ini').val();
    buscarIndex.F_FIN=$('#dtp_fec_fin').val();
    buscarArray[0] = buscarIndex;
    return JSON.stringify(buscarArray);
}
