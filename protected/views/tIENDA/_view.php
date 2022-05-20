<?php
/* @var $this TIENDAController */
/* @var $data TIENDA */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('TIE_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->TIE_ID), array('view', 'id'=>$data->TIE_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CLI_ID')); ?>:</b>
	<?php echo CHtml::encode($data->CLI_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TIE_NOMBRE')); ?>:</b>
	<?php echo CHtml::encode($data->TIE_NOMBRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TIE_DIRECCION')); ?>:</b>
	<?php echo CHtml::encode($data->TIE_DIRECCION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TIE_TELEFONO')); ?>:</b>
	<?php echo CHtml::encode($data->TIE_TELEFONO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TIE_CUPO')); ?>:</b>
	<?php echo CHtml::encode($data->TIE_CUPO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TIE_LUG_ENTREGA')); ?>:</b>
	<?php echo CHtml::encode($data->TIE_LUG_ENTREGA); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('TIE_CONTACTO')); ?>:</b>
	<?php echo CHtml::encode($data->TIE_CONTACTO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FEC_INI_PED')); ?>:</b>
	<?php echo CHtml::encode($data->FEC_INI_PED); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FEC_FIN_PED')); ?>:</b>
	<?php echo CHtml::encode($data->FEC_FIN_PED); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TIE_EST_LOG')); ?>:</b>
	<?php echo CHtml::encode($data->TIE_EST_LOG); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TIE_FEC_CRE')); ?>:</b>
	<?php echo CHtml::encode($data->TIE_FEC_CRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TIE_FEC_MOD')); ?>:</b>
	<?php echo CHtml::encode($data->TIE_FEC_MOD); ?>
	<br />

	*/ ?>

</div>