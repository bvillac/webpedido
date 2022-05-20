<?php
/* @var $this PRECIOCLIENTEController */
/* @var $model PRECIOCLIENTE */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'PCLI_ID'); ?>
		<?php echo $form->textField($model,'PCLI_ID',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CLI_ID'); ?>
		<?php echo $form->textField($model,'CLI_ID',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ART_ID'); ?>
		<?php echo $form->textField($model,'ART_ID',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PCLI_P_VENTA'); ?>
		<?php echo $form->textField($model,'PCLI_P_VENTA',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PCLI_POR_DES'); ?>
		<?php echo $form->textField($model,'PCLI_POR_DES',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PCLI_VAL_DES'); ?>
		<?php echo $form->textField($model,'PCLI_VAL_DES',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PCLI_EST_LOG'); ?>
		<?php echo $form->textField($model,'PCLI_EST_LOG',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PCLI_FEC_CRE'); ?>
		<?php echo $form->textField($model,'PCLI_FEC_CRE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PCLI_FEC_MOD'); ?>
		<?php echo $form->textField($model,'PCLI_FEC_MOD'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->