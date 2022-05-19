<?php
/* @var $this ARTICULOController */
/* @var $data ARTICULO */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ART_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ART_ID), array('view', 'id'=>$data->ART_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COD_ART')); ?>:</b>
	<?php echo CHtml::encode($data->COD_ART); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ART_DES_COM')); ?>:</b>
	<?php echo CHtml::encode($data->ART_DES_COM); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COD_LIN')); ?>:</b>
	<?php echo CHtml::encode($data->COD_LIN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COD_TIP')); ?>:</b>
	<?php echo CHtml::encode($data->COD_TIP); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COD_MAR')); ?>:</b>
	<?php echo CHtml::encode($data->COD_MAR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ART_I_M_IVA')); ?>:</b>
	<?php echo CHtml::encode($data->ART_I_M_IVA); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ART_P_VENTA')); ?>:</b>
	<?php echo CHtml::encode($data->ART_P_VENTA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ART_IMAGEN')); ?>:</b>
	<?php echo CHtml::encode($data->ART_IMAGEN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ART_EST_LOG')); ?>:</b>
	<?php echo CHtml::encode($data->ART_EST_LOG); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ART_FEC_CRE')); ?>:</b>
	<?php echo CHtml::encode($data->ART_FEC_CRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ART_FEC_MOD')); ?>:</b>
	<?php echo CHtml::encode($data->ART_FEC_MOD); ?>
	<br />

	*/ ?>

</div>