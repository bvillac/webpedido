<div id="div-table">
    <div class="trow">
        <div class="tcol-td form-group">
            <label><?php echo Yii::t('TIENDA', 'Stores') ?></label>
        </div>
        <div class="tcol-td form-group">
            <?php
            echo CHtml::dropDownList(
                    'cmb_tienda', '0'
                    , array('0' => Yii::t('GENERAL', '-Select-')) + CHtml::listData($tienda, 'TIE_ID', 'TIE_NOMBRE')
                    , array(
                'onchange' => 'js:mostrarListaTienda(this.value)',
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
                    //'style' => 'height:10px;',
                    //'style' => 'width:100px;vertical-align:top !important',
                    //'style'=>'width:200px !important',
                    //'modal'=>true,
                    //'size'=>10, 
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
                    //'style' => 'height:10px;',
                    //'style' => 'width:100px;vertical-align:top',
                    //'style'=>'width:200px !important',
                    //'modal'=>true,
                    //'size'=>10, 
                    'class' => 'form-control imgDate',
                    'readonly' => 'readonly',
                ),
            ));
            ?>
        </div>
    </div>

</div>
<div class="lineLeft">
        <?php echo CHtml::link(Yii::t('CONTROL_ACCIONES', 'Create'), array('pEDIDOS/listar'), array('title' => Yii::t('CONTROL_ACCIONES', 'Create'), 'class' => 'btn btn-primary btn-sm',)); ?>
        <?php echo CHtml::button(Yii::t('TIENDA', 'To order'), array('id' => 'btn_save', 'name' => 'btn_save', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'guardarListaPedido("Create")')); ?>
        <?php echo CHtml::link(Yii::t('CONTROL_ACCIONES', 'Edit'), array('tIENDA/update'), array('id' => 'btn_Update', 'name' => 'btn_Update', 'title' => Yii::t('CONTROL_ACCIONES', 'Edit'), 'class' => 'btn btn-primary btn-sm disabled', 'onclick' => 'fun_Update()')); ?>
        <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Cancel'), array('id' => 'btn_anular', 'name' => 'btn_anular', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_DeletePedido()')); ?>
</div>
