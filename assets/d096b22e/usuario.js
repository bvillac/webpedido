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
    var ids = String($.fn.yiiGridView.getSelection('TbG_USUARIO'));
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

function fun_limpiarUser(){
    $('#txt_dni').val('');
    $('#txt_nombre').val('');
    $('#txt_apellido').val('');
    $('#txt_direccion').val('');
    $('#txt_telefono').val('');
    $('#dtp_fec_nacimiento').val('01-01-2015');
    $('#txt_contacto').val('');
    $('#txt_correo').val('');
    $('#txt_usuario').val('');
    $('#txt_password').val('');
    $('#txt_confirma').val('');
    $("#cmb_genero option[value=1]").attr("selected",true);
    $("#cmb_estado option[value=1]").attr("selected",true);
}

function fun_GuardarUser(accion) {
    if (validateForm()) {
        var ID = (accion == "Update") ? $('#txth_PER_ID').val() : 0;
        var link = $('#txth_controlador').val() + "/Save";
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: link,
            data: {
                "DATA": objetoPersona(ID),
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

}

function objetoPersona(ID){
    var persona=new Object();
    persona.perId=ID;
    persona.dperId= ($('#txth_DPER_ID').val() != "") ? $('#txth_DPER_ID').val() : 0;
    persona.dni=$('#txt_dni').val();
    persona.nombre=$('#txt_nombre').val();
    persona.apellido=$('#txt_apellido').val();
    persona.direccion=$('#txt_direccion').val();
    persona.telefono=$('#txt_telefono').val();
    persona.fec_nac=$('#dtp_fec_nacimiento').val();
    persona.contacto=$('#txt_contacto').val();
    persona.usuario=$('#txt_usuario').val();
    persona.password=$('#txt_password').val();
    persona.confirma=$('#txt_confirma').val();
    persona.correo=$('#txt_correo').val();
    persona.genero=$('#cmb_genero option:selected').val();
    persona.estado=$('#cmb_estado option:selected').val();
    sessionStorage.tienda = JSON.stringify(persona);
    return JSON.stringify(persona);
}

function validateForm() {
    var result = true;
    var message = '';
//    if ($('#cmb_cliente option:selected').val()==0) {
//        message += 'Seleccionar Cliente,\n ';
//        result = false;
//    }
//    if ($('#cmb_dia_ini option:selected').val()==0) {
//        message += 'Seleccionar día inicio,\n ';
//        result = false;
//    }
//    if ($('#cmb_dia_fin option:selected').val()==0) {
//        message += 'Seleccionar día de fin,\n ';
//        result = false;
//    }
//    if ($('#txt_TIE_NOMBRE').val().length==0) {
//        message += 'Ingresar Nombre,\n ';
//        result = false;
//    }
//    if ($('#txt_TIE_DIRECCION').val().length==0) {
//        message += 'Ingresar Dirección,\n ';
//        result = false;
//    }
//    if ($('#txt_TIE_TELEFONO').val().length==0) {
//        message += 'Ingresar Teléfono,\n ';
//        result = false;
//    }
//    if ($('#txt_TIE_CUPO').val().length==0) {
//        message += 'Ingresar Cupo,\n ';
//        result = false;
//    }
//    if ($('#txt_TIE_CONTACTO').val().length==0) {
//        message += 'Ingresar Contacto,\n ';
//        result = false;
//    }
//    if ($('#txt_TIE_LUG_ENTREGA').val().length==0) {
//        message += 'Ingresar Lugar entrega,\n ';
//        result = false;
//    }
  
    //alert(message);
    if (result) {
        return result;
    } else {
        $("#messageInfo").html(message + buttonAlert);
        alerMessage();
        return result;
    }
}


function fun_Update(){
    var link="";
    var id = base64_encode(String($.fn.yiiGridView.getSelection('TbG_USUARIO')));
    var count=id.split(",");
    if(count.length==1 && id!=""){
        link=$('#txth_controlador').val()+"/Update?";
        $('#btn_Update').attr("href", link+"id="+id); 
    }
}

function loadDataUpdate(){
        mostrarPersona(varData);
}
function mostrarPersona(Data){
    $('#txt_dni').val(Data['PER_CED_RUC']);
    $('#txt_nombre').val(Data['PER_NOMBRE']);
    $('#txt_apellido').val(Data['PER_APELLIDO']);
    $('#txt_direccion').val(Data['DPER_DIRECCION']);
    $('#txt_telefono').val(Data['DPER_TELEFONO']);
    $('#dtp_fec_nacimiento').val(Data['PER_FEC_NACIMIENTO']);
    $('#txt_contacto').val(Data['DPER_CONTACTO']);
    $('#txt_usuario').val(Data['USU_NOMBRE']);
    $('#txt_password').val(Data['PASS']);
    $('#txt_confirma').val(Data['PASS']);
    $('#txt_correo').val(Data['USU_CORREO']);
    $("#cmb_genero option[value="+Data['PER_GENERO']+"]").attr("selected",true);
    $("#cmb_estado option[value="+Data['PER_EST_LOG']+"]").attr("selected",true);
}

function fun_Delete(){
    alert('ingre')
    var ids = String($.fn.yiiGridView.getSelection('TbG_USUARIO'));
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
                    actualizarTbG_USUARIO();
                }
            },
            dataType: "json"
        });
    }
    return true;
}

function actualizarTbG_USUARIO(){
    $.fn.yiiGridView.update('TbG_USUARIO');
    /*var link=$('#txth_controlador').val()+"/Index";
    $.fn.yiiGridView.update('TbG_COMPANIA', {
        type: 'POST',
        url:link,
        data:{
            //"CONT_BUSCAR": controlBuscarIndex(control,op)
        }
    }); */
}
