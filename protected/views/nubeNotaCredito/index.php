<?php
/* @var $this NubeNotaCreditoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Nube Nota Creditos',
);

$this->menu=array(
	array('label'=>'Create NubeNotaCredito', 'url'=>array('create')),
	array('label'=>'Manage NubeNotaCredito', 'url'=>array('admin')),
);
?>

<h1>Nube Nota Creditos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
