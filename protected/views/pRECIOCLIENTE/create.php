<?php
/* @var $this PRECIOCLIENTEController */
/* @var $model PRECIOCLIENTE */

$this->breadcrumbs=array(
	'Precioclientes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PRECIOCLIENTE', 'url'=>array('index')),
	array('label'=>'Manage PRECIOCLIENTE', 'url'=>array('admin')),
);
?>

<h1>Create PRECIOCLIENTE</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>