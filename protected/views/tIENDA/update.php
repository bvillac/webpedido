<?php echo $this->renderPartial('_include'); ?>
<div class="col-lg-12">
    <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Save'), array('id' => 'btn_save', 'name' => 'btn_save', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_GuardarTienda("Update")')); ?>
    <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Clear'), array('id' => 'btn_limpiar', 'name' => 'btn_limpiar', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_limpiarTienda()')); ?>
</div>
<br><br>
<?php echo CHtml::hiddenField('txth_TIE_ID', $model->TIE_ID); ?>
<div class="col-lg-8">
    <div class="panel panel-default">
        <div class="panel-heading"><?php echo Yii::t('TIENDA', 'Stores') ?></div>
        <div class="panel-body">
            <?php $this->renderPartial('_frm_Tienda', 
                    array(
                        'model' => $model,
                        'rangodia' => $rangodia,
                        'cliente' =>$cliente)); ?>
        </div>
    </div>
</div>

<script>
    
    var varData = JSON.parse(base64_decode('<?php echo $data; ?>')) ;
    //var varData = JSON.parse('<?php echo $data; ?>') ;
    //var varData = ('<?php //echo $data; ?>') ;
    loadDataUpdate();
</script>