<?php
/* @var $this ROLController */
/* @var $model ROL */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ROL_ID'); ?>
		<?php echo $form->textField($model,'ROL_ID',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ROL_NOMBRE'); ?>
		<?php echo $form->textField($model,'ROL_NOMBRE',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EST_LOG'); ?>
		<?php echo $form->textField($model,'EST_LOG',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FEC_CRE'); ?>
		<?php echo $form->textField($model,'FEC_CRE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FEC_MOD'); ?>
		<?php echo $form->textField($model,'FEC_MOD'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->