<?php
echo $this->renderPartial('_include');
$valida = new VSValidador();
?>
<div class="col-lg-12">
    <?php
    $this->renderPartial('_frm_dataLiquidar', array(
        'tienda' => $tienda,
        'estado' => $estado
    ));
    ?>

</div>

<div class="col-lg-12">   
    <?php echo CHtml::button(Yii::t('TIENDA', 'Attend'), array('id' => 'btn_save', 'name' => 'btn_save', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_guardarPedidoAtendido()')); ?>          
</div>

<div class="col-lg-12">
    <?php echo $this->renderPartial('_indexGridLiquidar', array('model' => $model)); ?>
</div>