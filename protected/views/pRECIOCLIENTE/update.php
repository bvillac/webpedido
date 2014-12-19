<?php
/* @var $this PRECIOCLIENTEController */
/* @var $model PRECIOCLIENTE */

$this->breadcrumbs=array(
	'Precioclientes'=>array('index'),
	$model->PCLI_ID=>array('view','id'=>$model->PCLI_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List PRECIOCLIENTE', 'url'=>array('index')),
	array('label'=>'Create PRECIOCLIENTE', 'url'=>array('create')),
	array('label'=>'View PRECIOCLIENTE', 'url'=>array('view', 'id'=>$model->PCLI_ID)),
	array('label'=>'Manage PRECIOCLIENTE', 'url'=>array('admin')),
);
?>

<h1>Update PRECIOCLIENTE <?php echo $model->PCLI_ID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>