
<form role="form">
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('USUARIO', 'Código') ?></label>
        </div>
        <div class="rowTd">
            <?php
            echo CHtml::textField('txt_COD_ART', '', array('size' => 15, 'maxlength' => 30,
                'class' => 'form-control',
                'readonly' => $readonly,
            ))
            ?>
        </div>
    </div>
    <div class="form-group rowLine">
        <div class="txt_label">
            <label><?php echo Yii::t('USUARIO', 'Descripción') ?></label>
        </div>
        <div class="rowTd">
            <?php
            echo CHtml::textField('txt_ART_DES_COM', '', array('size' => 20, 
                'class' => 'form-control',
            ))
            ?>
        </div>
    </div>
    <div class="form-group" >
                <p>
                    <strong>
                        Permite adjuntar Archivo con Formato o extensión .JPG <br>
                    </strong>
                </p>
                <label><?php echo Yii::t('PERSONA', 'Arrastra los archivos aquí para subirlos') ?></label>
                <?php
                $this->widget('application.extensions.EAjaxUpload.EAjaxUpload', array(
                    'id' => 'fileUploader',                    
                    'config' => array(
                        'action' => Yii::app()->createUrl('/aRTICULO/upload'),
                        'allowedExtensions' => array("jpg", "jpeg"), //array("jpg","jpeg","gif","exe","mov" and etc...
                        'sizeLimit' => 12 * 1024 * 1024, // maximum file size in bytes
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
    
        
    

</form>


