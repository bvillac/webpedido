<?php echo $this->renderPartial('_include'); ?>

<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading"><?php echo Yii::t('TIENDA', 'Monthly sales per store.') ?></div>
        <div class="panel-body">
            <?php $this->renderPartial('_frm_dataRepo1'); ?>
        </div>
    </div>
</div>
<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading"><?php echo Yii::t('TIENDA', 'Items per store') ?></div>
        <div class="panel-body">
            <?php $this->renderPartial('_frm_dataRepo2', array('tienda' => $tienda)); ?>
        </div>
    </div>
</div>
