<?php

/**
 * Este Archivo contiene las vista de Compañias
 * @author Ing. Byron Villacreses <byronvillacreses@gmail.com>
 * @copyright Copyright &copy; SolucionesVillacreses 2014-09-24
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
?>
<?php
//'PerId', 'Nombre', 'User', 'Correo', 'Genero', 'Estado',,
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
            'name' => 'Nombre',
            'header' => Yii::t('USUARIO', 'Name'),
            'value' => '$data["Nombre"]',
        ),
        array(
            'name' => 'User',
            'header' => Yii::t('USUARIO', 'User'),
            'value' => '$data["User"]',
        ),
        array(
            'name' => 'Correo',
            'header' => Yii::t('USUARIO', 'Mail'),
            'value' => '$data["Correo"]',
            //'htmlOptions' => array('style' => 'text-align:right', 'width' => '8px'),
        ),
        array(
            'name' => 'Genero',
            'header' => Yii::t('USUARIO', 'Gender'),
            'value' => '($data["Genero"]=="M")?Yii::t("USUARIO", "Male"):Yii::t("USUARIO", "Female")',
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

