<?php

class PEDIDOSController extends Controller {
    
     public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update','Save','Listar'),
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

    public function actionIndex() {
        $this->render('index');
    }


    public function actionListar() {
        $model = new TIENDA;
        $arrayData = array();
        if (Yii::app()->request->isAjaxRequest) {
            $ids = isset($_POST['ids']) ? $_POST['ids'] : "";
            $arrayData = $model->listarItemsTiendas($ids);
            $this->renderPartial('_indexGrid', array(
                'model' => $arrayData,
            ),false, true);
            return;
        }
        $this->titleWindows = Yii::t('TIENDA', 'List orders');
        $this->render('listar', array(
            'model' => $model->listarItemsTiendas(0),
            'tienda' => $model->recuperarTiendasRol(),
        ));
        
        
    }

}
