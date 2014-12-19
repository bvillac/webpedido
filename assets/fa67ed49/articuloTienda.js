/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function autocompletarBuscarItems(request, response,control,op){
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
