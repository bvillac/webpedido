<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php echo $this->renderPartial('_include'); ?>
<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">        
            <label>Comentarios y Sugerencias</label>
        </div>
        <div class="panel-body">
            <div class="form-group rowLine">
                <div class="txt_label">
                    <label><?php echo Yii::t('TIENDA', 'Mensaje') ?></label>
                </div>
                <div class="rowTd">
                    <textarea id="txt_mensaje" rows="4" cols="50" placeholder="Comentario.."></textarea> 
                </div>
            </div> 
            
        </div>
        <div class="panel-footer">
            <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Enviar'), array('id' => 'btn_add', 'name' => 'btn_add', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_enviarComentario()')); ?>
           
        </div>
            
    </div>
</div>

