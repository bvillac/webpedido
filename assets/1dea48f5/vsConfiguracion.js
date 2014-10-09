/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function fun_GuardarConfig(accion){
    var ID=(accion=="Update")?$('#txth_IdCompania').val():0;
    var link=$('#txth_controlador').val()+"/Save";
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: link,
        data:{
            "EMPRESA":objServidor(ID),
            "ACCION": accion
        },
        success: function(data){
            if (data.status=="OK"){ 
                //$.fn.yiiGridView.update(idGrid);
                //showResponse(data.type, data.status, data.label, data.message);
                $("#messageInfo").html(data.message+buttonAlert); 
            }else{
                //showResponse(data.type, data.status, data.label, data.message);
                $("#messageInfo").html(data.message+buttonAlert); 
            }
            alerMessage();
        },
    });
}

function objServidor(ID){
    var serArray = new Array();
    var objEnt=new Object();
    
    objEnt.IDCompania=ID;
    objEnt.Mail=$('#txt_Mail').val();
    objEnt.NombreMostrar=$('#txt_NombreMostrar').val();
    objEnt.Asunto=$('#txt_Asunto').val();
    objEnt.Cuerpo=$('#txt_Cuerpo').val();
    objEnt.EsHtml=$('#txt_EsHtml').val();
    objEnt.Clave=$('#txt_Clave').val();
    objEnt.Usuario=$('#txt_Usuario').val();
    objEnt.SMTPServidor=$('#txt_SMTPServidor').val();
    objEnt.SMTPPuerto=$('#txt_SMTPPuerto').val();
    objEnt.TiempoRespuesta=$('#txt_TiempoRespuesta').val();
    objEnt.TiempoEspera=$('#txt_TiempoEspera').val();
    objEnt.ServidorAcuse=$('#txt_ServidorAcuse').val();
    objEnt.ActivarAcuse=$('#txt_ActivarAcuse').val();
    objEnt.CCO=$('#txt_CCO').val();
    objEnt.Estado='1';
    
    serArray[0] = objEnt;
    //sessionStorage.servidor = JSON.stringify(serArray);
    return JSON.stringify(serArray);
}
