
<form role="form">
<!--    <p>
        <strong>
            Ingrese aqui la información solicitada para ser creado como cliente
        </strong>
    </p>-->
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('TIENDA', 'Cédula/Ruc') ?></label>
        </div>
        <div class="rowTd">
            <?php
            echo CHtml::textField('txt_cedula', '', array('maxlength' => 15,
                'class' => 'form-control',
                    //'onchange' => 'return calcularItem()',
                    //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
            ))
            ?>
        </div>
    </div>
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('TIENDA', 'Nombre/Razón Social') ?></label>
        </div>
        <div class="rowTd">
            <?php
            echo CHtml::textField('txt_nombre', '', array('maxlength' => 100,
                'class' => 'form-control',
                    //'onchange' => 'return calcularItem()',
                    //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
            ))
            ?>
        </div>
    </div>
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('TIENDA', 'Teléfono') ?></label>
        </div>
        <div class="rowTd">
            <?php
            echo CHtml::textField('txt_telefono', '', array('maxlength' => 50,
                'class' => 'form-control',
                    //'onchange' => 'return calcularItem()',
                    //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
            ))
            ?>
        </div>
    </div>
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('TIENDA', 'Contacto') ?></label>
        </div>
        <div class="rowTd">
            <?php
            echo CHtml::textField('txt_contacto', '', array('maxlength' => 100,
                'class' => 'form-control',
                    //'onchange' => 'return calcularItem()',
                    //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
            ))
            ?>
        </div>
    </div>
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('TIENDA', 'Dirección') ?></label>
        </div>
        <div class="rowTd">
            <?php
            echo CHtml::textField('txt_direccion', '', array('maxlength' => 200,
                'class' => 'form-control',
                    //'onchange' => 'return calcularItem()',
                    //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
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
                //'disabled' => 'disabled',
            ))
            ?>
        </div>
    </div>

    

</form>


