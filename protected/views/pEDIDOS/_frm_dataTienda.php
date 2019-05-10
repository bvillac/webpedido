<form role="form">
    
    <div class="form-group rowLine">
        
<!--        <div class="col-lg-1">
            <label><?php //echo Yii::t('GENERAL', 'Store') ?></label>            
        </div>-->
        <div class="col-lg-3">
            <?php
            echo CHtml::dropDownList(
                    'cmb_tienda', '0'
                    , array('0' => Yii::t('GENERAL', 'SELECCIONAR TIENDA')) + CHtml::listData($tienda, 'TIE_ID', 'TIE_NOMBRE')
                    , array(
                        'onchange' => 'js:mostrarListaTienda(this.value)',
                        'class' => 'form-control'
                        )
            );
            ?> 
        </div>
        <div class="col-lg-2">
            <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Nuevo Pedido'), array('id' => 'btn_new', 'name' => 'btn_new', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'nuevaListaPedTemp()')); ?>
            <?php //echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Save'), array('id' => 'btn_save', 'name' => 'btn_save', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'guardarListaPedido("Create")')); ?>
        </div>
        <div class="col-lg-2">
            <label><?php echo Yii::t('TIENDA', 'Total') ?>:$</label>
            <label id="lbl_total">0.00</label>
        </div>
        <div id="div_cupo" class="col-lg-2">
            <label>Cupo:$</label>
            <label id="lbl_cupo">0.00</label>
        </div>
         <div class="col-lg-2">
            <label id="lbl_pedido"></label>
        </div>
            
        
    </div>
    <div class="form-group rowLine">
            
<!--        <div class="col-lg-1">
            <label><?php //echo Yii::t('GENERAL', 'Area') ?></label>            
        </div>-->
        <div class="col-lg-3">
            <?php
            echo CHtml::dropDownList(
                    'cmb_area', '0'
                    , array('0' => Yii::t('GENERAL', 'SELECCIONAR AREA')) + CHtml::listData($area, 'IDS_ARE', 'NOM_ARE')
                    , array(
                        //'onchange' => 'js:mostrarListaTienda(this.value)',
                        'class' => 'form-control'
                        )
            );
            ?> 
        </div>
    <div class="col-lg-2">            
            <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Save'), array('id' => 'btn_save', 'name' => 'btn_save', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'guardarListaPedido("Create")')); ?>
    </div>
    </div> 
    
    
    <div class="form-group rowLine">
        <div class="col-lg-12">
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
                    buscarDataItem('','Buscar');
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
            <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Search'), array('id' => 'btn_buscar', 'name' => 'btn_buscar', 'class' => 'btn btn-success', 'onclick' => 'buscarDataItem("","Buscar")')); ?>
        </div>
            
        
    </div>
        
        

    
    
    
</form>


