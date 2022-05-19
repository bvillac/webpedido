<?php
/* @var $this PRECIOCLIENTEController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Precioclientes',
);

$this->menu=array(
	array('label'=>'Create PRECIOCLIENTE', 'url'=>array('create')),
	array('label'=>'Manage PRECIOCLIENTE', 'url'=>array('admin')),
);
?>

<h1>Precioclientes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
