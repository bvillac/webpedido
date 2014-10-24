<?php
$IRBPNR=0;
$ICE=0;
for ($i = 0; $i < sizeof($impFact); $i++) {
    if ($impFact[$i]['Codigo'] == '2') {//Valores de IVA
        switch ($impFact[$i]['CodigoPorcentaje']) {
            case 0:
                $BASEIVA0=$impFact[$i]['BaseImponible'];
                break;
            case 2:
                $BASEIVA12=$impFact[$i]['BaseImponible'];
                $VALORIVA12=$impFact[$i]['Valor'];
                break;
            case 6://No objeto Iva
                $NOOBJIVA=$impFact[$i]['BaseImponible'];
                break;
            case 7://Excento de Iva
                $EXENTOIVA=$impFact[$i]['BaseImponible'];
                break;
            default:
        }
    }
}
?>
<table class="tabDetalle">
    <tbody>
        <tr>
            <td class="marcoCel">
                <label><?php echo Yii::t('DOCUMENTOS', 'SUBTOTAL 12%') ?></label>
            </td>
            <td class="marcoCel dataNumber">
                <label><?php echo Yii::app()->format->formatNumber($BASEIVA12)  ?></label>
            </td>
        </tr>
        <tr>
            <td class="marcoCel">
                <label><?php echo Yii::t('DOCUMENTOS', 'SUBTOTAL 0%') ?></label>
            </td>
            <td class="marcoCel dataNumber">
                <label><?php echo Yii::app()->format->formatNumber($BASEIVA0)   ?></label>
            </td>
        </tr>
        <tr>
            <td class="marcoCel">
                <label><?php echo Yii::t('DOCUMENTOS', 'SUBTOTAL IVA no object') ?></label>
            </td>
            <td class="marcoCel dataNumber">
                <label><?php echo Yii::app()->format->formatNumber($NOOBJIVA)  ?></label>
            </td>
        </tr>
        <!--<tr>
            <td class="marcoCel">
                <label><?php //echo Yii::t('DOCUMENTOS', 'SUBTOTAL TAX FREE') ?></label>
            </td>
            <td class="marcoCel">
                <label><?php //echo $EXENTOIVA  ?></label>
            </td>
        </tr>-->
        <tr>
            <td class="marcoCel">
                <label><?php echo Yii::t('DOCUMENTOS', 'SUBTOTAL IVA EXEMPT') ?></label>
            </td>
            <td class="marcoCel dataNumber">
                <label><?php echo Yii::app()->format->formatNumber($EXENTOIVA)  ?></label>
            </td>
        </tr>
        <tr>
            <td class="marcoCel">
                <label><?php echo strtoupper(Yii::t('DOCUMENTOS', 'Discount')) ?></label>
            </td>
            <td class="marcoCel dataNumber">
                <label><?php echo Yii::app()->format->formatNumber($cabFact['TotalDescuento'])  ?></label>
            </td>
        </tr>
        <tr>
            <td class="marcoCel">
                <label><?php echo Yii::t('DOCUMENTOS', 'ICE') ?></label>
            </td>
            <td class="marcoCel dataNumber">
                <label><?php echo Yii::app()->format->formatNumber($ICE)  ?></label>
            </td>
        </tr>
        <tr>
            <td class="marcoCel">
                <label><?php echo Yii::t('DOCUMENTOS', 'IVA 12%') ?></label>
            </td>
            <td class="marcoCel dataNumber">
                <label><?php echo Yii::app()->format->formatNumber($VALORIVA12)  ?></label>
            </td>
        </tr>
        <tr>
            <td class="marcoCel">
                <label><?php echo Yii::t('DOCUMENTOS', 'IRBPNR') ?></label>
            </td>
            <td class="marcoCel dataNumber">
                <label><?php echo Yii::app()->format->formatNumber($IRBPNR)  ?></label>
            </td>
        </tr>
        <tr>
            <td class="marcoCel">
                <label><?php echo Yii::t('DOCUMENTOS', 'GRATUITIES') ?></label>
            </td>
            <td class="marcoCel dataNumber">
                <label><?php echo Yii::app()->format->formatNumber($cabFact['Propina']) ?></label>
            </td>
        </tr>
        <tr>
            <td class="marcoCel">
                <label><?php echo Yii::t('DOCUMENTOS', 'TOTAL VALUE') ?></label>
            </td>
            <td class="marcoCel dataNumber">
                <label><?php echo Yii::app()->format->formatNumber($cabFact['ImporteTotal'])  ?></label>
            </td>
        </tr>

    </tbody>
</table>