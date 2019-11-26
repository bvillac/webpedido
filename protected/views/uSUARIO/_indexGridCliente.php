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
    'id' => 'TbG_USUARIO',
    'dataProvider' => $model,
    //'template' => "{items}",
    'htmlOptions' => array('style' => 'cursor: pointer;'),
    'selectableRows' => 2,
    //'selectionChanged' => 'verificaAcciones',
    'columns' => array(
         array(
          'class' => 'CCheckBoxColumn',
          ),
        array(
            'name' => 'Rol',
            'header' => Yii::t('USUARIO', 'User role'),
            'value' => '$data["Rol"]',
            //'htmlOptions' => array('style' => 'text-align:left'),
        ),
//        array(
//            'name' => 'Area',
//            'header' => Yii::t('USUARIO', 'Area'),
//            'value' => '$data["Area"]',
//        ),
        array(
            'name' => 'Nombre',
            'header' => Yii::t('USUARIO', 'Nombre'),
            'value' => '$data["Nombre"]',
        ),
        array(
            'name' => 'Departamento',
            'header' => Yii::t('USUARIO', 'Departamento'),
            'value' => '$data["Departamento"]',
        ),
//        array(
//            'name' => 'Correo',
//            'header' => Yii::t('USUARIO', 'Correo'),
//            'value' => '$data["Correo"]',
//        ),
        array(
            'name' => 'Cupo',
            'header' => Yii::t('TIENDA', 'Cupo'),
            'value' => 'Yii::app()->format->formatNumber($data["Cupo"])',
            'htmlOptions' => array('style' => 'text-align:right', 'width' => '20px'),
        ),
        array(
            'name' => 'Eliminar',
            'header' => Yii::t('TIENDA', 'Eliminar'),
            'value' => 'VSValidador::eliminarDatos("fun_DeleteUserCliente","TbG_PEDIDO",$data["Ids"],"delete.png")',
            'type' => 'raw',
            'htmlOptions' => array('style' => 'text-align:center', 'width' => '4px'),
            //'htmlOptions'=>array('class'=>'icon-th'),
        ),
        
//        array(
//            'name' => 'Fecha',
//            'header' => Yii::t('USUARIO', 'Creation date'),
//            'value' => 'date(Yii::app()->params["datebydefault"],strtotime($data["Fecha"]))',
//            'htmlOptions' => array('style' => 'text-align:center', 'width' => '8px'),
//        ),
        /*array(
            'name' => 'Estado',
            'header' => Yii::t('USUARIO', 'Status'),
            'value' => '($data["Estado"]=="1")?Yii::t("USUARIO", "Active"):Yii::t("USUARIO", "Inactive")',
            'htmlOptions' => array('style' => 'text-align:center', 'width' => '8px'),
        ),*/
    ),
));
?>

