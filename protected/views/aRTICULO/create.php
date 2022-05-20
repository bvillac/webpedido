<?php
/* @var $this ARTICULOController */
/* @var $model ARTICULO */

$this->breadcrumbs=array(
	'Articulos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ARTICULO', 'url'=>array('index')),
	array('label'=>'Manage ARTICULO', 'url'=>array('admin')),
);
?>

<h1>Create ARTICULO</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>