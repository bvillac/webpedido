<?php
/* @var $this ROLController */
/* @var $model ROL */

$this->breadcrumbs=array(
	'Rols'=>array('index'),
	$model->ROL_ID=>array('view','id'=>$model->ROL_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List ROL', 'url'=>array('index')),
	array('label'=>'Create ROL', 'url'=>array('create')),
	array('label'=>'View ROL', 'url'=>array('view', 'id'=>$model->ROL_ID)),
	array('label'=>'Manage ROL', 'url'=>array('admin')),
);
?>

<h1>Update ROL <?php echo $model->ROL_ID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>