<style>
    .titleLabel{
                /*font-size:7pt;*/
                /*color:#000;*/
                font-weight: bold ;
            }
</style>
<?php
for ($i = 0; $i < sizeof($CabPed); $i++) {
    ?>
    
    <div id="div-table">
        <div class="trow">
            <p>
                <label class="titleLabel">Estimad@:</label><br> <?php echo $CabPed[$i]["NombreUser"] ?> <br> 
                Su pedio se envio con Exito!!!
            </p>
        </div>
        <div class="trow">
            <div class="tcol-td form-group">
                <label class="titleLabel"><?php echo Yii::t('TIENDA', 'Summary') ?> : </label>
            </div>
        </div>
        <div class="trow">
            <div class="tcol-td form-group">
                <label class="titleLabel"><?php echo Yii::t('TIENDA', 'Cliente') ?> : </label>
                <span><?php echo Yii::app()->getSession()->get('CliNom', FALSE) ?></span>
            </div>
        </div>
        <div class="trow">
            <div class="tcol-td form-group">
                <label class="titleLabel"><?php echo Yii::t('TIENDA', 'Number Order') ?> : </label>
                <span><?php echo $CabPed[$i]["Numero"] ?></span>
            </div>
        </div>
        <div class="trow">
            <div class="tcol-td form-group">
                <label class="titleLabel"><?php echo Yii::t('TIENDA', 'Store name') ?> : </label>
                <span><?php echo $CabPed[$i]["NombreTienda"] ?></span>
            </div>
        </div>
        <div class="trow">
            <div class="tcol-td form-group">
                <label class="titleLabel"><?php echo Yii::t('TIENDA', 'Issue date') ?> : </label>
                <span><?php echo $CabPed[$i]["FechaPedido"] ?></span>
            </div>
        </div>
        <div class="trow">
            <div class="tcol-td form-group">
                <label class="titleLabel"><?php echo Yii::t('TIENDA', 'User order') ?> : </label>
                <span><?php echo $CabPed[$i]["NombrePersona"] ?></span>
            </div>
        </div>
        <div class="trow">
            <div class="tcol-td form-group">
                <label class="titleLabel"><?php echo Yii::t('TIENDA', 'Net amount') ?> : </label>
                <span><?php echo Yii::app()->format->formatNumber($CabPed[$i]["ValorNeto"]) ?></span>
            </div>
        </div>
        <div class="trow">
            <div class="tcol-td form-group">
                <p>
                    Adem&aacute;s puede realizar la impresi&oacute;n su documento accediendo a nuestro portal aqui.<br>
                    Atentamente,<br>
                    <label class="titleLabel">Utimpor S.A.</label>
                    
                </p>
            </div>
        </div>
        
    </div>


<?php
}?>