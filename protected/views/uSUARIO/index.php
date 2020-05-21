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
    <?php echo CHtml::link(Yii::t('CONTROL_ACCIONES', 'Create'), array('uSUARIO/create'), array('title' => Yii::t('CONTROL_ACCIONES', 'Create'), 'class' => 'btn btn-primary btn-sm',)); ?>
    <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Delete'), array('id' => 'btn_Delete', 'name' => 'btn_Delete', 'class' => 'btn btn-primary btn-sm disabled', 'onclick' => 'fun_Delete()')); ?>
    <?php echo CHtml::link(Yii::t('CONTROL_ACCIONES', 'Edit'), array('uSUARIO/update'), array('id' => 'btn_Update', 'name' => 'btn_Update', 'title' => Yii::t('CONTROL_ACCIONES', 'Edit'), 'class' => 'btn btn-primary btn-sm disabled', 'onclick' => 'fun_Update()')); ?>
    
    <br><br>
    <div class="col-lg-8">
        <div class="form-group">
            <?php
            $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                'name' => 'txt_nombreUser',
                'id' => 'txt_nombreUser',
                'source' => "js: function(request, response){ 
                          autocompletarBuscarUser(request, response,'txt_nombreUser','COD-NOM');
                        }",
                'options' => array(
                    'minLength' => '2',
                    'showAnim' => 'fold',
                    'select' => "js:function(event, ui) {
                            //actualizaBuscarPersona(ui.item.ART_ID);     
                        }"
                ),
                'htmlOptions' => array(
                    'class' => 'form-control',
                    "data-type" => "number",
                    'size' => 35,
                    'placeholder' => Yii::t('GENERAL', 'Find user by code or name'),
                ),
            ));
            ?>
        </div>

    </div>
    <div class="col-lg-4">
        <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Search'), array('id' => 'btn_buscar', 'name' => 'btn_buscar', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_buscarDataUserPer("")')); ?>
    </div>


</div>
<div class="col-lg-12">
    <?php echo $this->renderPartial('_indexGrid', array('model' => $model)); ?>
</div>
