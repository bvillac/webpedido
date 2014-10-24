<div>
    <table style="width:100mm;" class="marcoDiv">
        <tbody>
            <tr>
                <td class="titleDetalle">
                    <label><?php echo Yii::t('DOCUMENTOS', 'Additional Information') ?></label>
                </td>
            </tr>
            <?php
            for ($i = 0; $i < sizeof($adiFact); $i++) {
                ?>
                <tr>
                    <td class="marcoCel"><?php echo $adiFact[$i]['Nombre'] ?></td>
                    <td class="marcoCel"><?php echo $adiFact[$i]['Descripcion'] ?></td>
                </tr>
            <?php } ?>


        </tbody>
    </table>
</div>