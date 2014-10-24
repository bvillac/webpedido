<div id="div-table">
    <div class="trow">
        <div class="tcol-td">
            <span > <?php echo Yii::t('COMPANIA', 'Document') ?></span>
        </div>
        <div class="tcol-td">
            <?php
            echo CHtml::dropDownList(
                    'cmb_tipDoc', '0'
                    , array('0' => Yii::t('COMPANIA', '-Select-')) + CHtml::listData($tipoDoc, 'TipoDocumento', 'Descripcion')
                    , array('class' => 'form-control')
            );
            ?> 
        </div>
        <div class="tcol-td">
            <?php
            echo CHtml::dropDownList(
                    'cmb_tipoApr', '0'
                    , array('0' => Yii::t('COMPANIA', 'None')) + $tipoApr
                    , array('class' => 'form-control')
            );
            ?> 
        </div>
        <div class="tcol-td">
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'name' => 'dtp_fec_ini',
                'attribute' => 'dtp_fec_ini',
                'value' => date(Yii::app()->params['datebydefault']),
                'language' => Yii::app()->language,
                'options' => array(
                    'showAnim' => 'fold',
                    'autoSize' => true,
                    'changeMonth' => 'true',
                    'changeYear' => 'true',
                    'showOtherMonths'=>true,
                    'showButtonPanel'=>true,
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
                    'class' => 'form-control',
                    'readonly'=>'readonly',
                ),
            ));
            ?>
        </div>
    </div>
</div>