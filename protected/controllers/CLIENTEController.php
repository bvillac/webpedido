<?php

class CLIENTEController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','empresa','DeleteCliente','AgregarCliente'),
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
		$model=new CLIENTE;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CLIENTE']))
		{
			$model->attributes=$_POST['CLIENTE'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->CLI_ID));
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

		if(isset($_POST['CLIENTE']))
		{
			$model->attributes=$_POST['CLIENTE'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->CLI_ID));
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
		$dataProvider=new CActiveDataProvider('CLIENTE');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new CLIENTE('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CLIENTE']))
			$model->attributes=$_GET['CLIENTE'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return CLIENTE the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=CLIENTE::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CLIENTE $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='cliente-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        
        public function actionEmpresa() {
            $model = new CLIENTE;
            $tienda = new TIENDA;
            //$dataCliente = new ARTICULOTIENDA;
            //$this->titleWindows = Yii::t('COMPANIA', 'Create User');
            if (Yii::app()->request->isPostRequest) {
                //$model = new PERSONA;
                $arroout = array();
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
            $cli_Id = Yii::app()->getSession()->get('CliID', FALSE);
            $this->titleWindows = Yii::t('TIENDA', 'Información del Cliente');
            $this->render('empresa', array(
                'model' => $model->mostrarCliente(),
                //'roles' => $this->roles(),
                'area' => $tienda->recuperarClienteArea($cli_Id),
            ));
        }
        
        public function actionDeleteCliente() {
            if (Yii::app()->request->isPostRequest) {
                //$ids = base64_decode($_POST['ids']);
                $ids = isset($_POST['ids']) ? $_POST['ids'] : 0;
                $res = new CLIENTE;
                $arroout = $res->removerCliente($ids);
                header('Content-type: application/json');
                echo CJavaScript::jsonEncode($arroout);
            }
        }
        
        public function actionAgregarCliente() {
        $model = new CLIENTE;
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
                $arroout = $model->insertarDatosCliente($dataObj);
                
            } else {
                //$arroout = $model->actualizarDatosPersona($tienda);
            }
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arroout);
            return;
        }
    }
    

}
