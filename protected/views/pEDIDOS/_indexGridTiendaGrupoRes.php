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
//'IDS', 'AREA', 'TOT_DOC', 'TOTAL',
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'TbG_RESUMEN',
    'dataProvider' => $model,
    'template' => "{items}",
    'htmlOptions' => array('style' => 'cursor: pointer;'),
    'selectableRows' => 2,
    'selectionChanged' => 'verificaAcciones',
    'columns' => array(
        array(
            'class' => 'CCheckBoxColumn',
        ),
        array(
            'name' => 'IDS',
            'header' => Yii::t('TIENDA', 'Number'),
            'value' => '$data["IDS"]',
            'header' => false,
            'filter' => false,
            'headerHtmlOptions' => array('style' => 'width:0px; display:none; border:none; textdecoration:none'),
            'htmlOptions' => array('style' => 'display:none; border:none;'),
        ),
        
        array(
            'name' => 'AREA',
            'header' => Yii::t('TIENDA', 'ÁREA'),
            'value' => '$data["AREA"]',
        ),
        array(
            'name' => 'TOT_DOC',
            'header' => Yii::t('TIENDA', 'NDOC'),
            'value' => '$data["TOT_DOC"]',
        ),
     
        array(
            'name' => 'TOTAL',
            'header' => Yii::t('TIENDA', 'TOTAL'),
            'value' => 'Yii::app()->format->formatNumber($data["TOTAL"])',
            'htmlOptions' => array('style' => 'text-align:right', 'width' => '20px'),
        ),
//        array(
//            'name' => 'Estado',
//            'header' => Yii::t('TIENDA', 'Status'),
//            'value' => '($data["Estado"]=="1")?Yii::t("TIENDA", "Order"):(($data["Estado"]=="2")?Yii::t("TIENDA", "Dressed"):(($data["Estado"]=="3")?Yii::t("TIENDA", "Authorized"):Yii::t("TIENDA", "Canceled")))',
//            'htmlOptions' => array('style' => 'text-align:center', 'width' => '8px'),
//        ),
        
    ),
));
?>