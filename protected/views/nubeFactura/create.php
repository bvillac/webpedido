<?php
/* @var $this NubeFacturaController */
/* @var $model NubeFactura */

$this->breadcrumbs=array(
	'Nube Facturas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List NubeFactura', 'url'=>array('index')),
	array('label'=>'Manage NubeFactura', 'url'=>array('admin')),
);
?>

<h1>Create NubeFactura</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>