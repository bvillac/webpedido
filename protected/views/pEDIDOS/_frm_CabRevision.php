<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

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
</div>

<div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('TIENDA', 'Tienda/Area') ?></label>
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

