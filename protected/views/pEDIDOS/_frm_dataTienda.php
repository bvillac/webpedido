<form role="form">
    <div class="form-group rowLine">
        <div class="rowTd">
            <label><?php echo Yii::t('GENERAL', 'Store') ?></label>
        </div>
        <div class="rowTd">
            <?php
            echo CHtml::dropDownList(
                    'cmb_tienda', '0'
                    , array('0' => Yii::t('GENERAL', '-Select-')) + CHtml::listData($tienda, 'TIE_ID', 'TIE_NOMBRE')
                    , array(
                        'onchange' => 'js:mostrarListaTienda(this.value)',
                        'class' => 'form-control'
                        )
            );
            ?> 
        </div>
        <div class="rowTd">
            <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'New'), array('id' => 'btn_new', 'name' => 'btn_new', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'nuevaListaPedTemp()')); ?>
            <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Save'), array('id' => 'btn_save', 'name' => 'btn_save', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'guardarListaPedido("Create")')); ?>
        </div>
        <div class="rowTd">
            <label><?php echo Yii::t('TIENDA', 'Total') ?>:</label>
            <label id="lbl_total">0.00</label>
        </div>
        <div id="div_cupo" class="rowTd">
            <label>Cupo:</label>
            <label id="lbl_cupo">0.00</label>
        </div>
         <div class="rowTd">
            <label id="lbl_pedido"></label>
        </div>
            
        
    </div>

    
    
    
</form>


