<?php
/* @var $this ARTICULOTIENDAController */
/* @var $data ARTICULOTIENDA */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ARTIE_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ARTIE_ID), array('view', 'id'=>$data->ARTIE_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TIE_ID')); ?>:</b>
	<?php echo CHtml::encode($data->TIE_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PCLI_ID')); ?>:</b>
	<?php echo CHtml::encode($data->PCLI_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ARTIE_EST_LOG')); ?>:</b>
	<?php echo CHtml::encode($data->ARTIE_EST_LOG); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ARTIE_FEC_CRE')); ?>:</b>
	<?php echo CHtml::encode($data->ARTIE_FEC_CRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ARTIE_FEC_MOD')); ?>:</b>
	<?php echo CHtml::encode($data->ARTIE_FEC_MOD); ?>
	<br />


</div>