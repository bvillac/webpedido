<?php

/**
 * Este Archivo contiene las vista de Compañias
 * @author Ing. Byron Villacreses <byronvillacreses@gmail.com>
 * @copyright Copyright &copy; SolucionesVillacreses 2014-09-24
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
?>
<?php
//'Usuario', 'TiendaNombre', 'Rol', 'Fecha', 'Estado',
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'TbG_USUARIO',
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
            'name' => 'Usuario',
            'header' => Yii::t('USUARIO', 'User'),
            'value' => '$data["Usuario"]',
        ),
        array(
            'name' => 'TiendaNombre',
            'header' => Yii::t('USUARIO', 'Name store'),
            'value' => '$data["TiendaNombre"]',
        ),
        array(
            'name' => 'Rol',
            'header' => Yii::t('USUARIO', 'User role'),
            'value' => '$data["Rol"]',
            //'htmlOptions' => array('style' => 'text-align:left'),
        ),
        array(
            'name' => 'Fecha',
            'header' => Yii::t('USUARIO', 'Creation date'),
            'value' => 'date(Yii::app()->params["datebydefault"],strtotime($data["Fecha"]))',
            'htmlOptions' => array('style' => 'text-align:center', 'width' => '8px'),
        ),
        array(
            'name' => 'Estado',
            'header' => Yii::t('USUARIO', 'Status'),
            'value' => '($data["Estado"]=="1")?Yii::t("USUARIO", "Active"):Yii::t("USUARIO", "Inactive")',
            'htmlOptions' => array('style' => 'text-align:center', 'width' => '8px'),
        ),
    ),
));
?>

