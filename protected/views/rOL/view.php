<?php
/* @var $this ROLController */
/* @var $model ROL */

$this->breadcrumbs=array(
	'Rols'=>array('index'),
	$model->ROL_ID,
);

$this->menu=array(
	array('label'=>'List ROL', 'url'=>array('index')),
	array('label'=>'Create ROL', 'url'=>array('create')),
	array('label'=>'Update ROL', 'url'=>array('update', 'id'=>$model->ROL_ID)),
	array('label'=>'Delete ROL', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ROL_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ROL', 'url'=>array('admin')),
);
?>

<h1>View ROL #<?php echo $model->ROL_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ROL_ID',
		'ROL_NOMBRE',
		'EST_LOG',
		'FEC_CRE',
		'FEC_MOD',
	),
)); ?>
