<?php
/**
 * Este Archivo contiene las vista de Compañias
 * @author Ing. Byron Villacreses <byronvillacreses@gmail.com>
 * @copyright Copyright &copy; SolucionesVillacreses 2014-09-24
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
?>

<?php
/* @var $this VSCompaniaController */
/* @var $dataProvider CActiveDataProvider */
/*$this->breadcrumbs=array(
	'Vscompanias',
);*/

echo $model;
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>


<?php //echo $this->renderPartial('_indexGrid',array('model' => $model)); ?>

