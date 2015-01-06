/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function pedidoEnterGrid(valor,control,Ids){
    if (valor) {//Si el usuario Presiono Enter= True
         control.value = redondea(control.value, Ndecimal);
         //var p_venta=parseFloat(control.value);
         var cant=control.value;
         //actualizaGridPrecioTienda(control,p_venta)
         calculaTotal(cant,Ids);
    }
}
function calculaTotal( cant,Ids) {
    var precio = 0;
    var valor=0;
    var TbGtable = 'TbG_PEDIDO';
    $('#' + TbGtable + ' tr').each(function () {
        var idstable = $(this).find("td").eq(0).html();
        //alert(ids);
        if (idstable==Ids) {
            precio = $(this).find("td").eq(4).html();
            valor=redondea(precio * cant, Ndecimal);
            $(this).find("td").eq(5).html(valor);
        }
//                if (ids == val) {
//                    var array = findAndRemove(Grid, 'ART_ID', ids);
//                    sessionStorage.dts_precioTienda = JSON.stringify(array);
//                    //if (count==0){sessionStorage.removeItem('detalleGrid')} 
//                    $(this).remove();
//                }
    });

}

