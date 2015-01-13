
<table style="width:200mm" class="tabDetalle">
    <tbody>
        <tr>
            <td class="marcoCel titleDetalle">
                <span><?php echo Yii::t('TIENDA', 'Code') ?></span>
            </td>
            <td class="marcoCel titleDetalle">
                <span><?php echo Yii::t('TIENDA', 'Description') ?></span>
            </td>
            <td class="marcoCel titleDetalle">
                <span><?php echo Yii::t('TIENDA', 'Quantity') ?></span>
            </td>
            <td class="marcoCel titleDetalle">
                <span><?php echo Yii::t('TIENDA', 'Unit price') ?></span>
            </td>
            <td class="marcoCel titleDetalle">
                <span><?php echo Yii::t('TIENDA', 'Total') ?></span>
            </td>
        </tr>
        <?php
        for ($i = 0; $i < sizeof($detFact); $i++) {
            ?>
            <tr>
                <td class="marcoCel"><?php echo $detFact[$i]['Codigo'] ?></td>
                <td class="marcoCel "><?php echo $detFact[$i]['Nombre'] ?></td>
                <td class="marcoCel dataNumber"><?php echo intval($detFact[$i]['Cant']) ?></td>
                <td class="marcoCel dataNumber"><?php echo Yii::app()->format->formatNumber($detFact[$i]['Precio']) ?></td>
                <td class="marcoCel dataNumber"><?php echo Yii::app()->format->formatNumber($detFact[$i]['TotVta'])  ?></td>
            </tr>
        <?php } ?>
            <tr>
                <td class="marcoCel dataNumber" colspan="5">
                    <?php echo Yii::app()->format->formatNumber($ValorNeto) ?>
                </td>
                
            </tr>
    </tbody>
</table>