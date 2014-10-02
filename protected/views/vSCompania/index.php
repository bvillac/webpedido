<?php
/**
 * Este Archivo contiene las vista de Compañias
 * @author Ing. Byron Villacreses <byronvillacreses@gmail.com>
 * @copyright Copyright &copy; SolucionesVillacreses 2014-09-24
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
?>
<?php echo $this->renderPartial('_include'); ?>
<div class="col-lg-12">
    <?php //echo CHtml::submitButton('Submit'); ?>
    <?php //echo CHtml::link('Delete', array('wsrecruiteducation/delete', 'id' => '$model->EducID'), array('confirm' => 'Are you sure?')    );    ?>
    <?php //echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Create'), array('id' => 'btn_nuevo', 'name' => 'btn_nuevo', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_Nuevo("Create")')); ?>
    <?php echo CHtml::link(Yii::t('CONTROL_ACCIONES', 'Create'),array('vSCompania/create'), array('title' => Yii::t('CONTROL_ACCIONES', 'Create'),'class' => 'btn btn-primary btn-sm',)  );    ?>
</div>
<div class="col-lg-12">
    <?php echo $this->renderPartial('_indexGrid', array('model' => $model)); ?>
</div>


