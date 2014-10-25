
<htmlpageheader name="myheader">
    <table width="100%"><tr>
            <td width="50%" style="color:#0000BB;"><span style="font-weight: bold; font-size: 14pt;">Juzgado de Paz de Hohenau</span><br />República del Paraguay<br /><span style="font-size: 15pt;">&#9742;</span> 0775-232355</td>
            <td width="50%" style="text-align: right;"><b>Listado de Productos</b></td>
        </tr></table>
</htmlpageheader>

<htmlpagefooter name="myfooter">
    <div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
        Página {PAGENO} de {nb}
    </div>
</htmlpagefooter>

<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
<sethtmlpagefooter name="myfooter" value="on" />


<div style="text-align: right"><b>Fecha: </b><?php echo date("d/m/Y"); ?> </div>
<b>Total Resultados:</b> <?php //echo $contador;  ?>
<table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse;" cellpadding="5">
    <thead>
        <tr>
            <td width="16.666666666667%">ID</td>
            <td width="16.666666666667%">Categoría</td>
            <td width="16.666666666667%">Marca</td>
            <td width="16.666666666667%">Descripción</td>
            <td width="16.666666666667%">Unidad de medida</td>
            <td width="16.666666666667%">Precio Compra</td>
            <td width="6.666666666667%">% Dcto</td>
            <td width="6.666666666667%">% IVA</td>
        </tr>
    </thead>
    <tbody>
        <!-- ITEMS -->
        <?php foreach ($model as $row): ?>
            <tr>
                <td align="center">
                    <?php //echo $row->id_producto; ?>
                </td>
                <td align="center">
                    <?php //echo $row->categoria->desc_categoria; ?>
                </td>
                <td align="center">
                    <?php //echo $row->marca->desc_marca; ?>
                </td>
                <td align="center">
                    <?php //echo $row->descripcion; ?>
                </td>
                <td align="center">
                    <?php //echo $row->unidad_medida; ?>
                </td>
                <td align="center">
                    <?php //echo MyModel::formatoPrecio($row->precio_compra); ?>
                </td>
                <td align="center">
                    <?php //echo ($row->descuento); ?>
                </td>
                <td align="center">
                    <?php //echo ($row->idIgv->desc); ?>
                </td>
            </tr>
        <?php endforeach; ?>
        <!-- FIN ITEMS -->
        <tr>
            <td class="blanktotal" colspan="8" rowspan="8"></td>
        </tr>
    </tbody>
</table>
</body>
</html>
