<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>

<!--<p><?php //echo Yii::t('GENERAL', 'Please fill out the following form with your login credentials:')   ?></p>-->
<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'login-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    ));
    ?>

    <?php //echo Yii::t('GENERAL', 'Fields with * are required.')  ?>

    <div class="form-group">
        <?php //echo $form->labelEx($model,'username'); ?>
        <?php
        echo $form->textField($model, 'username', array(
            'class' => 'form-control',
            'placeholder' => Yii::t('TIENDA', 'E-mail'),
            'onkeydown' => "fun_loginTienda(isEnter(event),this)",
        ));
        ?>
        <?php echo $form->error($model, 'username'); ?>
    </div>
    <div class="form-group">
        <?php //echo $form->labelEx($model,'password');  ?>
        <?php echo $form->passwordField($model, 'password', array('class' => 'form-control', 'placeholder' => Yii::t('TIENDA', 'Password'))); ?>
        <?php echo $form->error($model, 'password'); ?>
        <p class="hint">
            <!--Hint: You may login with <kbd>demo</kbd>/<kbd>demo</kbd> or <kbd>admin</kbd>/<kbd>admin</kbd>.-->
            <!--<?php //echo Yii::t('GENERAL', 'Hint: You may login with demo/demo or admin/admin.')   ?>-->
        </p>
    </div>
    <!--<div class="form-group">
        <div id="cmb_tienda">COMBO</div>
    </div>-->

    <div class="checkbox">
        <?php echo $form->checkBox($model, 'rememberMe'); ?>
        <span style="text-align:left"><?php echo $form->label($model, 'rememberMe'); ?></span>
        <?php echo $form->error($model, 'rememberMe'); ?>
    </div>

    <div class="form-group buttons">
        <?php echo CHtml::submitButton(Yii::t('GENERAL', 'Login'), array('class' => 'btn btn-lg btn-success btn-block')); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->

<!--<script>
    function isEnter(e) {
        //retornar verdadereo si presiona Enter
        var key;
        if (window.event) // IE
        {
            key = e.keyCode;
            if (key == 13 || key == 9) {
                return true;
            }
        } else if (e.which) { // Netscape/Firefox/Opera
            key = e.which;
            // NOTE: Backspace = 8, Enter = 13, '0' = 48, '9' = 57	
            //var key = nav4 ? evt.which : evt.keyCode;	
            if (key == 13 || key == 9) {
                return true;
            }
        }
        return false;
    }
    function fun_loginTienda(valor, control) {
        if (control.value.length > 0) {
            var link = "site/LoginTienda";
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: link,
                data: {
                    "DATA": control.value,
                },
                success: function (data) {
                    if (data.status == "OK") {
                        //alert('hola');
                        //$("#messageInfo").html(data.message + buttonAlert);
                        //alerMessage();
                    } else {
                        //$("#messageInfo").html(data.message + buttonAlert);
                        //alerMessage();
                    }
                },
            });
        }
    }
</script>-->