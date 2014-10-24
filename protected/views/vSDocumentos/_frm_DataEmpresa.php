<div>
    <table class="marcoDiv">
        <tbody>
            <tr>
                <td colspan="2">
                    <label><?php echo strtoupper(Yii::app()->getSession()->get('RazonSocial', FALSE)) ?></label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label><?php echo Yii::t('DOCUMENTOS', 'Dir matrix') ?></label>
                    <label><?php echo strtoupper(Yii::app()->getSession()->get('DireccionMatriz', FALSE)) ?></label>
                </td>
                
            </tr>
            <tr>
                <td colspan="2">
                    <label><?php echo Yii::t('DOCUMENTOS', 'Dir branch') ?></label>
                    <label><?php echo strtoupper(Yii::app()->getSession()->get('DireccionSucursal', FALSE)) ?></label>
                </td>
                
            </tr>
            <tr>
                <td colspan="2">
                    <label><?php echo Yii::t('DOCUMENTOS', 'Special contributor') ?></label>
                    <label><?php echo strtoupper(Yii::app()->getSession()->get('ContribuyenteEspecial', FALSE)) ?></label>
                </td>
               
            </tr>
            <tr>
                <td colspan="2">
                    <label><?php echo Yii::t('DOCUMENTOS', 'ACCOUNTING REQUIRED TO CARRY') ?></label>
                    <label><?php echo strtoupper(Yii::app()->getSession()->get('ObligadoContabilidad', FALSE)) ?></label>
                </td>
                
            </tr>
            
        </tbody>
        
    </table>
</div>