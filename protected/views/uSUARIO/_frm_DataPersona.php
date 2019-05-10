
<form role="form">
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('USUARIO', 'DNI') ?></label>
        </div>
        <div class="rowTd">
            <?php
            echo CHtml::textField('txt_dni', '', array('size' => 15, 'maxlength' => 15,
                'class' => 'form-control',
                    //'onchange' => 'return calcularItem()',
                    //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
            ))
            ?>
        </div>
    </div>
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('USUARIO', 'Name') ?></label>
        </div>
        <div class="rowTd">
            <?php
            echo CHtml::textField('txt_nombre', '', array('size' => 20, 'maxlength' => 50,
                'class' => 'form-control',
                    //'onchange' => 'return calcularItem()',
                    //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
            ))
            ?>
        </div>
    </div>
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('USUARIO', 'Last name') ?></label>
        </div>
        <div class="rowTd">
            <?php
            echo CHtml::textField('txt_apellido', '', array('size' => 20, 'maxlength' => 50,
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
            echo CHtml::textField('txt_direccion', '', array('size' => 20, 'maxlength' => 150,
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
            echo CHtml::textField('txt_telefono', '', array('size' => 20, 'maxlength' => 50,
                'class' => 'form-control',
            ))
            ?>
        </div>
        <div class="rowTd">
            <label><?php echo Yii::t('USUARIO', 'Date of birth') ?></label>
        </div>
        <div class="rowTd">
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'name' => 'dtp_fec_nacimiento',
                'attribute' => 'dtp_fec_nacimiento',
                'value' => date(Yii::app()->params['dateStart']),
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

    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('TIENDA', 'Contact') ?></label>
        </div>
        <div class="rowTd">
            <?php
            echo CHtml::textField('txt_contacto', '', array('size' => 20, 'maxlength' => 40,
                'class' => 'form-control',
            ))
            ?>
        </div>
    </div>
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('USUARIO', 'Mail') ?></label>
        </div>
        <div class="rowTd">
            <?php
            echo CHtml::textField('txt_correo', '', array('size' => 60, 'maxlength' => 100,
                'class' => 'form-control',
            ))
            ?>
        </div>
    </div>

    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('USUARIO', 'Gender') ?></label>
        </div>
        <div class="rowTd">
            <?php
            echo CHtml::dropDownList(
                    'cmb_genero', '0'
                    , $genero
                    , array('class' => 'form-control')
            );
            ?> 
        </div>
        <div class="rowTd">
            <label><?php echo Yii::t('USUARIO', 'Status') ?></label>
        </div>
        <div class="rowTd">
            <?php
            echo CHtml::dropDownList(
                    'cmb_estado', '0'
                    , $estado
                    , array('class' => 'form-control')
            );
            ?> 
        </div>
    </div>
    

</form>


