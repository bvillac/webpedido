<?php
/* @var $this ARTICULOController */
/* @var $model ARTICULO */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'articulo-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'COD_ART'); ?>
		<?php echo $form->textField($model,'COD_ART',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'COD_ART'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ART_DES_COM'); ?>
		<?php echo $form->textField($model,'ART_DES_COM',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'ART_DES_COM'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'COD_LIN'); ?>
		<?php echo $form->textField($model,'COD_LIN',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'COD_LIN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'COD_TIP'); ?>
		<?php echo $form->textField($model,'COD_TIP',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'COD_TIP'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'COD_MAR'); ?>
		<?php echo $form->textField($model,'COD_MAR',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'COD_MAR'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ART_I_M_IVA'); ?>
		<?php echo $form->textField($model,'ART_I_M_IVA',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'ART_I_M_IVA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ART_P_VENTA'); ?>
		<?php echo $form->textField($model,'ART_P_VENTA',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'ART_P_VENTA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ART_IMAGEN'); ?>
		<?php echo $form->textField($model,'ART_IMAGEN',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'ART_IMAGEN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ART_EST_LOG'); ?>
		<?php echo $form->textField($model,'ART_EST_LOG',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'ART_EST_LOG'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ART_FEC_CRE'); ?>
		<?php echo $form->textField($model,'ART_FEC_CRE'); ?>
		<?php echo $form->error($model,'ART_FEC_CRE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ART_FEC_MOD'); ?>
		<?php echo $form->textField($model,'ART_FEC_MOD'); ?>
		<?php echo $form->error($model,'ART_FEC_MOD'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->