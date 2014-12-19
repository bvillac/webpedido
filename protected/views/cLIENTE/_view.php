<?php
/* @var $this CLIENTEController */
/* @var $data CLIENTE */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('CLI_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->CLI_ID), array('view', 'id'=>$data->CLI_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COD_CLIE')); ?>:</b>
	<?php echo CHtml::encode($data->COD_CLIE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CLI_CED_RUC')); ?>:</b>
	<?php echo CHtml::encode($data->CLI_CED_RUC); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CLI_NOMBRE')); ?>:</b>
	<?php echo CHtml::encode($data->CLI_NOMBRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CLI_EST_LOG')); ?>:</b>
	<?php echo CHtml::encode($data->CLI_EST_LOG); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CLI_FEC_CRE')); ?>:</b>
	<?php echo CHtml::encode($data->CLI_FEC_CRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CLI_FEC_MOD')); ?>:</b>
	<?php echo CHtml::encode($data->CLI_FEC_MOD); ?>
	<br />


</div>