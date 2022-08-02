
<div id="div-table">
    <div class="form-group rowLine">        
        <div class="col-lg-8">
        <?php
        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                'name' => 'txt_ART_DES_COM',
                'id' => 'txt_ART_DES_COM',
                'source' => "js: function(request, response){ 
                          autocompletarBuscarItemsFavorito(request, response,'txt_ART_DES_COM','COD-NOM');
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
        <div class="col-lg-4">
            <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Agregar'), array('id' => 'btn_add_tipo', 'name' => 'btn_add_tipo', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'agregarItemsFavorito("new")')); ?>
            <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Save'), array('id' => 'btn_save', 'name' => 'btn_save', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'guardarFavoritos("Create")')); ?>
        </div>
        
    </div>
    

</div>







