<?php
/* @var $this ARTICULOController */
/* @var $model ARTICULO */

$this->breadcrumbs=array(
	'Articulos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ARTICULO', 'url'=>array('index')),
	array('label'=>'Create ARTICULO', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#articulo-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Articulos</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'articulo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ART_ID',
		'COD_ART',
		'ART_DES_COM',
		'COD_LIN',
		'COD_TIP',
		'COD_MAR',
		/*
		'ART_I_M_IVA',
		'ART_P_VENTA',
		'ART_IMAGEN',
		'ART_EST_LOG',
		'ART_FEC_CRE',
		'ART_FEC_MOD',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
