/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function modificarDescargos(accion){
    alert(accion);
}

function fun_Nuevo(){
    var link="";
    link=$('#txth_controlador').val()+"/Create?";
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




