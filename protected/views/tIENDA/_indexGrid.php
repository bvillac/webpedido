<?php

/**
 * Este Archivo contiene las vista de Compañias
 * @author Ing. Byron Villacreses <byronvillacreses@gmail.com>
 * @copyright Copyright &copy; SolucionesVillacreses 2014-09-24
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
?>
<?php
//'TIE_ID', 'TIE_NOMBRE', 'TIE_DIRECCION', 'TIE_CUPO', 'CLI_NOMBRE','TIE_CONTACTO',
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'TbG_TIENDA',
    'dataProvider' => $model,
    //'template' => "{items}",
    'htmlOptions' => array('style' => 'cursor: pointer;'),
    'selectableRows' => 2,
    'selectionChanged' => 'verificaAcciones',
    'columns' => array(
         array(
          'class' => 'CCheckBoxColumn',
          ),
        array(
            'name' => 'TIE_NOMBRE',
            'header' => Yii::t('TIENDA', 'Name'),
            'value' => '$data["TIE_NOMBRE"]',
        ),
        array(
            'name' => 'TIE_DIRECCION',
            'header' => Yii::t('TIENDA', 'Address'),
            'value' => '$data["TIE_DIRECCION"]',
        ),
        array(
            'name' => 'TIE_CUPO',
            'header' => Yii::t('TIENDA', 'Quota'),
            'value' => '$data["TIE_CUPO"]',
            'htmlOptions' => array('style' => 'text-align:right', 'width' => '8px'),
        ),
        array(
            'name' => 'CLI_NOMBRE',
            'header' => Yii::t('TIENDA', 'Client'),
            'value' => '$data["CLI_NOMBRE"]',
        ),
        array(
            'name' => 'TIE_CONTACTO',
            'header' => Yii::t('TIENDA', 'Contact'),
            'value' => '$data["TIE_CONTACTO"]',
        ),
//        array(
//            'class' => 'CButtonColumn',
//            'template' => '{edit}{deletex}',
//            'buttons' => array(
//                'edit' => array(
//                    'label' => 'Editar',
//                    'imageUrl'=>Yii::app()->theme->baseUrl . Yii::app()->params['rutaIconos'].'edit.png', //ruta del icono
//                    //'click' => 'js:obtenerSeleccion',
//                ),
//                'deletex' => array(
//                    'label' => ' Eliminar',
//                    'imageUrl'=>Yii::app()->theme->baseUrl . Yii::app()->params['rutaIconos'].'delete.png', //ruta del icono
//                    //'click' => 'js:obtenerSeleccion',
//                    //'click'=>'function(){$("#dialog_id").dialog("open"); return false;}',
//                ),
//            ),
//        ),

    ),
));
?>

