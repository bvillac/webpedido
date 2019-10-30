<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php echo $this->renderPartial('_include'); ?>

<div class="col-lg-12">
    <div class="alert alert-info alert-global-notice titleData">
        <strong>Estimado Cliente: </strong>En caso le sea posible y le interese acceder a un  mejor precio favor llene o adjunte la lista de los items  que su empresa consuma o utiliza,
        esto con el fin de otorgar mejores precios y descuentos.
    
    </div>
</div>


<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">        
            <label>Listado de Items</label>
        </div>
        <div class="panel-body">
            <div class="form-group rowLine">
                <div class="txt_label">
                    <label><?php echo Yii::t('USUARIO', 'Nombre') ?></label>
                </div>
                <div class="rowTd">
                    <?php
                    echo CHtml::textField('txt_nombre', '', array( 'maxlength' => 50,
                        'class' => 'form-control',
                            //'onchange' => 'return calcularItem()',
                            //'onkeydown' => "nextControl(isEnter(event),'txt_RUC')",
                    ))
                    ?>
                </div>
            </div>
            
            <div class="form-group rowLine">
                <div class="txt_label">
                    <label><?php echo Yii::t('TIENDA', 'Observación') ?></label>
                </div>
                <div class="rowTd">
                    <textarea id="txt_mensaje" rows="3" cols="40" placeholder="Comentario.."></textarea> 
                </div>
            </div>
            
            
        </div>
        <div class="panel-footer">
            <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Agregar Item'), array('id' => 'btn_save', 'name' => 'btn_save', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_AgregarItemCliente("Create")')); ?>
            
            <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Clear'), array('id' => 'btn_limpiar', 'name' => 'btn_limpiar', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_limpiarUserCliente()')); ?>
            <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Enviar lista de Items'), array('id' => 'btn_autoriza', 'name' => 'btn_autoriza', 'class' => 'btn btn-primary btn-sm rightPosicion', 'onclick' => 'fun_AutorizaItemCliente()')); ?>
        </div>

        <?php //echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Enviar'), array('id' => 'btn_add', 'name' => 'btn_add', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_enviarComentario()')); ?>
           

            
    </div>
</div>

<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">        
            <label>Permite adjuntar Archivo con Formato o extensión PDF</label>
        </div>
        <div class="panel-body">
            
            <div class="form-group">
                <label><?php echo Yii::t('PERSONA', 'Archivo') ?></label>
                <?php
                $this->widget('application.extensions.EAjaxUpload.EAjaxUpload', array(
                    'id' => 'fileUploader',
                    'config' => array(
                        'action' => Yii::app()->createUrl('/uSUARIO/upload'),
                        'allowedExtensions' => array("jpg", "pdf"), //array("jpg","jpeg","gif","exe","mov" and etc...
                        'sizeLimit' => 2 * 1024 * 1024, // maximum file size in bytes
                        'minSizeLimit' => 1024, // minimum file size in bytes
                        //'onComplete' => "js:function(id, fileName, responseJSON){ "
                        //        . "$('#archivo').val(fileName);$('#txt_RutaFirma').val(fileName); "
                        //        . "$('#botones').css('display','inline'); }",
                        //'minSizeLimit'=>10*1024*1024,// minimum file size in bytes
                        //'onComplete'=>"js:function(id, fileName, responseJSON){ alert(fileName); }",
                        'messages'=>array(
                              'typeError'=>"{file} Extensión no valida. extensiones permitidas {extensions} .",
                              'sizeError'=>"{file} demasiado grande, máximo permitido {sizeLimit}.",
                              //'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                              'emptyError'=>"{file} is empty, please select files again without it.",
                              'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                             ),
                        //'showMessage'=>"js:function(message){ alert(message); }"
                    )
                ));
                ?>
            </div>
            
        </div>
        <div class="panel-footer"> 
            <label>Usar esta opción para enviar el archivo adjuntado</label>
            <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Enviar Archivo'), array('id' => 'btn_autofile', 'name' => 'btn_autofile', 'class' => 'btn btn-primary btn-sm rightPosicion', 'onclick' => 'fun_AutorizaFile()')); ?>
        </div>

            <?php //echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Enviar'), array('id' => 'btn_add', 'name' => 'btn_add', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_enviarComentario()')); ?>
           

            
    </div>
</div>
<div class="col-lg-12">
    <?php echo $this->renderPartial('_indexGridClienteItem', array('model' => $model)); ?>
</div>

