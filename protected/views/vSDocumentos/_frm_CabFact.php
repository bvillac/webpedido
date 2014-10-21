<div>
    <table>
        <tbody>
            <tr>
                <td>
                    <label><?php echo Yii::t('DOCUMENTOS', 'DNI') ?></label>
                </td>
                <td>
                    <label><?php echo $cabFact['IdentificacionComprador'] ?></label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label><?php echo $cabFact['NombreDocumento'] ?></label>
                </td>
            </tr>
            <tr>
                <td>
                    <label><?php echo Yii::t('DOCUMENTOS', 'Number') ?></label>
                </td>
                <td>
                    <label><?php echo $cabFact['NumDocumento'] ?></label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label><?php echo Yii::t('DOCUMENTOS', 'Authorization number') ?></label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label><?php echo $cabFact['ClaveAcceso'] ?></label>
                </td>
            </tr>
        </tbody>
        
    </table>
</div>