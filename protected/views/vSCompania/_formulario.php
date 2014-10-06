
<form role="form">
    <div class="form-group">
        <label><?php echo Yii::t('PERSONA', 'Ruc') ?></label>
        <?php
        echo CHtml::textField('txt_RUC', '', array('size' => 50, 'maxlength' => 50,
            'class' => 'form-control',
                //'onchange' => 'return calcularItem()',
                //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
        ))
        ?>
    </div>
    <div class="form-group">
        <label><?php echo Yii::t('PERSONA', 'RazonSocial') ?></label>
        <?php
        echo CHtml::textField('txt_RazonSocial', '', array('size' => 10, 'maxlength' => 20,
            'class' => 'form-control',
                //'onchange' => 'return calcularItem()',
                //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
        ))
        ?>
    </div>
    <div class="form-group">
        <label><?php echo Yii::t('PERSONA', 'NombreComercial') ?></label>
        <?php
        echo CHtml::textField('txt_NombreComercial', '', array('size' => 10, 'maxlength' => 20,
            'class' => 'form-control',
                //'onchange' => 'return calcularItem()',
                //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
        ))
        ?>
    </div>
    <div class="form-group">
        <label><?php echo Yii::t('PERSONA', 'Mail') ?></label>
        <?php
        echo CHtml::textField('txt_Mail', '', array('size' => 10, 'maxlength' => 20,
            'class' => 'form-control',
                //'onchange' => 'return calcularItem()',
                //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
        ))
        ?>
    </div>
    <div class="form-group">
        <label><?php echo Yii::t('PERSONA', 'EsContribuyente') ?></label>
        <?php
        echo CHtml::textField('txt_EsContribuyente', '', array('size' => 10, 'maxlength' => 20,
            'class' => 'form-control',
                //'onchange' => 'return calcularItem()',
                //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
        ))
        ?>
    </div>
    <div class="form-group">
        <label><?php echo Yii::t('PERSONA', 'Direccion') ?></label>
        <?php
        echo CHtml::textField('txt_Direccion', '', array('size' => 10, 'maxlength' => 20,
            'class' => 'form-control',
                //'onchange' => 'return calcularItem()',
                //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
        ))
        ?>
    </div>



</form>


