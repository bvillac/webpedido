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
        if ($data !== null) {
            ?>


            <table style="width:100%;">
                <tbody>
                    <tr>
                        <td>
                            <?php $this->renderPartial('_frm_CabReporte', array('titulo' => $titulo,'f_ini' => $f_ini,'f_fin' => $f_fin)); ?>
                        </td>
                    </tr>
                </tbody>
            </table>

            <table style="width:100%;">
                <tbody>
                    <tr>
                        <td style="width:50%">
                            <?php //echo $this->renderPartial('_frm_DetFact', array('detFact' => $detFact, 'ValorNeto' => $cabFact['ValorNeto'])); ?>
                            <table style="width:200mm" class="tabDetalle">
                                <tbody>
                                    <tr>
                                        <td class="marcoCel titleDetalle">
                                            <span><?php echo Yii::t('TIENDA', 'Stores') ?></span>
                                        </td>
                                        <td class="marcoCel titleDetalle">
                                            <span><?php echo Yii::t('TIENDA', 'Code') ?></span>
                                        </td>
                                        <td class="marcoCel titleDetalle">
                                            <span><?php echo Yii::t('TIENDA', 'Description') ?></span>
                                        </td>
                                        <td class="marcoCel titleDetalle">
                                            <span><?php echo Yii::t('TIENDA', 'Quantity') ?></span>
                                        </td>
                                        <td class="marcoCel titleDetalle">
                                            <span><?php echo Yii::t('TIENDA', 'Cost') ?></span>
                                        </td>
                                        <td class="marcoCel titleDetalle">
                                            <span><?php echo Yii::t('TIENDA', 'Total') ?></span>
                                        </td>
                                                
                                    </tr>
                                    <?php 
                                    for ($i = 0; $i < sizeof($data); $i++) {
                                        $ValorNeto+=  (float)$data[$i]['Tventa'];
                                        ?>
                                        <tr>
                                            <td ><?php echo $data[$i]['Tienda'] ?></td>
                                            <td class=""><?php echo $data[$i]['CodArt'] ?></td>
                                            <td class=""><?php echo $data[$i]['Nombre'] ?></td>
                                            <td class="dataNumber"><?php echo intval($data[$i]['CantPed']) ?></td>
                                            <td class="dataNumber"><?php echo Yii::app()->format->formatNumber($data[$i]['Pventa']) ?></td>
                                            <td class="dataNumber"><?php echo Yii::app()->format->formatNumber($data[$i]['Tventa']) ?></td>
                                            
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td class="marcoCelSup dataNumber" colspan="6">
                                            <?php echo Yii::app()->format->formatNumber($ValorNeto) ?>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>

        <?php } ?>
    </body>
</html>