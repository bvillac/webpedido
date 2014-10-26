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

function buscarPersonaFicha(control,op){ 
    var link=$('#txth_controlador').val()+"/BuscaPerIndex";
    $.fn.yiiGridView.update('TbG_FICHA_MEDICA', {
        type: 'POST',
        url:link,
        data:{
            "CONT_BUSCAR": controlBuscarIndex(control,op)
        }
    }); 
}

function controlBuscarIndex(control,op){
    var buscarArray = new Array();
    var arrayList = JSON.parse(sessionStorage.src_buscIndex);
    var buscarIndex=new Object();
    buscarIndex.OP=op;
    buscarIndex.TIPO_APR=$('#cmb_tipoApr option:selected').val();
    buscarIndex.RAZONSOCIAL=$('#'+control).val(),
    buscarIndex.CEDULA=retornarIndLista(arrayList,'RazonSocialComprador',$('#'+control).val(),'IdentificacionComprador');
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
            sessionStorage.src_buscInde = JSON.stringify(arrayList);//dss=>DataSessionStore
            response(arrayList);  
        }
    })            
}



