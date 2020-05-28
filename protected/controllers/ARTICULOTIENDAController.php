<?php

class ARTICULOTIENDAController extends Controller {

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
                'actions' => array('create', 'update','BuscarArticulo','BuscarPrecioTienda','Save','EliminarItems'),
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
        $model = new ARTICULOTIENDA;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['ARTICULOTIENDA'])) {
            $model->attributes = $_POST['ARTICULOTIENDA'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->ARTIE_ID));
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

        if (isset($_POST['ARTICULOTIENDA'])) {
            $model->attributes = $_POST['ARTICULOTIENDA'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->ARTIE_ID));
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
     * Lists all models.
     */
    public function actionIndex() {
        /* $dataProvider=new CActiveDataProvider('ARTICULOTIENDA');
          $this->render('index',array(
          'dataProvider'=>$dataProvider,
          )); */
        $model = new ARTICULOTIENDA;
        //$id='1';
        $cliente = $model->recuperarClientes();
        $this->titleWindows = Yii::t('GENERAL', 'Store');
        $this->render('index', array(
            'model' => $model,
            'cliente' => $cliente,
                //'data' => base64_encode(CJavaScript::jsonEncode($data)),
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new ARTICULOTIENDA('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['ARTICULOTIENDA']))
            $model->attributes = $_GET['ARTICULOTIENDA'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return ARTICULOTIENDA the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = ARTICULOTIENDA::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param ARTICULOTIENDA $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'articulotienda-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionBuscarArticulo() {
        if (Yii::app()->request->isAjaxRequest) {
            $valor = isset($_POST['valor']) ? $_POST['valor'] : "";
            $op = isset($_POST['op']) ? $_POST['op'] : "";
            $arrayData = array();
            $data = new ARTICULO;
            $arrayData = $data->retornarBusArticulo($valor, $op);
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arrayData);
        }
    }
    
    public function actionSave() {
        if (Yii::app()->request->isPostRequest) {
            $model = new PRECIOCLIENTE;
            $dts_PrecioTienda = isset($_POST['DTS_PRECIO_TIENDA']) ? CJavaScript::jsonDecode($_POST['DTS_PRECIO_TIENDA']) : array();
            $cliId = isset($_POST['CLI_ID']) ? $_POST['CLI_ID'] : "";
            $accion = isset($_POST['ACCION']) ? $_POST['ACCION'] : "";
            if ($accion == "Create") {
                $arroout = $model->insertarPrecioTienda($cliId,$dts_PrecioTienda);
            } elseif($accion == "calcular") {
                $valPor = isset($_POST['VAL_POR']) ? $_POST['VAL_POR'] : 0;
                $arroout = $model->calcularPrecioTienda($cliId,$valPor);
            }else{
                 //$arroout = $model->insertarPrecioTienda($cliId,$dts_PrecioTienda);
            }
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arroout);
        }
    }
    
    public function actionEliminarItems() {
        if (Yii::app()->request->isAjaxRequest) {
            //$data = isset($_POST['DATA']) ? base64_decode(CJavaScript::jsonDecode($_POST['DATA'])) : array();
            $data = isset($_POST['DATA']) ? CJavaScript::jsonDecode($_POST['DATA']) : array();
            $res = new PRECIOCLIENTE;
            $arroout=$res->removerTiendaPrecio($data);
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arroout);
        }
    }
    
    public function actionBuscarPrecioTienda() {
        if (Yii::app()->request->isAjaxRequest) {
            $ids = isset($_POST['ids']) ? $_POST['ids'] : "";
            $arrayData = array();
            $data = new PRECIOCLIENTE;
            $arrayData = $data->retornarPrecioTienda($ids);
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arrayData);
        }
    }

}
