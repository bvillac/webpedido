<?php

class USUARIOController extends Controller {

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
                'actions' => array('create', 'update','Save','Delete','DeleteUserTie','UserTienda','AsignarTienda',
                                    'ClienteTienda','BuscarUsuario','SaveUserTie','Contrasena','Upload',
                                    'UsuarioCliente','DeleteUserCliente','DeleteItemCliente','ListaProducto',
                                    'AutorizaListadoUser','AutorizaListadoItem'),
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

    private function genero() {
        return array(
            'M' => Yii::t('USUARIO', 'Male'),
            'F' => Yii::t('USUARIO', 'Female'),
        );
    }
    private function roles() {
        return array(
            '1' => Yii::t('USUARIO', 'Usuario (Puede hacer Pedidos)'),
            '2' => Yii::t('USUARIO', 'Supervisor (Puede hacer Pedidos y Autorizar)'),
        );
    }
     private function estado() {
        return array(
            '1' => Yii::t('USUARIO', 'Active'),
            '0' => Yii::t('USUARIO', 'Inactive'),
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
        $model = new USUARIO;
        $tienda = new TIENDA;
        //$dataCliente = new ARTICULOTIENDA;
        //$this->titleWindows = Yii::t('COMPANIA', 'Create User');
        $cli_Id=Yii::app()->getSession()->get('CliID', FALSE);
        $this->render('create', array(
            'model' => $model,
            'genero' => $this->genero(),
            'estado' => $this->estado(),
            
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $ids = base64_decode($id);
        $model = new PERSONA;
        $tienda = new TIENDA;
        $persona = $model->recuperarPersonas($ids);
        $model->PER_ID = $ids; //mantiene el ID del Descargo Actualizar

        //$this->titleWindows = Yii::t('TIENDA', 'Store');
        $cli_Id=Yii::app()->getSession()->get('CliID', FALSE);
        $this->render('update', array(
            'model' => $model,
            'genero' => $this->genero(),
            'estado' => $this->estado(),
            'dperId' => $persona['DPER_ID'],
            'data' => base64_encode(CJavaScript::jsonEncode($persona)),
            'area' => $tienda->recuperarClienteArea($cli_Id),
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
            $res = new PERSONA;
            $arroout = $res->removerPersona($ids);
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arroout);
        }
    }
    
    public function actionDeleteUserTie() {
        if (Yii::app()->request->isPostRequest) {
            //$ids = base64_decode($_POST['ids']);
            $ids = isset($_POST['ids']) ? $_POST['ids'] : 0;
            $res = new USUARIO;
            $arroout = $res->removerUserTie($ids);
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arroout);
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $modelo = new PERSONA;
        if (Yii::app()->request->isAjaxRequest) {
            $contBuscar = isset($_POST['CONT_BUSCAR']) ? CJavaScript::jsonDecode($_POST['CONT_BUSCAR']) : array();
            //$arrayData = $model->mostrarPedidos($contBuscar);
            $arrayData = $modelo->mostrarUsuarioPersona($contBuscar);
            $this->renderPartial('_indexGrid', array(
                'model' => $arrayData,
                    ), false, true);
            return;
        }
        $this->titleWindows = Yii::t('USUARIO', 'User Admin');
        $this->render('index', array(
            'model' => $modelo->mostrarUsuarioPersona(null),
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new USUARIO('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['USUARIO']))
            $model->attributes = $_GET['USUARIO'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return USUARIO the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = USUARIO::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param USUARIO $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'usuario-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
    public function actionSave() {
        if (Yii::app()->request->isPostRequest) {
            $model = new PERSONA;
            $tienda = isset($_POST['DATA']) ? CJavaScript::jsonDecode($_POST['DATA']) : array();
            $accion = isset($_POST['ACCION']) ? $_POST['ACCION'] : "";
            if ($accion == "Create") {
                $arroout = $model->insertarDatosPersona($tienda);
            } else {
                $arroout = $model->actualizarDatosPersona($tienda);
            }
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arroout);
            return;
        }
    }
    
    public function actionUserTienda() {
        $modelo = new PERSONA;
        $usurio = new USUARIO;
        $rol= new ROL;
        $cliente = new ARTICULOTIENDA;       
        if (Yii::app()->request->isAjaxRequest) {
            $contBuscar = isset($_POST['CONT_BUSCAR']) ? CJavaScript::jsonDecode($_POST['CONT_BUSCAR']) : array();
            //$arrayData = $model->mostrarPedidos($contBuscar);
            $arrayData = $modelo->mostrarUsuarioTienda($contBuscar);
            $this->renderPartial('_indexGridTienda', array(
                'model' => $arrayData,
                    ), false, true);
            return;
        }
        
        $this->titleWindows = Yii::t('USUARIO', 'User Admin');
        $this->render('usertienda', array(
            'model' => $modelo->mostrarUsuarioTienda(null),
            'cliente' => $cliente->recuperarClientes(),
            'rol' => $rol->recuperarRolTienda(),
            'tienda' => $usurio->recuperarTiendasUsuario('0'),
        ));
    }
    
    public function actionClienteTienda() {
        if (Yii::app()->request->isPostRequest) {
            $model = new TIENDA;
            $user = isset($_POST['DATA']) ? $_POST['DATA'] :'';
            $arroout = $model->recuperarTiendasAdmin($user);
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arroout);
            return;
        }
    }
    
    public function actionBuscarUsuario() {
        if (Yii::app()->request->isAjaxRequest) {
            $valor = isset($_POST['valor']) ? $_POST['valor'] : "";
            $op = isset($_POST['op']) ? $_POST['op'] : "";
            $arrayData = array();
            $data = new USUARIO;
            $arrayData = $data->retornarBuscarUser($valor, $op);
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arrayData);
        }
    }
    
    public function actionSaveUserTie() {
        if (Yii::app()->request->isPostRequest) {
            $model = new USUARIO;
            $arroout=array();
            $data = isset($_POST['DATA']) ? CJavaScript::jsonDecode($_POST['DATA']) : array();
            //print_r($data['IDS']);
            $accion = isset($_POST['ACCION']) ? $_POST['ACCION'] : "";
            if ($accion == "Create") {
                $arroout = $model->insertarUsuTiendas($data);
            }
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arroout);
            return;
        }
    }
    
    public function actionContrasena() {
        $model = new USUARIO;
        if (Yii::app()->request->isAjaxRequest) {;
            $pass = base64_decode($_POST['DATA']);
            $arrayData = $model->cambiarPassword($pass);
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arrayData);
            return;
        }
        $this->render('contrasena');
    }
    
    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionUsuarioCliente() {
        $model = new PERSONA;
        $tienda = new TIENDA;
        //$dataCliente = new ARTICULOTIENDA;
        //$this->titleWindows = Yii::t('COMPANIA', 'Create User');
        if (Yii::app()->request->isPostRequest) {
            //$model = new PERSONA;
            $arroout=array();
            $dataObj = isset($_POST['DATA']) ? CJavaScript::jsonDecode($_POST['DATA']) : array();
            $accion = isset($_POST['ACCION']) ? $_POST['ACCION'] : "";
            //VSValidador::putMessageLogFile($dataObj);            
            if ($accion == "Create") {
                $arroout = $model->insertarDatosUserCliente($dataObj);
                
            } else {
                //$arroout = $model->actualizarDatosPersona($tienda);
            }
            
            
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arroout);
            return;
        }
        $cli_Id=Yii::app()->getSession()->get('CliID', FALSE);
        $this->titleWindows = Yii::t('TIENDA', 'Información de la Empresa');
        $this->render('usuariocliente', array(
            'model' => $model->mostrarUserCliente(),
            'roles' => $this->roles(),
            'area' => $tienda->recuperarClienteArea($cli_Id),
        ));
    }
    
    public function actionDeleteUserCliente() {
        if (Yii::app()->request->isPostRequest) {
            //$ids = base64_decode($_POST['ids']);
            $ids = isset($_POST['ids']) ? $_POST['ids'] : 0;
            $res = new PERSONA;
            $arroout = $res->removerUserCliente($ids);
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arroout);
        }
    }
    
    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionListaProducto() {
        $model = new PERSONA;
        $cli_Id=Yii::app()->getSession()->get('CliID', FALSE);
        if (Yii::app()->request->isPostRequest) {
            $arroout=array();
            $dataObj = isset($_POST['DATA']) ? CJavaScript::jsonDecode($_POST['DATA']) : array();
            $accion = isset($_POST['ACCION']) ? $_POST['ACCION'] : "";
            //VSValidador::putMessageLogFile($dataObj);            
            if ($accion == "Create") {
                $arroout = $model->insertarDatosItemCliente($dataObj);
                
            } else {
                //$arroout = $model->actualizarDatosPersona($tienda);
            }
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arroout);
            return;
        }
        $this->titleWindows = Yii::t('TIENDA', 'Lista de Productos');
        $this->render('listaproducto', array(
            'model' => $model->mostrarItemCliente(),
        ));
        
    }
    
    public function actionDeleteItemCliente() {
        if (Yii::app()->request->isPostRequest) {
            //$ids = base64_decode($_POST['ids']);
            $ids = isset($_POST['ids']) ? $_POST['ids'] : 0;
            $res = new PERSONA;
            $arroout = $res->removerItemCliente($ids);
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arroout);
        }
    }
    
    //Nota: Si tiene problema no olvidar los privilegios de la carpeta
    public function actionUpload() {
        Yii::import("ext.EAjaxUpload.qqFileUploader");
        //$extfd =Yii::app()->params['seaFirext'];//Extension de firma electronica
        $cli_Id=Yii::app()->getSession()->get('CliID', FALSE);
        //$folder =Yii::app()->params['rutaDoc'];// folder for uploaded files
        $folder =Yii::app()->params['rutaDoc'].$cli_Id."/";// folder for uploaded files
        if (!file_exists($folder)) {
            mkdir($folder, 0777, true); //Se Crea la carpeta
            chmod(dirname($folder), 0777);
            //chmod($folder_path, 0777); 
        }
        //VSValidador::putMessageLogFile($folder);
        //$folder = getcwd()."/file/uploads/"; //mUESTRA TODA LA RUTA DEL PROYECTO
        //$allowedExtensions = array($extfd, "pdf"); //array("jpg","jpeg","gif","exe","mov" and etc...
        $allowedExtensions = array("jpg", "pdf"); //array("jpg","jpeg","gif","exe","mov" and etc...
        $sizeLimit = 10 * 1024 * 1024; // maximum file size in bytes
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload($folder);
        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);

        $fileSize = filesize($folder . $result['filename']); //GETTING FILE SIZE
        $fileName = $result['filename']; //GETTING FILE NAME //Retorna el Nombre del Archivo a subir

        echo $return; // it's array 
    }
    
    //AUTORIZACIN DE LISLTA DE ARCHIVOS
    public function actionAutorizaListadoUser() { 
        if (Yii::app()->request->isPostRequest) {
            //$info = isset($_POST['info']) ? $_POST['info'] : "";
            $res = new PERSONA;
            $arroout = $res->autorizarUserCliente();
            $dataMail = new mailSystem; 
            $htmlMail = $this->renderPartial('mensajeautoriza', array(
                //'CabPed' => $CabPed,
            ), true);          
            $arroout=$dataMail->enviarAutoriza($htmlMail);
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arroout); 
            return;
        }
        
    }
    
    //AUTORIZACIN DE ITEMS
    public function actionAutorizaListadoItem() { 
        if (Yii::app()->request->isPostRequest) {
            //$info = isset($_POST['info']) ? $_POST['info'] : "";
            $res = new PERSONA;
            $arroout = $res->autorizarItemCliente();
            $dataMail = new mailSystem;  
             $htmlMail = $this->renderPartial('mensajeautoriza', array(
                //'CabPed' => $CabPed,
            ), true);           
            $arroout=$dataMail->enviarAutoriza($htmlMail);
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arroout); 
            return;
        }
        
    }
    
    
    public function actionAsignarTienda() {
        if (Yii::app()->request->isPostRequest) {
            //$ids = base64_decode($_POST['ids']);
            $ids = isset($_POST['ids']) ? $_POST['ids'] : 0;
            $res = new TIENDA;
            $arroout = $res->asignarTienda($ids);
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arroout);
        }
    }
    
    

}