/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function fun_ventasMes(){
    var link="";
    var data = base64_encode(ventasMesIndex());
    if(data!=""){
        link=$('#txth_controlador').val()+"/Rep_VentMax?";
        $('#btn_aceptar').attr("href", link+"data="+data); 
        //alert(link+"id="+id);
        //window.location =  link+"id="+id;
    }
}

function ventasMesIndex22(){
    var buscarArray = new Array();
    var buscarIndex=new Object();
    //buscarIndex.OP=op;
    //buscarIndex.TIE_ID=$('#cmb_tienda option:selected').val();
    //buscarIndex.EST_LOG=$('#cmb_estado option:selected').val();
    buscarIndex.F_INI=$('#dtp_fec_ini').val();
    buscarIndex.F_FIN=$('#dtp_fec_fin').val();
    //buscarArray[0] = buscarIndex;
    //return JSON.stringify(buscarArray);
    return buscarIndex;
}
function ventasMesIndex(){
    var objRep = new Array();
    objRep[0]=$('#dtp_fec_ini').val();
    objRep[1]=$('#dtp_fec_fin').val();
    //alert(objRep.length)
    return objRep;
}


