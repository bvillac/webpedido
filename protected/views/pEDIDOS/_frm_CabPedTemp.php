<div class="well well-sm">
    <div id="div-table">
        <div class="trow">
            <div class="tcol-td form-group">
                <span><?php echo Yii::t('TIENDA', 'Store name') ?> : </span>
                <label><?php echo $CabPed["NombreTienda"] ?></label>
            </div>
            <div class="tcol-td form-group">
                <span><?php echo Yii::t('TIENDA', 'Number') ?> : </span>
                <label><?php echo $CabPed["Numero"] ?></label>
            </div>
            <div class="tcol-td form-group">
                <span><?php echo Yii::t('TIENDA', 'Total') ?> :$ </span>
                <label id="lbl_total"><?php echo Yii::app()->format->formatNumber($CabPed["Total"]) ?></label>
            </div>
            <div id="div_cupo" class="tcol-td form-group">
                <span><?php echo Yii::t('TIENDA', 'Quota') ?> : </span>
                <label id="lbl_cupo"><?php echo Yii::app()->format->formatNumber($cupo) ?></label>
            </div>
        </div>
    </div>
</div>
<script>
    var mostrarDiv = ('<?php echo $mostrar; ?>') ;
    if(mostrarDiv=="SI"){
        $('#div_cupo').show();
    }else{
        $('#div_cupo').hide(); 
    }
</script>