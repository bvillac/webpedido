<?php
/* @var $this ARTICULOController */
/* @var $model ARTICULO */

$this->breadcrumbs=array(
	'Articulos'=>array('index'),
	$model->ART_ID,
);

$this->menu=array(
	array('label'=>'List ARTICULO', 'url'=>array('index')),
	array('label'=>'Create ARTICULO', 'url'=>array('create')),
	array('label'=>'Update ARTICULO', 'url'=>array('update', 'id'=>$model->ART_ID)),
	array('label'=>'Delete ARTICULO', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ART_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ARTICULO', 'url'=>array('admin')),
);
?>

<h1>View ARTICULO #<?php echo $model->ART_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ART_ID',
		'COD_ART',
		'ART_DES_COM',
		'COD_LIN',
		'COD_TIP',
		'COD_MAR',
		'ART_I_M_IVA',
		'ART_P_VENTA',
		'ART_IMAGEN',
		'ART_EST_LOG',
		'ART_FEC_CRE',
		'ART_FEC_MOD',
	),
)); ?>
