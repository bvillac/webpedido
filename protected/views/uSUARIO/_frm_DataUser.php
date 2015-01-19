
<form role="form">
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('USUARIO', 'User') ?></label>
        </div>
        <div class="rowTd">
            <?php
            echo CHtml::textField('txt_usuario', '', array('size' => 20, 'maxlength' => 100,
                'class' => 'form-control',
                    //'onchange' => 'return calcularItem()',
                    //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
            ))
            ?>
        </div>
    </div>
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('USUARIO', 'Password') ?></label>
        </div>
        <div class="rowTd">
            <?php
            echo CHtml::passwordField('txt_password', '', array('size' => 20, 'maxlength' => 100,
                'class' => 'form-control',
                    //'onchange' => 'return calcularItem()',
                    //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
            ))
            ?>
        </div>
    </div>
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('USUARIO', 'Confirm') ?></label>
        </div>
        <div class="rowTd">
            <?php
            echo CHtml::passwordField('txt_confirma', '', array('size' => 20, 'maxlength' => 100,
                'class' => 'form-control',
                    //'onchange' => 'return calcularItem()',
                    //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
            ))
            ?>
        </div>
    </div>
    


</form>


