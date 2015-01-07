<?php

/**
 * Este Archivo contiene las vista de Compañias
 * @author Ing. Byron Villacreses <byronvillacreses@gmail.com>
 * @copyright Copyright &copy; SolucionesVillacreses 2014-09-24
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
?>

<?php
//'PedID','TieID','Total','FechaPedido','NombreTienda','DireccionTienda','NombrePersona',
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'TbG_PEDIDO',
    'dataProvider' => $model,
    'template' => "{items}",
    'htmlOptions' => array('style' => 'cursor: pointer;'),
    'selectableRows' => 2,
    //'selectionChanged' => 'verificaAcciones',
    'columns' => array(
        array(
            'class' => 'CCheckBoxColumn',
        ),
        array(
            'name' => 'PedID',
            'header' => Yii::t('TIENDA', 'Number'),
            'value' => '$data["PedID"]',
            'header' => false,
            'filter' => false,
            'headerHtmlOptions' => array('style' => 'width:0px; display:none; border:none; textdecoration:none'),
            'htmlOptions' => array('style' => 'display:none; border:none;'),
        ),
        array(
            'name' => 'Numero',
            'header' => Yii::t('TIENDA', 'Number'),
            'value' => '$data["Numero"]',
        ),
        array(
            'name' => 'FechaPedido',
            'header' => Yii::t('TIENDA', 'Date'),
            'value' => '$data["FechaPedido"]',
        ),
        array(
            'name' => 'NombreTienda',
            'header' => Yii::t('TIENDA', 'Store name'),
            'value' => '$data["NombreTienda"]',
        ),
        array(
            'name' => 'NombrePersona',
            'header' => Yii::t('TIENDA', 'User order'),
            'value' => '$data["NombrePersona"]',
        ),
        array(
            'name' => 'Total',
            'header' => Yii::t('TIENDA', 'Total'),
            'value' => 'Yii::app()->format->formatNumber($data["Total"])',
            'htmlOptions' => array('style' => 'text-align:right', 'width' => '8px'),
        ),
        array(
            'name' => 'Estado',
            'header' => Yii::t('TIENDA', 'Status'),
            'value' => '($data["Estado"]=="1")?Yii::t("TIENDA", "Order"):(($data["Estado"]=="2")?Yii::t("TIENDA", "Dressed"):(($data["Estado"]=="3")?Yii::t("TIENDA", "Authorized"):Yii::t("TIENDA", "Canceled")))',
        ),
    ),
));
?>