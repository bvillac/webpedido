<?php
/* @var $this ARTICULOController */
/* @var $model ARTICULO */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ART_ID'); ?>
		<?php echo $form->textField($model,'ART_ID',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'COD_ART'); ?>
		<?php echo $form->textField($model,'COD_ART',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ART_DES_COM'); ?>
		<?php echo $form->textField($model,'ART_DES_COM',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'COD_LIN'); ?>
		<?php echo $form->textField($model,'COD_LIN',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'COD_TIP'); ?>
		<?php echo $form->textField($model,'COD_TIP',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'COD_MAR'); ?>
		<?php echo $form->textField($model,'COD_MAR',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ART_I_M_IVA'); ?>
		<?php echo $form->textField($model,'ART_I_M_IVA',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ART_P_VENTA'); ?>
		<?php echo $form->textField($model,'ART_P_VENTA',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ART_IMAGEN'); ?>
		<?php echo $form->textField($model,'ART_IMAGEN',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ART_EST_LOG'); ?>
		<?php echo $form->textField($model,'ART_EST_LOG',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ART_FEC_CRE'); ?>
		<?php echo $form->textField($model,'ART_FEC_CRE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ART_FEC_MOD'); ?>
		<?php echo $form->textField($model,'ART_FEC_MOD'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->