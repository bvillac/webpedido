<?php
/* @var $this CLIENTEController */
/* @var $model CLIENTE */

$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->CLI_ID=>array('view','id'=>$model->CLI_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List CLIENTE', 'url'=>array('index')),
	array('label'=>'Create CLIENTE', 'url'=>array('create')),
	array('label'=>'View CLIENTE', 'url'=>array('view', 'id'=>$model->CLI_ID)),
	array('label'=>'Manage CLIENTE', 'url'=>array('admin')),
);
?>

<h1>Update CLIENTE <?php echo $model->CLI_ID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>