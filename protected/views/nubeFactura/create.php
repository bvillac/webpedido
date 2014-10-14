<?php
/* @var $this NubeFacturaController */
/* @var $model NubeFactura */

/*$this->breadcrumbs=array(
	'Nube Facturas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List NubeFactura', 'url'=>array('index')),
	array('label'=>'Manage NubeFactura', 'url'=>array('admin')),
);*/
?>

<?php //$this->renderPartial('_form', array('model'=>$model)); ?>

<?php
    //require_once(Yii::app()->basePath . '/extensions/my-php-file.php');
    $obj = new NubeFactura;
    $obj->insertarFacturas();
    //echo "hola";
?>