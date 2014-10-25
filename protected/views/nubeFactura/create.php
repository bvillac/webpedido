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
//$obj = new NubeFactura;
//$obj->insertarFacturas();
//$obj->ClaveAcceso('01','2014-01-01','1790221806001','1','001001','000003012','1');
//$obj->modulo11('060820140109928098410011001001000101253002199121');
//*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//echo "hola";
//$bcode = new CBarCode();
//echo $bcode->output('060820140109928098410011001001000101253002199121',1);


/* Yii::import('system.vendors.barcodegen.class.BCGFont');
  Yii::import('system.vendors.barcodegen.class.BCGColor');
  Yii::import('system.vendors.barcodegen.class.BCGDrawing');
  Yii::import('system.vendors.barcodegen.class.BCGFont');
  Yii::import('system.vendors.barcodegen.class.BCGcode128.barcode');*/
echo dirname(__FILE__).'<br>';///var/www/html/websea/protected/views/nubeFactura
echo $ruta = Yii::app()->basePath.'<br>';///var/www/html/websea/protected
echo Yii::app()->theme->baseUrl.'<br>';///websea/themes/seablue 
echo Yii::app()->baseUrl;

/* SOLUCION VALIDA 
$ruta = Yii::app()->basePath;
require_once($ruta . '/extensions/barcodegen/class/BCGFontFile.php');
require_once($ruta . '/extensions/barcodegen/class/BCGColor.php');
require_once($ruta . '/extensions/barcodegen/class/BCGDrawing.php');
require_once($ruta . '/extensions/barcodegen/class/BCGcode128.barcode.php');

// Loading Font
$font = new BCGFontFile($ruta . '/extensions/barcodegen/font/Arial.ttf', 8);
//$font = new BCGFontFile('./font/Arial.ttf', 18);

// Don't forget to sanitize user inputs
//$text = isset($_GET['text']) ? $_GET['text'] : 'HELLO';
// The arguments are R, G, B for color.
$color_black = new BCGColor(0, 0, 0);
$color_white = new BCGColor(255, 255, 255);

// Barcode Part
$code = new BCGcode128();
$code->setScale(2);
$code->setThickness(30);
$code->setForegroundColor($color_black);
$code->setBackgroundColor($color_white);
$code->setFont($font);
$code->setStart(NULL);
$code->setTilde(true);
$code->parse('xa123');

// Drawing Part
//$drawing = new BCGDrawing(Yii::app()->theme->baseUrl.'/images/plantilla/filename.png', $color_white);
$drawing = new BCGDrawing('', $color_white);
$drawing->setBarcode($code);
$drawing->draw();
$drawing->setFilename('codebar.png');

header('Content-Type: image/png');
//header('Content-Type: text/html; charset=utf-8');

$drawing->finish(BCGDrawing::IMG_FORMAT_PNG);
?>*/
