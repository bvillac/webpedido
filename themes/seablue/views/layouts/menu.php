<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<li>
    <!--<a href = "index"><i class = "fa fa-edit fa-fw"></i> Hacer Pedidos</a>-->
    <?php echo CHtml::link('<i class="fa fa-edit fa-fw"></i>'.Yii::t('PEDIDO', 'Mis Peidos'), array('/pEDIDO/index'));?>
</li>
<li>
    <?php echo CHtml::link('<i class="fa fa-edit fa-fw"></i>'.Yii::t('PEDIDO', 'Crear Peidos'), array('/pEDIDO/create'));?>
</li>
<li>
    <?php echo CHtml::link('<i class="fa fa-edit fa-fw"></i>'.Yii::t('PEDIDO', 'Usuario'), array('/uSUARIOS/index'));?>
</li>