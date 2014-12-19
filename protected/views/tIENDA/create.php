<?php
/* @var $this TIENDAController */
/* @var $model TIENDA */

$this->breadcrumbs=array(
	'Tiendas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TIENDA', 'url'=>array('index')),
	array('label'=>'Manage TIENDA', 'url'=>array('admin')),
);
?>

<h1>Create TIENDA</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>