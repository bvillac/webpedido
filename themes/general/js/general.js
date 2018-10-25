/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var Ndecimal = 2;
var Nprodecimal = 4;
var PorIva = 12;
var RutaImagenAccion = $('#txth_base').val() + "/themes/" + $('#txth_theme').val() + "/images/acciones/";

var t_show = 0;
var t_hide = 5000;
var t_transi = 1500;
var buttonAlert = '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>';
var selecDoc = 'Seleccionar documento para autorizar';
var mgEliminar = 'Está seguro que desea Eliminar estos Item';
var mgEnvDocum = 'Está seguro que desea Enviar estos Documentos';
var mgEnvPedid = 'Está seguro que desea Enviar estos Pedidos';
var mgDatoNoVal = 'Los datos proporcionados no son validos!!';
var mgSaldoNoDis = 'Cupo mensual no disponible.!!';

function alerMessage() {
    setTimeout(function () {
        $("#messageInfo").fadeIn(t_transi);
    }, t_show);
    setTimeout(function () {
        $("#messageInfo").fadeOut(t_transi);
    }, t_hide);
}

function nuevoItem() {
    //var link=$('#txth_controlador').val()+"/_boxDetalle?popup=content"; 
    //'data-toggle'=>'modal',
    //'data-target'=>'#myModal',
    //$("#btn_add").addClass("lightboxTd");
    //$('#btn_add').attr("href", "#boxDetalle");
    //$('#btn_add').attr("href", link+"&acc=new&id=0");
//limpiarItems();
}