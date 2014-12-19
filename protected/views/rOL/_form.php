<?php
/* @var $this ROLController */
/* @var $model ROL */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rol-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ROL_NOMBRE'); ?>
		<?php echo $form->textField($model,'ROL_NOMBRE',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'ROL_NOMBRE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EST_LOG'); ?>
		<?php echo $form->textField($model,'EST_LOG',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'EST_LOG'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FEC_CRE'); ?>
		<?php echo $form->textField($model,'FEC_CRE'); ?>
		<?php echo $form->error($model,'FEC_CRE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FEC_MOD'); ?>
		<?php echo $form->textField($model,'FEC_MOD'); ?>
		<?php echo $form->error($model,'FEC_MOD'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->