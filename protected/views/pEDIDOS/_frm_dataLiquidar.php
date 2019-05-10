<!--<div id="div-table">
    <div class="trow">
        <div class="tcol-td form-group">
            <label><?php echo Yii::t('TIENDA', 'Stores') ?></label>
        </div>
        <div class="tcol-td form-group">
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
        <div class="tcol-td form-group">
            <label><?php echo Yii::t('TIENDA', 'Status') ?></label>
        </div>
        <div class="tcol-td form-group">
            <?php
            echo CHtml::dropDownList(
                    'cmb_estado', '0'
                    , array('0' => Yii::t('TIENDA', 'All')) + $estado
                    , array('class' => 'form-control')
            );
            ?> 
        </div>
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
            <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Search'), array('id' => 'btn_buscar', 'name' => 'btn_buscar', 'class' => 'btn btn-success', 'onclick' => 'buscarDataliquidar("")')); ?>
        </div>
    </div>

</div>-->

<form role="form">
    <div class="form-group rowLine">
        <div class="col-lg-1">
            <label><?php echo Yii::t('TIENDA', 'Stores') ?></label>
        </div>
        <div class="col-lg-3">
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
        <div class="col-lg-1">
            <label><?php echo Yii::t('TIENDA', 'Status') ?></label>
        </div>
        <div class="col-lg-3">
            <?php
            echo CHtml::dropDownList(
                    'cmb_estado', '0'
                    , array('0' => Yii::t('TIENDA', 'All')) + $estado
                    , array('class' => 'form-control')
            );
            ?> 
        </div>
        
        <div class="col-lg-4"></div>   
    </div>
    <div class="form-group rowLine">
        <div class="col-lg-1">
            <label><?php echo Yii::t('COMPANIA', 'Date Start') ?></label>
        </div>
        <div class="col-lg-3">
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
        <div class="col-lg-1">
            <label><?php echo Yii::t('COMPANIA', 'Date End') ?></label>
        </div>
        <div class="col-lg-3">
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
        <div class="col-lg-4">
            <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Search'), array('id' => 'btn_buscar', 'name' => 'btn_buscar', 'class' => 'btn btn-success', 'onclick' => 'buscarDataliquidar("")')); ?>
        </div>
        
    </div>
  
        
</form>

