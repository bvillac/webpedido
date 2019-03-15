<?php
    header('Content-type: text/pdf');   // i am getting error on this line
    //$nombreDocumento='data';
    //Cannot modify header information - headers already sent by (output started at D:\xampp\htdocs\yii\framework\web\CController.php:793)
    header('Content-Disposition: Attachment; filename="' . $nombreDocumento . '"');
    readfile($ruta); 
?>

