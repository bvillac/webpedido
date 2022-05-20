<?php
/* @var $this ARTICULOController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Articulos',
);

$this->menu=array(
	array('label'=>'Create ARTICULO', 'url'=>array('create')),
	array('label'=>'Manage ARTICULO', 'url'=>array('admin')),
);
?>

<h1>Articulos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
