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
                if (data.length>0){
                   //alert(data[0]['TIE_ID']);
                   //alert(data[0]['TIE_NOMBRE']);
                   $("#modelo").html(data);
                }
            },
        });
    }

}