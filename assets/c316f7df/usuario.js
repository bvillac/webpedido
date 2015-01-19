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
    $('#txt_telefono').val('');
    $('#txt_telefono').val('');
    $('#txt_telefono').val('');
    $('#txt_telefono').val('');
    
    
    
    
    $('#txt_TIE_LUG_ENTREGA').val('');
    $("#cmb_cliente option[value=0]").attr("selected",true);
    $("#cmb_dia_ini option[value=0]").attr("selected",true);
    $("#cmb_dia_fin option[value=0]").attr("selected",true);
}


