/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function pedidoEnterGrid(valor,control){
    if (valor) {//Si el usuario Presiono Enter= True
         control.value = redondea(control.value, Ndecimal);
         //var p_venta=parseFloat(control.value);
         var p_venta=control.value;
         //actualizaGridPrecioTienda(control,p_venta)
         calculaTotal();
    }
}
function calculaTotal(){
    var ids='';
    var TbGtable='TbG_PEDIDO';
    $('#' + TbGtable + ' tr').each(function () {
                ids = $(this).find("td").eq(0).html();
                alert(ids);
//                if (ids == val) {
//                    var array = findAndRemove(Grid, 'ART_ID', ids);
//                    sessionStorage.dts_precioTienda = JSON.stringify(array);
//                    //if (count==0){sessionStorage.removeItem('detalleGrid')} 
//                    $(this).remove();
//                }
            });
    
}

