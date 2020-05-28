<?php
/**
 * Este Archivo contiene las vista de Compañias
 * @author Ing. Byron Villacreses <byronvillacreses@gmail.com>
 * @copyright Copyright &copy; SolucionesVillacreses 2014-12-18
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
$rol_Id = Yii::app()->getSession()->get('RolId', FALSE);
?>
<?php echo $this->renderPartial('_include'); ?>
<br><br>
<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading"><?php echo Yii::t('GENERAL', 'Customer price') ?></div>
        <div class="panel-body">
            <?php $this->renderPartial('_frm_dataTienda', array('model' => $model, 'cliente' => $cliente,)); ?>
        </div>
    </div>
</div>
<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <?php //echo Yii::t('GENERAL', 'List of price') ?>
            <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Save'), array('id' => 'btn_save', 'name' => 'btn_save', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'guardarTiendasPrecio("Create")')); ?>
            <?php if($rol_Id=='1' or $rol_Id=='2'){//Solo Para Rol Administrado  ?>
            <?php
            echo CHtml::textField('txt_val_por', '', array('size' => 8, 'maxlength' => 6,
                'class' => ' txt_TextboxNumber2 validation_Vs',
                'data-type' => 'dinero',
                'placeholder' => Yii::app()->format->formatNumber(0). '%',
                //'onchange' => 'return calcularItem()',
                'onblur' => "pedidoVentasEnterGrid(isEnter(event),this)",
                'onkeydown' => "pedidoVentasEnterGrid(isEnter(event),this)",
            ))
            ?>
            
            <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Actualizar Precios'), array('id' => 'btn_calcular', 'name' => 'btn_calcular', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'calcularPrecio()')); ?>
            <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Agregar Items'), array('id' => 'btn_addItems', 'name' => 'btn_addItems', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'calcularPrecioxx()')); ?>
            <?php } ?>
            <?php //echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Clear'), array('id' => 'btn_limpiar', 'name' => 'btn_limpiar', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_limpiarServer()')); ?>
        </div>
        <div class="panel-body">
            <?php $this->renderPartial('_frm_listaPrecio', array('model' => $model)); ?>
        </div>
    </div>
</div>

<script>
    //se ejecuta un Escrip de Incio
    loadDataCreate();
</script>