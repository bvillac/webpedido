<?php
/* @var $this VSCompaniaController */
/* @var $model VSCompania */

$this->breadcrumbs=array(
	'Vscompanias'=>array('index'),
	$model->IdCompania=>array('view','id'=>$model->IdCompania),
	'Update',
);

$this->menu=array(
	array('label'=>'List VSCompania', 'url'=>array('index')),
	array('label'=>'Create VSCompania', 'url'=>array('create')),
	array('label'=>'View VSCompania', 'url'=>array('view', 'id'=>$model->IdCompania)),
	array('label'=>'Manage VSCompania', 'url'=>array('admin')),
);
?>

<h1>Update VSCompania <?php echo $model->IdCompania; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>