<?php
/* @var $this ROLController */
/* @var $data ROL */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ROL_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ROL_ID), array('view', 'id'=>$data->ROL_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ROL_NOMBRE')); ?>:</b>
	<?php echo CHtml::encode($data->ROL_NOMBRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EST_LOG')); ?>:</b>
	<?php echo CHtml::encode($data->EST_LOG); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FEC_CRE')); ?>:</b>
	<?php echo CHtml::encode($data->FEC_CRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FEC_MOD')); ?>:</b>
	<?php echo CHtml::encode($data->FEC_MOD); ?>
	<br />


</div>