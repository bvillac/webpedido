<?php echo $this->renderPartial('_include'); ?>
<div class="col-lg-8">
    <?php $this->renderPartial('_frm_dataTienda', 
                    array(
                        'tienda' =>$tienda)); ?>
    
</div>
<div class="col-lg-12">
    <?php echo $this->renderPartial('_indexGrid', array('model' => $model)); ?>
</div>