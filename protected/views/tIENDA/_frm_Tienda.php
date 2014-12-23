
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
    </div>
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('TIENDA', 'Name') ?></label>
        </div>
        <div class="rowTd">
            <?php
            echo CHtml::textField('txt_TIE_NOMBRE', '', array('size' => 20, 'maxlength' => 100,
                'class' => 'form-control',
                    //'onchange' => 'return calcularItem()',
                    //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
            ))
            ?>
        </div>
    </div>
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('TIENDA', 'Address') ?></label>
        </div>
        <div class="rowTd">
            <?php
            echo CHtml::textField('txt_TIE_DIRECCION', '', array('size' => 20, 'maxlength' => 100,
                'class' => 'form-control',
            ))
            ?>
        </div>
    </div>
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('TIENDA', 'Phone') ?></label>
        </div>
        <div class="rowTd">
            <?php
            echo CHtml::textField('txt_TIE_TELEFONO', '', array('size' => 20, 'maxlength' => 20,
                'class' => 'form-control',
            ))
            ?>
        </div>
        <div class="rowTd">
            <label><?php echo Yii::t('TIENDA', 'Quota') ?></label>
        </div>
        <div class="rowTd">
            <?php
            echo CHtml::textField('txt_TIE_CUPO', '', array('size' => 10, 'maxlength' => 10,
                'class' => 'form-control txt_TextboxNumber2 validation_Vs',
                'data-type' => 'dinero',
                'placeholder' => Yii::app()->format->formatNumber(0),
                'onblur' => "accionEnter(isEnter(event),this)",
                'onkeydown' => "accionEnter(isEnter(event),this)",
            ))
            ?>
        </div>
    </div>
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('TIENDA', 'Order days') ?></label>
        </div>
        <div class="rowTd">
            <label><?php echo Yii::t('TIENDA', 'Start') ?></label>
        </div>
        <div class="rowTd">
            <?php
            echo CHtml::dropDownList(
                    'cmb_dia_ini', '0'
                    , array('0' => Yii::t('GENERAL', '-Select-')) + $rangodia
                    , array('class' => 'form-control')
            );
            ?> 
        </div>
        <div class="rowTd">
            <label><?php echo Yii::t('TIENDA', 'End') ?></label>
        </div>
        <div class="rowTd">
            <?php
            echo CHtml::dropDownList(
                    'cmb_dia_fin', '0'
                    , array('0' => Yii::t('GENERAL', '-Select-')) + $rangodia
                    , array('class' => 'form-control')
            );
            ?> 
        </div>
    </div>
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('TIENDA', 'Contact') ?></label>
        </div>
        <div class="rowTd">
            <?php
            echo CHtml::textField('txt_TIE_CONTACTO', '', array('size' => 20, 'maxlength' => 100,
                'class' => 'form-control',
            ))
            ?>
        </div>
    </div>
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('TIENDA', 'Place of delivery') ?></label>
        </div>
        <div class="rowTd">
            <?php
            echo CHtml::textField('txt_TIE_LUG_ENTREGA', '', array('size' => 20, 'maxlength' => 100,
                'class' => 'form-control',
            ))
            ?>
        </div>
    </div>



</form>


