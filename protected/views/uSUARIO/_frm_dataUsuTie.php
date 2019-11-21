<form role="form">
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('GENERAL', 'Customer') ?></label>
        </div>
        <div class="rowTd">
            <?php
            echo CHtml::dropDownList(
                    'cmb_cliente', '0'
                    , array('0' => Yii::t('GENERAL', '-Select-')) + CHtml::listData($cliente, 'CLI_ID', 'CLI_NOMBRE')
                    , array('class' => 'form-control',
                'onchange' => 'js:mostrarListaTienda(this.value)'
                    )
            );
            ?> 
        </div>

        <div class="rowTd">
            <?php //echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Search'), array('id' => 'btn_save', 'name' => 'btn_save', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'mostrarPrecioTienda()')); ?>
        </div>


    </div>
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('TIENDA', 'Stores') ?></label>
        </div>
        <div class="rowTd">
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
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('USUARIO', 'User role') ?></label>
        </div>
        <div class="rowTd">
            <?php
            echo CHtml::dropDownList(
                    'cmb_rol', '0'
                    , array('0' => Yii::t('GENERAL', '-Select-')) + CHtml::listData($rol, 'ROL_ID', 'ROL_NOMBRE')
                    , array(
                //'onchange' => 'js:mostrarListaTienda(this.value)',
                'class' => 'form-control'
                    )
            );
            ?> 
        </div>
    </div> 
    
    <div class="form-group">
        <?php
        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'name' => 'txt_nombreUser',
            'id' => 'txt_nombreUser',
            'source' => "js: function(request, response){ 
                          autocompletarBuscarUser(request, response,'txt_nombreUser','COD-NOM');
                        }",
            'options' => array(
                'minLength' => '2',
                'showAnim' => 'fold',
                'select' => "js:function(event, ui) {
                            //actualizaBuscarPersona(ui.item.ART_ID);     
                        }"
            ),
            'htmlOptions' => array(
                'class' => 'form-control',
                "data-type" => "number",
                'size' => 35,
                'placeholder' => Yii::t('GENERAL', 'Find user by code or name'),
            ),
        ));
        ?>
    </div>
    <div class="form-group rowLine">
        
        

    </div> 

</form>


