/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function pedidoEnterGrid(valor,control){
    if (valor) {//Si el usuario Presiono Enter= True
         control.value = redondea(control.value, Ndecimal);
         //var p_venta=parseFloat(control.value);
         var cant=control.value;
         //actualizaGridPrecioTienda(control,p_venta)
         calculaTotal(control,cant);
    }
}
function calculaTotal(control, cant) {
    var ids = '';
    var precio = 0;
    var TbGtable = 'TbG_PEDIDO';
    $('#' + TbGtable + ' tr').each(function () {
        ids = $(this).find("td").eq(0).html();
        if (ids!='') {
            precio = $(this).find("td").eq(3).html();
            //alert(precio*cant);
            $(this).find("td").eq(5).html(precio * cant);
        }
//                if (ids == val) {
//                    var array = findAndRemove(Grid, 'ART_ID', ids);
//                    sessionStorage.dts_precioTienda = JSON.stringify(array);
//                    //if (count==0){sessionStorage.removeItem('detalleGrid')} 
//                    $(this).remove();
//                }
    });

}

