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
    'id' => 'TbG_ARTICULO',
    'dataProvider' => $model,
    //'template' => "{items}",
    'htmlOptions' => array('style' => 'cursor: pointer;'),
    'selectableRows' => 1,
    'selectionChanged' => 'verificaAcciones',
    'columns' => array(
         array(
          'class' => 'CCheckBoxColumn',
          ),
        array(
            'name' => 'Codigo',
            'header' => Yii::t('USUARIO', 'Código'),
            'value' => '$data["Codigo"]',
        ),
        array(
            'name' => 'Nombre',
            'header' => Yii::t('USUARIO', 'Nombre'),
            'value' => '$data["Nombre"]',
        ),
    
        /*array(
            'name' => 'Estado',
            'header' => Yii::t('USUARIO', 'Status'),
            'value' => '($data["Estado"]=="1")?Yii::t("USUARIO", "Active"):Yii::t("USUARIO", "Inactive")',
            'htmlOptions' => array('style' => 'text-align:center', 'width' => '8px'),
        ),*/
        array(
            'name' => 'Imagen',
            'header' => Yii::t('TIENDA', 'img'),
            'value' => 'VSValidador::mostrarProductos($data["Codigo"])',
            'type' => 'raw',
            //'htmlOptions'=>array('class'=>'icon-th'),
        ),
  
        array(
            'name' => 'Estado',
            'header' => Yii::t('TIENDA', 'Estado'),
            'value' => 'VSValidador::activarDatos("fun_activarItem","TbG_ARTICULO",$data["Codigo"],$data["Estado"],($data["Estado"]==1)?"visto_ok.png":"visto_no.png")',
            'type' => 'raw',
            'htmlOptions' => array('style' => 'text-align:center', 'width' => '4px'),
            //'htmlOptions'=>array('class'=>'icon-th'),
        ),
    ),
));
?>

