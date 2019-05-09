<?php echo $this->renderPartial('_include');?>

<div class="col-lg-12">
    <div class="col-lg-8">
        <?php echo $this->renderPartial('_frm_CabPedTemp', array('CabPed' => $CabPed, 'cupo' => $cupo, 'mostrar' => $mostrar)); ?>
    </div>
    <div class="col-lg-4">
        <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Save'), array('id' => 'btn_save', 'name' => 'btn_save', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'guardarListaPedidoUpdate("Update")')); ?>
        <?php //echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Cancel Item'), array('id' => 'btn_anular', 'name' => 'btn_anular', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_AnularItemPedido()')); ?>
    </div>
    <div class="col-lg-7">

            <?php
            $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                'name' => 'txt_codigoBuscar',
                'id' => 'txt_codigoBuscar',
                'source' => "js: function(request, response){ 
                  autocompletarBuscarItemsUpdate(request, response,'txt_codigoBuscar','COD-NOM');
                }",
                'options' => array(
                    'minLength' => '2',
                    'showAnim' => 'fold',
                    'select' => "js:function(event, ui) {
                    //actualizaBuscarPersona(ui.item.PER_ID); 
                    //buscarDataItemUpdate('','Buscar');
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
    <div class="col-lg-1">
        <?php
        echo CHtml::textField('txt_cantidad', '', array('size' => 10, 'maxlength' => 6,
            'class' => 'form-control txt_TextboxNumber2',
            'placeholder' => 'Cantidad',
                //'onchange' => 'return calcularItem()',
                //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
        ))
        ?>
    </div>
    <div class="col-lg-4">
        <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Add'), array('id' => 'btn_add', 'name' => 'btn_add', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'agregarItemsTiendasUpdate("new")')); ?>
    </div>

</div>

<?php echo CHtml::hiddenField('txth_PedID', $CabPed["PedID"]); ?>
<?php echo CHtml::hiddenField('txth_TieID', $CabPed["TieID"]); ?>

<div class="col-lg-12">
    <?php echo $this->renderPartial('_indexGridDetalle', array('DetPed' => $DetPed)); ?>
</div>
