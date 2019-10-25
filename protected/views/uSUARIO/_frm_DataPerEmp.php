
<form role="form">
    <p>
        <strong>
            Ingrese Departamento o Sucursal con su respectivo cupo para poder agregar los usuarios
        </strong>
    </p>
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('TIENDA', 'Store name') ?></label>
        </div>
        <div class="rowTd">
            <?php
            echo CHtml::textField('txt_departamento', '', array('maxlength' => 50,
                'class' => 'form-control',
                    //'onchange' => 'return calcularItem()',
                    //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
            ))
            ?>
        </div>
        
            

    </div>
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('USUARIO', 'Cupo') ?></label>
        </div>
        <div class="rowTd">
                    <?php
                    echo CHtml::textField('txt_cupo', '', array('size' => 10,'maxlength' => 20,
                        'class' => 'form-control  validation_Vs',
                        'data-type' => 'dinero',
                        'placeholder' => Yii::app()->format->formatNumber(0),
                        'onkeydown' => "accionEnter(isEnter(event),this)",
                    ))
                    ?>
        </div>
        <div class="rowTd">
            <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Agregar Departamento'), array('id' => 'btn_select', 'name' => 'btn_select', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_selecionar()')); ?>
            <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Nuevo Departamento'), array('id' => 'btn_nuevo', 'name' => 'btn_nuevo', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_nuevodepart()')); ?>
        </div>
    </div>
        
    <hr>
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('USUARIO', 'User') ?></label>
        </div>
        <div class="rowTd">
            <?php
            echo CHtml::textField('txt_nombre', '', array('size' => 20, 'maxlength' => 50,
                'class' => 'form-control',
                'disabled' => 'disabled',
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
                'disabled' => 'disabled',
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
                    , array('class' => 'form-control','disabled' => 'disabled',)
            );
            ?> 
        </div>
        
        
    </div>


</form>


