<?php

class NubeFacturaController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // permite a todos los usuarios ejecutar las acciones
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // permite a los usuarios logueados ejecutar las acciones 
                'actions' => array('create', 'update', 'GenerarPdf', 'BuscaDataIndex', 'BuscarPersonas', 'GenerarXml'),
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

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new NubeFactura;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['NubeFactura'])) {
            $model->attributes = $_POST['NubeFactura'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->IdFactura));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['NubeFactura'])) {
            $model->attributes = $_POST['NubeFactura'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->IdFactura));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new NubeFactura('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['NubeFactura']))
            $model->attributes = $_GET['NubeFactura'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return NubeFactura the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = NubeFactura::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param NubeFactura $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'nube-factura-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    private function tipoAprobacion() {
        return array(
            //'1' => Yii::t('COMPANIA', 'Send'),
            '2' => Yii::t('COMPANIA', 'Authorized'),
            '3' => Yii::t('COMPANIA', 'Unauthorized'),
        );
    }

    public function actionIndex() {
        $modelo = new NubeFactura();
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
        try {
            $ids = isset($_GET['ids']) ? base64_decode($_GET['ids']) : NULL;
            $modelo = new NubeFactura(); //Ejmpleo code 3
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
        } catch (Exception $e) {
            $this->errorControl($e);
        }
    }

    public function actionBuscarPersonas() {
        if (Yii::app()->request->isAjaxRequest) {
            $valor = isset($_POST['valor']) ? $_POST['valor'] : "";
            $op = isset($_POST['op']) ? $_POST['op'] : "";
            $arrayData = array();
            $data = new NubeFactura();
            $arrayData = $data->retornarPersona($valor, $op);
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arrayData);
        }
    }

    public function actionBuscaDataIndex() {
        if (Yii::app()->request->isAjaxRequest) {
            $arrayData = array();
            $obj = new NubeFactura();
            $contBuscar = isset($_POST['CONT_BUSCAR']) ? CJavaScript::jsonDecode($_POST['CONT_BUSCAR']) : array();
            $arrayData = $obj->mostrarDocumentos($contBuscar);
            $this->renderPartial('_indexGrid', array(
                'model' => $arrayData,
                    ), false, true);
            return;
        }
    }

    public function actionGenerarXml($ids) {
        $ids = isset($_GET['ids']) ? base64_decode($_GET['ids']) : NULL;
        $modelo = new NubeFactura();
        $cabFact = $modelo->mostrarCabFactura($ids, '01');
        $detFact = $modelo->mostrarDetFactura($ids);
        $impFact = $modelo->mostrarFacturaImp($ids);
        $adiFact = $modelo->mostrarFacturaDataAdicional($ids);
        $this->renderPartial('facturaXML', array(
            'cabFact' => $cabFact,
            'detFact' => $detFact,
            'impFact' => $impFact,
            'adiFact' => $adiFact,
        ));
    }

}
