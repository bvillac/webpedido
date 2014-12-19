/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function autocompletarBuscarItems(request, response,control,op){
    var link=$('#txth_controlador').val()+"/BuscarArticulo";
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
                row.ART_ID=data[i]['ART_ID'];
                row.COD_ART=data[i]['COD_ART'];
                row.ART_DES_COM=data[i]['ART_DES_COM'];

                // Campos Importandes relacionados con el  CJuiAutoComplete
                row.id=data[i]['ART_ID'];
                row.label=data[i]['ART_DES_COM']+' - '+data[i]['COD_ART'];//Lo sugerido
                row.value=data[i]['ART_DES_COM'];//lo que se almacena en en la caja de texto
                arrayList[i] = row;
            }
            sessionStorage.src_buscArticulo = JSON.stringify(arrayList);//dss=>DataSessionStore
            response(arrayList);  
        }
    })            
}
