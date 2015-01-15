/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function fun_ventasMes(){
    var link="";
    var data = base64_encode('Mariaxx');
    if(data!=""){
        link=$('#txth_controlador').val()+"/Rep_VentMax?";
        $('#btn_aceptar').attr("href", link+"data="+data); 
        //alert(link+"id="+id);
        //window.location =  link+"id="+id;
    }
}


