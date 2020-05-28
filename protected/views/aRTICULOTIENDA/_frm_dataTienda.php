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
                    , array('class' => 'form-control')
            );
            ?> 
        </div>
        <div class="rowTd">
            <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Search'), array('id' => 'btn_save', 'name' => 'btn_save', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'mostrarPrecioTienda()')); ?>
        </div>
            
        
    </div>
    <div class="form-group">
        <?php
        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                'name' => 'txt_ART_DES_COM',
                'id' => 'txt_ART_DES_COM',
                'source' => "js: function(request, response){ 
                          autocompletarBuscarItems(request, response,'txt_ART_DES_COM','COD-NOM');
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
                    'size'=>35, 
                    //'onKeyup' => "verificarTextCedula(isEnter(event),'txt_PER_CEDULA')",
                    'placeholder' => Yii::t('GENERAL', 'Find articles by code or name'),
                    //'onkeydown' => "nextControl(isEnter(event),'txt_nombre_medico_aten')",
                    //'onkeydown' => "buscarCodigo(isEnter(event),'txt_cod_paciente','COD-ID')",
                    //'onkeydown' => "verificarTextCedula(isEnter(event),'txt_PER_CEDULA')",
                    //'value' => 'search',
                ),
            ));
            ?>
    </div>
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('GENERAL', 'Price') ?></label>
        </div>
        <div class="rowTd">
            
            <?php
            echo CHtml::textField('txt_PCLI_P_VENTA', '', array('size' => 10, 'maxlength' => 10,
                'class' => 'form-control txt_TextboxNumber2 validation_Vs',
                'data-type' => 'dinero',
                'placeholder' => Yii::app()->format->formatNumber(0),
                //'onchange' => 'return calcularItem()',
                'onblur' => "pedidoVentasEnterGrid(isEnter(event),this)",
                'onkeydown' => "pedidoVentasEnterGrid(isEnter(event),this)",
            ))
            ?>
            
        </div>
        <div class="rowTd">
            <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Add'), array('id' => 'btn_add', 'name' => 'btn_add', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'agregarItemsTiendas("new")')); ?>
        </div>
        
    </div> 
    
</form>


