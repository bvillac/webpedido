<?php
/* @var $this TIENDAController */
/* @var $model TIENDA */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tienda-form',
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
		<?php echo $form->labelEx($model,'TIE_NOMBRE'); ?>
		<?php echo $form->textField($model,'TIE_NOMBRE',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'TIE_NOMBRE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TIE_DIRECCION'); ?>
		<?php echo $form->textField($model,'TIE_DIRECCION',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'TIE_DIRECCION'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TIE_TELEFONO'); ?>
		<?php echo $form->textField($model,'TIE_TELEFONO',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'TIE_TELEFONO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TIE_CUPO'); ?>
		<?php echo $form->textField($model,'TIE_CUPO',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'TIE_CUPO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TIE_LUG_ENTREGA'); ?>
		<?php echo $form->textField($model,'TIE_LUG_ENTREGA',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'TIE_LUG_ENTREGA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TIE_CONTACTO'); ?>
		<?php echo $form->textField($model,'TIE_CONTACTO',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'TIE_CONTACTO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FEC_INI_PED'); ?>
		<?php echo $form->textField($model,'FEC_INI_PED',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'FEC_INI_PED'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FEC_FIN_PED'); ?>
		<?php echo $form->textField($model,'FEC_FIN_PED',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'FEC_FIN_PED'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TIE_EST_LOG'); ?>
		<?php echo $form->textField($model,'TIE_EST_LOG',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'TIE_EST_LOG'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TIE_FEC_CRE'); ?>
		<?php echo $form->textField($model,'TIE_FEC_CRE'); ?>
		<?php echo $form->error($model,'TIE_FEC_CRE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TIE_FEC_MOD'); ?>
		<?php echo $form->textField($model,'TIE_FEC_MOD'); ?>
		<?php echo $form->error($model,'TIE_FEC_MOD'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->