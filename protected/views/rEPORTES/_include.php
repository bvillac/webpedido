<?php
$ruta = dirname(__FILE__) . DIRECTORY_SEPARATOR;
$cs = Yii::app()->getClientScript();
$baseUrl = Yii::app()->getAssetManager()->publish($ruta . 'js/reportes.js');
$cs->registerScriptFile($baseUrl);
//$baseUrl = Yii::app()->getAssetManager()->publish($ruta . 'css/reportes.css');
//$cs->registerCssFile($baseUrl);
?>