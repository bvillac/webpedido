<?php
/* @var $this VSCompaniaController */
/* @var $model VSCompania */

$this->breadcrumbs=array(
	'Vscompanias'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List VSCompania', 'url'=>array('index')),
	array('label'=>'Manage VSCompania', 'url'=>array('admin')),
);
?>

<h1>Create VSCompania</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>