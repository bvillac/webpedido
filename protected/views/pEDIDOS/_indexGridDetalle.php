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
//        array(
//            'class' => 'CCheckBoxColumn',
//        ),
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
            'value'=>'($data["EstAut"]=="1")?CHtml::textField("txt_cat_".$data["ArtId"],$data["Cantidad"], array('
                    . '"size" => 8, "maxlength" => 100,"placeholder" => Yii::app()->format->formatNumber(0),'
                    . '"class" => " txt_TextboxNumber2 validation_Vs",'
                    . '"onkeydown" => "pedidoEnterGridTemp(isEnter(event),this,$data[ArtId])",'
                    . '"onblur" => "pedidoEnterGridTemp(isEnter(event),this,$data[ArtId])"'
                    . ')):"0.00"',
            'type'=>'raw',
            'htmlOptions' => array('style' => 'text-align:right', 'width' => '8px'),

        ),
        array(
            'name' => 'Precio',
            'header' => Yii::t('TIENDA', 'Cost'),
            //'value' => 'Yii::app()->format->formatNumber($data["Precio"])',
            'value' => '$data["Precio"]',
            'htmlOptions' => array('style' => 'text-align:right', 'width' => '8px'),
        ),
        array(
            'name' => 'TotVta',
            'header' => Yii::t('TIENDA', 'Total'),
            'value' => 'Yii::app()->format->formatNumber($data["TotVta"])',
            'htmlOptions' => array('style' => 'text-align:right', 'width' => '30px'),
        ),
        array(
            'name' => 'Observacion',
            'header' => Yii::t('TIENDA', 'Observation'),
            'value'=>'CHtml::textField("txt_obs_".$data["ArtId"],$data["Observacion"], array('
                    . '"size" => 30, "maxlength" => 300,"placeholder" => "...",'
                    . '"class" => "validation_Vs",'
                    . '))',
            'type'=>'raw',
            //'headerHtmlOptions' => array('style' => 'width:30px;'),
            //'htmlOptions'=>array('width'=>'30px'), 
            'htmlOptions' => array('style' => 'text-align:center', 'width' => '200px'),
        ),
        array(
            'name' => 'EstAut',
            'header' => Yii::t('TIENDA', 'Status'),
            'value' => '($data["EstAut"]=="1")?Yii::t("TIENDA", "Active"):Yii::t("TIENDA", "Inactive")',
            'htmlOptions' => array('style' => 'text-align:center', 'width' => '8px'),
        ),
        array(
            'name' => 'Imagen',
            'header' => Yii::t('TIENDA', 'img'),
            'value' => 'VSValidador::mostrarProductos($data["Codigo"])',
            'type' => 'raw',
            //'htmlOptions'=>array('class'=>'icon-th'),
        ),
        array(
            'name' => 'Imagen2',
            'header' => Yii::t('TIENDA', 'Eliminar'),
            'value' => 'CHtml::link(CHtml::image(Yii::app()->request->baseUrl."/themes/seablue/images/acciones/delete.png"))',//,array("onmouseover"=>"eliminarItemsTiendas();)
            'type'  => 'raw',
            //'click' => 'function(){fun_ReeEnviarDocumento($data->IdDoc)}',
            'htmlOptions' => array('style' => 'text-align:center', 'width' => '8px'),
        ),

    ),
));
?>