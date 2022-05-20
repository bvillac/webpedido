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
    //if($('#txth_cliId').val()!='4'){//Solo para clientes Marcimex
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
    //}else{
        //$("#btn_Update").addClass("disabled");
        //$("#btn_anular").addClass("disabled");
    //}
    
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
            ids: ids,
            des_com: "",
            op: "Tienda"//solo tiendas
        }
    });
    if ($('#cmb_tienda option:selected').val()!=0) {
        buscarDataTienda(ids);
    }
}

function buscarDataTienda(ids) {
    var arr_Grid = new Array();
    var link = $('#txth_controlador').val() + "/DataTienda";
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: link,
        data: {
            ids: ids,
        },
        success: function (data) {
            $('#lbl_pedido').text('Pedido Nº');
            $('#lbl_total').text('0.00');            
            if(data.data['MOSTRAR']=="SI"){
                $('#div_cupo').show();
            }else{
                $('#div_cupo').hide(); 
            }
            if (data.status == "OK") {
                $('#lbl_cupo').text(redondea(data.data['SALDO'], Ndecimal))
                $("#messageInfo").html(data.message + buttonAlert);
                //alert(data.data['TIENDA']);
                var tienda=data.data['TIENDA'];
                //Implementado Byron 22-01-2019
                if (tienda.length > 0) {
                    sessionStorage.removeItem('dts_precioTienda');
                    for (var i = 0; i < tienda.length; i++) {
                        arr_Grid[i] = objTiendas(i, tienda, false)
                        sessionStorage.dts_precioTienda = JSON.stringify(arr_Grid);
                    }
                } else {
                    sessionStorage.removeItem('dts_precioTienda');
                }
                //Implementado Byron 22-01-2019
                alerMessage();
            }
        }
    })
}

//Implementado Byron 22-01-2019
function objTiendas(c, Grid,condicion) {
    var rowGrid = new Object();
    rowGrid.ARTIE_ID = Grid[c]['ARTIE_ID'];
    rowGrid.ART_ID = Grid[c]['ART_ID'];
    rowGrid.COD_ART = Grid[c]['COD_ART'];
    rowGrid.ART_DES_COM = Grid[c]['ART_DES_COM'];//(condicion)?$('#txt_PCLI_P_VENTA').val():Grid[c]['PCLI_P_VENTA'];//Grid[c]['ART_DES_COM'];
    rowGrid.ART_P_VENTA =(condicion)?parseFloat($('#txt_PCLI_P_VENTA').val()).toFixed(Nprodecimal):Grid[c]['PCLI_P_VENTA'];
    rowGrid.CAN_DES = (condicion)?parseFloat($('#txt_cat_'.Grid[c]['ARTIE_ID']).val()).toFixed(Nprodecimal):0;
    rowGrid.ART_I_M_IVA = Grid[c]['ART_I_M_IVA'];
    rowGrid.TOTAL = (condicion)?rowGrid.CAN_DES*rowGrid.ART_P_VENTA:0;
    rowGrid.EST_MOD ="";
    rowGrid.ART_ESTADO = '1';
    return rowGrid;
}

/**************** GUARDAR DATOS PEDIDOS  ******************/
function guardarListaPedido(accion) {
    var total = parseFloat($('#lbl_total').text());
    if ($('#cmb_tienda option:selected').val() != 0 && total > 0) {
        var cupo = parseFloat($('#lbl_cupo').text());
        var saldo = cupo - total;//El cupo Disponible - el Total a pedir
        if (saldo > 0) {
            /*var statusConfirm = confirm("Opciones de envío!! \n - Presione ACEPTAR para Autorizar y enviar su Pedido \n - Presion Cancelar ");
            if (statusConfirm == true){
                alert("Eliminas");
            } else {
                alert("Haces otra cosa");
            } */
            
                
            
            
            var ID = (accion == "Update") ? $('#txth_PedID').val() : 0;
            var tieId = (accion == "Create") ? $('#cmb_tienda option:selected').val() : ID;//Cuando Es Actualizacion Retorno el Id Cabecera
            var link = $('#txth_controlador').val() + "/Save";
            $.ajax({
                type: 'POST',
                url: link,
                data: {
                    "DTS_LISTA": (accion == "Create") ? listaPedido() : listaPedidoDetTemp(),
                    "TIE_ID": tieId,
                    "TOTAL": total,
                    "ACCION": accion
                },
                success: function (data) {
                    if (data.status == "OK") {
                        $("#messageInfo").html(data.message + data.documento + buttonAlert);
                        $('#lbl_pedido').text(data.documento);
                        alerMessage();
                    } else {
                        $("#messageInfo").html(data.message + buttonAlert);
                        $('#lbl_pedido').text('');
                        alerMessage();
                    }
                },
                dataType: "json"
            });
        }else{
            alert(mgSaldoNoDis);
        }

    } else {
        alert(mgDatoNoVal);
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

function nuevaListaPedTemp() {
    location.reload();
//    var TbGtable = 'TbG_PEDIDO';
//    $('#' + TbGtable + ' tr').each(function () {
//        var idstable = $(this).find("td").eq(0).html();
//        $('#txt_cat_' + idstable).val(redondea(0, Ndecimal));
//        $(this).find("td").eq(6).html(redondea(0, Ndecimal));
//    });
//    $('#lbl_total').text('0.00');
//    $('#lbl_cupo').text('0.00');
//    $('#lbl_pedido').text('Pedido Nº');
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


/************************ GUARDAR PEDIDOS *******************/
function fun_guardarPedidoAut(){
    var ids = String($.fn.yiiGridView.getSelection('TbG_PEDIDO'));
    var count=ids.split(",");
    if(count.length>0 && ids!=""){
        if(!confirm(mgEnvPedid)) return false;
        var link=$('#txth_controlador').val()+"/EnvPedAut";
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
                    $.fn.yiiGridView.update('TbG_PEDIDO');
                    //alert(data.data.toSource());
                    
                }
            },
            dataType: "json"
        });
    }
    return true;
}


/************************ ATTENDER PEDIDOS *******************/
function fun_guardarPedidoAtendido(){
    var ids = String($.fn.yiiGridView.getSelection('TbG_PEDIDO'));
    var count=ids.split(",");
    if(count.length>0 && ids!=""){
        if(!confirm(mgEnvPedid)) return false;
        var link=$('#txth_controlador').val()+"/AtenderPed";
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
                    $.fn.yiiGridView.update('TbG_PEDIDO');
                    //alert(data.data.toSource());
                    
                }
            },
            dataType: "json"
        });
    }
    return true;
}


/************************ BUSCAR PERSONALIZADO PEDIDO A LIQUIDAR *******************/
function buscarDataliquidar(op){ 
    //var link=$('#txth_controlador').val()+"/BuscaDataLiquidar";
    var link=$('#txth_controlador').val()+"/Liquidar";
    $.fn.yiiGridView.update('TbG_PEDIDO', {
        type: 'POST',
        url:link,
        data:{
            "CONT_BUSCAR": controlBuscarLiquidar(op)
        }
    }); 
}

function controlBuscarLiquidar(op){
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


/************************ BUSCAR PERSONALIZADO DE ITEMS *******************/
function autocompletarBuscarItems(request, response,control,op){
    var link=$('#txth_controlador').val()+"/BuscarItemsTienda";
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url:link,
        data:{
            valor: $('#'+control).val(),
            op: op
        },
        success:function(data){
            var arrayList =new Array;
            var count=data.length;
            for(var i=0;i<count;i++){
                row=new Object();
                row.COD_ART=data[i]['COD_ART'];
                row.ART_DES_COM=data[i]['ART_DES_COM'];

                // Campos Importandes relacionados con el  CJuiAutoComplete
                row.id=data[i]['COD_ART'];
                row.label=data[i]['ART_DES_COM']+' - '+data[i]['COD_ART'];//+' - '+data[i]['SEGURO_SOCIAL'];//Lo sugerido
                //row.value=data[i]['IdentificacionComprador'];//lo que se almacena en en la caja de texto
                row.value=data[i]['ART_DES_COM'];//lo que se almacena en en la caja de texto
                arrayList[i] = row;
            }
            sessionStorage.src_buscItemIndex = JSON.stringify(arrayList);//dss=>DataSessionStore
            response(arrayList);  
        }
    })            
}

function buscarDataItem(control,op){ 
    control=(control=='')?'txt_codigoBuscar':control;
    var link=$('#txth_controlador').val()+"/listar";
    $.fn.yiiGridView.update('TbG_PEDIDO', {
        type: 'POST',
        url:link,
        data:{
            "op": op,//solo tiendas
            "CONT_BUSCAR": controlBuscarItems(control,op)
        }
    }); 
}

function controlBuscarItems(control,op){
    var buscarArray = new Array();
    var buscarIndex=new Object();
//    if(sessionStorage.src_buscIndex){
//        var arrayList = JSON.parse(sessionStorage.src_buscIndex);
//        buscarIndex.CEDULA=retornarIndLista(arrayList,'RazonSocialComprador',$('#'+control).val(),'IdentificacionComprador');
//    }else{
//        buscarIndex.CEDULA='';
//    }
    buscarIndex.OP=op;
    buscarIndex.DES_COM=$('#'+control).val(),
    buscarIndex.TIE_ID=$('#cmb_tienda option:selected').val();
   
    //buscarIndex.F_INI=$('#dtp_fec_ini').val();
    //buscarIndex.F_FIN=$('#dtp_fec_fin').val();
    buscarArray[0] = buscarIndex;
    return JSON.stringify(buscarArray);
}


