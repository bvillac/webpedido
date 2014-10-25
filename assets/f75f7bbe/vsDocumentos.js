/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function generarPdf(id){
    var link="";
    link=$('#txth_controlador').val()+"/GenerarPdf?";
    $('#btn_Update').attr("href", link+"id="+id); 
}


