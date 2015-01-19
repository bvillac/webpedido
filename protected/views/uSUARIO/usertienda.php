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
            <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Add'), array('id' => 'btn_add', 'name' => 'btn_add', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_agregarUserTienda("Create")')); ?>
        </div>
        <div class="panel-body">
            <?php $this->renderPartial('_frm_dataUsuTie', 
                    array('model' => $model, 'cliente' => $cliente,'tienda' => $tienda,'rol' => $rol)); ?>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <?php echo $this->renderPartial('_indexGridTienda', array('model' => $model)); ?>
</div>
