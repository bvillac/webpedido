<?php
/* @var $this ARTICULOTIENDAController */
/* @var $model ARTICULOTIENDA */

$this->breadcrumbs=array(
	'Articulotiendas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ARTICULOTIENDA', 'url'=>array('index')),
	array('label'=>'Manage ARTICULOTIENDA', 'url'=>array('admin')),
);
?>

<h1>Create ARTICULOTIENDA</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>