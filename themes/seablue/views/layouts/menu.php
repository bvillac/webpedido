<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<li class="with_menu">
    <!--<a href = "index"><i class = "fa fa-edit fa-fw"></i> Hacer Pedidos</a>-->
    <?php echo CHtml::link('<i class="fa fa-edit fa-fw"></i>' . Yii::t('PEDIDO', 'Mis Peidos'), array('/pEDIDO/index')); ?>
</li>
<!--<li class="with_menu">
    <?php //echo CHtml::link('<i class="fa fa-edit fa-fw"></i>' . Yii::t('PEDIDO', 'Crear Peidos'), array('/pEDIDO/create')); ?>
</li>
<li class="with_menu">
    <?php //echo CHtml::link('<i class="fa fa-edit fa-fw"></i>' . Yii::t('PEDIDO', 'Usuario'), array('/uSUARIOS/index')); ?>
</li>-->

<li class="">
    <a href="#"><i class="fa fa-sitemap fa-fw"></i> <?php echo Yii::t('GENERAL', 'Configuration') ?><span class="fa arrow"></span></a>
    <ul class="nav nav-second-level collapse" style="height: 0px;">
        <li>
            <!--<a href="#">Second Level Item</a>-->
            <?php echo CHtml::link('<i class="fa fa-edit fa-fw"></i>' . Yii::t('MENU', 'Digital signature'), array('/uSUARIOS/index')); ?>
        </li>
        <li>
            <?php echo CHtml::link('<i class="fa fa-edit fa-fw"></i>' . Yii::t('MENU', 'Mail server'), array('/uSUARIOS/index')); ?>
        </li>
        <li>
            <?php echo CHtml::link('<i class="fa fa-edit fa-fw"></i>' . Yii::t('MENU', 'Sri services'), array('/uSUARIOS/index')); ?>
        </li>
        <li>
            <?php echo CHtml::link('<i class="fa fa-edit fa-fw"></i>' . Yii::t('MENU', 'MKey contingency'), array('/uSUARIOS/index')); ?>
        </li>
        
        <!--<li class="active">
            <a href="#">Third Level <span class="fa arrow"></span></a>
            <ul class="nav nav-third-level collapse in" style="height: auto;">
                <li>
                    <a href="#">Third Level Item</a>
                </li>
                <li>
                    <a href="#">Third Level Item</a>
                </li>
                <li>
                    <a href="#">Third Level Item</a>
                </li>
                <li>
                    <a href="#">Third Level Item</a>
                </li>
            </ul>
        </li>-->
    </ul>
    <!-- /.nav-second-level -->
</li>