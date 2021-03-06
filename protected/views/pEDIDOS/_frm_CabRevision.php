<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<!--<div class="form-group rowLine">
        <div class="txt_label">
            <label><?php //echo Yii::t('GENERAL', 'Customer') ?></label>
        </div>
        <div class="rowTd">
            <?php
            /*echo CHtml::dropDownList(
                    'cmb_cliente', '0'
                    , array('0' => Yii::t('GENERAL', '-Select-')) + CHtml::listData($cliente, 'CLI_ID', 'CLI_NOMBRE')
                    , array('class' => 'form-control',
                'onchange' => 'js:mostrarListaTiendaAdmin(this.value)'
                    )
            );*/
            ?> 
        </div>       
</div>-->


<div class="form-group rowLine">
    <div class="txt_label">
        <label><?php echo Yii::t('TIENDA', 'Department or branch') ?></label>
    </div>
    <div class="rowTd">
        <?php
        echo CHtml::dropDownList(
                'cmb_tienda', '0'
                , array('0' => Yii::t('GENERAL', '-TODOS-')) + CHtml::listData($tienda, 'TIE_ID', 'TIE_NOMBRE')
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
        <label><?php echo Yii::t('TIENDA', 'Agrupar Áreas') ?></label>
    </div>
    <div class="rowTd">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="rbt_no" value="0" checked>
            <label class="form-check-label" for="rbt_no">
              No Agrupadao
            </label>
          </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="rbt_si" value="1" >
            <label class="form-check-label" for="rbt_si">
              Agrupado
            </label>
          </div>
      
        
    </div>  
</div>

<div class="form-group rowLine">
    <div class="txt_label">
        <label><?php echo Yii::t('TIENDA', 'Área') ?></label>
    </div>
    <div class="rowTd">
        <?php
        echo CHtml::dropDownList(
                'cmb_area', '0'
                , array('0' => Yii::t('GENERAL', '-TODOS-')) + CHtml::listData($area, 'IDS_ARE', 'NOM_ARE')
                //,  CHtml::listData($area, 'IDS_ARE', 'NOM_ARE')
                , array(
                    //'onchange' => 'js:mostrarListaArea()',
                    'class' => 'form-control',
                    //'disabled' => true
                )
        );
        ?> 
    </div>
</div>
<div class="form-group rowLine">
    <div class="txt_label">
        <label><?php echo Yii::t('TIENDA', 'Status') ?></label>
    </div>
    <div class="rowTd">
        <?php
            echo CHtml::dropDownList(
                    'cmb_estado', '0'
                    , array('0' => Yii::t('TIENDA', 'All')) + $estado
                    , array('class' => 'form-control')
            );
            ?> 
    </div>
</div> 
<div class="form-group rowLine">
    <div class="txt_label">
        <label><?php echo Yii::t('TIENDA', 'Fechas') ?></label>
    </div>
    <div class="rowTd">
        <div class="tcol-td form-group">
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'name' => 'dtp_fec_ini',
                'attribute' => 'dtp_fec_ini',
                'value' => date(Yii::app()->params['datebydefault']),//date(Yii::app()->params['dateStart']),
                'language' => Yii::app()->language,
                'options' => array(
                    'showAnim' => 'fold',
                    'autoSize' => true,
                    'changeMonth' => 'true',
                    'changeYear' => 'true',
                    'showOtherMonths' => true,
                    'showButtonPanel' => true,
                    'dateFormat' => Yii::app()->params['datepicker'],
                    'buttonImage' => Yii::app()->theme->baseUrl . Yii::app()->params['rutaIconos'] . 'date-icon1.png',
                    'buttonImageOnly' => true,
                    'showOn' => 'button',
                ),
                'htmlOptions' => array(
                    'class' => 'form-control imgDate',
                    'readonly' => 'readonly',
                ),
            ));
            ?>
        </div>
    </div>
    <div class="tcol-td form-group">
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'name' => 'dtp_fec_fin',
                'attribute' => 'dtp_fec_fin',
                'value' => date(Yii::app()->params['datebydefault']),
                'language' => Yii::app()->language,
                'options' => array(
                    'showAnim' => 'fold',
                    'autoSize' => true,
                    'changeMonth' => 'true',
                    'changeYear' => 'true',
                    'showOtherMonths' => true,
                    'showButtonPanel' => true,
                    'dateFormat' => Yii::app()->params['datepicker'],
                    'buttonImage' => Yii::app()->theme->baseUrl . Yii::app()->params['rutaIconos'] . 'date-icon1.png',
                    'buttonImageOnly' => true,
                    'showOn' => 'button',
                ),
                'htmlOptions' => array(
                    'class' => 'form-control imgDate',
                    'readonly' => 'readonly',
                ),
            ));
            ?>
        </div>
    
    
      
    
</div>

