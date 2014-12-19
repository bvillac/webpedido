<?php
/* @var $this ARTICULOTIENDAController */
/* @var $model ARTICULOTIENDA */

$this->breadcrumbs=array(
	'Articulotiendas'=>array('index'),
	$model->ARTIE_ID=>array('view','id'=>$model->ARTIE_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List ARTICULOTIENDA', 'url'=>array('index')),
	array('label'=>'Create ARTICULOTIENDA', 'url'=>array('create')),
	array('label'=>'View ARTICULOTIENDA', 'url'=>array('view', 'id'=>$model->ARTIE_ID)),
	array('label'=>'Manage ARTICULOTIENDA', 'url'=>array('admin')),
);
?>

<h1>Update ARTICULOTIENDA <?php echo $model->ARTIE_ID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>