<?php echo $this->renderPartial('_include'); ?>



<div class="col-lg-8">
    <div class="panel panel-default">
        <div class="panel-heading"><strong><?php echo Yii::t('USUARIO', 'Ingrese aqui la información solicitada para ser creado como cliente') ?></strong></div>
        <div class="panel-body">
            <?php
            $this->renderPartial('_frm_DataPerEmp', array(
                'model' => $model,            
                'area' => $area
            ));
            ?>
        </div>
        <div class="panel-footer">
            <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Agregar Cliente'), array('id' => 'btn_save', 'name' => 'btn_save', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_AgregarCliente("Create")')); ?>
            
            <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Clear'), array('id' => 'btn_limpiar', 'name' => 'btn_limpiar', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_limpiarCliente()')); ?>
        </div>
    </div>
</div>


<div class="col-lg-12">
    <?php echo $this->renderPartial('_indexGridCliente', array('model' => $model)); ?>
</div>
