<?php echo $this->renderPartial('_include'); ?>
<div class="col-lg-12">
    <?php if($cliID=='4'){//Solo Para CLientes 4 no mostrar  ?>
        <div class="alert alert-info alert-global-notice">
            Una vez guardado el pedido el cliente tiene un tiempo <strong>máximo de 2 horas</strong> para realizar alguna anulación de la orden, de lo contrario se procederá con la atención de la misma.
        </div>
    <?php }  ?>
    <?php $this->renderPartial('_frm_dataTienda', 
                    array(
                        'tienda' =>$tienda)); ?>
    
</div>
<div class="col-lg-12">
    <?php echo $this->renderPartial('_indexGrid', array('model' => $model)); ?>
</div>