
<table class="tabDetalle">
    <tbody>
        <tr>
            <td class="marcoCel titleDetalle">
                <label><?php echo Yii::t('DOCUMENTOS', 'Main code') ?></label>
            </td>
            <td class="marcoCel titleDetalle">
                <label><?php echo Yii::t('DOCUMENTOS', 'Main stub') ?></label>
            </td>
            <td class="marcoCel titleDetalle">
                <label><?php echo Yii::t('DOCUMENTOS', 'Quantity') ?></label>
            </td>
            <td class="marcoCel titleDetalle">
                <label><?php echo Yii::t('DOCUMENTOS', 'Description') ?></label>
            </td>
            <td class="marcoCel titleDetalle">
                <label><?php echo Yii::t('DOCUMENTOS', 'Additional details') ?></label>
            </td>
            <td class="marcoCel titleDetalle">
                <label><?php echo Yii::t('DOCUMENTOS', 'Additional details N2') ?></label>
            </td>
            <td class="marcoCel titleDetalle">
                <label><?php echo Yii::t('DOCUMENTOS', 'Unit price') ?></label>
            </td>
            <td class="marcoCel titleDetalle">
                <label><?php echo Yii::t('DOCUMENTOS', 'Discount') ?></label>
            </td>
            <td class="marcoCel titleDetalle">
                <label><?php echo Yii::t('DOCUMENTOS', 'Total price') ?></label>
            </td>
        </tr>
        <?php
        for ($i = 0; $i < sizeof($detFact); $i++) {
            ?>
            <tr>
                <td class="marcoCel"><?php echo $detFact[$i]['CodigoPrincipal'] ?></td>
                <td class="marcoCel"><?php echo $detFact[$i]['CodigoAuxiliar'] ?></td>
                <td class="marcoCel"><?php echo intval($detFact[$i]['Cantidad']) ?></td>
                <td class="marcoCel"><?php echo $detFact[$i]['Descripcion'] ?></td>
                <td class="marcoCel"><?php //echo $detFact[$i]['CodigoPrincipal'] ?></td>
                <td class="marcoCel"><?php //echo $detFact[$i]['CodigoPrincipal'] ?></td>
                <td class="marcoCel dataNumber"><?php echo Yii::app()->format->formatNumber($detFact[$i]['PrecioUnitario']) ?></td>
                <td class="marcoCel dataNumber"><?php echo Yii::app()->format->formatNumber($detFact[$i]['Descuento']) ?></td>
                <td class="marcoCel dataNumber"><?php echo Yii::app()->format->formatNumber($detFact[$i]['PrecioTotalSinImpuesto'])  ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>