<div class="frm-titulo"><?php echo Yii::t('CAB_DESCARGO', 'Go') ?></div>
<div id="div-table">

    <div class="trow">
        <!--Columna 1 -->
        <div class="tcol-td">
            <div id="div-table">
                <div class="trow">
                    <div class="tcol-td">
                        <span > <?php echo Yii::t('CAB_DESCARGO', 'Company') ?></span>
                    </div>
                    <div class="tcol-td">
                        <?php
                        echo CHtml::dropDownList(
                                'cmb_proveedor', ''
                                , array('0' => Yii::t('CAB_DESCARGO', '-Select-')) + CHtml::listData($proveedor, 'EMP_ID', 'EMP_NOMBRE')
                                , array('class' => 'frm-text imputext text-left')
                        );
                        ?> 
                    </div>                   
                </div>
                <div class="trow">
                    <div class="tcol-td">
                        <span> <?php echo Yii::t('CAB_DESCARGO', 'Type Disclaimer') ?></span>
                    </div>
                    <div class="tcol-td">
                        <?php
                        echo CHtml::dropDownList(
                                'cmb_tipo_descargo', ''
                                , array('0' => Yii::t('CAB_DESCARGO', '-Select-')) + CHtml::listData($tip_descargo, 'TDES_ID', 'TDES_NOMBRE')
                                , array('onchange' => 'mostrarFormatoDescargo()', 'class' => 'frm-text imputext text-left')
                        );
                        ?> 
                    </div>
                </div>
            </div>
        </div>
        <!--Columna 2 -->
        <div class="tcol-td">
            <div id="div-table">
                <div class="trow">
                    <div class="tcol-td">
                        <span > <?php echo Yii::t('CAB_DESCARGO', 'Patient') ?></span>
                    </div>
                    <div class="tcol-td">
                        <?php
                        /* $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                          'name' => 'txt_nombre_paciente',
                          'id' => 'txt_nombre_paciente',
                          'source' => "js: function(request, response){
                          autocompletarBuscarAfiliado(request, response,'txt_nombre_paciente','COD-NOM');
                          }",
                          'options' => array(
                          'minLength' => '2',
                          'showAnim' => 'fold',
                          'select' => "js:function(event, ui) {
                          actualizaBuscarAfiliado(ui.item.PER_ID);
                          }"
                          ),
                          'htmlOptions' => array(
                          //'title'=>'datos',
                          'class' => 'imputext frm-text-descripcion',
                          //'onKeyup' => "verificarText('txt_cod_paciente')",
                          'placeholder' => Yii::t('CAB_DESCARGO', 'Search by Name, Certificate'),
                          //'onkeydown' => "buscarCodigo(isEnter(event),'txt_cod_paciente','COD-ID')",
                          'value' => 'search',
                          //'rel' => 'tooltip',
                          ),
                          )); */
                        $searchbox = $this->widget('ext.searchBox.SearchBox', array(
                            "type" => "searchBoxList",
                            "boxId" => "txt_nombre_paciente",
                            "listNameID" => "txt_nombre_paciente",
                            "callbackListSource" => "autocompletarBuscarAfiliado",
                            "callbackListSourceParams" => array("'txt_nombre_paciente'", "'COD-NOM'"),
                            "callbackListSelected" => "actualizaBuscarAfiliado",
                            "callbackListSelectedParams" => array('ui.item.PER_ID'),
                            "valueList" => "search",
                            "placeHolder" => Yii::t('GENERAL', 'Search by Project, Customer, Company')));
                        $searchbox->end();
                        /* echo CHtml::link(CHtml::image( Yii::app()->theme->baseUrl . Yii::app()->params['rutaIconos']."help.png",null)
                          ,array(null)
                          ,array(
                          'class'=>'insert-img',
                          'title'=>Yii::t('CAB_DESCARGO', 'Search by Name, Certificate'),
                          'rel' => 'tooltip'
                          )); */
                        /* $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                          'name' => 'txt_nombre_paciente',
                          'id' => 'txt_nombre_paciente',
                          'source' => "js: function(request, response){
                          autocompletarBuscarAfiliado(request, response,'txt_nombre_paciente','NOM');
                          }",
                          'options' => array(
                          'showAnim' => 'fold',
                          'select' => "js:function(event, ui) {
                          actualizaBuscarAfiliado(ui.item.value);
                          }"
                          ),
                          'htmlOptions' => array(
                          'class' => 'frm-text imputext frm-text-descripcion',
                          //'onKeyup' => "verificarText('txt_cod_paciente')",
                          //'onclick' => "if(this.value=='" . Yii::t('CAB_DESCARGO', 'Name') . "') this.value=''",
                          //'onblur' => "if(this.value=='') this.value='" . Yii::t('CAB_DESCARGO', 'Name') . "'",
                          //'onkeydown' => "buscarCodigo(isEnter(event),'txt_cod_paciente','COD-ID')",
                          'value' => 'search',
                          ),
                          )); */
                        ?>

                    </div>
                </div>
                <div class="trow">
                    <div class="tcol-td">
                        <span> <?php echo Yii::t('CAB_DESCARGO', 'Release Date') ?></span>
                    </div>
                    <div class="tcol-td">
                        <div id="div-table">
                            <div class="trow">
                                <div class="tcol-td">
                                    <?php
                                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                        'name' => 'hdtp_fecha_descargo_ini',
                                        'attribute' => 'hdtp_fecha_descargo_ini',
                                        'value' => date(Yii::app()->params['datebydefault']),
                                        'language' => 'es',
                                        'options' => array(
                                            'showAnim' => 'fold',
                                            'autoSize' => true,
                                            'dateFormat' => Yii::app()->params['datepicker'],
                                            'buttonImage' => Yii::app()->theme->baseUrl . Yii::app()->params['rutaIconos'] . 'date.png',
                                            'buttonImageOnly' => true,
                                            'showOn' => 'button',
                                        ),
                                        'htmlOptions' => array(
                                            //'style' => 'height:30px;',
                                            'class' => 'imputext frm-txt-fecha',
                                        ),
                                    ));
                                    ?>
                                </div>


                                <div class="tcol-td">
                                    <?php
                                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                        'name' => 'hdtp_fecha_descargo_fin',
                                        'attribute' => 'hdtp_fecha_descargo_fin',
                                        'value' => date(Yii::app()->params['datebydefault']),
                                        'language' => 'es',
                                        'options' => array(
                                            'showAnim' => 'fold',
                                            'autoSize' => true,
                                            'dateFormat' => Yii::app()->params['datepicker'],
                                            'buttonImage' => Yii::app()->theme->baseUrl . Yii::app()->params['rutaIconos'] . 'date.png',
                                            'buttonImageOnly' => true,
                                            'showOn' => 'button',
                                        ),
                                        'htmlOptions' => array(
                                            //'style' => 'height:10px;',
                                            'class' => 'imputext frm-txt-fecha',
                                        ),
                                    ));
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tcol-td">
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'label' => Yii::t('CAB_DESCARGO', 'Go'),
                'type' => 'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                'size' => 'small', // null, 'large', 'small' or 'mini'
                'htmlOptions' => array(
                    'onclick' => "actualizaGridBuqueda()",
                    'style' => 'margin-left: 10px;',
                ),
            ));
            ?>
        </div>
    </div>
</div>

