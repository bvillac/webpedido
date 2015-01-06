<?php echo $this->renderPartial('_include'); ?>
<div class="col-lg-8">
    <div class="panel panel-default">
        <div class="panel-heading">
                <?php //echo Yii::t('TIENDA', 'Stores') ?>
                <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Save'), array('id' => 'btn_save', 'name' => 'btn_save', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_GuardarProductos("Create")')); ?>
                <?php //echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Clear'), array('id' => 'btn_limpiar', 'name' => 'btn_limpiar', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_limpiarTienda()')); ?>
        </div>
        <div class="panel-body">
            <?php $this->renderPartial('_frm_dataTienda', 
                    array(
                        //'model' => $model,
                        //'rangodia' => $rangodia,
                        'tienda' =>$tienda)); ?>
            <?php $this->renderPartial('_indexGridTienda', array('model' => $model)); ?>
        </div>
    </div>
</div>