<?php
/* @var $this NubeFacturaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Nube Facturas',
);

$this->menu=array(
	array('label'=>'Create NubeFactura', 'url'=>array('create')),
	array('label'=>'Manage NubeFactura', 'url'=>array('admin')),
);
?>

<h1>Nube Facturas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
