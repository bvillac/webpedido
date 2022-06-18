<!DOCTYPE html>
<html>
    <head>
        <style>
            body
            {
                width:100%;
                font-family:Arial;
                font-size:7pt;
                margin:0;
                padding:0;
            }
            .marcoDiv{
                border: 1px solid #165480;
                padding: 2mm;
            }
            .marcoCel{
                border: 1px solid #165480;
                padding: 1mm;

            }
            .marcoCelSup{
                border-top: 1px solid #165480;
                padding: 1mm;

            }
            .dataNumber{
                text-align: right;
                padding-right: 5px;
            }
            .titleDetalle{
                text-align: center;

            }
            .tabDetalle{
                border-spacing:0;
                border-collapse: collapse;
            }
            .titleLabel{
                font-size:7pt;
                /*color:#000;*/
                font-weight: bold ;
            }
            .titleRepor{
                font-size:10pt;
                /*color:#000;*/
                font-weight: bold ;
            }
            .titleRazon{
                font-size:10pt;
                /*color:#000;*/
                font-weight: bold ;
            }
            .titleDocumento{
                font-size:10pt;
                letter-spacing: 5px; 
            }
            .titleNum_Ruc{
                font-size:9pt;
            }


        </style>
    </head>
    <body>
        <?php
        $contador = count($data);
        if ($data !== null) {?>
            <div><span class="titleRepor"><?php echo $titulo ?></span></div>
            <div>
                <span class="titleLabel"><?php echo Yii::t('TIENDA', 'Date')  ?> :</span>
                <span><?php echo Yii::t('TIENDA', 'From').' '.date(Yii::app()->params["datebydefault"], strtotime($f_ini)) ?></span>
                <span><?php echo Yii::t('TIENDA', 'To').' '.date(Yii::app()->params["datebydefault"], strtotime($f_fin)) ?></span>
            </div>
            <div>
                <span class="titleLabel"><?php echo Yii::t('TIENDA', 'TIPOS')  ?> : <?php echo $TIPOS ?></span><BR>
                <span class="titleLabel"><?php echo Yii::t('TIENDA', 'MARCA')  ?> : <?php echo $MARCAS ?></span><BR>
            </div>
            <table class="tabDetalle">
                <thead>
                    <tr>
                        <th class="marcoCel titleDetalle">
                            <span><?php echo Yii::t('TIENDA', 'Date') ?></span>
                        </th>
                        <th class="marcoCel titleDetalle">
                            <span><?php echo Yii::t('TIENDA', 'Code') ?></span>
                        </th>
                        <th class="marcoCel titleDetalle">
                            <span><?php echo Yii::t('TIENDA', 'Description') ?></span>
                        </th>  
                        <th class="marcoCel titleDetalle">
                            <span><?php echo Yii::t('TIENDA', 'Quantity') ?></span>
                        </th>
                        <th class="marcoCel titleDetalle">
                            <span><?php echo Yii::t('TIENDA', 'Cost') ?></span>
                        </th>                                        
                        <th class="marcoCel titleDetalle">
                            <span><?php echo Yii::t('TIENDA', 'Total') ?></span>
                        </th>      
                    </tr>
                </thead>
                <tbody>
                            <tr><td colspan="6">&nbsp;</td></tr>
                            <tr>                                               
                                <td colspan="6"><b><?php echo $Ntienda ?></b></td>
                            </tr>         
                    <?php 
                        $aux="";
                        for ($i = 0; $i < sizeof($data); $i++) { 
                            $ValorNeto+=(float)$data[$i]['TOTAL'];
                            /*if($aux<>$data[$i]['Tienda']){
                                $aux=$data[$i]['Tienda'];
                                ?>
                                <tr><td colspan="6">&nbsp;</td></tr>
                                <tr>                                               
                                    <td colspan="6"><b><?php echo $data[$i]['Tienda'] ?></b></td>
                                </tr>                                    
                                <?php
                            }*/
                            ?>
                                                  
                            <tr>
                                <td ><?php echo $data[$i]['FECHA'] ?>&nbsp;</td>                                     
                                <td class=""><?php echo $data[$i]['COD_ART'] ?></td>
                                <td class=""><?php echo $data[$i]['DETALLE'] ?></td>                                                    
                                <td class="dataNumber"><?php echo intval($data[$i]['CAN_PED']) ?></td>
                                <td class="dataNumber"><?php echo $data[$i]['P_VENTA'] ?></td>
                                <td class="dataNumber"><?php echo Yii::app()->format->formatNumber($data[$i]['TOTAL']) ?></td>       
                            </tr>
                    <?php } ?>
                    <tr>
                        <td class="marcoCelSup">TOTAL</td>
                        <td class="marcoCelSup dataNumber" colspan="5">
                            <?php echo Yii::app()->format->formatNumber($ValorNeto) ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        <?php } ?>
    </body>
</html>