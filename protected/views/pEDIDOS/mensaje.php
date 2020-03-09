<style>
    .titleLabel{
        /*font-size:7pt;*/
        /*color:#000;*/
        font-weight: bold ;
    }
    #div-noti-table{

    }
    .trow-noti-tr{
        padding:12px 0 12px 12px;
        background: #F9F4F4;
        width:100%;
        margin-top:15px;
        margin-bottom:15px;
        border:1px solid #CCCCCC;
    }
    .trow-right-tr{
        padding:12px;
        background: #F9F4F4;
        float: right;
        /*width:100%;*/
        margin-top:15px;
        margin-bottom:15px;
        border:1px solid #CCCCCC;
    }
    .trow-noti-left{
        padding:5px 0 5px 17px;border-left:4px solid #CCCCCC;
    }
    .line-noti{
        padding-bottom:10px;
        border-style:none none solid none;
        border-bottom-width:1px;
        border-bottom-color:#E4002B;
    }
    .trow-titulo{
        background-color: #CCCCCC;
        padding:10px 0 10px 10px;
    }

    .sub-title{
        font-size:13pt;
        color:#787878;
        font-weight: bold ;
        margin-top:8px;
    }

    .sub-title-mensaje{
        color: rgb(77, 77, 77); 
        font-size: 20px; 
        font-family: sans-serif, serif, EmojiFont; 
        font-weight: 700;
    }
    
    .estado-pedido{
        font-size:15px;vertical-align:top;margin-right:5px;
    }


</style>


<?php
//for ($i = 0; $i < sizeof($CabPed); $i++) {
//<table style="background-color:#F9F4F4;width:100%;margin-top:15px;margin-bottom:15px;border:1px solid #CCCCCC;" cellspacing="0" border="0">
//<td style="padding-bottom:10px;">
//<hr style="border-style:none none solid none;border-bottom-width:1px;border-bottom-color:#E4002B;">
//</td>
if(sizeof($CabPed)>0){
?>





<div id="div-noti-table">
    <div class="trow-titulo">
        <?php //echo CHtml::image(Yii::app()->theme->baseUrl . '/images/plantilla/logo.png', 'Utimpor', array('width' => '200px', 'height' => '50px')); ?>
        <?php echo CHtml::image('https://190.111.83.186'.Yii::app()->theme->baseUrl . '/images/plantilla/logo.png', 'Utimpor', array('width' => '200px', 'height' => '50px')); ?>
        <!-- <a href="http://www.utimpor.com" target="_blank" rel="noopener noreferrer" data-auth="NotApplicable" style="border-style:none;">
            <img data-imagetype="External" src="/actions/" originalsrc="http://utimpor.com/arquivos/logo-tia.png" data-connectorsauthtoken="1" data-imageproxyendpoint="/actions/ei" data-imageproxyid="" alt="Utimpor.com" hspace="6" border="0">
        </a>
       <h3 style="color:white;font-size:25px;margin-top:8px;font-weight: bold">NOTIFICACIONES</h3>-->
    </div>
    <div class="trow">
        <h3 class="sub-title">PEDIDO EN LINEA UTIMPOR</h3>
    </div>

    <div class="trow">
        <div class="sub-title-mensaje">            
            <?php echo $TituloData; ?>
        </div>
        <p>
            <label class="titleLabel">Estimad@:</label><br>  <?php echo $CabPed[0]["NombreUser"]   ?> <br> 
        </p>

        <!--<span style="color:#4D4D4D;font-size:20px;font-weight:400;">Hola <strong>Lorena </strong>.</span><br>-->
        <div style="color:#666666;font-size:17px;padding-top:5px;padding-bottom:5px;">
            Gracias por su compra, A continuación encuentre los detalles de su pedido realizado:
        </div>
    </div>


    <div class="trow-noti-left">
        <!--        <div style="color:#787878;font-size:14px;font-weight:700;text-transform:uppercase;margin-bottom:10px;">
                    Datos del cliente 
                </div>
                <div style="color: rgb(102, 102, 102); font-size: 13px; font-family: Arial-BoldMT, Arial, serif, EmojiFont;">Lorena Palma <br>
                    CI: 1204111510<br>
                </div>-->
        <p>
            <label class="titleLabel"><?php echo Yii::t('TIENDA', 'Cliente') ?> : </label>
            <span><?php echo Yii::app()->getSession()->get('CliNom', FALSE) ?></span><br>
            <label class="titleLabel"><?php echo Yii::t('TIENDA', 'Number Order') ?> : </label>
            <span><?php echo $CabPed[0]["Numero"]   ?></span><br>
            <label class="titleLabel"><?php echo Yii::t('TIENDA', 'Store name') ?> : </label>
            <span><?php echo $CabPed[0]["NombreTienda"]   ?></span><br>
            <label class="titleLabel"><?php echo Yii::t('TIENDA', 'User order') ?> : </label>
            <span><?php echo $CabPed[0]["NombrePersona"]   ?></span><br>
            <label class="titleLabel"><?php echo Yii::t('TIENDA', 'Issue date') ?> : </label>
            <span><?php echo $CabPed[0]["FechaPedido"]   ?></span>
        </p>

    </div>
    <br>
    <div class="trow-noti-left">
        <p>
            Atentamente,<br>
            <label class="titleLabel">Utimpor S.A.</label>
        </p>
    </div>

    <div class="line-noti"></div>
    <div class="trow-noti-tr">
        <div class="tcol-td">
            <!--            <div style="color: rgb(77, 77, 77); font-family: Arial-BoldMT, Arial, serif, EmojiFont; font-weight: 700;">
                            <div style="font-size:20px;">PEDIDO #: <span style="color:#4D4D4D;font-size:20px;display:inline-block;">977773055594-01</span></div>
                        </div>
                        <div style="color:#666666;font-size:13px;margin-top:7px;">Entregado por <strong style="display:inline-block;"><span>Tía Ecuador</span></strong></div>
                        <span style="color:#666666;font-size:13px;">Tipo de entrega: <strong>Entrega a domicilio</strong></span> -->
            <th scope="row" style="color:#BCBCBC;font-size:15px;text-align:left;padding-left:10px;float:left;">
                <?php if($Estado=='R'){ ?>
                    <p style="color:#52BC00;"><strong class="estado-pedido">✓</strong>PEDIDO REALIZADO</p>
                <?php } else { ?>
                    <p><strong class="estado-pedido">►</strong>PEDIDO REALIZADO</p>
                <?php } ?>
                <?php if($Estado=="A"){ ?>
                    <p style="color:#52BC00;"><strong class="estado-pedido">✓</strong>PEDIDO AUTORIZADO</p>
                <?php } else { ?>
                    <p><strong class="estado-pedido">►</strong>PEDIDO AUTORIZADO</p>
                <?php } ?>
                <?php if($Estado=="F"){ ?>
                    <p style="color:#52BC00;"><strong class="estado-pedido">✓</strong>PEDIDO FACTURADO</p>
                <?php } else { ?>
                    <p><strong class="estado-pedido">►</strong>PEDIDO FACTURADO</p>
                <?php } ?>
                <?php if($Estado=="E"){ ?>
                    <p style="color:#52BC00;"><strong class="estado-pedido">✓</strong>PEDIDO ENVIADO</p>
                <?php } else { ?>
                    <p><strong class="estado-pedido">►</strong>PEDIDO ENVIADO</p>
                <?php } ?>

            </th>
        </div>
    </div>
    <div class="trow-right-tr">
        <div class="tcol-td">
            <label class="titleLabel"><?php echo Yii::t('TIENDA', 'Total $') ?> : </label>
            <span><?php echo Yii::app()->format->formatNumber($CabPed[0]["ValorNeto"]) ?></span>
        </div>
    </div>

</div>

<?php } ?>