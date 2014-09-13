<?php
/*if (Yii::app()->params["rsaEncryptUse"]) {
        Yii::app()->getClientScript()->registerCoreScript('bigint');
        Yii::app()->getClientScript()->registerCoreScript('rsa');
        Yii::app()->getClientScript()->registerCoreScript('base64');
    }*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/login-box.css" />
        <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/plantilla/loguito.ico" type="image/x-icon" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>
    <body>
        <div class="login" id="contenedor" align="center">
            <div align="left">
                
                <?php
                //echo CHtml::hiddenField('txth_base', Yii::app()->baseUrl);
                //echo CHtml::hiddenField('txth_theme', Yii::app()->theme->getName());
                ?>
                
                
            </div>
           
                <div id="login-box">
                    <?php echo $content; ?>
                </div>
            
            <!--<div id="logo"></div>
            <div class="contentform">
                
            </div>-->
            
            
        </div>
        
        <!--<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.uniform.min.js"></script>-->
    </body>
</html>
