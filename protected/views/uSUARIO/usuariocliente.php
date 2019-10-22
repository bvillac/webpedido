<?php echo $this->renderPartial('_include'); ?>



<div class="col-lg-8">
    <div class="panel panel-default">
        <div class="panel-heading"><?php echo Yii::t('USUARIO', 'Información') ?></div>
        <div class="panel-body">
            <?php
            $this->renderPartial('_frm_DataPerEmp', array(
                'model' => $model,
                'roles' => $roles,               
                'area' => $area
            ));
            ?>
        </div>
        <div class="panel-footer">
            <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Agregar Usuario'), array('id' => 'btn_save', 'name' => 'btn_save', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_AgregarUser("Create")')); ?>
            <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Clear'), array('id' => 'btn_limpiar', 'name' => 'btn_limpiar', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_limpiarUserCliente()')); ?>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <?php echo $this->renderPartial('_indexGridCliente', array('model' => $model)); ?>
</div>
<!--<div class="col-lg-4">
    <div class="panel panel-default">
        <div class="panel-heading"><?php echo Yii::t('USUARIO', 'Data User') ?></div>
        <div class="panel-body">
            <?php
            $this->renderPartial('_frm_DataUser', array(
                'model' => $model,
            ));
            ?>
        </div>
    </div>
</div>-->