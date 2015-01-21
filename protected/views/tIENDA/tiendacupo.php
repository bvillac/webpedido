<?php
/**
 * Este Archivo contiene las vista de Compañias
 * @author Ing. Byron Villacreses <byronvillacreses@gmail.com>
 * @copyright Copyright &copy; SolucionesVillacreses 2014-09-24
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
?>
<?php echo $this->renderPartial('_include'); ?>
<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">        
            <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Update'), array('id' => 'btn_update', 'name' => 'btn_update', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_guardarCupoTienda()')); ?>
        </div>
        <div class="panel-body">
            <div class="form-group rowLine">
                <div class="txt_label">
                    <label><?php echo Yii::t('TIENDA', 'Stores') ?></label>
                </div>
                <div class="rowTd">
                    <?php
                    echo CHtml::dropDownList(
                            'cmb_tienda', '0'
                            , array('0' => Yii::t('GENERAL', '-Select-')) + CHtml::listData($tienda, 'TIE_ID', 'TIE_NOMBRE')
                            , array(
                        //'onchange' => 'js:mostrarListaTienda(this.value)',
                        'class' => 'form-control'
                            )
                    );
                    ?> 
                </div>
            </div>

            <div class="form-group rowLine">
                <div class="txt_label">
                    <label><?php echo Yii::t('TIENDA', 'Quota') ?></label>
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



        </div>
    </div>
</div>
