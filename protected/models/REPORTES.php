<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of REPORTES
 *
 * @author root
 */
class REPORTES {

    public function crearBaseReport() {
        $mPDF1 = Yii::app()->ePdf->mpdf('utf-8', 'A4', '', '', 15, 15, 16, 16, 9, 9, 'P'); //Esto lo pueden configurar como quieren, para eso deben de entrar en la web de MPDF para ver todo lo que permite.
        $mPDF1->useOnlyCoreFonts = true;
        
        $mPDF1->SetAuthor("Utimpor");
        $mPDF1->SetCreator("Utimpor");
        //$mPDF1->SetWatermarkText(Yii::t('DOCUMENTOS', 'PRINTED INFORMATION PROVIDED IS VOID IN PROOF TEST ENVIRONMENT'));
        //$mPDF1->showWatermarkText = true;
        //$mPDF1->watermark_font = 'DejaVuSansCondensed';
        //$mPDF1->watermarkTextAlpha = 0.5;
        $mPDF1->SetDisplayMode('fullpage');
        //Load a stylesheet
        //$stylesheet = file_get_contents(Yii::app()->theme->baseUrl.'/css/print.css');
        //$mPDF1->WriteHTML($stylesheet, 1);
        return $mPDF1;
    }

}
