<?php
/* @var $this ARTICULOTIENDAController */
/* @var $model ARTICULOTIENDA */

$this->breadcrumbs=array(
	'Articulotiendas'=>array('index'),
	$model->ARTIE_ID,
);

$this->menu=array(
	array('label'=>'List ARTICULOTIENDA', 'url'=>array('index')),
	array('label'=>'Create ARTICULOTIENDA', 'url'=>array('create')),
	array('label'=>'Update ARTICULOTIENDA', 'url'=>array('update', 'id'=>$model->ARTIE_ID)),
	array('label'=>'Delete ARTICULOTIENDA', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ARTIE_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ARTICULOTIENDA', 'url'=>array('admin')),
);
?>

<h1>View ARTICULOTIENDA #<?php echo $model->ARTIE_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ARTIE_ID',
		'TIE_ID',
		'PCLI_ID',
		'ARTIE_EST_LOG',
		'ARTIE_FEC_CRE',
		'ARTIE_FEC_MOD',
	),
)); ?>
