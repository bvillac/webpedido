<form role="form">
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('GENERAL', 'Store') ?></label>
        </div>
        <div class="rowTd">
            <?php
            echo CHtml::dropDownList(
                    'cmb_tienda', '0'
                    , array('0' => Yii::t('GENERAL', '-Select-')) + CHtml::listData($tienda, 'TIE_ID', 'TIE_NOMBRE')
                    , array(
                        'onchange' => 'js:mostrarProductosTienda(this.value)',
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
            <?php
            $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                'name' => 'txt_codigoBuscar',
                'id' => 'txt_codigoBuscar',
                'source' => "js: function(request, response){ 
                  autocompletarBuscarItems(request, response,'txt_codigoBuscar','COD-NOM');
                }",
                'options' => array(
                    'minLength' => '2',
                    'showAnim' => 'fold',
                    'select' => "js:function(event, ui) {
                    //actualizaBuscarPersona(ui.item.PER_ID);     
                }"
                ),
                'htmlOptions' => array(
                    'class' => 'form-control',
                    "data-type" => "number",
                    'size' => 35,
                    //'onKeyup' => "verificarTextCedula(isEnter(event),'txt_PER_CEDULA')",
                    'placeholder' => Yii::t('COMPANIA', 'Buscar productos'),
                //'onkeydown' => "nextControl(isEnter(event),'txt_nombre_medico_aten')",
                //'onkeydown' => "buscarCodigo(isEnter(event),'txt_cod_paciente','COD-ID')",
                //'onkeydown' => "verificarTextCedula(isEnter(event),'txt_PER_CEDULA')",
                //'value' => 'search',
                ),
            ));
            ?>
        </div>
        <div class="rowTd">
            <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Search'), array('id' => 'btn_buscar', 'name' => 'btn_buscar', 'class' => 'btn btn-success', 'onclick' => 'mostrarProductosTienda("")')); ?>
        </div>
            
        
    </div>
    
    
    
</form>


