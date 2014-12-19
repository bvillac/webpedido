<?php
/* @var $this CLIENTEController */
/* @var $model CLIENTE */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'CLI_ID'); ?>
		<?php echo $form->textField($model,'CLI_ID',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'COD_CLIE'); ?>
		<?php echo $form->textField($model,'COD_CLIE',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CLI_CED_RUC'); ?>
		<?php echo $form->textField($model,'CLI_CED_RUC',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CLI_NOMBRE'); ?>
		<?php echo $form->textField($model,'CLI_NOMBRE',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CLI_EST_LOG'); ?>
		<?php echo $form->textField($model,'CLI_EST_LOG',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CLI_FEC_CRE'); ?>
		<?php echo $form->textField($model,'CLI_FEC_CRE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CLI_FEC_MOD'); ?>
		<?php echo $form->textField($model,'CLI_FEC_MOD'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->