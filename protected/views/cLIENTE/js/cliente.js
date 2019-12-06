/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function fun_DeleteCliente(ids){
        if(!confirm(mgEliminar)) return false;
        var link=$('#txth_controlador').val()+"/DeleteCliente";
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
                    $.fn.yiiGridView.update('TbG_USUARIO');
                    //actualizarTbG_USUARIO();
                }
            },
            dataType: "json"
        });
    
    return true;
}


function fun_AgregarCliente(accion) {
    //if (validateForm(accion)) {
        var ID = (accion == "Update") ? $('#txth_PER_ID').val() : 0;
        var link = $('#txth_controlador').val() + "/AgregarCliente";
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: link,
            data: {
                "DATA": objetoCliente(ID),
                "ACCION": accion
            },
            success: function (data) {
                if (data.status == "OK") {
                    $("#messageInfo").html(data.message + buttonAlert);
                    alerMessage();
                    $.fn.yiiGridView.update('TbG_USUARIO');
                    fun_limpiarCliente();
                } else {
                    $("#messageInfo").html(data.message + buttonAlert);
                    alerMessage();
                }
            },
        });
    //}

}



function objetoCliente(ID){
    var persona=new Object();
    persona.CLI_ID=0;
    //persona.ROL_ID=$('#cmb_roles option:selected').val();
    persona.IDS_ARE=1;//$('#cmb_area option:selected').val();
    persona.NOMBRE=$('#txt_nombre').val();
    persona.CEDULA=$('#txt_cedula').val();
    persona.TELEFONO=$('#txt_telefono').val();
    persona.CONTACTO=$('#txt_contacto').val();
    persona.DIRECCION=$('#txt_direccion').val();
    //persona.UEMP_ALIAS=$('#txt_departamento').val();
    persona.CORREO=$('#txt_correo').val();
    persona.EST_LOG=1;
    sessionStorage.dataObj = JSON.stringify(persona);
    return JSON.stringify(persona);
}

function fun_limpiarCliente(){
    $('#txt_nombre').val('');
    $('#txt_cedula').val('');
    $('#txt_correo').val('');
    $('#txt_telefono').val('');
    $('#txt_direccion').val('');
    $('#txt_contacto').val('');
    //$("#cmb_roles option[value=1]").attr("selected",true);
    //$("#cmb_area option[value=1]").attr("selected",true);
}

