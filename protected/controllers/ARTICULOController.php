<?php

class ARTICULOController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
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
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','items','editaritems','save','nuevoitems','buscarItems','activarItem','upload'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new ARTICULO;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ARTICULO']))
		{
			$model->attributes=$_POST['ARTICULO'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ART_ID));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ARTICULO']))
		{
			$model->attributes=$_POST['ARTICULO'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ART_ID));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('ARTICULO');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ARTICULO('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ARTICULO']))
			$model->attributes=$_GET['ARTICULO'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ARTICULO the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ARTICULO::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ARTICULO $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='articulo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	/**
     * Lists all models.
     */
    public function actionItems() {
        $modelo = new ARTICULO;
        if (Yii::app()->request->isAjaxRequest) {
            $contBuscar = isset($_POST['CONT_BUSCAR']) ? CJavaScript::jsonDecode($_POST['CONT_BUSCAR']) : array();
            //$arrayData = $model->mostrarPedidos($contBuscar);
            $arrayData = $modelo->mostrarItems($contBuscar);
            $this->renderPartial('_indexGrid', array(
                'model' => $arrayData,
                    ), false, true);
            return;
        }
        $this->titleWindows = Yii::t('USUARIO', 'Items o Articulos');
        $this->render('items', array(
            'model' => $modelo->mostrarItems(null),
        ));
    }

	/**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionEditaritems($id) {
        $ids = base64_decode($id);
        $model = new ARTICULO;
        $items = $model->consultarItems($ids);
        $model->COD_ART = $ids; //mantiene el ID del Descargo Actualizar
        $this->render('editaritems', array(
            'model' => $model,
            'data' => base64_encode(CJavaScript::jsonEncode($items)),
        ));
    }

	public function actionSave() {
        if (Yii::app()->request->isPostRequest) {
            $model = new ARTICULO;
            $data = isset($_POST['DATA']) ? CJavaScript::jsonDecode($_POST['DATA']) : array();
            $accion = isset($_POST['ACCION']) ? $_POST['ACCION'] : "";
            if ($accion == "Create") {
                $arroout = $model->insertarItems($data);
            } else {
                $arroout = $model->actualizarItems($data);
            }
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arroout);
            return;
        }
    }

	/**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionNuevoitems() {
        $model = new ARTICULO;
        $this->render('nuevoitems', array(
            'model' => $model,
        ));
    }


	public function actionBuscarItems() {
        if (Yii::app()->request->isAjaxRequest) {
            $valor = isset($_POST['valor']) ? $_POST['valor'] : "";
            $op = isset($_POST['op']) ? $_POST['op'] : "";
            $arrayData = array();
            $data = new ARTICULO;
            $arrayData = $data->retornarBuscarItems($valor, $op);
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arrayData);
        }
	}


	public function actionActivarItem() {
        if (Yii::app()->request->isPostRequest) {
            //$ids = base64_decode($_POST['ids']);
            $ids = isset($_POST['ids']) ? $_POST['ids'] : 0;
			$Estado = ($_POST['estado'])?0:1;//isset($_POST['estado']) ? $_POST['estado'] : "";
            $res = new ARTICULO;
            $arroout = $res->activarItem($ids,$Estado);
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arroout);
        }
    }

	//Nota: Si tiene problema no olvidar los privilegios de la carpeta
    public function actionUpload() {
		
        Yii::import("ext.EAjaxUpload.qqFileUploader");
        $model=new ARTICULO;
		$folder=YiiBase::getPathOfAlias("webroot").Yii::app()->params["rutafilePro"];
		//VSValidador::putMessageLogFile($folder);
        if (!file_exists($folder)) {
            mkdir($folder, 0777, true); //Se Crea la carpeta
            //chmod(dirname($folder), 0777);//Habilitar si da error
        }

        $allowedExtensions = array("jpg", "jpeg"); //array("jpg","jpeg","gif","exe","mov" and etc...
        $sizeLimit = 12 * 1024 * 1024; // maximum file size in bytes
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload($folder);
        
        $fileSize = filesize($folder . $result['filename']); //GETTING FILE SIZE
        $fileName = $result['filename']; //GETTING FILE NAME //Retorna el Nombre del Archivo a subir
        
        //VSValidador::putMessageLogFile($result);
        
        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
        echo $return; // it's array 
    }


}
