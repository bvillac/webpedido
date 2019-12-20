/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function fun_ventasMes(op){
    var link="";
    var data = base64_encode(ventasMesIndex(op));
    if(data!=""){
        link=$('#txth_controlador').val()+"/Rep_VentMax?";
        //$('#btn_aceptar').attr("href", link+"data="+data); 
        if(op==1){
            $('#btn_aceptar').attr("href", link+"data="+data);
        }else{
            $('#btn_aceptar_excel').attr("href", link+"data="+data);
        }
    }
}

function ventasMesIndex(op){
    var objRep = new Array();
    objRep[0]=op;
    objRep[1]=$('#dtp_fec_ini').val();
    objRep[2]=$('#dtp_fec_fin').val();
    //alert(objRep.length)
    return objRep;
}

//Reporte anterior item tienda
function fun_ItemTienda(op){
    var link="";
    var data = base64_encode(ItemTiendaIndex(op));
    if(data!=""){
        link=$('#txth_controlador').val()+"/Rep_ItemTienda?";
        if(op==1){
            $('#btn_aceptar_item').attr("href", link+"data="+data);
        }else{
            $('#btn_excel_item').attr("href", link+"data="+data);
        }
         
    }
}

function fun_ConsumoTienda(op){
    var link="";
    var data = base64_encode(ItemTiendaIndex(op));
    if(data!=""){
        link=$('#txth_controlador').val()+"/ConsumoTienda?";
        if(op==1){
            $('#btn_aceptar_item').attr("href", link+"data="+data);
        }else{
            $('#btn_excel_item').attr("href", link+"data="+data);
        }
         
    }
}

function ItemTiendaIndex(op){
    var objRep = new Array();
    objRep[0]=op;
    objRep[1]=$('#dtp_fec_ini_item').val();
    objRep[2]=$('#dtp_fec_fin_item').val();
    objRep[3]=$('#cmb_tienda option:selected').val();
    return objRep;
}

