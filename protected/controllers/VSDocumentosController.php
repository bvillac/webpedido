<?php

class VSDocumentosController extends Controller {

    private function tipoAprobacion() {
        return array(
            //'1' => Yii::t('COMPANIA', 'Send'),
            '2' => Yii::t('COMPANIA', 'Authorized'),
            '3' => Yii::t('COMPANIA', 'Unauthorized'),
        );
    }

    public function actionIndex() {
        $modelo = new VSDocumentos();
        $contBuscar = array();
        if (Yii::app()->request->isAjaxRequest) {
            $contBuscar = isset($_POST['CONT_BUSCAR']) ? CJavaScript::jsonDecode($_POST['CONT_BUSCAR']) : array();
            echo CJSON::encode($modelo->mostrarDocumentos($contBuscar));
        }
        $this->titleWindows = Yii::t('COMPANIA', 'Document');

        $this->render('index', array(
            //'dataProvider' => $dataProvider,
            'model' => $modelo->mostrarDocumentos($contBuscar),
            'tipoDoc' => $modelo->recuperarTipoDocumentos(),
            'tipoApr' => $this->tipoAprobacion(),
        ));
    }

    public function actionGenerarPdf() {
        $modelo = new VSDocumentos();
        //$model = Productos::model()->findAll(); //Consulta para buscar todos los registros
        $contBuscar = array();
        $mPDF1 = Yii::app()->ePdf->mpdf('utf-8', 'A4', '', '', 15, 15, 35, 25, 9, 9, 'P'); //Esto lo pueden configurar como quieren, para eso deben de entrar en la web de MPDF para ver todo lo que permite.
        $mPDF1->useOnlyCoreFonts = true;
        $mPDF1->SetTitle("JuzgadoSys - Reporte");
        $mPDF1->SetAuthor("JuzgadoSys");
        $mPDF1->SetWatermarkText("JuzgadoSys");
        $mPDF1->showWatermarkText = true;
        $mPDF1->watermark_font = 'DejaVuSansCondensed';
        $mPDF1->watermarkTextAlpha = 0.1;
        $mPDF1->SetDisplayMode('fullpage');
        $mPDF1->WriteHTML($this->renderPartial('docPDF', array('model' => $modelo->mostrarDocumentos($contBuscar)), true)); //hacemos un render partial a una vista preparada, en este caso es la vista pdfReport
        $mPDF1->Output('Reporte_Productos' . date('YmdHis'), 'I');  //Nombre del pdf y parámetro para ver pdf o descargarlo directamente.
        //exit;
    }

}
