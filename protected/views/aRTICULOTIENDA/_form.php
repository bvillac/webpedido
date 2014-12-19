<?php
/* @var $this ARTICULOTIENDAController */
/* @var $model ARTICULOTIENDA */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'articulotienda-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'TIE_ID'); ?>
		<?php echo $form->textField($model,'TIE_ID',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'TIE_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PCLI_ID'); ?>
		<?php echo $form->textField($model,'PCLI_ID',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'PCLI_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ARTIE_EST_LOG'); ?>
		<?php echo $form->textField($model,'ARTIE_EST_LOG',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'ARTIE_EST_LOG'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ARTIE_FEC_CRE'); ?>
		<?php echo $form->textField($model,'ARTIE_FEC_CRE'); ?>
		<?php echo $form->error($model,'ARTIE_FEC_CRE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ARTIE_FEC_MOD'); ?>
		<?php echo $form->textField($model,'ARTIE_FEC_MOD'); ?>
		<?php echo $form->error($model,'ARTIE_FEC_MOD'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->