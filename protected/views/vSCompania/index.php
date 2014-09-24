<?php
/* @var $this VSCompaniaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Vscompanias',
);

$this->menu=array(
	array('label'=>'Create VSCompania', 'url'=>array('create')),
	array('label'=>'Manage VSCompania', 'url'=>array('admin')),
);
?>

<h1>Vscompanias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
