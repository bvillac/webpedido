<?php echo $this->renderPartial('_include'); ?>
<div class="col-lg-8">
    <?php echo $this->renderPartial('_frm_CabPedTemp', array('CabPed' => $CabPed)); ?>
</div>
<div class="col-lg-4">
    <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Save'), array('id' => 'btn_save', 'name' => 'btn_save', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'guardarListaPedido("Update")')); ?>
    <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Cancel Item'), array('id' => 'btn_anular', 'name' => 'btn_anular', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_AnularItemPedido()')); ?>
</div>
<?php echo CHtml::hiddenField('txth_PedID', $CabPed["PedID"]); ?>

<div class="col-lg-12">
    <?php echo $this->renderPartial('_indexGridDetalle', array('DetPed' => $DetPed)); ?>
</div>
