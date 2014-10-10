<?php
/* @var $this NubeRetencionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Nube Retencions',
);

$this->menu=array(
	array('label'=>'Create NubeRetencion', 'url'=>array('create')),
	array('label'=>'Manage NubeRetencion', 'url'=>array('admin')),
);
?>

<h1>Nube Retencions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
