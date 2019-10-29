<?php echo $this->renderPartial('_include'); ?>
<div class="col-lg-8">
    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Guardar en Una Sucursal'), array('id' => 'btn_save', 'name' => 'btn_save', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_GuardarProductos("Create","U")')); ?>
            <?php //echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Guardar en Todas las Sucursal'), array('id' => 'btn_save2', 'name' => 'btn_save2', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_GuardarProductos("Create","T")')); ?>     
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