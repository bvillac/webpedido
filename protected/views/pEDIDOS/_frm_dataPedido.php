<form role="form">
    <div class="form-group rowLine">
        <div class="rowTd">
            <label><?php echo Yii::t('TIENDA', 'Stores') ?></label>
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
            <label><?php echo Yii::t('TIENDA', 'Status') ?></label>
        </div>
        <div class="rowTd">
            <?php
            echo CHtml::dropDownList(
                    'cmb_estado', '0'
                    , array('0' => Yii::t('TIENDA', 'All')) + $estado
                    , array('class' => 'form-control')
            );
            ?> 
        </div>
        <div class="rowTd">
            <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Save'), array('id' => 'btn_save', 'name' => 'btn_save', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'guardarListaPedido("Create")')); ?>
            <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Cancel'), array('id' => 'btn_anular', 'name' => 'btn_anular', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_DeletePedido()')); ?>
        </div>
        <div class="rowTd">
            <label><?php echo Yii::t('TIENDA', 'Total') ?>:</label>
            <label id="lbl_total">0.00</label>
        </div>
        <div class="rowTd">
            <label>Cupo:</label>
            <label id="lbl_cupo">0.00</label>
        </div>
         <div class="rowTd">
            <label id="lbl_pedido"></label>
        </div>
            
        
    </div>

    
    
    
</form>

