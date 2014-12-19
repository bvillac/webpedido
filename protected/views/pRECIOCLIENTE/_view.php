<?php
/* @var $this PRECIOCLIENTEController */
/* @var $data PRECIOCLIENTE */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('PCLI_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->PCLI_ID), array('view', 'id'=>$data->PCLI_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CLI_ID')); ?>:</b>
	<?php echo CHtml::encode($data->CLI_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ART_ID')); ?>:</b>
	<?php echo CHtml::encode($data->ART_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PCLI_P_VENTA')); ?>:</b>
	<?php echo CHtml::encode($data->PCLI_P_VENTA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PCLI_POR_DES')); ?>:</b>
	<?php echo CHtml::encode($data->PCLI_POR_DES); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PCLI_VAL_DES')); ?>:</b>
	<?php echo CHtml::encode($data->PCLI_VAL_DES); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PCLI_EST_LOG')); ?>:</b>
	<?php echo CHtml::encode($data->PCLI_EST_LOG); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('PCLI_FEC_CRE')); ?>:</b>
	<?php echo CHtml::encode($data->PCLI_FEC_CRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PCLI_FEC_MOD')); ?>:</b>
	<?php echo CHtml::encode($data->PCLI_FEC_MOD); ?>
	<br />

	*/ ?>

</div>