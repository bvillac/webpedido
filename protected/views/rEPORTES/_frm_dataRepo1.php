<div id="div-table">
    <div class="trow">
        
        <div class="tcol-td form-group">
            <span> <?php echo Yii::t('COMPANIA', 'Date Start') ?></span>
        </div>
        <div class="tcol-td form-group">
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'name' => 'dtp_fec_ini',
                'attribute' => 'dtp_fec_ini',
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
        <div class="tcol-td form-group">
            <span> <?php echo Yii::t('COMPANIA', 'Date End') ?></span>
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
        <div class="tcol-td form-group">
            <?php
                echo CHtml::link(Yii::t('CONTROL_ACCIONES', 'Accept'), array('rEPORTES/Rep_VentMax'), array('id' => 'btn_aceptar', 'name' => 'btn_aceptar', 'title' => Yii::t('CONTROL_ACCIONES', 'Accept'), 'class' => 'btn btn-primary btn-sm', "target"=>"_blank",'onclick' => 'fun_ventasMes(1)'));
            ?>
        </div>
        <div class="tcol-td form-group">
            <?php
                echo CHtml::link(Yii::t('CONTROL_ACCIONES', 'Excel'), array('rEPORTES/Rep_VentMax'), array('id' => 'btn_aceptar_excel', 'name' => 'btn_aceptar_excel', 'title' => Yii::t('CONTROL_ACCIONES', 'Excel'), 'class' => 'btn btn-primary btn-sm', "target"=>"_blank",'onclick' => 'fun_ventasMes(2)'));
            ?>
        </div>
    </div>

</div>

