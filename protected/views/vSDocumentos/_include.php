<?php
$ruta = dirname(__FILE__) . DIRECTORY_SEPARATOR;
$cs = Yii::app()->getClientScript();
$baseUrl = Yii::app()->getAssetManager()->publish($ruta . 'js/vsDocumentos.js');
$cs->registerScriptFile($baseUrl);
//$baseUrl = Yii::app()->getAssetManager()->publish($ruta . 'css/vsDocumentos.css');
//$cs->registerCssFile($baseUrl);
?>