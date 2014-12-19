<?php
/* @var $this CLIENTEController */
/* @var $model CLIENTE */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cliente-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'COD_CLIE'); ?>
		<?php echo $form->textField($model,'COD_CLIE',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'COD_CLIE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CLI_CED_RUC'); ?>
		<?php echo $form->textField($model,'CLI_CED_RUC',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'CLI_CED_RUC'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CLI_NOMBRE'); ?>
		<?php echo $form->textField($model,'CLI_NOMBRE',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'CLI_NOMBRE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CLI_EST_LOG'); ?>
		<?php echo $form->textField($model,'CLI_EST_LOG',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'CLI_EST_LOG'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CLI_FEC_CRE'); ?>
		<?php echo $form->textField($model,'CLI_FEC_CRE'); ?>
		<?php echo $form->error($model,'CLI_FEC_CRE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CLI_FEC_MOD'); ?>
		<?php echo $form->textField($model,'CLI_FEC_MOD'); ?>
		<?php echo $form->error($model,'CLI_FEC_MOD'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->