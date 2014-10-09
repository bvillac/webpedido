/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function fun_GuardarConfig(accion){
    //var ID=(accion=="Update")?$('#txth_IdCompania').val():0;
    var ID='1';
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
    var ID=
    
    objEnt.IDCompania=ID;
    objEnt.Mail=$('#txt_Mail').val();
    objEnt.NombreMostrar=$('#txt_NombreMostrar').val();
    objEnt.Asunto=$('#txta_Asunto').val();
    objEnt.Cuerpo=$('#txta_Cuerpo').val();
    objEnt.EsHtml=($("#chk_EsHtml").prop("checked"))?1:0;
    objEnt.Clave=$('#txt_Clave').val();
    objEnt.Usuario=$('#txt_Usuario').val();
    objEnt.SMTPServidor=$('#txt_SMTPServidor').val();
    objEnt.SMTPPuerto=$('#txt_SMTPPuerto').val();
    objEnt.TiempoRespuesta=$('#txt_TiempoRespuesta').val();
    objEnt.TiempoEspera=$('#txt_TiempoEspera').val();
    objEnt.ServidorAcuse=$('#txt_ServidorAcuse').val();
    objEnt.ActivarAcuse=($("#chk_ActivarAcuse").prop("checked"))?1:0;//$('#chk_ActivarAcuse').val();
    objEnt.CCO=$('#txt_CCO').val();
    objEnt.Estado='1';
    
    serArray[0] = objEnt;
    //sessionStorage.servidor = JSON.stringify(serArray);
    return JSON.stringify(serArray);
}
