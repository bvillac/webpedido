<?php
$contador = count($cabFact);
if ($cabFact !== null) {
    ?>
<table style="width:100%">
        <tbody>
            <tr>
                <td style="width:50%">
                    <?php echo CHtml::image(Yii::app()->theme->baseUrl.'/images/plantilla/logo.png','Utimpor',array('width'=>'300px','height'=>'50px')); ?>
                </td>
                <td rowspan="2" style="width:50%">
                    <?php echo $this->renderPartial('_frm_CabFact', array('cabFact' => $cabFact)); ?>
                </td>
            </tr>
            <tr>
                <td>
                    xxxx2
                </td>
            </tr>
        </tbody>
    </table>

<?php } ?>