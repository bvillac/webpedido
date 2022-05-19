<div>
    <table style="width:200mm;" class="marcoDiv">
        <tbody>
            <tr>
                <td>
                    <span class="titleLabel"><?php echo Yii::t('TIENDA', 'Number Order') ?></span>
                    <span><?php echo $cabFact['Numero'] ?></span>
                </td>
                <td>
                    <span class="titleLabel"><?php echo Yii::t('TIENDA', 'Issue date') ?></span>
                    <span><?php echo date(Yii::app()->params["datebydefault"],strtotime($cabFact['FechaPedido'])) ?></span>
                </td>
                <td>
                    <span class="titleLabel"><?php echo Yii::t('TIENDA', 'Usuario Autoriza') ?></span>
                    <span><?php echo $cabFact['NombreUser'] ?></span>
                </td>
                
            </tr>
            <tr>
                <td>
                    <span class="titleLabel"><?php echo Yii::t('TIENDA', 'Department or branch') ?></span>
                    <span><?php echo $cabFact['NombreTienda'] ?></span>
                </td>
                <td>
                    <span class="titleLabel"><?php echo Yii::t('TIENDA', 'Address Store') ?></span>
                    <span><?php echo $cabFact['DirTienda'] ?></span>
                </td>
                <td>
                    <span class="titleLabel"><?php echo Yii::t('TIENDA', 'Usuario Pedido') ?></span>
                    <span><?php echo $cabFact['NombrePersona'] ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <span class="titleLabel"><?php echo Yii::t('TIENDA', 'Phone') ?></span>
                    <span><?php echo $cabFact['TelTienda'] ?></span>
                </td>
                
                <td>
                    <span class="titleLabel"><?php echo Yii::t('TIENDA', 'Place of delivery') ?></span>
                    <span><?php echo $cabFact['LugEntrega'] ?></span>
                </td>
                <td>
                    <span class="titleLabel"><?php echo Yii::t('TIENDA', 'Mail') ?></span>
                    <span><?php echo $cabFact['CorreoPersona'] ?></span>
                </td>
            </tr>
        </tbody>
    </table>
</div>