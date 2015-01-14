<div id="div-table">
    <div class="trow">
        <div class="tcol-td form-group">
            <label><?php echo Yii::t('TIENDA', 'Customer') ?></label>
        </div>
        <div class="tcol-td form-group">
            <?php
            echo CHtml::dropDownList(
                    'cmb_cliente', '0'
                    , array('0' => Yii::t('GENERAL', '-Select-')) + CHtml::listData($cliente, 'CLI_ID', 'CLI_NOMBRE')
                    , array(
                'class' => 'form-control',
                'onchange' => 'js:mostrarListaTienda(this.value)',
                    )
            );
            ?> 
        </div>
    </div>
    <div class="trow">
        <div class="tcol-td form-group">
            <label><?php echo Yii::t('TIENDA', 'Stores') ?></label>
        </div>
        <div class="tcol-td form-group">
            <?php
            echo CHtml::dropDownList(
                    'cmb_tienda', '0'
                    , array('0' => Yii::t('GENERAL', '-Select-')) + CHtml::listData($tienda, 'TIE_ID', 'TIE_NOMBRE')
                    , array(
                //'onchange' => 'js:mostrarListaTienda(this.value)',
                'class' => 'form-control'
                    )
            );
            ?> 
        </div>
    </div>
    <div class="trow">
        <div class="tcol-td form-group">           
        </div>
        <div class="tcol-td form-group">
            <?php
            echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Accept'), array(
                'id' => 'btn_aceptar',
                'name' => 'btn_aceptar',
                'class' => 'btn btn-success',
                'onclick' => 'setDatosTienda()'
            ));
            ?>
        </div>

    </div>
</div>


