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
        <label><?php echo Yii::t('GENERAL', 'Subject') ?></label>
        <?php
        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                'name' => 'txt_PER_CEDULA',
                'id' => 'txt_PER_CEDULA',
                'source' => "js: function(request, response){ 
                          autocompletarBuscarPersona(request, response,'txt_PER_CEDULA','COD-NOM');
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
                    'size'=>35, 
                    //'onKeyup' => "verificarTextCedula(isEnter(event),'txt_PER_CEDULA')",
                    'placeholder' => Yii::t('COMPANIA', 'Social reason o Ruc'),
                    //'onkeydown' => "nextControl(isEnter(event),'txt_nombre_medico_aten')",
                    //'onkeydown' => "buscarCodigo(isEnter(event),'txt_cod_paciente','COD-ID')",
                    //'onkeydown' => "verificarTextCedula(isEnter(event),'txt_PER_CEDULA')",
                    //'value' => 'search',
                ),
            ));
            ?>
    </div>
    <div class="form-group">
        <label><?php echo Yii::t('GENERAL', 'Body') ?></label>
        <?php
        echo CHtml::textArea('txta_Cuerpo', '', array('maxlength' => 5000, 'rows' => 6, 'cols' => 100,
            'class' => 'form-control',
                //'onchange' => 'return calcularItem()',
                //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
        ))
        ?>
    </div>
    <div class="form-group">
        <label><?php echo Yii::t('GENERAL', 'Copy Mail') ?></label>
        <?php
        echo CHtml::textField('txt_CCO', '', array('size' => 10, 'maxlength' => 500,
            'class' => 'form-control',
                //'onchange' => 'return calcularItem()',
                //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
        ))
        ?>
    </div>
    <!--<div class="form-group tooltip-demo">
        <label><?php //echo Yii::t('GENERAL', 'Parameters')  ?></label>
        <button data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." 
                data-placement="left" data-toggle="popover" data-container="body" class="btn btn-default" type="button" data-original-title="" title="">
                                    Popover on left
        </button>
    </div>-->
    <div class="form-group rowLine">
        <div class="rowTd">
            <label><?php echo Yii::t('GENERAL', 'Send Mail C/Seconds') ?></label>
        </div>
        <div class="rowTd">
            <?php
            echo CHtml::textField('txt_TiempoRespuesta', '', array('size' => 10, 'maxlength' => 2,
                'class' => 'form-control txt_TextboxNumber2',
                    //'onchange' => 'return calcularItem()',
                    //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
            ))
            ?>
        </div>
        <div class="rowTd">
            <label><?php echo Yii::t('GENERAL', 'Html') ?></label>
        </div>
        <div class="rowTd">
            <?php //echo CHtml::checkBox('chk_EsHtml', false, array('value' => 136, 'onclick' => 'validadorChk(this)')); ?>
            <?php echo CHtml::checkBox('chk_EsHtml', false, array('value' => '')); ?>
        </div>
        
        
    </div>




</form>


