<div>
    <table class="marcoDiv">
        <tbody>
            <tr>
                <td>
                    <label><?php echo Yii::t('DOCUMENTOS', 'DNI') ?></label>
                    <label><?php echo $cabFact['IdentificacionComprador'] ?></label>
                </td>
                
            </tr>
            <tr>
                <td>
                    <label><?php echo $cabFact['NombreDocumento'] ?></label>
                </td>
            </tr>
            <tr>
                <td>
                    <label><?php echo Yii::t('DOCUMENTOS', 'Number') ?></label>
                    <label><?php echo $cabFact['NumDocumento'] ?></label>
                </td>
              
            </tr>
            <tr>
                <td>
                    <label><?php echo Yii::t('DOCUMENTOS', 'Authorization number') ?></label>
                </td>
            </tr>
            <tr>
                <td>
                    <label><?php echo $cabFact['ClaveAcceso'] ?></label>
                </td>
            </tr>
            <tr>
                <td>
                    <label><?php echo Yii::t('DOCUMENTOS', 'DATE AND TIME AUTHORIZATION') ?></label>
                    <label><?php echo date(Yii::app()->params["datebytime"],strtotime($cabFact['FechaEmision']))  ?></label>
                </td>
                
            </tr>
            <tr>
                <td>
                    <label><?php echo Yii::t('DOCUMENTOS', 'ENVIRONMENT') ?></label>
                    <label><?php echo ($cabFact['Ambiente']=='1')?Yii::t('DOCUMENTOS', 'TEST'):Yii::t('DOCUMENTOS', 'PRODUCTION'); ?></label>
                </td>
               
            </tr>
            <tr>
                <td>
                    <label><?php echo Yii::t('DOCUMENTOS', 'BROADCASTING') ?></label>
                    <label><?php echo ($cabFact['TipoEmision']=='1')?Yii::t('DOCUMENTOS', 'NORMAL'):Yii::t('DOCUMENTOS', 'SYSTEM UNAVAILABLE'); ?></label>
                </td>
                
            </tr>
            <tr>
                <td >
                    <label><?php echo Yii::t('DOCUMENTOS', 'PASSWORD') ?></label>
                </td>
            </tr>
            <tr>
                <td>
                    <label><?php echo $cabFact['ClaveAcceso'] ?></label>
                </td>
            </tr>
            <tr>
                <td>
                    <label><?php echo $cabFact['ClaveAcceso'] ?></label>
                </td>
            </tr>
        </tbody>
        
    </table>
</div>