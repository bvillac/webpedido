<?php
/* @var $this ARTICULOTIENDAController */
/* @var $model ARTICULOTIENDA */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ARTIE_ID'); ?>
		<?php echo $form->textField($model,'ARTIE_ID',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TIE_ID'); ?>
		<?php echo $form->textField($model,'TIE_ID',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PCLI_ID'); ?>
		<?php echo $form->textField($model,'PCLI_ID',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ARTIE_EST_LOG'); ?>
		<?php echo $form->textField($model,'ARTIE_EST_LOG',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ARTIE_FEC_CRE'); ?>
		<?php echo $form->textField($model,'ARTIE_FEC_CRE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ARTIE_FEC_MOD'); ?>
		<?php echo $form->textField($model,'ARTIE_FEC_MOD'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->