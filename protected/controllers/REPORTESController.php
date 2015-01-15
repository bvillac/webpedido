<?php

class REPORTESController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionGenerarPdf($ids) {
        try {
            $ids = isset($_GET['ids']) ? base64_decode($_GET['ids']) : NULL;
            $modelo = new CABPEDIDO;
            $cabFact = $modelo->mostrarCabPedido($ids);
            $detFact = $modelo->mostrarDetPedido($ids);
            $mPDF1 = Yii::app()->ePdf->mpdf('utf-8', 'A4', '', '', 15, 15, 16, 16, 9, 9, 'P'); //Esto lo pueden configurar como quieren, para eso deben de entrar en la web de MPDF para ver todo lo que permite.
            $mPDF1->useOnlyCoreFonts = true;
            $mPDF1->SetTitle("ORDEN NUM: " . $cabFact['Numero']);
            $mPDF1->SetAuthor("Utimpor");
            //$mPDF1->SetWatermarkText(Yii::t('DOCUMENTOS', 'PRINTED INFORMATION PROVIDED IS VOID IN PROOF TEST ENVIRONMENT'));
            //$mPDF1->showWatermarkText = true;
            //$mPDF1->watermark_font = 'DejaVuSansCondensed';
            //$mPDF1->watermarkTextAlpha = 0.5;
            $mPDF1->SetDisplayMode('fullpage');
            //Load a stylesheet
            //$stylesheet = file_get_contents(Yii::app()->theme->baseUrl.'/css/print.css');
            //$mPDF1->WriteHTML($stylesheet, 1);
            $mPDF1->WriteHTML(
                    $this->renderPartial('ordenPDF', array(
                        'cabFact' => $cabFact,
                        'detFact' => $detFact,
                            ), true)); //hacemos un render partial a una vista preparada, en este caso es la vista docPDF
            //$mPDF1->Output('FACTURA' . date('YmdHis'), 'I');  //Nombre del pdf y parámetro para ver pdf o descargarlo directamente.
            $mPDF1->Output('ORDEN NUM:' . $cabFact['Numero'], 'I');
            //exit;
        } catch (Exception $e) {
            $this->errorControl($e);
        }
    }
    
    public function actionRep_VentMax($data) {
        try {
            $control = base64_decode($data);
            $rep=new REPORTES;
            $modelo = new CABPEDIDO;
            $report = $modelo->Rep_VentMax($control);
            $mPDF1=$rep->crearBaseReport();
            $mPDF1->SetTitle(Yii::t('TIENDA', 'Monthly sales per store.'));
            $mPDF1->WriteHTML(
                    $this->renderPartial('ventasMes_Rep', array(
                        'data' => $report,
                        'control' => $control,
                        'titulo' => Yii::t('TIENDA', 'Monthly sales per store.'),
                            ), true)); //hacemos un render partial a una vista preparada, en este caso es la vista docPDF
            $mPDF1->Output(Yii::t('TIENDA', 'Monthly sales per store.')."-".date('YmdHis'), 'I');
            //exit;
        } catch (Exception $e) {
            $this->errorControl($e);
        }
    }

}
