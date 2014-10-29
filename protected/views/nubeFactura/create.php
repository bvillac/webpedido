<?php

/* @var $this NubeFacturaController */
/* @var $model NubeFactura */

/* $this->breadcrumbs=array(
  'Nube Facturas'=>array('index'),
  'Create',
  );

  $this->menu=array(
  array('label'=>'List NubeFactura', 'url'=>array('index')),
  array('label'=>'Manage NubeFactura', 'url'=>array('admin')),
  ); */
?>

<?php //$this->renderPartial('_form', array('model'=>$model));  ?>

<?php

//require_once(Yii::app()->basePath . '/extensions/my-php-file.php');
$obj = new NubeFactura;
$obj->insertarFacturas();
//$obj->ClaveAcceso('01','2014-01-01','1790221806001','1','001001','000003012','1');
//$obj->modulo11('060820140109928098410011001001000101253002199121');
//*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//echo "hola";
//$bcode = new CBarCode();
//echo $bcode->output('060820140109928098410011001001000101253002199121',1);


/*
echo dirname(__FILE__).'<br>';///var/www/html/websea/protected/views/nubeFactura
echo $ruta = Yii::app()->basePath.'<br>';///var/www/html/websea/protected
echo Yii::app()->theme->baseUrl.'<br>';///websea/themes/seablue 
echo Yii::app()->baseUrl;*/

?>
