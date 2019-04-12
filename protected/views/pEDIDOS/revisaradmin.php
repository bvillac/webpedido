<?php echo $this->renderPartial('_include'); ?>

<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">        
            <?php //echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Add'), array('id' => 'btn_add', 'name' => 'btn_add', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_agregarUserTienda("Create")')); ?>
            <?php //echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Delete'), array('id' => 'btn_add', 'name' => 'btn_add', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_DeleteUserTie()')); ?>
            
        </div>
        <div class="panel-body">
            <?php $this->renderPartial('_frm_CabRevision', 
                    array('cliente' => $cliente,'tienda' => $tienda)); ?>
        </div>
        <div class="panel-footer">
            <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Search'), array('id' => 'btn_add', 'name' => 'btn_add', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_buscarDataRol("")')); ?>
        </div>
            
    </div>
</div>

<div class="col-lg-12">
   <?php echo $this->renderPartial('_indexGridTiendaRes', array('model' => $model)); ?>
</div>
