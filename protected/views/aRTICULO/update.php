<?php
/* @var $this ARTICULOController */
/* @var $model ARTICULO */

$this->breadcrumbs=array(
	'Articulos'=>array('index'),
	$model->ART_ID=>array('view','id'=>$model->ART_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List ARTICULO', 'url'=>array('index')),
	array('label'=>'Create ARTICULO', 'url'=>array('create')),
	array('label'=>'View ARTICULO', 'url'=>array('view', 'id'=>$model->ART_ID)),
	array('label'=>'Manage ARTICULO', 'url'=>array('admin')),
);
?>

<h1>Update ARTICULO <?php echo $model->ART_ID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>