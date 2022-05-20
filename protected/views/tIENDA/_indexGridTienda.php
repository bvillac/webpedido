<?php

/**
 * Este Archivo contiene las vista de Compañias
 * @author Ing. Byron Villacreses <byronvillacreses@gmail.com>
 * @copyright Copyright &copy; SolucionesVillacreses 2014-09-24
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
?>

<?php

//'Codigo', 'Nombre', 'Estado',
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'TbG_TIENDA',
    'dataProvider' => $model,
    //'template' => "{items}",
    'htmlOptions' => array('style' => 'cursor: pointer;'),
    'selectableRows' => 2,
    //'selectionChanged' => 'verificaAcciones',
    'columns' => array(//Estado
        array(
            'id' => 'chkTienda',
            'name' => 'Estado',
            'header' => Yii::t('TIENDA', 'Status'),
            'value' => '$data["IdsPre"]',
            'class' => 'CCheckBoxColumn',
            'checked' => '($data["Estado"]=="1")?true:false',
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
            'name' => 'Imagen',
            'header' => Yii::t('TIENDA', 'img'),
            'value' => 'VSValidador::mostrarProductos($data["Codigo"])',
            'type' => 'raw',
            //'htmlOptions'=>array('class'=>'icon-th'),
        ),
    ),
));
?>
