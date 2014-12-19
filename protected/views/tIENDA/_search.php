<?php
/* @var $this TIENDAController */
/* @var $model TIENDA */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'TIE_ID'); ?>
		<?php echo $form->textField($model,'TIE_ID',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CLI_ID'); ?>
		<?php echo $form->textField($model,'CLI_ID',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TIE_NOMBRE'); ?>
		<?php echo $form->textField($model,'TIE_NOMBRE',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TIE_DIRECCION'); ?>
		<?php echo $form->textField($model,'TIE_DIRECCION',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TIE_TELEFONO'); ?>
		<?php echo $form->textField($model,'TIE_TELEFONO',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TIE_CUPO'); ?>
		<?php echo $form->textField($model,'TIE_CUPO',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TIE_LUG_ENTREGA'); ?>
		<?php echo $form->textField($model,'TIE_LUG_ENTREGA',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TIE_CONTACTO'); ?>
		<?php echo $form->textField($model,'TIE_CONTACTO',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FEC_INI_PED'); ?>
		<?php echo $form->textField($model,'FEC_INI_PED',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FEC_FIN_PED'); ?>
		<?php echo $form->textField($model,'FEC_FIN_PED',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TIE_EST_LOG'); ?>
		<?php echo $form->textField($model,'TIE_EST_LOG',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TIE_FEC_CRE'); ?>
		<?php echo $form->textField($model,'TIE_FEC_CRE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TIE_FEC_MOD'); ?>
		<?php echo $form->textField($model,'TIE_FEC_MOD'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->