/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* Declaracion de Variables Globales*/
var nCero = 5;

//Convierte su primer carácter en su equivalente mayúscula.
function MyPrimera(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function addCeros(tam, num) {
    if (num.toString().length <= tam)
        return addCeros(tam, "0" + num)
    else
        return num;
}

function codigoExiste(value, property, lista) {
    if (lista) {
        var array = JSON.parse(lista);
        for (var i = 0; i < array.length; i++) {
            if (array[i][property] == value) {
                return false;
            }
        }
    }
    return true;
}

function retornarIndexArray(array, property, value) {
    var index = -1;
    for (var i = 0; i < array.length; i++) {
        //alert(array[i][property]+'-'+value)
        if (array[i][property] == value) {
            index = i;
            return index;
        }
    }
    return index;
}

/*  Funcion Retorna "retornarIndLista"
 *  Recibe: Lista Json, Propieda o Campo,Valor Comparacion, Campo del Valor a Retornar
 **/
function retornarIndLista(array, property, value, ids) {
    var index = -1;
    for (var i = 0; i < array.length; i++) {
        if (array[i][property] == value) {
            index = array[i][ids];
            return index;
        }
    }
    //Retorna  -1 si no esta en ls lista
    return index;
}

function findAndRemove(array, property, value) {
    for (var i = 0; i < array.length; i++) {
        if (array[i][property] == value) {
            array.splice(i, 1);
        }
    }
    return array;
}

function loadDataCreate() {
    recargarGridTiendas();//Recargar Tiendas.
}

/******************   GRID BUSCAR ITEMS  ******************/

function autocompletarBuscarItems(request, response, control, op) {
    var link = $('#txth_controlador').val() + "/BuscarArticulo";
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: link,
        data: {
            valor: $('#' + control).val(),
            op: op
        },
        success: function (data) {
            var arrayList = new Array;
            var count = data.length;
            for (var i = 0; i < count; i++) {
                row = new Object();
                row.ART_ID = data[i]['ART_ID'];
                row.COD_ART = data[i]['COD_ART'];
                row.ART_DES_COM = data[i]['ART_DES_COM'];

                // Campos Importandes relacionados con el  CJuiAutoComplete
                row.id = data[i]['ART_ID'];
                row.label = data[i]['ART_DES_COM'] + ' - ' + data[i]['COD_ART'];//Lo sugerido
                row.value = data[i]['ART_DES_COM'];//lo que se almacena en en la caja de texto
                arrayList[i] = row;
            }
            sessionStorage.src_buscArticulo = JSON.stringify(arrayList);//dss=>DataSessionStore
            response(arrayList);
        }
    })
}

function addPrimerItemTiendas(TbGtable, lista, i) {
    /*Remuevo la Primera fila*/
    $('#' + TbGtable + ' >table >tbody').html("");
    /*Agrego a la Tabla de Detalle*/
    //$('#'+TbGtable+' >table >tbody').append(retornaFilaTiendas(i,lista,TbGtable,true));
    $('#' + TbGtable).append(retornaFilaTiendas(i, lista, TbGtable, true));
}

function addVariosItemTiendas(TbGtable, lista, i) {
    i = (i == -1) ? ($('#' + TbGtable + ' tr').length) - 1 : i;
    //$('#'+TbGtable+' >table >tbody').append(retornaFilaTiendas(i,lista,TbGtable,true));
    $('#' + TbGtable).append(retornaFilaTiendas(i, lista, TbGtable, true));
}

function retornaFilaTiendas(c, Grid, TbGtable, op) {
    var RutaImagenAccion = $('#txth_rutaImg').val();
    var strFila = "";
    var imgCol = '<img class="btn-img" src="' + RutaImagenAccion + '/acciones/delete16.png" >';
    var imgCol2 = '<img class="btn-img" src="' + RutaImagenAccion + '/acciones/edit16.png" >';
    strFila += '<td style="display:none; border:none;">' + Grid[c]['ART_ID'] + '</td>';
    strFila += '<td width="5px" style="text-align: left">' + Grid[c]['COD_ART'] + '</td>';
    strFila += '<td width="100px" style="text-align:left">' + Grid[c]['ART_DES_COM'] + '</td>';
    strFila += '<td width="20px" style="text-align:right">' + Grid[c]['ART_P_VENTA'] + '</td>';
    strFila += '<td width="36px" style="text-align:center">';
    strFila += '<a class="btn-img" onclick="editarPrecioTiendas(' + Grid[c]['ART_ID'] + ',\'' + TbGtable + '\')" >' + imgCol2 + '</a>';
    strFila += '<a class="btn-img" onclick="eliminarItemsTiendas(' + Grid[c]['ART_ID'] + ',\'' + TbGtable + '\')" >' + imgCol + '</a>';
    strFila += '</td>';
    if (op) {
        strFila = '<tr class="odd gradeX">' + strFila + '</tr>';
    }
    return strFila;
}

function agregarItemsTiendas(opAccion) {
    var tGrid = 'TbG_Tiendas';
    var nombre = $('#txt_ART_DES_COM').val();
    if ($('#txt_ART_DES_COM').val() != "") {
        var valor = $('#txt_ART_DES_COM').val();
        if (opAccion != "edit") {
            //*********   AGREGAR ITEMS *********
            var arr_Grid = new Array();
            if (sessionStorage.dts_precioTienda) {
                /*Agrego a la Sesion*/
                arr_Grid = JSON.parse(sessionStorage.dts_precioTienda);
                var size = arr_Grid.length;
                if (size > 0) {
                    //Varios Items
                    if (codigoExiste(nombre, 'ART_DES_COM', sessionStorage.dts_precioTienda)) {//Verifico si el Codigo Existe  para no Dejar ingresar Repetidos
                        arr_Grid[size] = objTiendas(retornarIndexArray(JSON.parse(sessionStorage.src_buscArticulo), 'ART_DES_COM', valor), JSON.parse(sessionStorage.src_buscArticulo),true);
                        sessionStorage.dts_precioTienda = JSON.stringify(arr_Grid);
                        addVariosItemTiendas(tGrid, arr_Grid, -1);
                        limpiarTexbox();
                    } else {
                        $("#messageInfo").html('Item ya existe en su lista ' + buttonAlert);
                        alerMessage();
                    }
                } else {
                    /*Agrego a la Sesion*/
                    //Primer Items
                    arr_Grid[0] = objTiendas(retornarIndexArray(JSON.parse(sessionStorage.src_buscArticulo), 'ART_DES_COM', valor), JSON.parse(sessionStorage.src_buscArticulo),true);
                    sessionStorage.dts_precioTienda = JSON.stringify(arr_Grid);
                    addPrimerItemTiendas(tGrid, arr_Grid, 0);
                    limpiarTexbox();
                }
            } else {
                //No existe la Session
                //Primer Items
                arr_Grid[0] = objTiendas(retornarIndexArray(JSON.parse(sessionStorage.src_buscArticulo), 'ART_DES_COM', valor), JSON.parse(sessionStorage.src_buscArticulo),true);
                sessionStorage.dts_precioTienda = JSON.stringify(arr_Grid);
                addPrimerItemTiendas(tGrid, arr_Grid, 0);
                limpiarTexbox();
            }

        } else {
            //data
        }
    } else {
        $("#messageInfo").html('No existe Informacion ' + buttonAlert);
        alerMessage();
    }
}

function limpiarTexbox() {
    $('#txt_ART_DES_COM').val("");
    $('#txt_PCLI_P_VENTA').val("");
}

function objTiendas(c, Grid,condicion) {
    rowGrid = new Object();
    rowGrid.ART_ID = Grid[c]['ART_ID'];
    rowGrid.COD_ART = Grid[c]['COD_ART'];
    rowGrid.ART_DES_COM = Grid[c]['ART_DES_COM'];
    rowGrid.ART_P_VENTA =(condicion)?parseFloat($('#txt_PCLI_P_VENTA').val()).toFixed(Ndecimal):Grid[c]['PCLI_P_VENTA'];
    //rowGrid.ART_P_VENTA = parseFloat($('#txt_PCLI_P_VENTA').val()).toFixed(Ndecimal);//valorTotal.toFixed(Ndecimal)
    rowGrid.ART_ESTADO = '1';
    return rowGrid;
}

function recargarGridTiendas() {
    var tGrid = 'TbG_Tiendas';
    if (sessionStorage.dts_precioTienda) {
        var arr_Grid = JSON.parse(sessionStorage.dts_precioTienda);
        if (arr_Grid.length > 0) {
            $('#' + tGrid + ' >table >tbody').html("");
            for (var i = 0; i < arr_Grid.length; i++) {
                //$('#'+tGrid+' >table >tbody').append(retornaFilaTiendas(i,arr_Grid,tGrid,true));
                $('#' + tGrid).append(retornaFilaTiendas(i, arr_Grid, tGrid, true));
            }
        }
    }
}

function eliminarItemsTiendas(val, TbGtable) {
    var ids = "";
    alert('Inicio');
    var result=eliminarItemsDB(val);
    alert(result);
    if (result=='OK') {
        if (sessionStorage.dts_precioTienda) {
            var Grid = JSON.parse(sessionStorage.dts_precioTienda);
            if (Grid.length > 0) {
                //$('#'+TbGtable+' >table >tbody >tr').each(function () {
                $('#' + TbGtable + ' tr').each(function () {
                    ids = $(this).find("td").eq(0).html();
                    if (ids == val) {
                        var array = findAndRemove(Grid, 'ART_ID', ids);
                        sessionStorage.dts_precioTienda = JSON.stringify(array);
                        //if (count==0){sessionStorage.removeItem('detalleGrid')} 
                        $(this).remove();
                    }
                });
            }
        }

    }
}

function eliminarItemsDB(val){
    var rowGrid = new Object();
    if ($('#cmb_cliente option:selected').val()==0) {
        alert('Seleccionar Cliente');
        return 'NO_OK';
    }
    rowGrid.cliId = $('#cmb_cliente option:selected').val();
    rowGrid.codArt = val;
    //var encodedIds = base64_encode(JSON.stringify(rowGrid));
    var encodedIds = JSON.stringify(rowGrid);
    var link=$('#txth_controlador').val()+"/EliminarItems";
    $.ajax({
            type: 'POST',
            url: link,
            data: {
                "DATA": encodedIds
            },
            success: function (data) {
                if (data.status == "OK") {
                    $("#messageInfo").html(data.message+buttonAlert); 
                    alerMessage();
                    return 'OK';
                } else {
                    $("#messageInfo").html(data.message+buttonAlert); 
                    alerMessage();
                    return 'NO_OK';
                }
            },
            dataType: "json"
        });
}

function editarPrecioTiendas(val, TbGtable){
     var ids = "";
    if (sessionStorage.dts_precioTienda) {
        var Grid = JSON.parse(sessionStorage.dts_precioTienda);
        if (Grid.length > 0) {
            $('#' + TbGtable + ' tr').each(function () {
                ids = $(this).find("td").eq(0).html();
                if (ids == val) {
                    var array = findAndRemove(Grid, 'ART_ID', ids);
                    sessionStorage.dts_precioTienda = JSON.stringify(array);
                    //if (count==0){sessionStorage.removeItem('detalleGrid')} 
                    $(this).remove();
                }
            });
        }
    }
}

function mostrarPrecioTienda(){
    var tGrid = 'TbG_Tiendas';
    var arr_Grid = new Array();
    if ($('#cmb_cliente option:selected').val()==0) {
        alert('Seleccionar Cliente');
        return false;
    }
    var ids=$('#cmb_cliente option:selected').val();
    var link=$('#txth_controlador').val()+"/BuscarPrecioTienda";
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url:link,
        data:{
            ids:ids
        },
        success:function(data){                
            if(data.length > 0){                
                $('#' + tGrid + ' tbody').html("");
                sessionStorage.removeItem('dts_precioTienda'); 
                for (var i = 0; i < data.length; i++) {
                    arr_Grid[i] = objTiendas(i,data,false)
                    sessionStorage.dts_precioTienda = JSON.stringify(arr_Grid);
                    $('#' + tGrid).append(retornaFilaTiendas(i, arr_Grid, tGrid, true));
                }
            }else{
                $('#' + tGrid + ' tbody').html("");
                sessionStorage.removeItem('dts_precioTienda'); 
            }
        }
    })    
}

/******************   FIN GRID BUSCAR ITEMS  ******************/

/**************** GUARDAR DATOS TIENDAS  ******************/
function guardarTiendasPrecio(accion) {
    if (validateForm()) {
        //var ID = (accion == "Update") ? $('#txth_CDOR_ID').val() : 0;
        var cliId=$('#cmb_cliente option:selected').val();
        var link = $('#txth_controlador').val() + "/Save";
        $.ajax({
            type: 'POST',
            url: link,
            data: {
                "DTS_PRECIO_TIENDA": sessionStorage.dts_precioTienda,
                "CLI_ID": cliId,
                "ACCION": accion
            },
            success: function (data) {
                if (data.status == "OK") {
                    $("#messageInfo").html(data.message+buttonAlert); 
                    alerMessage();
                } else {
                    $("#messageInfo").html(data.message+buttonAlert); 
                    alerMessage();
                }
            },
            dataType: "json"
        });
    }
}

function validateForm() {
    var result = true;
    var message = '';
    if ($('#cmb_cliente option:selected').val()==0) {
        message += 'Seleccionar Cliente, ';
        result = false;
    }
    if (sessionStorage.dts_precioTienda) {
        var sizeCount=JSON.parse(sessionStorage.dts_precioTienda);
        if (sizeCount.length == 0) {
            message += 'No existen Datos a guardar, ';
            result = false;
        }
    }else{
        message += 'No existen Datos a guardar, ';
        result = false;
    }

    if (result) {
        return result;
    } else {
        $("#messageInfo").html(message + buttonAlert);
        alerMessage();
        return result;
    }
}