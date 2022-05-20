<div id="div-table">
    <div class="form-group rowLine">
        <div class="col-lg-2">
            <label><?php echo Yii::t('TIENDA', 'Stores') ?></label>
        </div>
        <div class="col-lg-5">
            <?php
            echo CHtml::dropDownList(
                    'cmb_tienda', '0'
                    , array('0' => Yii::t('TIENDA', 'All')) + CHtml::listData($tienda, 'TIE_ID', 'TIE_NOMBRE')
                    , array(
                //'onchange' => 'js:mostrarListaTienda(this.value)',
                'class' => 'form-control'
                    )
            );
            ?> 
        </div>
        <div class="col-lg-5"></div>
        
    </div>
    <div class="form-group rowLine">
        <div class="col-lg-1">
            <span> <?php echo Yii::t('COMPANIA', 'Date Start') ?></span>
        </div>
        <div class="col-lg-2">
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'name' => 'dtp_fec_ini_item',
                'attribute' => 'dtp_fec_ini_item',
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
        <div class="col-lg-1">
            <span> <?php echo Yii::t('COMPANIA', 'Date End') ?></span>
        </div>
        <div class="col-lg-2">
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'name' => 'dtp_fec_fin_item',
                'attribute' => 'dtp_fec_fin_item',
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
        <div class="col-lg-6"></div>
    </div>
    <div class="form-group rowLine">
        <?php
                echo CHtml::link(Yii::t('CONTROL_ACCIONES', 'Exportar PDF'), array('rEPORTES/Rep_ItemTienda'), array('id' => 'btn_aceptar_item', 'name' => 'btn_aceptar_item', 'title' => Yii::t('CONTROL_ACCIONES', 'Accept'), 'class' => 'btn btn-primary btn-sm', "target"=>"_blank",'onclick' => 'fun_ConsumoTienda(1)'));
            ?>
        <?php
                echo CHtml::link(Yii::t('CONTROL_ACCIONES', 'Exportar Excel'), array('rEPORTES/Rep_ItemTienda'), array('id' => 'btn_excel_item', 'name' => 'btn_excel_item', 'title' => Yii::t('CONTROL_ACCIONES', 'Excel'), 'class' => 'btn btn-primary btn-sm', "target"=>"_blank",'onclick' => 'fun_ConsumoTienda(2)'));
            ?>
        
    </div>
    
    

</div>

