<?php
echo $this->renderPartial('_include');
$valida = new VSValidador();
echo CHtml::hiddenField('txth_cliId',$cliID);
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
        <?php if($cliID!='4'){//Solo Para CLientes 4 no mostrar  ?>
        <?php echo CHtml::link(Yii::t('CONTROL_ACCIONES', 'Create'), array('pEDIDOS/listar'), array('title' => Yii::t('CONTROL_ACCIONES', 'Create'), 'class' => 'btn btn-primary btn-sm',)); ?>
        <?php echo CHtml::link(Yii::t('CONTROL_ACCIONES', 'Edit'), array('tIENDA/update'), array('id' => 'btn_Update', 'name' => 'btn_Update', 'title' => Yii::t('CONTROL_ACCIONES', 'Edit'), 'class' => 'btn btn-primary btn-sm disabled', 'onclick' => 'fun_Update()')); ?>
        <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Cancel'), array('id' => 'btn_anular', 'name' => 'btn_anular', 'class' => 'btn btn-primary btn-sm disabled', 'onclick' => 'fun_DeletePedido()')); ?>
        <?php }  ?>
    </div>
</div>
<div class="col-lg-12">
    <?php echo $this->renderPartial('_indexGridPedidos', array('model' => $model)); ?>
</div>