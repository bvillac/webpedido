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
    var ids = String($.fn.yiiGridView.getSelection('TbG_TIENDA'));
    var count=ids.split(",");
    if(count.length>0 && ids!=""){
        if(count.length==1){
            $("#btn_Update").removeClass("disabled");
        }else{
            $("#btn_Update").addClass("disabled");
        }
        $("#btn_Delete").removeClass("disabled");
    }else{
        $("#btn_Update").addClass("disabled");
        $("#btn_Delete").addClass("disabled");
    }
}

function accionEnter(valor,control){
    if (valor) {//Si el usuario Presiono Enter= True
         control.value = redondea(control.value, Ndecimal);
         //var p_venta=parseFloat(control.value);
         //var p_venta=control.value;
         //actualizaGridPrecioTienda(control,p_venta)
    }
}

function fun_limpiarTienda(){
    $('#txt_TIE_NOMBRE').val('');
    $('#txt_TIE_DIRECCION').val('');
    $('#txt_TIE_TELEFONO').val('');
    $('#txt_TIE_CUPO').val('');
    $('#txt_TIE_CONTACTO').val('');
    $('#txt_TIE_LUG_ENTREGA').val('');
    $("#cmb_cliente option[value=0]").attr("selected",true);
    $("#cmb_dia_ini option[value=0]").attr("selected",true);
    $("#cmb_dia_fin option[value=0]").attr("selected",true);
}

function fun_GuardarTienda(accion) {
    if (validateForm()) {
        var ID = (accion == "Update") ? $('#txth_TIE_ID').val() : 0;
        var link = $('#txth_controlador').val() + "/Save";
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: link,
            data: {
                "DATA": objetoTienda(ID),
                "ACCION": accion
            },
            success: function (data) {
                if (data.status == "OK") {
                    $("#messageInfo").html(data.message + buttonAlert);
                    alerMessage();
                } else {
                    $("#messageInfo").html(data.message + buttonAlert);
                    alerMessage();
                }
            },
        });
    }

}

function objetoTienda(ID){
    //var tieArray = new Array();
    var tienda=new Object();
    tienda.TIE_ID=ID;
    tienda.CLI_ID=$('#cmb_cliente option:selected').val();
    tienda.TIE_NOMBRE=$('#txt_TIE_NOMBRE').val();
    tienda.TIE_DIRECCION=$('#txt_TIE_DIRECCION').val();
    tienda.TIE_TELEFONO=$('#txt_TIE_TELEFONO').val();
    tienda.TIE_CUPO=$('#txt_TIE_CUPO').val();
    tienda.FEC_INI_PED=$('#cmb_dia_ini option:selected').val();
    tienda.FEC_FIN_PED=$('#cmb_dia_fin option:selected').val();
    tienda.TIE_CONTACTO=$('#txt_TIE_CONTACTO').val();
    tienda.TIE_LUG_ENTREGA=$('#txt_TIE_LUG_ENTREGA').val();
    tienda.TIE_EST_LOG='1';
    //tieArray[0] = tienda;
    sessionStorage.tienda = JSON.stringify(tienda);
    return JSON.stringify(tienda);
}

function mostrarTienda(Data){
    $('#txt_TIE_NOMBRE').val(Data['TIE_NOMBRE']);
    $('#txt_TIE_DIRECCION').val(Data['TIE_DIRECCION']);
    $('#txt_TIE_TELEFONO').val(Data['TIE_TELEFONO']);
    $('#txt_TIE_CUPO').val(Data['TIE_CUPO']);
    $("#cmb_cliente option[value="+Data['CLI_ID']+"]").attr("selected",true);
    $("#cmb_dia_ini option[value="+Data['FEC_INI_PED']+"]").attr("selected",true);
    $("#cmb_dia_fin option[value="+Data['FEC_FIN_PED']+"]").attr("selected",true);
    $('#txt_TIE_CONTACTO').val(Data['TIE_CONTACTO']);
    $('#txt_TIE_LUG_ENTREGA').val(Data['TIE_LUG_ENTREGA']);
}

function fun_Delete(){
    var ids = String($.fn.yiiGridView.getSelection('TbG_TIENDA'));
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
                    actualizarTbG_TIENDA();
                }
            },
            dataType: "json"
        });
    }
    return true;
}

function actualizarTbG_TIENDA(){
    $.fn.yiiGridView.update('TbG_TIENDA');
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
    var id = base64_encode(String($.fn.yiiGridView.getSelection('TbG_TIENDA')));
    var count=id.split(",");
    if(count.length==1 && id!=""){
        link=$('#txth_controlador').val()+"/Update?";
        $('#btn_Update').attr("href", link+"id="+id); 
        //alert(link+"id="+id);
        //window.location =  link+"id="+id;
    }
}


function loadDataUpdate(){
        mostrarTienda(varData);
        //sessionStorage.detalleGrid = JSON.stringify(arr_detalleGrid);
}

function validateForm() {
    var result = true;
    var message = '';
    if ($('#cmb_cliente option:selected').val()==0) {
        message += 'Seleccionar Cliente,\n ';
        result = false;
    }
    if ($('#cmb_dia_ini option:selected').val()==0) {
        message += 'Seleccionar día inicio,\n ';
        result = false;
    }
    if ($('#cmb_dia_fin option:selected').val()==0) {
        message += 'Seleccionar día de fin,\n ';
        result = false;
    }
    if ($('#txt_TIE_NOMBRE').val().length==0) {
        message += 'Ingresar Nombre,\n ';
        result = false;
    }
    if ($('#txt_TIE_DIRECCION').val().length==0) {
        message += 'Ingresar Dirección,\n ';
        result = false;
    }
    if ($('#txt_TIE_TELEFONO').val().length==0) {
        message += 'Ingresar Teléfono,\n ';
        result = false;
    }
    if ($('#txt_TIE_CUPO').val().length==0) {
        message += 'Ingresar Cupo,\n ';
        result = false;
    }
    if ($('#txt_TIE_CONTACTO').val().length==0) {
        message += 'Ingresar Contacto,\n ';
        result = false;
    }
    if ($('#txt_TIE_LUG_ENTREGA').val().length==0) {
        message += 'Ingresar Lugar entrega,\n ';
        result = false;
    }
  
    //alert(message);
    if (result) {
        return result;
    } else {
        $("#messageInfo").html(message + buttonAlert);
        alerMessage();
        return result;
    }
}

function mostrarProductosTienda(ids) {
    alert($.fn.yiiGridView.getKey(0))
    if (ids > 0) {
        var tGrid = 'TbG_TIENDA';
        var link = $('#txth_controlador').val() + "/BuscarItemTienda";
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: link,
            data: {
                ids: ids
            },
            success: function (data) {
                if (data.status == "OK") {
                    var ids=data.data;
                    var count = ids.length;
                    for (var i = 0; i < count; i++) {
                        alert(ids[i]['IdsPre']);
                    }
                    //$("#messageInfo").html(data.message + buttonAlert);
                    //alerMessage();
                } else {
                    $("#messageInfo").html(data.message + buttonAlert);
                    alerMessage();
                }
            },
        });
    } else {
        alert('Seleccionar Tienda')
    }
}
function checkIdsData(Ids){//chkTienda
    //if($("#chk_antSoc_"+i).prop("checked")){//Si es verdadero Ingresa al Array
    
}

function fun_GuardarProductos(accion) {
    if ($('#cmb_tienda option:selected').val() > 0) {
        var ids = String($.fn.yiiGridView.getSelection('TbG_TIENDA'));
        var count = ids.split(",");
        if (count.length > 0 && ids != "") {
            //var ID = (accion == "Update") ? $('#txth_TIE_ID').val() : 0;
            var link = $('#txth_controlador').val() + "/SaveItems";
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: link,
                data: {
                    "DATA": objetoItemsTienda(ids),
                    "ACCION": accion
                },
                success: function (data) {
                    if (data.status == "OK") {
                        $("#messageInfo").html(data.message + buttonAlert);
                        alerMessage();
                    } else {
                        $("#messageInfo").html(data.message + buttonAlert);
                        alerMessage();
                    }
                },
            });

        }
    }else{
        alert('Seleccionar Tienda');
    }
}

function objetoItemsTienda(ids){
    //var tieArray = new Array();
    var tienda=new Object();
    tienda.IDS=ids;
    tienda.TIE_ID=$('#cmb_tienda option:selected').val();
    //sessionStorage.tienda = JSON.stringify(tienda);
    return JSON.stringify(tienda);
}


