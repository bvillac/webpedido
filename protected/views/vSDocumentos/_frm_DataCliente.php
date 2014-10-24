<div>
    <table style="width:100%;" class="marcoDiv">
        <tbody>
            <tr>
                <td>
                    <label><?php echo Yii::t('DOCUMENTOS', 'Social reason and last name') ?></label>
                    <label><?php echo $cabFact['RazonSocialComprador'] ?></label>
                </td>
                <td>
                    <label><?php echo Yii::t('DOCUMENTOS', 'Identification') ?></label>
                    <label><?php echo $cabFact['IdentificacionComprador'] ?></label>
                </td>
            </tr>
            <tr>
                <td>
                    <label><?php echo Yii::t('DOCUMENTOS', 'Date of issue') ?></label>
                    <label><?php echo $cabFact['FechaEmision'] ?></label>
                </td>
                <td>
                    <label><?php echo Yii::t('DOCUMENTOS', 'Remission guide') ?></label>
                    <label><?php echo $cabFact['GuiaRemision'] ?></label>
                </td>
            </tr>
        </tbody>
    </table>
</div>