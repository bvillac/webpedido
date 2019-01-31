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
                'actions' => array('create', 'update','Save','Delete','Producto','SaveCupoTie',
                                    'BuscarItemTienda','BuscarProductoTienda','SaveItems','TiendaCupo'),
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
        $ids = base64_decode($id);
        $model = new TIENDA;
        $dataCliente = new ARTICULOTIENDA;
        $tienda = $model->recuperarTiendas($ids);
        $model->TIE_ID = $ids; //mantiene el ID del Descargo Actualizar

        //$this->titleWindows = Yii::t('TIENDA', 'Store');
        $this->render('update', array(
            'model' => $model,
            'rangodia' => $this->cantArray('DIA'),
            'cliente' => $dataCliente->recuperarClientes(),
            'data' => base64_encode(CJavaScript::jsonEncode($tienda)),
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete() {
            if (Yii::app()->request->isPostRequest) {
                //$ids = base64_decode($_POST['ids']);
                $ids = isset($_POST['ids']) ? $_POST['ids'] : 0;
                $res = new TIENDA;
                $arroout=$res->removerTienda($ids);
                header('Content-type: application/json');
                echo CJavaScript::jsonEncode($arroout);
            }

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
    
    public function actionProducto() {
        $model = new TIENDA;
        $this->titleWindows = Yii::t('TIENDA', 'Stores');
        $this->render('producto', array(
            'model' => $model->mostrarItemsTiendas(),
            'tienda' => $model->recuperarTiendasCliente(),
        ));
    }
    
    public function actionBuscarItemTienda() {
        if (Yii::app()->request->isAjaxRequest) {
            $arrayData = array();
            $data = new TIENDA;
            $ids = isset($_POST['ids']) ? $_POST['ids'] : "";
            $des_com=isset($_POST['DES_COM']) ? $_POST['DES_COM'] : "";
            $arrayData = $data->mostrarItemsCheckTiendas($ids,$des_com);
            $this->renderPartial('_indexGridTienda', array(
                'model' => $arrayData,
            ),false, true);
            return;
        }
    }
    
      
    
    public function actionSaveItems() {
        if (Yii::app()->request->isPostRequest) {
            $model = new TIENDA;
            $arroout=array();
            $data = isset($_POST['DATA']) ? CJavaScript::jsonDecode($_POST['DATA']) : array();
            //print_r($data['IDS']);
            $accion = isset($_POST['ACCION']) ? $_POST['ACCION'] : "";
            $op = isset($_POST['OP']) ? $_POST['OP'] : "";
            if ($accion == "Create") {
                if($op=="U"){//guarda solo a una tienda seleccionada
                    $arroout = $model->insertarTiendaItems($data);
                }else{
                    //Agrega para todas las tiendas del cliente
                    $arroout = $model->insertarItemsTodasTiendas($data);
                }
                
            } else {
                //$arroout = $model->actualizarTienda($tienda);
            }
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arroout);
            return;
        }
    }
    
    public function actionTiendaCupo() {
        $modelo = new TIENDA;
        $this->titleWindows = Yii::t('TIENDA', 'Quota Store');
        $this->render('tiendacupo', array(
            'tienda' => $modelo->recuperarTiendasRol(),
        ));
    }
    
    public function actionSaveCupoTie() {
        if (Yii::app()->request->isPostRequest) {
            $model = new TIENDA;
            $arroout=array();
            $cupo = isset($_POST['CUP']) ? $_POST['CUP'] : "0";
            $tieId = isset($_POST['TIE']) ? $_POST['TIE'] : "0";
            $arroout = $model->updateCupoTienda($tieId,$cupo);
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arroout);
            return;
        }
    }
    
    public function actionBuscarProductoTienda() {
        if (Yii::app()->request->isAjaxRequest) {
            $valor = isset($_POST['valor']) ? $_POST['valor'] : "";
            $op = isset($_POST['op']) ? $_POST['op'] : "";//tie_id
            $tieId = isset($_POST['tie_id']) ? $_POST['tie_id'] : "";//
            $arrayData = array();
            $data = new ARTICULO();
            $arrayData = $data->retornarBusArticuloTienda($valor,$tieId,$op);
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arrayData);
        }
    }

}
