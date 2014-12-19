<?php
/* @var $this CLIENTEController */
/* @var $model CLIENTE */

$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->CLI_ID,
);

$this->menu=array(
	array('label'=>'List CLIENTE', 'url'=>array('index')),
	array('label'=>'Create CLIENTE', 'url'=>array('create')),
	array('label'=>'Update CLIENTE', 'url'=>array('update', 'id'=>$model->CLI_ID)),
	array('label'=>'Delete CLIENTE', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->CLI_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CLIENTE', 'url'=>array('admin')),
);
?>

<h1>View CLIENTE #<?php echo $model->CLI_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'CLI_ID',
		'COD_CLIE',
		'CLI_CED_RUC',
		'CLI_NOMBRE',
		'CLI_EST_LOG',
		'CLI_FEC_CRE',
		'CLI_FEC_MOD',
	),
)); ?>
