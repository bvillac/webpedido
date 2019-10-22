
<form role="form">
    
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('USUARIO', 'Nombre') ?></label>
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
            <label><?php echo Yii::t('USUARIO', 'Departamento') ?></label>
        </div>
        <div class="rowTd">
            <?php
            echo CHtml::textField('txt_departamento', '', array('size' => 20, 'maxlength' => 50,
                'class' => 'form-control',
                    //'onchange' => 'return calcularItem()',
                    //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
            ))
            ?>
        </div>
    </div>
<!--    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('USUARIO', 'Area') ?></label>
        </div>
        <div class="rowTd">
            <?php
        echo CHtml::dropDownList(
                'cmb_area', '0'
                //, array('0' => Yii::t('GENERAL', '-TODOS-')) + CHtml::listData($area, 'IDS_ARE', 'NOM_ARE')
                ,  CHtml::listData($area, 'IDS_ARE', 'NOM_ARE')
                , array(
                    //'onchange' => 'js:mostrarListaArea()',
                    'class' => 'form-control',
                    //'disabled' => true
                )
        );
        ?> 
        </div>
    </div>-->

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
            <label><?php echo Yii::t('USUARIO', 'Rol') ?></label>
        </div>
        <div class="rowTd">
            <?php
            echo CHtml::dropDownList(
                    'cmb_roles', '0'
                    , $roles
                    , array('class' => 'form-control')
            );
            ?> 
        </div>
        <div class="rowTd">
            <label><?php echo Yii::t('USUARIO', 'Cupo') ?></label>
        </div>
        <div class="rowTd">
                    <?php
                    echo CHtml::textField('txt_cupo', '', array('size' => 10, 'maxlength' => 10,
                        'class' => 'form-control txt_TextboxNumber2 validation_Vs',
                        'data-type' => 'dinero',
                        'placeholder' => Yii::app()->format->formatNumber(0),
                        'onkeydown' => "accionEnter(isEnter(event),this)",
                    ))
                    ?>
        </div>
        
    </div>


</form>


