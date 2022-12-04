<?php echo $this->renderPartial('_include'); ?>

<?php 
    echo CHtml::hiddenField('txth_COD_ART', $model->COD_ART); 
    $readonly='readonly';
?>
<div class="col-lg-8">
    <div class="panel panel-default">
        <div class="panel-heading">
            <b><?php echo Yii::t('USUARIO', 'Editar Artículo') ?></b>            
            <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Save'), array('id' => 'btn_save', 'name' => 'btn_save', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_GuardarItems("Update")')); ?>
        </div>
        <div class="panel-body">
            <?php $this->renderPartial('_frm_DataItems', 
                    array(
                        'model' => $model,
                        'readonly' => $readonly,
                        )); ?>
        </div>
    </div>
</div>



<script>
    
    var varData = JSON.parse(base64_decode('<?php echo $data; ?>')) ;
    //var varData = JSON.parse('<?php echo $data; ?>') ;
    //var varData = ('<?php //echo $data; ?>') ;
    loadDataUpdate();
</script>