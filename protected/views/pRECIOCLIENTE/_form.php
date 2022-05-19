<?php
/* @var $this PRECIOCLIENTEController */
/* @var $model PRECIOCLIENTE */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'preciocliente-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'CLI_ID'); ?>
		<?php echo $form->textField($model,'CLI_ID',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'CLI_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ART_ID'); ?>
		<?php echo $form->textField($model,'ART_ID',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'ART_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PCLI_P_VENTA'); ?>
		<?php echo $form->textField($model,'PCLI_P_VENTA',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'PCLI_P_VENTA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PCLI_POR_DES'); ?>
		<?php echo $form->textField($model,'PCLI_POR_DES',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'PCLI_POR_DES'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PCLI_VAL_DES'); ?>
		<?php echo $form->textField($model,'PCLI_VAL_DES',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'PCLI_VAL_DES'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PCLI_EST_LOG'); ?>
		<?php echo $form->textField($model,'PCLI_EST_LOG',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'PCLI_EST_LOG'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PCLI_FEC_CRE'); ?>
		<?php echo $form->textField($model,'PCLI_FEC_CRE'); ?>
		<?php echo $form->error($model,'PCLI_FEC_CRE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PCLI_FEC_MOD'); ?>
		<?php echo $form->textField($model,'PCLI_FEC_MOD'); ?>
		<?php echo $form->error($model,'PCLI_FEC_MOD'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->