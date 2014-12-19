<?php
/* @var $this PRECIOCLIENTEController */
/* @var $model PRECIOCLIENTE */

$this->breadcrumbs=array(
	'Precioclientes'=>array('index'),
	$model->PCLI_ID,
);

$this->menu=array(
	array('label'=>'List PRECIOCLIENTE', 'url'=>array('index')),
	array('label'=>'Create PRECIOCLIENTE', 'url'=>array('create')),
	array('label'=>'Update PRECIOCLIENTE', 'url'=>array('update', 'id'=>$model->PCLI_ID)),
	array('label'=>'Delete PRECIOCLIENTE', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->PCLI_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PRECIOCLIENTE', 'url'=>array('admin')),
);
?>

<h1>View PRECIOCLIENTE #<?php echo $model->PCLI_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'PCLI_ID',
		'CLI_ID',
		'ART_ID',
		'PCLI_P_VENTA',
		'PCLI_POR_DES',
		'PCLI_VAL_DES',
		'PCLI_EST_LOG',
		'PCLI_FEC_CRE',
		'PCLI_FEC_MOD',
	),
)); ?>
