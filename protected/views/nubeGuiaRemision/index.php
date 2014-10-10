<?php
/* @var $this NubeGuiaRemisionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Nube Guia Remisions',
);

$this->menu=array(
	array('label'=>'Create NubeGuiaRemision', 'url'=>array('create')),
	array('label'=>'Manage NubeGuiaRemision', 'url'=>array('admin')),
);
?>

<h1>Nube Guia Remisions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
