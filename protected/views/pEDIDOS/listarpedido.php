<?php
echo $this->renderPartial('_include');
$valida = new VSValidador();
$cliID=Yii::app()->getSession()->get('CliID', FALSE);
?>
<div class="col-lg-12">
    <?php
    $this->renderPartial('_frm_dataPedido', array(
        'tienda' => $tienda,
        'estado' => $estado
    ));
    ?>

</div>
<div class="col-lg-12">
    <div class="">
        <?php echo CHtml::link(Yii::t('CONTROL_ACCIONES', 'Nuevo Pedido'), array('pEDIDOS/listar'), array('title' => Yii::t('CONTROL_ACCIONES', 'Nuevo Pedido'), 'class' => 'btn btn-primary btn-sm',)); ?>
        <?php /*if($cliID=='5'){//Solo Para CLientes 4 no mostrar  ?>
            <?php echo CHtml::button(Yii::t('TIENDA', 'Revised'), array('id' => 'btn_save', 'name' => 'btn_save', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_guardarPedidoAut("REV")')); ?>
        <?php } else{ ?>
            <?php echo CHtml::button(Yii::t('TIENDA', 'Aprobar Pedido'), array('id' => 'btn_save', 'name' => 'btn_save', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_guardarPedidoAut("AUT")')); ?>
        <?php } */?>
        <?php //echo CHtml::button(Yii::t('TIENDA', 'Aprobar Pedido'), array('id' => 'btn_save', 'name' => 'btn_save', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_guardarPedidoAut("AUT")')); ?>
        <?php echo CHtml::link(Yii::t('CONTROL_ACCIONES', 'Edit'), array('tIENDA/update'), array('id' => 'btn_Update', 'name' => 'btn_Update', 'title' => Yii::t('CONTROL_ACCIONES', 'Edit'), 'class' => 'btn btn-primary btn-sm disabled', 'onclick' => 'fun_Update()')); ?>
        <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Cancel'), array('id' => 'btn_anular', 'name' => 'btn_anular', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_DeletePedido()')); ?>
    </div>
</div>
<div class="col-lg-12">
    <?php echo $this->renderPartial('_indexGridPedidos', array('model' => $model)); ?>
</div>