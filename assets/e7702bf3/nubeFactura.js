/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*  Funcion Retorna "retornarIndLista"
 *  Recibe: Lista Json, Propieda o Campo,Valor Comparacion, Campo del Valor a Retornar
 **/
function retornarIndLista(array,property,value,ids){
    var index=-1;
    for(var i=0; i<array.length; i++){
        if(array[i][property]==value){
            index=array[i][ids];
            return index;
        }
    }
    //Retorna  -1 si no esta en ls lista
    return index;
}

function buscarDataIndex(control,op){ 
    control=(control=='')?'txt_PER_CEDULA':control;
    var link=$('#txth_controlador').val()+"/BuscaDataIndex";
    $.fn.yiiGridView.update('TbG_DOCUMENTO', {
        type: 'POST',
        url:link,
        data:{
            "CONT_BUSCAR": controlBuscarIndex(control,op)
        }
    }); 
}

function controlBuscarIndex(control,op){
    var buscarArray = new Array();
    var buscarIndex=new Object();
    if(sessionStorage.src_buscIndex){
        var arrayList = JSON.parse(sessionStorage.src_buscIndex);
        buscarIndex.CEDULA=retornarIndLista(arrayList,'RazonSocialComprador',$('#'+control).val(),'IdentificacionComprador');
    }else{
        buscarIndex.CEDULA='';
    }
    buscarIndex.OP=op;
    buscarIndex.TIPO_APR=$('#cmb_tipoApr option:selected').val();
    buscarIndex.RAZONSOCIAL=$('#'+control).val(),
   
    buscarIndex.F_INI=$('#dtp_fec_ini').val();
    buscarIndex.F_FIN=$('#dtp_fec_fin').val();
    buscarArray[0] = buscarIndex;
    return JSON.stringify(buscarArray);
}

function autocompletarBuscarPersona(request, response,control,op){
    var link=$('#txth_controlador').val()+"/BuscarPersonas";
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
                row.IdentificacionComprador=data[i]['IdentificacionComprador'];
                row.RazonSocialComprador=data[i]['RazonSocialComprador'];

                // Campos Importandes relacionados con el  CJuiAutoComplete
                row.id=data[i]['IdentificacionComprador'];
                row.label=data[i]['RazonSocialComprador']+' - '+data[i]['IdentificacionComprador'];//+' - '+data[i]['SEGURO_SOCIAL'];//Lo sugerido
                //row.value=data[i]['IdentificacionComprador'];//lo que se almacena en en la caja de texto
                row.value=data[i]['RazonSocialComprador'];//lo que se almacena en en la caja de texto
                arrayList[i] = row;
            }
            sessionStorage.src_buscIndex = JSON.stringify(arrayList);//dss=>DataSessionStore
            response(arrayList);  
        }
    })            
}

function verificaAcciones(){
    var ids = String($.fn.yiiGridView.getSelection('TbG_DOCUMENTO'));
    var count=ids.split(",");
    if(count.length>0 && ids!=""){
        $("#btn_enviar").removeClass("disabled");
        $("#TbG_DOCUMENTO").addClass("loading");
        //verificaAutorizado('TbG_DOCUMENTO');
    }else{
        $("#btn_enviar").addClass("disabled");
    }
}

function verificaAutorizado(TbGtable) {
    $('#' + TbGtable + ' tr').each(function () {
        var estado = $(this).find("td").eq(3).html();//Columna Estado
        //Verifica que este CHeck la Primera COlumna
        if ($(this).children(':first-child').children(':first-child').is(':checked')){
            alert(estado);
            if (estado == 'Autorizado') {//Si es Igual Autorizado no lo deja Check
                
            }
        }
    });
}


function fun_EnviarDocumento(){
    var ids = String($.fn.yiiGridView.getSelection('TbG_DOCUMENTO'));
    var count=ids.split(",");
    if(count.length>0 && ids!=""){
        if(!confirm(mgEnvDocum)) return false;
        var link=$('#txth_controlador').val()+"/EnviarDocumento";
        var encodedIds = base64_encode(ids);  //Verificar cofificacion Base
        $.ajax({
            type: 'POST',
            url: link,
            data:{
                "ids": encodedIds
            } ,
            success: function(data){
                if (data.status=="OK"){ 
                    $("#messageInfo").html(data.message+buttonAlert); 
                    alerMessage();
                    actualizarTbG_DOCUMENTO();
                }else{
                    $("#messageInfo").html(data.message+buttonAlert); 
                    alerMessage();
                }
            },
            dataType: "json"
        });
    }else{
        $("#messageInfo").html(selecDoc+buttonAlert); 
        alerMessage();
    }
    return true;
}

function actualizarTbG_DOCUMENTO(){
    $.fn.yiiGridView.update('TbG_DOCUMENTO');
    /*var link=$('#txth_controlador').val()+"/Index";
    $.fn.yiiGridView.update('TbG_COMPANIA', {
        type: 'POST',
        url:link,
        data:{
            //"CONT_BUSCAR": controlBuscarIndex(control,op)
        }
    }); */
}

