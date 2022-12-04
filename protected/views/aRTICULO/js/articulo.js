

/************** BUSCAR USUARIO ITEMS **************/
function fun_buscarItems(op){ 
    var link=$('#txth_controlador').val()+"/items";
    $.fn.yiiGridView.update('TbG_ARTICULO', {
        type: 'POST',
        url:link,
        data:{
            "CONT_BUSCAR": controlBuscarItems(op)
        }
    }); 
}

function controlBuscarItems(op){
    //var buscarArray = new Array();
    var buscarIndex=new Object();
    buscarIndex.OP=op;
    //buscarIndex.TIE_ID=$('#cmb_tienda option:selected').val();
    buscarIndex.DET_NOM=$('#txt_nombreUser').val();
    //buscarArray[0] = buscarIndex;
    return JSON.stringify(buscarIndex);
}

function verificaAcciones(){
    var ids = String($.fn.yiiGridView.getSelection('TbG_ARTICULO'));
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

function fun_Update(){
    var link="";
    var id = base64_encode(String($.fn.yiiGridView.getSelection('TbG_ARTICULO')));
    var count=id.split(",");
    if(count.length==1 && id!=""){
        link=$('#txth_controlador').val()+"/Editaritems?";
        $('#btn_Update').attr("href", link+"id="+id); 
    }
}

function loadDataUpdate(){
    mostrarItems(varData);
}
function mostrarItems(Data){
    $('#txt_COD_ART').val(Data['Codigo']);
    $('#txt_ART_DES_COM').val(Data['Nombre']);
}

function fun_GuardarItems(accion) {
        var ID = (accion == "Update") ? $('#txth_COD_ART').val() : 0;
        var link = $('#txth_controlador').val() + "/Save";
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: link,
            data: {
                "DATA": objetoItems(ID),
                "ACCION": accion
            },
            success: function (data) {
                if (data.status == "OK") {
                    $("#messageInfo").html(data.message + buttonAlert);
                    alerMessage();
                    fun_limpiarUser();
                } else {
                    $("#messageInfo").html(data.message + buttonAlert);
                    alerMessage();
                }
            },
        });


}

function objetoItems(ID){
    var datosItems=new Object();
    datosItems.codId=ID;
    datosItems.cod_art= ($('#txt_COD_ART').val() != "") ? $('#txt_COD_ART').val() : 0;
    datosItems.des_com=$('#txt_ART_DES_COM').val();    
    datosItems.estado=1;//$('#cmb_estado option:selected').val();
    
    sessionStorage.DataItems = JSON.stringify(datosItems);
    return JSON.stringify(datosItems);
}


/******************   GRID BUSCAR ITEMS  ******************/

function autocompletarBuscarItem(request, response, control, op) {
    var link = $('#txth_controlador').val() + "/BuscarItems";
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: link,
        data: {
            valor: $('#' + control).val(),
            op: op
        },
        success: function (data) {
            var arrayList = new Array;
            var count = data.length;
            for (var i = 0; i < count; i++) {
                var row = new Object();
                row.Ids = data[i]['Ids'];
                row.Nombre = data[i]['Nombre'];

                // Campos Importandes relacionados con el  CJuiAutoComplete
                row.id = data[i]['Ids'];
                row.label = data[i]['Nombre'];
                row.value = data[i]['Nombre'];//lo que se almacena en en la caja de texto
                arrayList[i] = row;
            }
            sessionStorage.src_buscItems = JSON.stringify(arrayList);//dss=>DataSessionStore
            response(arrayList);
        }
    })
}

function fun_activarItem(ids,estado){
    if(!confirm(mgAccion)) return false;
    var link=$('#txth_controlador').val()+"/ActivarItem";
    //var encodedIds = base64_encode(ids);  //Verificar cofificacion Base
    $.ajax({
        type: 'POST',
        url: link,
        data:{
            "ids": ids,
            "estado": estado
        } ,
        success: function(data){
            if (data.status=="OK"){ 
                $("#messageInfo").html(data.message+buttonAlert); 
                alerMessage();
                $.fn.yiiGridView.update('TbG_ARTICULO');
                //actualizarTbG_USUARIO();
            }
        },
        dataType: "json"
    });

return true;
}

