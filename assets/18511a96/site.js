/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function isEnter(e) {
    //retornar verdadereo si presiona Enter
    var key;
    if (window.event) // IE
    {
        key = e.keyCode;
        if (key == 13 || key == 9) {
            return true;
        }
    } else if (e.which) { // Netscape/Firefox/Opera
        key = e.which;
        // NOTE: Backspace = 8, Enter = 13, '0' = 48, '9' = 57	
        //var key = nav4 ? evt.which : evt.keyCode;	
        if (key == 13 || key == 9) {
            return true;
        }
    }
    return false;
}

function fun_loginTienda(valor, control) {
    if (valor) {//Si el usuario Presiono Enter= True
        if (control.value.length > 0) {
            var link = "site/LoginTienda";
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: link,
                data: {
                    "DATA": control.value,
                },
                success: function (data) {
                    if (data.status == "OK") {
                        //alert('hola');
                        //$("#messageInfo").html(data.message + buttonAlert);
                        //alerMessage();
                    } else {
                        //$("#messageInfo").html(data.message + buttonAlert);
                        //alerMessage();
                    }
                },
            });
        }
    }

}

function mostrarListaTienda(ids) {
    if (ids > 0) {
        var link = "site/LoginTienda";
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: link,
            data: {
                "DATA": ids,
            },
            success: function (data) {
                var str='<option value="0">Seleccionar</option>';
                if (data.length>0){
                    for (var i = 0; i < data.length; i++) {
                        str+='<option value="'+data[i]['TIE_ID']+'">'+data[i]['TIE_NOMBRE']+'</option>';
                    }
                }
                $("#cmb_tienda").html(str);
            },
        });
    }

}

function setDatosTienda(){
    var idTie=$('#cmb_cliente option:selected').val();
    var idCli=$('#cmb_tienda option:selected').val();
    if (idTie!=0 && idCli!=0 ) {
        var link = "site/LoginData";
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: link,
            data: {
                "idTie": idTie,
                "idCli": idCli,
            },
            success: function (data) {
                if (data.status == "OK") {
                        $("#messageInfo").html(data.message + buttonAlert);
                        alerMessage();
                        //location.reload();
                    } else {
                        $("#messageInfo").html(data.message + buttonAlert);
                        alerMessage();
                    }
            },
        });
    }else{
        alert('Seleccionar datos!!');
    }
}