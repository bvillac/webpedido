<?php
/* @var $this ROLController */
/* @var $model ROL */

$this->breadcrumbs=array(
	'Rols'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ROL', 'url'=>array('index')),
	array('label'=>'Manage ROL', 'url'=>array('admin')),
);
?>

<h1>Create ROL</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>