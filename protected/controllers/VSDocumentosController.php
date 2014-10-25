<?php

class VSDocumentosController extends Controller {
    //http://yiiframeworkespanol.blogspot.com/2014_05_01_archive.html
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    public function accessRules() {
        return array(
            array('allow', // permite a todos los usuarios ejecutar las acciones
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // permite a los usuarios logueados ejecutar las acciones 
                'actions' => array('create', 'update','GenerarPdf'),
                'users' => array('@'),
            ),
            array('allow', // permite que únicamente el usuario admin ejecute las , 
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // niega cualquier otra acción para cualquier usuario
                'users' => array('*'),
            ),
        );
    }

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


    public function actionGenerarPdf($ids) {
        $ids = isset($_GET['ids'])?$_GET['ids']:NULL;
        $modelo = new VSDocumentos(); //Ejmpleo code 3
        $cabFact = $modelo->mostrarCabFactura($ids, '01');
        $detFact = $modelo->mostrarDetFactura($ids);
        $impFact = $modelo->mostrarFacturaImp($ids);
        $adiFact = $modelo->mostrarFacturaDataAdicional($ids);
        //$contBuscar = array();
        $mPDF1 = Yii::app()->ePdf->mpdf('utf-8', 'A4', '', '', 15, 15, 16, 16, 9, 9, 'P'); //Esto lo pueden configurar como quieren, para eso deben de entrar en la web de MPDF para ver todo lo que permite.
        $mPDF1->useOnlyCoreFonts = true;
        $mPDF1->SetTitle(Yii::app()->getSession()->get('emp_razonsocial', FALSE) . " - " . $cabFact['NombreDocumento']);
        $mPDF1->SetAuthor("JuzgadoSys");
        $mPDF1->SetWatermarkText(Yii::t('DOCUMENTOS', 'PRINTED INFORMATION PROVIDED IS VOID IN PROOF TEST ENVIRONMENT'));
        $mPDF1->showWatermarkText = true;
        $mPDF1->watermark_font = 'DejaVuSansCondensed';
        $mPDF1->watermarkTextAlpha = 0.5;
        $mPDF1->SetDisplayMode('fullpage');
        //Load a stylesheet
        //$stylesheet = file_get_contents(Yii::app()->theme->baseUrl.'/css/print.css');
        //$mPDF1->WriteHTML($stylesheet, 1);
        $mPDF1->WriteHTML(
                $this->renderPartial(
                        //'docPDF', 
                        'facturaPDF', array(
                    'cabFact' => $cabFact,
                    'detFact' => $detFact,
                    'impFact' => $impFact,
                    'adiFact' => $adiFact,
                        ), true)); //hacemos un render partial a una vista preparada, en este caso es la vista docPDF
        //$mPDF1->Output('FACTURA' . date('YmdHis'), 'I');  //Nombre del pdf y parámetro para ver pdf o descargarlo directamente.
        $mPDF1->Output($cabFact['NombreDocumento'] . '-' . $cabFact['NumDocumento'], 'I');
        //exit;
    }

}
