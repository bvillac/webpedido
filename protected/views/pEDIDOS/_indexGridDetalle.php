<?php

/**
 * Este Archivo contiene las vista de Compañias
 * @author Ing. Byron Villacreses <byronvillacreses@gmail.com>
 * @copyright Copyright &copy; SolucionesVillacreses 2014-09-24
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
?>

<?php
//'DetId','ArtId','Cant','Precio','TotVta','EstAut','Observa','Codigo','Nombre','ImIva'
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'TbG_PEDIDO',
    'dataProvider' => $DetPed,
    'template' => "{items}",
    'htmlOptions' => array('style' => 'cursor: pointer;'),
    'selectableRows' => 2,
    'selectionChanged' => 'accionPedido',
    'columns' => array(
        array(
            'class' => 'CCheckBoxColumn',
        ),
        array(
            'name' => 'DetId',
            'header' => Yii::t('TIENDA', 'Ids'),
            'value' => '$data["DetId"]',
            'header' => false,
            'filter' => false,
            'headerHtmlOptions' => array('style' => 'width:0px; display:none; border:none; textdecoration:none'),
            'htmlOptions' => array('style' => 'display:none; border:none;'),
        ),
        array(
            'name' => 'ArtId',
            'header' => Yii::t('TIENDA', 'Ids'),
            'value' => '$data["ArtId"]',
            'header' => false,
            'filter' => false,
            'headerHtmlOptions' => array('style' => 'width:0px; display:none; border:none; textdecoration:none'),
            'htmlOptions' => array('style' => 'display:none; border:none;'),
        ),
        array(
            'name' => 'Codigo',
            'header' => Yii::t('TIENDA', 'Code'),
            'value' => '$data["Codigo"]',
        ),
        array(
            'name' => 'Nombre',
            'header' => Yii::t('TIENDA', 'Name'),
            'value' => '$data["Nombre"]',
        ),
        array(
            'name' => 'Cantidad',
            'header' => Yii::t('TIENDA', 'Quantity'),
            //'value' => '$data["Cantidad"]',
            //'htmlOptions' => array('style' => 'text-align:right', 'width' => '8px'),
            'value'=>'CHtml::textField("txt_cat_".$data["DetId"],$data["Cantidad"], array('
                    . '"size" => 8, "maxlength" => 100,"placeholder" => Yii::app()->format->formatNumber(0),'
                    . '"class" => " txt_TextboxNumber2 validation_Vs",'
                    . '"onkeydown" => "pedidoEnterGrid(isEnter(event),this,$data[DetId])",'
                    . '"onblur" => "pedidoEnterGrid(isEnter(event),this,$data[DetId])"'
                    . '))',
            'type'=>'raw',
            'htmlOptions'=>array('width'=>'8px'),

        ),
        array(
            'name' => 'Precio',
            'header' => Yii::t('TIENDA', 'Cost'),
            'value' => 'Yii::app()->format->formatNumber($data["Precio"])',
            'htmlOptions' => array('style' => 'text-align:right', 'width' => '8px'),
        ),
        array(
            'name' => 'TotVta',
            'header' => Yii::t('TIENDA', 'Total'),
            'value' => 'Yii::app()->format->formatNumber($data["TotVta"])',
            'htmlOptions' => array('style' => 'text-align:right', 'width' => '8px'),
        ),
        array(
            'name' => 'Observacion',
            'header' => Yii::t('TIENDA', 'Observation'),
            'value'=>'CHtml::textField("txt_obs_".$data["DetId"],$data["Observacion"], array('
                    . '"size" => 10, "maxlength" => 300,"placeholder" => "...",'
                    . '"class" => "validation_Vs",'
                    . '))',
            'type'=>'raw',
            //'headerHtmlOptions' => array('style' => 'width:30px;'),
            'htmlOptions'=>array('width'=>'30px'),      
        ),
        array(
            'name' => 'EstAut',
            'header' => Yii::t('TIENDA', 'Status'),
            'value' => '($data["EstAut"]=="1")?Yii::t("TIENDA", "Active"):Yii::t("TIENDA", "Inactive")',
        ),

    ),
));
?>