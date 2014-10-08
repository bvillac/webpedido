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