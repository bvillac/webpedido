<style>
    .titleLabel{
                /*font-size:7pt;*/
                /*color:#000;*/
                font-weight: bold ;
            }
</style>

    
    <div id="div-table">
        <div class="trow">
            <p>
                <label class="titleLabel">Estimad@:</label><br> <?php echo Yii::app()->getSession()->get('user_name', FALSE) ?> <br> 
                Su Requerimiento se envio con Exito!!!
            </p>
        </div>
        <div class="trow">
            <div class="tcol-td form-group">
                <label class="titleLabel"><?php echo Yii::t('TIENDA', 'Empresa') ?> : </label>
                <span><?php  echo Yii::app()->getSession()->get('CliNom', FALSE) ?></span>
            </div>
        </div>
        
        <div class="trow">
            <div class="tcol-td form-group">
                <p>
                    Gracias por Preferirnos.<br>
                    Atentamente,<br>
                    <label class="titleLabel">Utimpor S.A.</label>
                    
                </p>
            </div>
        </div>
        
    </div>
