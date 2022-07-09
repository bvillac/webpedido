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
            <div class="form-group" style="display: none">
                <p>
                    <strong>
                        Permite adjuntar Archivo con Formato o extensión .JPG <br>
                        Tamaño Máximo de Archivo (1MB)
                    </strong>
                </p>
                <label><?php echo Yii::t('PERSONA', 'Arrastra los archivos aquí para subirlos') ?></label>
                <?php
                $this->widget('application.extensions.EAjaxUpload.EAjaxUpload', array(
                    'id' => 'fileUploader',                    
                    'config' => array(
                        'action' => Yii::app()->createUrl('/pEDIDOS/upload'),
                        'allowedExtensions' => array("jpg", "jpeg"), //array("jpg","jpeg","gif","exe","mov" and etc...
                        'sizeLimit' => 2 * 1024 * 1024, // maximum file size in bytes
                        'minSizeLimit' => 1024, // minimum file size in bytes
                        //'onComplete' => "js:function(id, fileName, responseJSON){ "
                        //        . "$('#archivo').val(fileName);$('#txt_RutaFirma').val(fileName); "
                        //        . "$('#botones').css('display','inline'); }",
                        //'minSizeLimit'=>10*1024*1024,// minimum file size in bytes
                        //'onComplete'=>"js:function(id, fileName, responseJSON){ alert(fileName); }",
                        //'uploadButtonText' => 'Subir archivo',
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
            <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Enviar'), array('id' => 'btn_add', 'name' => 'btn_add', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'fun_enviarComentario()')); ?>
           
        </div>
            
    </div>
</div>



