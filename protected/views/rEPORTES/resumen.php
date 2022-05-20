<?php echo $this->renderPartial('_include'); ?>

<!--<div class="col-lg-8">
    <div class="panel panel-default">
        <div class="panel-heading"><?php //echo Yii::t('TIENDA', 'Monthly sales per store.') ?></div>
        <div class="panel-body">
            <?php //$this->renderPartial('_frm_dataRepo1'); ?>
        </div>
    </div>
</div>-->
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading"><?php echo Yii::t('TIENDA', 'Resumen de Pedidos Tienda') ?></div>
        <div class="panel-body">
            <?php $this->renderPartial('_frm_dataResumen', array('tienda' => $tienda)); ?>
        </div>
    </div>
</div>

<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading"><?php echo Yii::t('TIENDA', 'Filtro por Tipo') ?></div>
        <div class="panel-body">
            <?php $this->renderPartial('_frm_dataResumenTipo', array('tipo' => $tipo)); ?>
        </div>
    </div>
</div>
<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading"><?php echo Yii::t('TIENDA', 'Filtro por Marca') ?></div>
        <div class="panel-body">
            <?php $this->renderPartial('_frm_dataResumenMarca', array('marca' => $marca)); ?>
        </div>
    </div>
</div>

<script>
    //se ejecuta un Escrip de Incio
    loadDataCreate();
</script>
