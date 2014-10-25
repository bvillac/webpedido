/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
    //var arrayList = JSON.parse(sessionStorage.src_buscIndex);
    var buscarIndex=new Object();
    buscarIndex.OP=op;
    buscarIndex.GRUPO='1';
    //buscarIndex.TIPO_DESCARGO=$('#cmb_tipo_descargo option:selected').val();
    buscarIndex.PERSONA=$('#'+control).val(),
    //buscarIndex.COD_PACIENTE=retornaIdAfiliado($('#txt_nombre_paciente').val(),arrayList);
    //buscarIndex.F_INI=$('#hdtp_fecha_descargo_ini').val();
    //buscarIndex.F_FIN=$('#hdtp_fecha_descargo_fin').val();
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
                row.PER_ID=data[i]['PER_ID'];
                row.PERSONA=data[i]['PERSONA'];
                row.PER_NOMBRE=data[i]['PER_NOMBRE'];
                row.PER_APELLIDO=data[i]['PER_APELLIDO'];
                row.PER_CEDULA=data[i]['PER_CEDULA'];
                row.PER_DIRECCION=data[i]['PER_DOMICILIO_DIRECCION'];
                row.PER_TELEFONO=data[i]['PER_DOMICILIO_TELEFONO'];
                row.TSAN_ID=data[i]['TSAN_ID'];
                row.PER_GENERO=data[i]['PER_GENERO'];
                row.PER_ESTADO_CIVIL=data[i]['PER_ESTADO_CIVIL'];
              
                // Campos Importandes relacionados con el  CJuiAutoComplete
                row.id=data[i]['PER_ID'];
                row.label=data[i]['PERSONA']+' - '+data[i]['PER_CEDULA'];//+' - '+data[i]['SEGURO_SOCIAL'];//Lo sugerido
                row.value=data[i]['PER_CEDULA'];//lo que se almacena en en la caja de texto
                arrayList[i] = row;
            }
            sessionStorage.atc_Persona = JSON.stringify(arrayList);
            response(arrayList);  
        }
    })            
}



