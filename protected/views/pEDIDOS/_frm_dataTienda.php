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
            <?php //echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Search'), array('id' => 'btn_save', 'name' => 'btn_save', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'mostrarPrecioTienda()')); ?>
        </div>
            
        
    </div>
    <div class="form-group rowLine">
        <div class="rowTd">
            <label><?php echo Yii::t('TIENDA', 'Total') ?></label>
        </div>
        <div class="rowTd">
            <label id="lbl_total"></label>
        </div>
    </div>
    
    
    
</form>


