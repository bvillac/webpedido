<?php
/* @var $this TIENDAController */
/* @var $model TIENDA */

$this->breadcrumbs=array(
	'Tiendas'=>array('index'),
	$model->TIE_ID=>array('view','id'=>$model->TIE_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List TIENDA', 'url'=>array('index')),
	array('label'=>'Create TIENDA', 'url'=>array('create')),
	array('label'=>'View TIENDA', 'url'=>array('view', 'id'=>$model->TIE_ID)),
	array('label'=>'Manage TIENDA', 'url'=>array('admin')),
);
?>

<h1>Update TIENDA <?php echo $model->TIE_ID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>