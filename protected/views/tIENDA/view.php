<?php
/* @var $this TIENDAController */
/* @var $model TIENDA */

$this->breadcrumbs=array(
	'Tiendas'=>array('index'),
	$model->TIE_ID,
);

$this->menu=array(
	array('label'=>'List TIENDA', 'url'=>array('index')),
	array('label'=>'Create TIENDA', 'url'=>array('create')),
	array('label'=>'Update TIENDA', 'url'=>array('update', 'id'=>$model->TIE_ID)),
	array('label'=>'Delete TIENDA', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->TIE_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TIENDA', 'url'=>array('admin')),
);
?>

<h1>View TIENDA #<?php echo $model->TIE_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'TIE_ID',
		'CLI_ID',
		'TIE_NOMBRE',
		'TIE_DIRECCION',
		'TIE_TELEFONO',
		'TIE_CUPO',
		'TIE_LUG_ENTREGA',
		'TIE_CONTACTO',
		'FEC_INI_PED',
		'FEC_FIN_PED',
		'TIE_EST_LOG',
		'TIE_FEC_CRE',
		'TIE_FEC_MOD',
	),
)); ?>
