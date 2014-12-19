<form role="form">
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('GENERAL', 'Customer') ?></label>
        </div>
        <div class="txt_Textbox">
            <?php
            echo CHtml::dropDownList(
                    'cmb_cliente', '0'
                    , array('0' => Yii::t('GENERAL', '-Select-')) + CHtml::listData($cliente, 'CLI_ID', 'CLI_NOMBRE')
                    , array('class' => 'form-control')
            );
            ?> 
        </div>
    </div>
    <div class="form-group">
        <?php
        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                'name' => 'txt_ART_ID',
                'id' => 'txt_ART_ID',
                'source' => "js: function(request, response){ 
                          autocompletarBuscarItems(request, response,'txt_ART_ID','COD-NOM');
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
        <div class="txt_Textbox">
            <?php
            echo CHtml::textField('txt_PCLI_P_VENTA', '', array('size' => 10, 'maxlength' => 6,
                'class' => 'form-control txt_TextboxNumber2',
                'placeholder' => '0,00',
                    //'onchange' => 'return calcularItem()',
                    //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
            ))
            ?>
            
        </div>
        
    </div>
    <div class="form-group rowLine">
        <div class="txt_Textbox">
            <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Add'), array('id' => 'btn_add', 'name' => 'btn_add', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_GuardarConfig("Update")')); ?>
        </div>
    </div>  
    
</form>


