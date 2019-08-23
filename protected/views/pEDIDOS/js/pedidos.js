/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function loadDataUpdate(){
    sessionStorage.removeItem('dts_proudate');
}

function codigoExiste(value, property, lista) {
    if (lista) {
        var array = JSON.parse(lista);
        for (var i = 0; i < array.length; i++) {
            if (array[i][property] == value) {
                return false;
            }
        }
    }
    return true;
}

function retornarIndexArray(array, property, value) {
    var index = -1;
    for (var i = 0; i < array.length; i++) {
        //alert(array[i][property]+'-'+value)
        if (array[i][property] == value) {
            index = i;
            return index;
        }
    }
    return index;
}
function findAndRemove(array, property, value) {
    for (var i = 0; i < array.length; i++) {
        if (array[i][property] == value) {
            array.splice(i, 1);
        }
    }
    return array;
}

$(document).ready(function () {
    $("#txt_codigoBuscar").keyup(function () {
        if($('#txt_codigoBuscar').val()==""){
            //alert("Handler for .keydown() called.");
            buscarDataItem("","Buscar")
        }
    });
    
    $('#rbt_si').click(function () {
        if ($(this).is(':checked')) {
            //alert("opcion si");
             $("#cmb_area").prop("disabled", true);
        }
    });
    $('#rbt_no').click(function () {
        if ($(this).is(':checked')) {
            //alert("opcion no");
            $("#cmb_area").prop("disabled", false);
        }
    });
    
    
    
    
});



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
         calcularTotalGrid();
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
function calculaTotal(cant,Ids) {
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
            editarDataItem(Ids,cant,valor)
        }
        if (idstable!='') {
            vtot=parseFloat($(this).find("td").eq(6).html());
            total+=(vtot>0)?vtot:0;
        }
    });
    $('#lbl_total').text(redondea(total, Ndecimal))
}

function editarDataItem(Ids,cant,total) {
    //Implementado Byron 28-01-2019
    var ids = "";
    var index =-1;
    if (sessionStorage.dts_precioTienda) {
        var Grid = JSON.parse(sessionStorage.dts_precioTienda);
        if (Grid.length > 0) {
            index=retornarIndexArray(JSON.parse(sessionStorage.dts_precioTienda), 'ARTIE_ID', Ids);
            if(index>-1){//si existe un valor es >-1
                Grid[index]['CAN_DES']=cant;
                Grid[index]['TOTAL']=total;
                Grid[index]['EST_MOD']="1";
                sessionStorage.dts_precioTienda = JSON.stringify(Grid);                
            }
            
        }
    }
  
}
function calcularTotalGrid(){
    var sumTotal=0;
    var cantidad=0;
    var precio=0;
    if (sessionStorage.dts_precioTienda) {
        var Grid = JSON.parse(sessionStorage.dts_precioTienda);
        if (Grid.length > 0) {
            for (var i = 0; i < Grid.length; i++) {
                cantidad=parseFloat(Grid[i]['CAN_DES']);
                precio=parseFloat(Grid[i]['ART_P_VENTA']);
                if(cantidad>0){
                   sumTotal+= cantidad*precio;
                }
            }

        }
    }
    $('#lbl_total').text(redondea(sumTotal, Ndecimal))
    
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
    rowGrid.CAN_DES = (condicion)?parseFloat($('#txt_cat_'+Grid[c]['ARTIE_ID']).val()).toFixed(Nprodecimal):0;
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
            var idsAre =($('#cmb_area option:selected').val()!=0)?$('#cmb_area option:selected').val():1;          
            var tieId = (accion == "Create") ? $('#cmb_tienda option:selected').val() : ID;//Cuando Es Actualizacion Retorno el Id Cabecera
            var link = $('#txth_controlador').val() + "/Save";
            $.ajax({
                type: 'POST',
                url: link,
                data: {
                    "DTS_LISTA": (accion == "Create") ? listaPedido() : listaPedidoDetTemp(),
                    "TIE_ID": tieId,
                    "IDS_ARE": idsAre,
                    "TOTAL": total,
                    "ACCION": accion
                },
                success: function (data) {
                    if (data.status == "OK") {
                        $("#messageInfo").html(data.message + data.documento + buttonAlert);
                        $('#lbl_pedido').text(data.documento);
                        alerMessage();
                        //link=$('#txth_controlador').val()+"/consultar";
                        //window.location =  link;
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
    var c=0;
    
    //Usa los datos del Session Stores
    if (sessionStorage.dts_precioTienda) {
        var Grid = JSON.parse(sessionStorage.dts_precioTienda);
        if (Grid.length > 0) {
            for (var i = 0; i < Grid.length; i++) {                
                if(parseFloat(Grid[i]['CAN_DES'])>0){//$('#txt_cat_'.Grid[c]['ARTIE_ID']).val()
                    var ids=Grid[i]['ARTIE_ID'];
                    var rowGrid = new Object();
                    rowGrid.ARTIE_ID = Grid[i]['ARTIE_ID'];
                    rowGrid.ART_ID = Grid[i]['ART_ID'];
                    rowGrid.CANT = Grid[i]['CAN_DES'];
                    rowGrid.PRECIO = Grid[i]['ART_P_VENTA'];
                    rowGrid.TOTAL = redondea(Grid[i]['TOTAL'], Ndecimal);
                    rowGrid.OBSERV = $('#txt_obs_' + ids).val();
                    arrayList[c] = rowGrid;
                    c += 1;
                }
            }    
        }
    }
    return JSON.stringify(arrayList);
}

function nuevaListaPedTemp() {
    location.reload();
}

function listaPedidoDetTemp() {
    var TbGtable = 'TbG_PEDIDO';
    var arrayList = new Array;
    var i = -1;
    $('#' + TbGtable + ' tr').each(function () {
        var idstable = $(this).find("td").eq(1).html();
        if (idstable != '') {
            //var subtotal = parseFloat($(this).find("td").eq(7).html());           
            var subtotal = parseFloat($(this).find("td").eq(6).html());//LA COLUMNA DE SUB-TOTAL
            if (subtotal > 0) {
                var rowGrid = new Object();
                i += 1;
                rowGrid.ARTIE_ID = $(this).find("td").eq(0).html();//Grid[i]['ARTIE_ID'];
                rowGrid.ART_ID = $(this).find("td").eq(1).html();//Grid[i]['ART_ID'];
                rowGrid.CANT = $('#txt_cat_' + idstable).val();//Grid[i]['CAN_DES'];
                rowGrid.PRECIO = $(this).find("td").eq(5).html();//Grid[i]['ART_P_VENTA'];
                rowGrid.TOTAL = redondea(rowGrid.CANT*rowGrid.PRECIO, Ndecimal);//redondea(Grid[i]['TOTAL'], Ndecimal);
                rowGrid.OBSERV = $('#txt_obs_' + idstable).val();
                //rowGrid.DetId = 0;//idstable;
                //rowGrid.CANT = $('#txt_cat_' + idstable).val();
                //rowGrid.TOTAL = redondea(subtotal, Ndecimal);
                //rowGrid.OBSERV = $('#txt_obs_' + idstable).val();
                arrayList[i] = rowGrid;
            }

        }
    });
    return JSON.stringify(arrayList);
    
    
     if (sessionStorage.dts_precioTienda) {
        var Grid = JSON.parse(sessionStorage.dts_precioTienda);
        if (Grid.length > 0) {
            for (var i = 0; i < Grid.length; i++) {                
                if(parseFloat(Grid[i]['CAN_DES'])>0){//$('#txt_cat_'.Grid[c]['ARTIE_ID']).val()
                    var ids=Grid[i]['ARTIE_ID'];
                    var rowGrid = new Object();
                    rowGrid.ARTIE_ID = Grid[i]['ARTIE_ID'];
                    rowGrid.ART_ID = Grid[i]['ART_ID'];
                    rowGrid.CANT = Grid[i]['CAN_DES'];
                    rowGrid.PRECIO = Grid[i]['ART_P_VENTA'];
                    rowGrid.TOTAL = redondea(Grid[i]['TOTAL'], Ndecimal);
                    rowGrid.OBSERV = $('#txt_obs_' + ids).val();
                    arrayList[c] = rowGrid;
                    c += 1;
                }
            }    
        }
    }
    
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
function fun_guardarPedidoAut(EstPed){
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
                "ids": ids,
                "EstPed": EstPed
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
function autocompletarBuscarItems(request, response, control, op) {
    if ($('#cmb_tienda option:selected').val() != 0) {
        var link = $('#txth_controlador').val() + "/BuscarItemsTienda";
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: link,
            data: {
                valor: $('#' + control).val(),
                tie_id: $('#cmb_tienda option:selected').val(),
                op: op
            },
            success: function (data) {
                var arrayList = new Array;
                var count = data.length;
                for (var i = 0; i < count; i++) {
                    row = new Object();
                    row.COD_ART = data[i]['COD_ART'];
                    row.ART_DES_COM = data[i]['ART_DES_COM'];

                    // Campos Importandes relacionados con el  CJuiAutoComplete
                    row.id = data[i]['COD_ART'];
                    row.label = data[i]['ART_DES_COM'] + ' - ' + data[i]['COD_ART'];//+' - '+data[i]['SEGURO_SOCIAL'];//Lo sugerido
                    //row.value=data[i]['IdentificacionComprador'];//lo que se almacena en en la caja de texto
                    row.value = data[i]['ART_DES_COM'];//lo que se almacena en en la caja de texto
                    arrayList[i] = row;
                }
                sessionStorage.src_buscItemIndex = JSON.stringify(arrayList);//dss=>DataSessionStore
                response(arrayList);
            }
        })

    } else {

    }

}

function buscarDataItem(control, op) {
    control = (control == '') ? 'txt_codigoBuscar' : control;
    var link = $('#txth_controlador').val() + "/listar";
    $.fn.yiiGridView.update('TbG_PEDIDO', {
        type: 'POST',
        url: link,
        data: {
            "op": op, //solo tiendas
            "CONT_BUSCAR": controlBuscarItems(control, op)
        },
        complete:function() {
             //$.fn.yiiGridView.update('item-grid');
             actualizarDataTienda();
             calcularTotalGrid();
           },
    });
}

function actualizarDataTienda() {
    var ids='';
    var cant=0;
    if (sessionStorage.dts_precioTienda) {
        var Grid = JSON.parse(sessionStorage.dts_precioTienda);
        if (Grid.length > 0) {
            for (var i = 0; i < Grid.length; i++) {                
                if(parseFloat(Grid[i]['CAN_DES'])>0){//$('#txt_cat_'.Grid[c]['ARTIE_ID']).val()
                    ids=Grid[i]['ARTIE_ID'];
                    cant=Grid[i]['CAN_DES'];
                    $('#txt_cat_'+ids).val(cant);
                     calTotalItem(cant,ids);
                }
            }    
        }
    }

}

function calTotalItem(cant,Ids) {
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
            return;
        }
        
    });
    
}

function mostrarListaTiendaBuscar(ids) {
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
    buscarIndex.DES_COM=($('#'+control).val()!="")?$('#'+control).val():"";
    buscarIndex.TIE_ID=$('#cmb_tienda option:selected').val();
   
    //buscarIndex.F_INI=$('#dtp_fec_ini').val();
    //buscarIndex.F_FIN=$('#dtp_fec_fin').val();
    buscarArray[0] = buscarIndex;
    return JSON.stringify(buscarArray);
}


/************** BUSCAR REVISAR **************/
function fun_buscarDataRevisar(op){ 
    var link=$('#txth_controlador').val()+"/revisaradmin";
    //alert(link);
    $.fn.yiiGridView.update('TbG_RESUMEN', {
        type: 'POST',
        url:link,
        data:{
            "CONT_BUSCAR": controlBuscarResumen(op)
        }
    }); 
    if($('#cmb_area option:selected').val()==0){
        calTotalGrupo(4);
    }else{
        calTotalGrupo(7);
    }
    
}

function controlBuscarResumen(op){
    var buscarArray = new Array();
    var buscarIndex=new Object();
    buscarIndex.OP=op;
    buscarIndex.TIE_ID=$('#cmb_tienda option:selected').val();
    buscarIndex.CLI_ID=$('#cmb_cliente option:selected').val();
    buscarIndex.EST_LOG=$('#cmb_estado option:selected').val();
    //buscarIndex.IDS_ARE=$('#cmb_area option:selected').val();
    //$("#radio_1").prop("checked", true);
    
    if($("#rbt_si").is(":checked")){
        buscarIndex.OP=0;
    }else{
        buscarIndex.OP=1;
    }
    buscarIndex.IDS_ARE=$('#cmb_area option:selected').val();
    
    buscarIndex.F_INI=$('#dtp_fec_ini').val();
    buscarIndex.F_FIN=$('#dtp_fec_fin').val();
    //buscarIndex.EST_LOG=1;
    //buscarIndex.ROL_ID=$('#cmb_rol option:selected').val();
    buscarArray[0] = buscarIndex;
    return JSON.stringify(buscarArray);
}

function mostrarListaTiendaAdmin(ids) {
    if (ids > 0) {
        var link=$('#txth_controlador').val()+"/ClienteTienda";
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: link,
            data: {
                "DATA": ids,
            },
            success: function (data) {
                var str='<option value="0">TODOS</option>';
                if (data.length>0){
                    for (var i = 0; i < data.length; i++) {
                        str+='<option value="'+data[i]['TIE_ID']+'">'+data[i]['TIE_NOMBRE']+'</option>';
                    }
                }
                $("#cmb_tienda").html(str);
            },
        });
        mostrarListaArea(ids);
    }

}

function mostrarListaArea() {
    var ids=$('#cmb_cliente option:selected').val();
    if (ids > 0) {
        var link=$('#txth_controlador').val()+"/ClienteAreas";
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: link,
            data: {
                "DATA": ids,
            },
            success: function (data) {
                var str='<option value="0">AGRUPADO</option>';
                if (data.length>0){
                    for (var i = 0; i < data.length; i++) {
                        str+='<option value="'+data[i]['IDS_ARE']+'">'+data[i]['NOM_ARE']+'</option>';
                    }
                }
                $("#cmb_area").html(str);
            },
        });
    }

}

function fun_guardarPedidoAutGrupo(){
    var ids = String($.fn.yiiGridView.getSelection('TbG_RESUMEN'));
    var op =0;
    var count=ids.split(",");
    if(count.length>0 && ids!=""){
        if(!confirm(mgEnvPedid)) return false;
        if($("#rbt_si").is(":checked")){
            op=1;
        }else{
            op=0;
        }
        var link=$('#txth_controlador').val()+"/EnvPedAutGrupo";
        //var encodedIds = base64_encode(ids);  //Verificar cofificacion Base
        $.ajax({
            type: 'POST',
            url: link,
            data:{
                "ids": ids,
                "op": op,//$('#cmb_area option:selected').val(),
                "f_ini":$('#dtp_fec_ini').val(),
                "f_fin":$('#dtp_fec_fin').val()
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

function calTotalGrupo(col) { 
    var total=0;
    var TbGtable = 'TbG_RESUMEN';
    $('#' + TbGtable + ' tr').each(function () {
        var valor = $(this).find("td").eq(col).html();
        //alert(valor);
        if (typeof valor !== "undefined") {
            //alert($(this).find("td").eq(col).html());
            total=total+parseFloat(valor);
        }
        
    });
    $('#lbl_total').text(redondea(total, Ndecimal))
    
}

function fun_enviarComentario(){
    
    var Coment = $('#txt_mensaje').val();
    if(Coment !=""){
        if(!confirm('Está seguro que desea Enviar este Mensaje')) return false;
        var link=$('#txth_controlador').val()+"/comentario";
        //var encodedIds = base64_encode(ids);  //Verificar cofificacion Base
        $.ajax({
            type: 'POST',
            url: link,
            data:{
                "info": Coment             
            } ,
            success: function(data){
                if (data.status=="OK"){ 
                    $("#messageInfo").html(data.message+buttonAlert); 
                    alerMessage();                    
                    //alert(data.data.toSource());
                }
            },
            dataType: "json"
        });
    }
    return true;
    
}

/****************** ACTUALIZAR ITEMS *******************/
function autocompletarBuscarItemsUpdate(request, response, control, op) {
    var link = $('#txth_controlador').val() + "/BuscarItemsUpdate";
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: link,
        data: {
            valor: $('#' + control).val(),
            tie_id: $('#txth_TieID').val(),
            op: op
        },
        success: function (data) {
            var arrayList = new Array;
            var count = data.length;
            for (var i = 0; i < count; i++) {
                row = new Object();
                row.COD_ART = data[i]['COD_ART'];
                row.ART_ID = data[i]['ART_ID'];
                row.ARTIE_ID = data[i]['ARTIE_ID'];
                row.ART_DES_COM = data[i]['ART_DES_COM'];
                row.PCLI_P_VENTA = data[i]['PCLI_P_VENTA'];

                // Campos Importandes relacionados con el  CJuiAutoComplete
                row.id = data[i]['COD_ART'];
                row.label = data[i]['ART_DES_COM'] + ' - ' + data[i]['COD_ART'] + ' - Precio:$' + data[i]['PCLI_P_VENTA'];
                //row.value=data[i]['IdentificacionComprador'];//lo que se almacena en en la caja de texto
                row.value = data[i]['ART_DES_COM'];//lo que se almacena en en la caja de texto
                arrayList[i] = row;
            }
            sessionStorage.src_buscItemUpdate = JSON.stringify(arrayList);//dss=>DataSessionStore
            response(arrayList);
        }
    })
}

function guardarListaPedidoUpdate(accion) {
    var total = parseFloat($('#lbl_total').text());
    var cupo = parseFloat($('#lbl_cupo').text());
    var saldo = cupo - total;//El cupo Disponible - el Total a pedir
    if (saldo > 0) {       
        var ID = $('#txth_PedID').val();//(accion == "Update") ? $('#txth_PedID').val() : 0;       
        var tieId = $('#txth_TieID').val();// (accion == "Create") ?  $('#txth_TieID').val() : 0;  
        var link = $('#txth_controlador').val() + "/Save";
        //"DTS_LISTA": (accion == "Create") ? listaPedido() : listaPedidoDetTemp(),
        $.ajax({
            type: 'POST',
            url: link,
            data: {
                "PED_ID": ID,
                "DTS_LISTA": listaPedidoDetTemp(),
                "TIE_ID": tieId,
                "TOTAL": total,
                "ACCION": accion
            },
            success: function (data) {
                if (data.status == "OK") {
                    $("#messageInfo").html(data.message + data.documento + buttonAlert);
                    $('#lbl_pedido').text(data.documento);
                    alerMessage();
                    //link=$('#txth_controlador').val()+"/consultar";
                    //window.location =  link;
                } else {
                    $("#messageInfo").html(data.message + buttonAlert);
                    $('#lbl_pedido').text('');
                    alerMessage();
                }
            },
            dataType: "json"
        });
    } else {
        alert(mgSaldoNoDis);
    }


}



function agregarItemsTiendasUpdate(opAccion) {
    var tGrid = 'TbG_PEDIDO';
    var nombre = $('#txt_codigoBuscarItem').val();
    if ($('#txt_codigoBuscarItem').val() != "") {
        var valor = $('#txt_codigoBuscarItem').val();
        if(!existeItmeUpdate(valor,tGrid)){
            //alert('ingreso');
            //Compara con el Detalle de la lista
            $("#messageInfo").html('Item ya existe en su lista ' + buttonAlert);
            alerMessage();
            return;
        }
        if (opAccion != "edit") {
            //*********   AGREGAR ITEMS *********
            var arr_Grid = new Array();
            var indiceBusc = retornarIndexArray(JSON.parse(sessionStorage.src_buscItemUpdate), 'ART_DES_COM', valor);
            if (sessionStorage.dts_proudate) {
                /*Agrego a la Sesion*/
                arr_Grid = JSON.parse(sessionStorage.dts_proudate);
                var size = arr_Grid.length;
                if (size > 0) {
                    //Varios Items
                    if (codigoExiste(nombre, 'ART_DES_COM', sessionStorage.dts_proudate)) {//Verifico si el Codigo Existe  para no Dejar ingresar Repetidos
                        //alert('si entro');
                        arr_Grid[size] = objProDetalle(indiceBusc, JSON.parse(sessionStorage.src_buscItemUpdate),true);
                        sessionStorage.dts_proudate = JSON.stringify(arr_Grid);
                        addVariosItemProDet(tGrid, arr_Grid, size);
                        
                        limpiarTexbox();
                    } else {
                        $("#messageInfo").html('Item ya existe en su lista ' + buttonAlert);
                        alerMessage();
                    }
                } else {
           
                    /*Agrego a la Sesion*/
                    //Primer Items
                    arr_Grid[0] = objProDetalle(indiceBusc, JSON.parse(sessionStorage.src_buscItemUpdate),true);
                    sessionStorage.dts_proudate = JSON.stringify(arr_Grid);
                    addPrimerItemProDet(tGrid, arr_Grid, 0);
                    limpiarTexbox();
                }
            } else {
                //No existe la Session
                //Primer Items
                arr_Grid[0] = objProDetalle(indiceBusc, JSON.parse(sessionStorage.src_buscItemUpdate),true);
                sessionStorage.dts_proudate = JSON.stringify(arr_Grid);
                addPrimerItemProDet(tGrid, arr_Grid, 0);
                limpiarTexbox();
            }

        } else {
            //data
        }
        recalculaTotalPedTemp();
    } else {
        $("#messageInfo").html('No existe Informacion ' + buttonAlert);
        alerMessage();
    }
}

function existeItmeUpdate(val,TbGtable){
    var ids = "";
    $('#' + TbGtable + ' tr').each(function () {
        ids = $(this).find("td").eq(3).html();//Compara con el Detalle de la lista
        if (val == ids) {
            //alert('si existe')
            return true;//si existe
        }        
    });
    return false;
}


function objProDetalle(c, Grid,condicion) {
    //.TDPED_ID DetId,A.ART_ID ArtId,A.TDPED_CAN_PED Cantidad,A.TDPED_P_VENTA Precio,
    //A.TDPED_T_VENTA TotVta,A.TDPED_EST_AUT EstAut,A.TDPED_OBSERVA Observacion,B.COD_ART Codigo,
    //B.ART_DES_COM Nombre,B.ART_I_M_IVA ImIva
    
    var rowGrid = new Object();
    rowGrid.TDPED_ID = Grid[c]['TDPED_ID'];
    rowGrid.ART_ID = Grid[c]['ART_ID'];
    rowGrid.ARTIE_ID = Grid[c]['ARTIE_ID'];
    rowGrid.COD_ART = Grid[c]['COD_ART'];    
    rowGrid.ART_DES_COM = Grid[c]['ART_DES_COM'];    
    rowGrid.TDPED_P_VENTA =Grid[c]['PCLI_P_VENTA'];//(condicion)?parseFloat($('#txt_TDPED_P_VENTA').val()).toFixed(Nprodecimal):Grid[c]['TDPED_P_VENTA'];
    rowGrid.TDPED_CAN_PED = $('#txt_cantidad').val();//(condicion)?parseFloat($('#txt_cat_'+Grid[c]['TDPED_ID']).val()).toFixed(Nprodecimal):0;    
    rowGrid.ART_I_M_IVA = Grid[c]['ART_I_M_IVA'];
    rowGrid.TOTAL = (condicion)?redondea(rowGrid.TDPED_CAN_PED*rowGrid.TDPED_P_VENTA,Ndecimal):0;

    rowGrid.TDPED_OBSERVA =Grid[c]['TDPED_OBSERVA'];
    rowGrid.EST_MOD ="";
    rowGrid.TDPED_EST_AUT = '1';
    return rowGrid;
}

function addPrimerItemProDet(TbGtable, lista, i) {
    /*Remuevo la Primera fila*/
    //$('#' + TbGtable + ' >table >tbody').html("");//borar toda el grid
    /*Agrego a la Tabla de Detalle*/
    //$('#'+TbGtable+' >table >tbody').append(retornaFilaTiendas(i,lista,TbGtable,true));
    $('#' + TbGtable+' >table >tbody').append(retornaFilaItemProDet(i, lista, TbGtable, true));
}

function addVariosItemProDet(TbGtable, lista, i) {
    //alert($('#' + TbGtable + ' tr').length);//extare el total de filas
    //i = (i == -1) ? ($('#' + TbGtable + ' tr').length) - 1 : i;
    //$('#'+TbGtable+' >table >tbody').append(retornaFilaTiendas(i,lista,TbGtable,true));
    $('#' + TbGtable+ ' >table >tbody' ).append(retornaFilaItemProDet(i, lista, TbGtable, true));
}

function retornaFilaItemProDet(c, Grid, TbGtable, op) {

    var RutaImagenAccion = $('#txth_rutaImg').val();    
    var strFila = "";
    var imgCol = '<img class="btn-img" src="' + RutaImagenAccion + '/acciones/delete.png" >';
    //var imgCol2 = '<img class="btn-img" src="' + RutaImagenAccion + '/acciones/edit16.png" >';
    //strFila += '<td class="checkbox-column">';
        //strFila += '<input class="select-on-check" value="' + Grid[c]['TDPED_ID'] + '" id="TbG_PEDIDO_c0_'+c+'" type="checkbox" name="TbG_PEDIDO_c'+c+'[]">';
        //strFila += '<input class="select-on-check" value="0" id="TbG_PEDIDO_c0_'+c+'" type="checkbox" name="TbG_PEDIDO_c'+c+'[]">';
    //strFila += '</td>';
    //strFila += '<td style="display:none; border:none;">' + Grid[c]['TDPED_ID'] + '</td>'; 
    strFila += '<td style="display:none; border:none;">' + Grid[c]['ARTIE_ID'] + '</td>'; 
    strFila += '<td style="display:none; border:none;">' + Grid[c]['ART_ID'] + '</td>';    
    strFila += '<td width="5px" style="text-align: left">' + Grid[c]['COD_ART'] + '</td>';
    strFila += '<td style="text-align:left">' + Grid[c]['ART_DES_COM'] + '</td>';
    
    strFila += '<td style="text-align:right" width="8px">'; 
        strFila += '<input size="8" maxlength="20" placeholder="0" class="txt_TextboxNumber2 validation_Vs" '; 
        strFila += 'type="text" value="' + Grid[c]['TDPED_CAN_PED'] + '" name="txt_cat_' + Grid[c]['ART_ID'] + '" id="txt_cat_' + Grid[c]['ART_ID'] + '" ';
        strFila += 'onkeydown="pedidoEnterGridTemp(isEnter(event),this,' + Grid[c]['ART_ID'] + ')" '; 
        strFila += 'onblur="pedidoEnterGridTemp(isEnter(event),this,' + Grid[c]['ART_ID'] + ')" > '; 
    strFila += '</td>';
    strFila += '<td style="text-align:right" width="8px">' + Grid[c]['TDPED_P_VENTA'] + '</td>'; 
    strFila += '<td style="text-align:right" width="30px">' + redondea(Grid[c]['TOTAL'],Ndecimal)+ '</td>';
    //    redondea(Grid[i]['TOTAL'], Ndecimal);
    strFila += '<td style="text-align:center" width="200px"> '; 
        strFila += '<input size="30" maxlength="300" placeholder="..." class="validation_Vs" type="text" value="" name="txt_obs_' + Grid[c]['ART_ID'] + '" id="txt_obs_' + Grid[c]['ART_ID'] + '"> '; 
    strFila += '</td>'; 
    strFila += '<td style="text-align:center" width="8px">Activo</td>';
    strFila += '<td width="40px">';
        strFila += '<a data-lightbox="' + Grid[c]['COD_ART'] + '_G-01" href="' + RutaImagenAccion + 'productos/' + Grid[c]['COD_ART'] + '_G-01.jpg">';
            strFila += '<img src="' + RutaImagenAccion + 'productos/' + Grid[c]['COD_ART'] + '_P-01.jpg" width="40px" height="40px">';
        strFila += '</a>';
    strFila += '</td>';
    strFila += '<td width="36px" style="text-align:center">';    
    strFila += '<a class="btn-img" onclick="eliminarItemsListas(' + Grid[c]['ART_ID'] + ',\'' + TbGtable + '\')" >' + imgCol + '</a>';
    strFila += '</td>';
 
    if (op) {
        strFila = '<tr class="odd">' + strFila + '</tr>';//gradeX
    }
    return strFila;
}

function limpiarTexbox() {
    $('#txt_codigoBuscarItem').val("");
    $('#txt_cantidad').val("");
}

function eliminarItemsListas(val, TbGtable) {    
    var ids = "";
    if (sessionStorage.dts_proudate) {
        var Grid = JSON.parse(sessionStorage.dts_proudate);
        if (Grid.length > 0) {
            //$('#'+TbGtable+' >table >tbody >tr').each(function () {
            $('#' + TbGtable + ' tr').each(function () {
                ids = $(this).find("td").eq(1).html();
                if (ids == val) {
                    var array = findAndRemove(Grid, 'ART_ID', ids);
                    sessionStorage.dts_proudate = JSON.stringify(array);
                    //if (count==0){sessionStorage.removeItem('detalleGrid')} 
                    $(this).remove();
                    recalculaTotalPedTemp();
                }
            });
        }else{
            //en el caso de que no este en el storage y se elimine directamente
            //$(this).remove();
            removerFila(val,TbGtable);
        }
    }else{
        //en el caso de que no este en el storage y se elimine directamente
        removerFila(val,TbGtable);
    }
}
function removerFila(val,TbGtable){
    var ids = "";
    $('#' + TbGtable + ' tr').each(function () {
        ids = $(this).find("td").eq(1).html();
        if (ids == val) {
            $(this).remove();
            recalculaTotalPedTemp();
        }
        
    });
}

function recalculaTotalPedTemp() {
    var precio = 0;
    var ids=0;
    var valor=0;
    var total=0;
    var vtot=0;
    var cant=0;
    var TbGtable = 'TbG_PEDIDO';
    $('#' + TbGtable + ' tr').each(function () {
            ids=$(this).find("td").eq(1).html();            
            precio = $(this).find("td").eq(5).html();
            cant=$('#txt_cat_'+ids).val()
            valor=redondea(precio * cant, Ndecimal);
            $(this).find("td").eq(6).html(valor);  
            //vtot=parseFloat($(this).find("td").eq(7).html());
            total+=parseFloat(valor);//(vtot>0)?vtot:0;            
    });
    $('#lbl_total').text(redondea(total, Ndecimal))
}
