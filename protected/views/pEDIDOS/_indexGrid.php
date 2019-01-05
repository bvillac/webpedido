<?php

/**
 * Este Archivo contiene las vista de Compañias
 * @author Ing. Byron Villacreses <byronvillacreses@gmail.com>
 * @copyright Copyright &copy; SolucionesVillacreses 2014-09-24
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
?>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'TbG_PEDIDO',
    'dataProvider' => $model,
    'template' => "{items}",
    'htmlOptions' => array('style' => 'cursor: pointer;'),
    //'selectableRows' => 2,
    //'selectionChanged' => 'verificaAcciones',
    'columns' => array(
//        array(
//            'class' => 'CCheckBoxColumn',
//        ),
        array(
            'name' => 'ARTIE_ID',
            'header' => Yii::t('TIENDA', 'Ids'),
            'value' => '$data["ARTIE_ID"]',
            'header' => false,
            'filter' => false,
            'headerHtmlOptions' => array('style' => 'width:0px; display:none; border:none; textdecoration:none'),
            'htmlOptions' => array('style' => 'display:none; border:none;'),
        ),
        array(
            'name' => 'ART_ID',
            'header' => Yii::t('TIENDA', 'Ids'),
            'value' => '$data["ART_ID"]',
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
            'value'=>'CHtml::textField("txt_cat_".$data["ARTIE_ID"],"", array('
                    . '"size" => 8, "maxlength" => 100,"placeholder" => Yii::app()->format->formatNumber(0),'
                    . '"class" => " txt_TextboxNumber2 validation_Vs",'
                    . '"onkeydown" => "pedidoEnterGrid(isEnter(event),this,$data[ARTIE_ID])",'
                    . '"onblur" => "pedidoEnterGrid(true,this,$data[ARTIE_ID])"'
                    . '))',
            'type'=>'raw',
            'htmlOptions'=>array('width'=>'8px'),

        ),
        array(
            'name' => 'Precio',
            'header' => Yii::t('TIENDA', 'Cost'),
            //'value' => 'Yii::app()->format->number4Format($data["Precio"])',
            'value' => '$data["Precio"]',
            'htmlOptions' => array('style' => 'text-align:right', 'width' => '8px'),
        ),
        array(
            'name' => 'Total',
            'header' => Yii::t('TIENDA', 'Total'),
            'value' => 'Yii::app()->format->formatNumber($data["Total"])',
            'htmlOptions' => array('style' => 'text-align:right', 'width' => '8px'),
        ),
        array(
            'name' => 'Observacion',
            'header' => Yii::t('TIENDA', 'Observation'),
            'value'=>'CHtml::textField("txt_obs_".$data["ARTIE_ID"],"", array('
                    . '"size" => 10, "maxlength" => 300,"placeholder" => "...",'
                    . '"class" => "validation_Vs",'
                    . '))',
            'type'=>'raw',
            //'headerHtmlOptions' => array('style' => 'width:30px;'),
            'htmlOptions'=>array('width'=>'30px'),      
        ),
        array(
            'name' => 'Imagen',
            'header' => Yii::t('TIENDA', 'img'),
            //'value' => CHtml::image(Yii::app()->request->baseUrl . '/path/' . $model->filename),
            //'value' => CHtml::image(Yii::app()->params['rutapro']  ),
            'value'=> '(!empty($data["Codigo"]))?CHtml::image(Yii::app()->params["rutapro"].$data["Codigo"]."_G-01.jpg","img",array("style"=>"width:25px;height:25px;")):"no image"',
            //'value'=> 'CHtml::image(Yii::app()->params["rutapro"].$data["Codigo"]."_G-01.jpg","img",array("style"=>"width:25px;height:25px;"))',
            //'value' => Yii::app()->params["rutapro"].'$data["Codigo"]'."_G-01.jpg",    
            //'type' => 'raw',
            'type'=>'html',
            //'type'=>'image',
            //'htmlOptions'=>array('class'=>'myclass'),
        ),
        
    ),
));
?>