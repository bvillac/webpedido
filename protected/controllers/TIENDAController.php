<?php

class TIENDAController extends Controller {

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
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update','Save'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    private function cantArray($op) {
        switch ($op) {
            case 'ANO':
                $size = 21;
                $ini = 0;
                break;
            case 'MES':
                $size = 13;
                $ini = 0;
                break;
            case 'DIA':
                $size = 31;
                $ini = 0;
                break;
            case '%':
                $size = 101;
                $ini = 0;
                break;
            default:
                $size = 0;
                $ini = 0;
        }
        $cont = array();
        for ($i = $ini; $i < $size; $i++) {
            $cont[] = $i;
        }
        return $cont;
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
        $model = new TIENDA;
        $dataCliente = new ARTICULOTIENDA;
        //$this->titleWindows = Yii::t('COMPANIA', 'Store');
        $this->render('create', array(
            'model' => $model,
            'rangodia' => $this->cantArray('DIA'),
            'cliente' => $dataCliente->recuperarClientes(),
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = new TIENDA;
        $dataCliente = new ARTICULOTIENDA;
        $tienda = $model->recuperarTiendas($id);
        $model->TIE_ID = $id; //mantiene el ID del Descargo Actualizar

        //$this->titleWindows = Yii::t('TIENDA', 'Store');
        $this->render('update', array(
            'model' => $model,
            'rangodia' => $this->cantArray('DIA'),
            'cliente' => $dataCliente->recuperarClientes(),
            //'data' => CJavaScript::jsonEncode($empresa),
            'data' => base64_encode(CJavaScript::jsonEncode($tienda)),
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
     * Lists all models.
     */
    public function actionIndex() {
        $modelo = new TIENDA;
        $this->titleWindows = Yii::t('COMPANIA', 'Company');
        $this->render('index', array(
            'model' => $modelo->mostrarTiendas(),
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new TIENDA('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['TIENDA']))
            $model->attributes = $_GET['TIENDA'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return TIENDA the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = TIENDA::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param TIENDA $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'tienda-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
    public function actionSave() {
        if (Yii::app()->request->isPostRequest) {
            $model = new TIENDA;
            $tienda = isset($_POST['DATA']) ? CJavaScript::jsonDecode($_POST['DATA']) : array();
            $accion = isset($_POST['ACCION']) ? $_POST['ACCION'] : "";
            if ($accion == "Create") {
                $arroout = $model->insertarTienda($tienda);
            } else {
                $arroout = $model->actualizarTienda($tienda);
            }
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arroout);
            return;
        }
    }
    

}
