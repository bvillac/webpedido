<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */
$this->renderPartial('_include');

$this->pageTitle = Yii::app()->name . ' - Recuperar Clave';
$this->breadcrumbs = array(
    'Recuperar',
);
?>
<h4>Recuperar Clave</h4>
<div class="col-lg-12">
    <div id="messageInfo" style="display: none;" class="alert alert-success alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    </div>
</div>
<div class="col-lg-12">
    <div class="form-group rowLine">
        <div class="rowTd">
            <?php
            echo CHtml::textField('txt_correo', '', array('size' => 60, 'maxlength' => 100,
                'class' => 'form-control',
                'placeholder' => Yii::t('GENERAL', 'Correo Electrónico')
            ))
            ?>
        </div>
    </div>
    <div class="form-group buttons">
        <?php //echo CHtml::submitButton(Yii::t('GENERAL', 'Recuperar'), array('class' => 'btn btn-lg btn-success btn-block')); ?>
        <?php
            echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Recuperar'), array(
                'id' => 'btn_aceptar',
                'name' => 'btn_aceptar',
                'class' => 'btn btn-lg btn-success btn-block',
                'onclick' => 'setRecuperar()'
            ));
            ?>
    </div>
    <div class="form-group rowLine">
        <span><?php echo CHtml::link(Yii::t('TIENDA', '< Regresar'), array('/site/login'));?></span>
    </div>
</div>
<script src="<?php echo Yii::app()->baseUrl; ?>/themes/general/jquery/jquery.min.js" type="text/javascript"></script>
