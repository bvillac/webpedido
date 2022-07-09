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

//#############################
function fun_ConsumoItem(op){
    //if ($('#cmb_tienda option:selected').val() != 0) {
        var link="";
        var data = base64_encode(ItemResumenIndex(op));
        if(data!=""){
            link=$('#txth_controlador').val()+"/ConsumoTienda?";
            if(op==1){
                $('#btn_aceptar_item').attr("href", link+"data="+data);
            }else{
                $('#btn_excel_item').attr("href", link+"data="+data);
            }
        }
    //}else{
    //    $("#messageInfo").html('Seleccionar una tienda!' + buttonAlert);
    //    alerMessage();
    //}   
}

function ItemResumenIndex(op){
    var objRep = new Array();
    objRep[0]=op;
    objRep[1]=$('#dtp_fec_ini_item').val();
    objRep[2]=$('#dtp_fec_fin_item').val();
    objRep[3]=$('#cmb_tienda option:selected').val();
    return JSON.stringify(objRep);
}



//###############################
function fun_ConsumoTienda(op){
    //if ($('#cmb_tienda option:selected').val() != 0) {
        var link="";
        var data = base64_encode(ItemTiendaIndex(op));
        if(data!=""){
            link=$('#txth_controlador').val()+"/ConsumoResumen?";
            if(op==1){
                $('#btn_aceptar_item').attr("href", link+"data="+data);
            }else{
                $('#btn_excel_item').attr("href", link+"data="+data);
            }
        }
    //}else{
    //    $("#messageInfo").html('Seleccionar una tienda!' + buttonAlert);
    //    alerMessage();
    //}

        
}

function ItemTiendaIndex(op){
    /*var objRep = new Array();
    objRep[0]=op;
    objRep[1]=$('#dtp_fec_ini_item').val();
    objRep[2]=$('#dtp_fec_fin_item').val();
    objRep[3]=$('#cmb_tienda option:selected').val();
    objRep[4]= sessionStorage.dts_itemTipo;
    objRep[5]= sessionStorage.dts_itemMarca;*/

    row = new Object();
    row.OP = op;
    row.FEC_INI = $('#dtp_fec_ini_item').val();
    row.FEC_FIN = $('#dtp_fec_fin_item').val();
    row.TIE_ID = $('#cmb_tienda option:selected').val();
    row.TIE_NOM = $('#cmb_tienda option:selected').text();
    row.TIPO = sessionStorage.dts_itemTipo;
    row.MARCA = sessionStorage.dts_itemMarca;
    return JSON.stringify(row);
    //return objRep;
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

function findAndRemove(array, property, value) {
    for (var i = 0; i < array.length; i++) {
        if (array[i][property] == value) {
            array.splice(i, 1);
        }
    }
    return array;
}

/*################  TIPO PRODUCTOS ###########################*/
function agregarItemsTipo(opAccion) {
    if($('#cmb_tipo').is(':disabled')){
        //alert('disabled');
        $("#messageInfo").html("No tiene  permitido seleccionar  mas de un Tipo en el reporte..." + buttonAlert); 
        alerMessage();
        return;
    }

    var tGrid = 'TbG_Tipo';
    var nombre = $('#cmb_tipo option:selected').text();
    var ids = $('#cmb_tipo option:selected').val();
    if ($('#cmb_tipo option:selected').val() != "") {
        var valor = $('#cmb_tipo option:selected').text();
        if (opAccion != "edit") {
            //*********   AGREGAR ITEMS *********
            var arr_Grid = new Array();
            if (sessionStorage.dts_itemTipo) {
                /*Agrego a la Sesion*/
                arr_Grid = JSON.parse(sessionStorage.dts_itemTipo);
                var size = arr_Grid.length;
                validarControlSelectTipo(size,'cmb_marca');
                if (size > 0) {
                    //Varios Items
                    if (codigoExiste(nombre, 'NOM_TIP', sessionStorage.dts_itemTipo)) {//Verifico si el Codigo Existe  para no Dejar ingresar Repetidos
                        //arr_Grid[size] = objTipo(retornarIndexArray(JSON.parse(sessionStorage.src_buscArticulo), 'NOM_TIP', valor), JSON.parse(sessionStorage.src_buscArticulo),true);
                        arr_Grid[size] = objTipo(ids,nombre);
                        sessionStorage.dts_itemTipo = JSON.stringify(arr_Grid);
                        addVariosItemTipo(tGrid, arr_Grid, -1);
                        limpiarTexboxTipo();
                    } else {
                        $("#messageInfo").html('Item ya existe en su lista ' + buttonAlert);
                        alerMessage();
                    }
                } else {
                    /*Agrego a la Sesion*/
                    //Primer Items
                    //arr_Grid[0] = objTipo(retornarIndexArray(JSON.parse(sessionStorage.src_buscArticulo), 'NOM_TIP', valor), JSON.parse(sessionStorage.src_buscArticulo),true);
                    arr_Grid[0] = objTipo(ids,nombre);
                    sessionStorage.dts_itemTipo = JSON.stringify(arr_Grid);
                    addPrimerItemTipo(tGrid, arr_Grid, 0);
                    limpiarTexboxTipo();
                }
            } else {
                //No existe la Session
                //Primer Items
                //arr_Grid[0] = objTipo(retornarIndexArray(JSON.parse(sessionStorage.src_buscArticulo), 'NOM_TIP', valor), JSON.parse(sessionStorage.src_buscArticulo),true);
                arr_Grid[0] = objTipo(ids,nombre);
                sessionStorage.dts_itemTipo = JSON.stringify(arr_Grid);
                addPrimerItemTipo(tGrid, arr_Grid, 0);
                limpiarTexboxTipo();
            }

        } else {
            //data
        }
    } else {
        $("#messageInfo").html('No existe Informacion ' + buttonAlert);
        alerMessage();
    }
}

function validarControlSelectTipo(size,control){
    let mensaje="";
    if (size >= 1) {
        //alert('tiene myaor '+size);
        $('#'+control).prop("disabled", true);
        //mensaje=(control=="cmb_tipo")?"No tiene  permitido seleccionar  mas de un Tipo en el reporte...":"";
        //mensaje=(control=="cmb_marca")?"No tiene  permitido seleccionar  mas de una  Marca en el reporte...":"";
        //$("#messageInfo").html(mensaje + buttonAlert); 
        //alerMessage();
    }else{
        //alert('tiene valor '+size);
        $('#'+control).prop("disabled", false);
    }
    
    
}

function limpiarTexboxTipo() {
    //$('#txt_ART_DES_COM').val("");
    //$('#txt_PCLI_P_VENTA').val("");
}

//function objTipo(c, Grid,condicion) {
function objTipo(Ids,Nombre) {
    rowGrid = new Object();
    //rowGrid.COD_TIP = Grid[c]['COD_TIP'];
    //rowGrid.NOM_TIP = Grid[c]['NOM_TIP'];
    rowGrid.COD_TIP = Ids;
    rowGrid.NOM_TIP = Nombre;
    return rowGrid;
}

function addPrimerItemTipo(TbGtable, lista, i) {
    /*Remuevo la Primera fila*/
    $('#' + TbGtable + ' >table >tbody').html("");
    /*Agrego a la Tabla de Detalle*/
    $('#' + TbGtable).append(retornaFilaTipo(i, lista, TbGtable, true));
}

function addVariosItemTipo(TbGtable, lista, i) {
    i = (i == -1) ? ($('#' + TbGtable + ' tr').length) - 1 : i;
    $('#' + TbGtable).append(retornaFilaTipo(i, lista, TbGtable, true));
}

function retornaFilaTipo(c, Grid, TbGtable, op) {
    var RutaImagenAccion = $('#txth_rutaImg').val();
    var strFila = "";
    var imgCol = '<img class="btn-img" src="' + RutaImagenAccion + '/acciones/delete.png" >';
    strFila += '<td style="display:none; border:none;">' + Grid[c]['COD_TIP'] + '</td>';
    strFila += '<td width="100%" style="text-align:left">' + Grid[c]['NOM_TIP'] + '</td>';
    strFila += '<td width="36px" style="text-align:center">';
    strFila += '<a class="btn-img" onclick="eliminarItemsTipo(\'' + Grid[c]['COD_TIP'] + '\',\'' + TbGtable + '\')" >' + imgCol + '</a>';
    strFila += '</td>';
    if (op) {
        strFila = '<tr class="odd gradeX">' + strFila + '</tr>';
    }
    return strFila;
}

function eliminarItemsTipo(val, TbGtable) {
    var ids = "";
    if (sessionStorage.dts_itemTipo) {
        var Grid = JSON.parse(sessionStorage.dts_itemTipo);       
        if (Grid.length > 0) {
            //$('#'+TbGtable+' >table >tbody >tr').each(function () {
            $('#' + TbGtable + ' tr').each(function () {
                ids = $(this).find("td").eq(0).html();
                if (ids == val) {
                    var array = findAndRemove(Grid, 'COD_TIP', ids);
                    sessionStorage.dts_itemTipo = JSON.stringify(array);
                    $(this).remove();
                    Grid = JSON.parse(sessionStorage.dts_itemTipo);
                    validarControlSelectTipo(Grid.length-1,'cmb_marca');
                }
            });
        }
       
    }
}

function recargarGridTipo() {
    var tGrid = 'TbG_Tipo';
    if (sessionStorage.dts_itemTipo) {
        var arr_Grid = JSON.parse(sessionStorage.dts_itemTipo);
        if (arr_Grid.length > 0) {
            $('#' + tGrid + ' >table >tbody').html("");
            for (var i = 0; i < arr_Grid.length; i++) {
                $('#' + tGrid).append(retornaFilaTipo(i, arr_Grid, tGrid, true));
            }
        }
    }
}



/*################  MARCA PRODUCTOS ###########################*/
function agregarItemsMarca(opAccion) {
    if($('#cmb_marca').is(':disabled')){
        //alert('disabled');
        $("#messageInfo").html("No tiene  permitido seleccionar  mas de una Marca en el reporte..." + buttonAlert); 
        alerMessage();
        return;
    }
    var tGrid = 'TbG_Marca';
    var nombre = $('#cmb_marca option:selected').text();
    var ids = $('#cmb_marca option:selected').val();
    if ($('#cmb_marca option:selected').val() != "") {
        var valor = $('#cmb_marca option:selected').text();
        if (opAccion != "edit") {
            //*********   AGREGAR ITEMS *********
            var arr_Grid = new Array();
            if (sessionStorage.dts_itemMarca) {
                /*Agrego a la Sesion*/
                arr_Grid = JSON.parse(sessionStorage.dts_itemMarca);
                var size = arr_Grid.length;
                validarControlSelectTipo(size,'cmb_tipo');
                if (size > 0) {
                    //Varios Items
                    if (codigoExiste(nombre, 'NOM_MAR', sessionStorage.dts_itemMarca)) {//Verifico si el Codigo Existe  para no Dejar ingresar Repetidos
                        //arr_Grid[size] = objMarca(retornarIndexArray(JSON.parse(sessionStorage.src_buscArticulo), 'NOM_MAR', valor), JSON.parse(sessionStorage.src_buscArticulo),true);
                        arr_Grid[size] = objMarca(ids,nombre);
                        sessionStorage.dts_itemMarca = JSON.stringify(arr_Grid);
                        addVariosItemMarca(tGrid, arr_Grid, -1);
                        limpiarTexboxMarca();
                    } else {
                        $("#messageInfo").html('Item ya existe en su lista ' + buttonAlert);
                        alerMessage();
                    }
                } else {
                    /*Agrego a la Sesion*/
                    //Primer Items
                    //arr_Grid[0] = objMarca(retornarIndexArray(JSON.parse(sessionStorage.src_buscArticulo), 'NOM_MAR', valor), JSON.parse(sessionStorage.src_buscArticulo),true);
                    arr_Grid[0] = objMarca(ids,nombre);
                    sessionStorage.dts_itemMarca = JSON.stringify(arr_Grid);
                    addPrimerItemMarca(tGrid, arr_Grid, 0);
                    limpiarTexboxMarca();
                }
            } else {
                //No existe la Session
                //Primer Items
                //arr_Grid[0] = objMarca(retornarIndexArray(JSON.parse(sessionStorage.src_buscArticulo), 'NOM_MAR', valor), JSON.parse(sessionStorage.src_buscArticulo),true);
                arr_Grid[0] = objMarca(ids,nombre);
                sessionStorage.dts_itemMarca = JSON.stringify(arr_Grid);
                addPrimerItemMarca(tGrid, arr_Grid, 0);
                limpiarTexboxMarca();
            }

        } else {
            //data
        }
    } else {
        $("#messageInfo").html('No existe Informacion ' + buttonAlert);
        alerMessage();
    }
}

function limpiarTexboxMarca() {
    //$('#txt_ART_DES_COM').val("");
    //$('#txt_PCLI_P_VENTA').val("");
}

//function objMarca(c, Grid,condicion) {
function objMarca(Ids,Nombre) {
    rowGrid = new Object();
    //rowGrid.COD_TIP = Grid[c]['COD_TIP'];
    //rowGrid.NOM_TIP = Grid[c]['NOM_TIP'];
    rowGrid.COD_MAR = Ids;
    rowGrid.NOM_MAR = Nombre;
    return rowGrid;
}

function addPrimerItemMarca(TbGtable, lista, i) {
    /*Remuevo la Primera fila*/
    $('#' + TbGtable + ' >table >tbody').html("");
    /*Agrego a la Tabla de Detalle*/
    $('#' + TbGtable).append(retornaFilaMarca(i, lista, TbGtable, true));
}

function addVariosItemMarca(TbGtable, lista, i) {
    i = (i == -1) ? ($('#' + TbGtable + ' tr').length) - 1 : i;
    $('#' + TbGtable).append(retornaFilaMarca(i, lista, TbGtable, true));
}

function retornaFilaMarca(c, Grid, TbGtable, op) {
    var RutaImagenAccion = $('#txth_rutaImg').val();
    var strFila = "";
    var imgCol = '<img class="btn-img" src="' + RutaImagenAccion + '/acciones/delete.png" >';
    strFila += '<td style="display:none; border:none;">' + Grid[c]['COD_MAR'] + '</td>';
    strFila += '<td width="100%" style="text-align:left">' + Grid[c]['NOM_MAR'] + '</td>';
    strFila += '<td width="36px" style="text-align:center">';
    strFila += '<a class="btn-img" onclick="eliminarItemsMarca(\'' + Grid[c]['COD_MAR'] + '\',\'' + TbGtable + '\')" >' + imgCol + '</a>';
    strFila += '</td>';
    if (op) {
        strFila = '<tr class="odd gradeX">' + strFila + '</tr>';
    }
    return strFila;
}

function eliminarItemsMarca(val, TbGtable) {
    var ids = "";
    if (sessionStorage.dts_itemMarca) {
        var Grid = JSON.parse(sessionStorage.dts_itemMarca);
        if (Grid.length > 0) {
            //$('#'+TbGtable+' >table >tbody >tr').each(function () {
            $('#' + TbGtable + ' tr').each(function () {
                ids = $(this).find("td").eq(0).html();
                if (ids == val) {
                    var array = findAndRemove(Grid, 'COD_MAR', ids);
                    sessionStorage.dts_itemMarca = JSON.stringify(array);
                    $(this).remove();
                    Grid = JSON.parse(sessionStorage.dts_itemTipo);
                    validarControlSelectTipo(Grid.length-1,'cmb_tipo');
                }
            });
        }
    }
}

function recargarGridMarca() {
    var tGrid = 'TbG_Marca';
    if (sessionStorage.dts_itemMarca) {
        var arr_Grid = JSON.parse(sessionStorage.dts_itemMarca);
        if (arr_Grid.length > 0) {
            $('#' + tGrid + ' >table >tbody').html("");
            for (var i = 0; i < arr_Grid.length; i++) {
                $('#' + tGrid).append(retornaFilaMarca(i, arr_Grid, tGrid, true));
            }
        }
    }
}




function loadDataCreate() {
    recargarGridTipo();//Recargar Tiendas.
    recargarGridMarca();
}