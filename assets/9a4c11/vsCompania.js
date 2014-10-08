/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function fun_Nuevo(accion){
    alert(accion);
    var link="";
    link=$('#txth_controlador').val()+"/create";
    //alert(link)
    $('#btn_nuevo').attr("href", link);
    /*link=$('#txth_controlador').val()+"/Update?";
    $('#btn_Update').attr("href", link+"id="+id);
    var id = String($.fn.yiiGridView.getSelection('TbG_DESCARGO_ORDEN_PRIN'));
    var count=id.split(",");
    if(count.length==1 && id!=""){
        //sessionStorage.accion="update";
        sessionStorage.removeItem('detalleGrid')
        sessionStorage.removeItem('dataList')
        sessionStorage.removeItem('arrayList')
        sessionStorage.removeItem('dataListAfiliado')
        sessionStorage.removeItem('dataListDoctor')
        sessionStorage.removeItem('cabOrden')
        
        link=$('#txth_controlador').val()+"/Update?";
        $('#btn_Update').attr("href", link+"id="+id); 
    }*/
}

function fun_limpiarEmpresa(){
    $('#txt_RUC').val('');
    $('#txt_RazonSocial').val('');
    $('#txt_NombreComercial').val('');
    $('#txt_Mail').val('');
    $('#txt_EsContribuyente').val('');
    $('#txt_Direccion').val('');
    $('#txt_Clave').val('');
    $('#txt_conf_clave').val('');
    $('#txt_RutaFirma').val(''); 
    $('#archivo').val('');//label del archivo
}

function fun_GuardarEmpresa(accion){
    var ID=(accion=="Update")?$('#txth_CDOR_ID').val():0;
    var link=$('#txth_controlador').val()+"/Save";

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: link,
        data:{
            "EMPRESA":objetoEmpresa(ID),
            //"DET_ORDEN":sessionStorage.detalleGrid,
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

function objetoEmpresa(ID){
    var empArray = new Array();
    var empresa=new Object();
    empresa.id=ID;
    empresa.Ruc=$('#txt_RUC').val();
    empresa.RazonSocial=$('#txt_RazonSocial').val();
    empresa.NombreComercial=$('#txt_NombreComercial').val();
    empresa.Mail=$('#txt_Mail').val();
    empresa.EsContribuyente=$('#txt_EsContribuyente').val();
    empresa.Direccion=$('#txt_Direccion').val();
    empresa.Clave=$('#txt_Clave').val();
    empresa.conf_clave=$('#txt_conf_clave').val();
    empresa.RutaFirma=$('#txt_RutaFirma').val(); 
    empresa.FechaCaducidad='';
    empresa.EmpresaCertificadora='';
    empresa.Estado='1';
    empArray[0] = empresa;
    sessionStorage.empresa = JSON.stringify(empArray);
    return JSON.stringify(empArray);
}

function mostrarEmpresa(varData){
    //A.IdCompania,A.Ruc,A.RazonSocial,A.NombreComercial,A.Mail,A.EsContribuyente,
    //A.Direccion,B.Clave,B.FechaCaducidad,B.EmpresaCertificadora 
    $('#txt_RUC').val(varData[0]['Ruc']);
    $('#txt_RazonSocial').val(varData[0]['RazonSocial']);
    $('#txt_NombreComercial').val(varData[0]['NombreComercial']);
    $('#txt_Mail').val(varData[0]['Mail']);
    $('#txt_EsContribuyente').val(varData[0]['EsContribuyente']);
    $('#txt_Direccion').val(varData[0]['Direccion']);
    //$('#txt_Clave').val(varData[0]['Clave']);
    //$('#txt_conf_clave').val(varData[0]['EMP_ID']);
    $('#txt_RutaFirma').val(varData[0]['RutaFirma']);
}

function fun_Delete(){
    var ids = String($.fn.yiiGridView.getSelection('TbG_COMPANIA'));
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
                    actualizarTbG_COMPANIA();
                }
            },
            dataType: "json"
        });
    }
    return true;
}

function actualizarTbG_COMPANIA(){
    $.fn.yiiGridView.update('TbG_COMPANIA');
    /*var link=$('#txth_controlador').val()+"/Index";
    $.fn.yiiGridView.update('TbG_COMPANIA', {
        type: 'POST',
        url:link,
        data:{
            //"CONT_BUSCAR": controlBuscarIndex(control,op)
        }
    }); */
}

function fun_Update(){
    var link="";
    var id = String($.fn.yiiGridView.getSelection('TbG_COMPANIA'));
    var count=id.split(",");
    if(count.length==1 && id!=""){
        //sessionStorage.accion="update";
        //sessionStorage.removeItem('detalleGrid')
        link=$('#txth_controlador').val()+"/Update?";
        alert(link)
        $('#btn_Update').attr("href", link+"id="+id); 
    }
}

function loadDataUpdate(){
        alert(varData.toString());
        mostrarEmpresa(varData);
        //sessionStorage.detalleGrid = JSON.stringify(arr_detalleGrid);
}


