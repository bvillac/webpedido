<?php

class PEDIDOSController extends Controller {
    
     public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update','Save','Listar','DataTienda','Aprobar','Delete','AnuItemPedTemp'),
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
    
    private function tipoAprobacion() {
        return array(
            '1' => Yii::t('TIENDA', 'Order'),
            '2' => Yii::t('TIENDA', 'Dressed'),
            '3' => Yii::t('TIENDA', 'Authorized'),
            '4' => Yii::t('TIENDA', 'Canceled'),
        );
    }

    public function actionIndex() {
        $this->render('index');
    }
    
    public function actionUpdate($id) {
        $ids = base64_decode($id);
        $model = new TEMP_CABPEDIDO;
        $model->TDOC_ID = $ids; //mantiene el ID  Actualizar
        //$this->titleWindows = Yii::t('TIENDA', 'Store');
        $this->render('update', array(
            'CabPed' => $model->cabeceraPedidoTemp($ids),
            'DetPed' => $model->detallePedidoTemp($ids),
        ));
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
    
    public function actionDataTienda() {
        if (Yii::app()->request->isAjaxRequest) {
            $ids = isset($_POST['ids']) ? $_POST['ids'] : "";
            $arrayData = array();
            $data = new TIENDA;
            $arrayData = $data->recuperarTiendasCupo($ids);
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arrayData);
        }
    }
    
    public function actionSave() {
        if (Yii::app()->request->isPostRequest) {
            $model = new TEMP_CABPEDIDO;
            $dts_Lista = isset($_POST['DTS_LISTA']) ? CJavaScript::jsonDecode($_POST['DTS_LISTA']) : array();
            $tieId = isset($_POST['TIE_ID']) ? $_POST['TIE_ID'] : 0;
            $total = isset($_POST['TOTAL']) ? $_POST['TOTAL'] : 0;
            $accion = isset($_POST['ACCION']) ? $_POST['ACCION'] : "";
            if ($accion == "Create") {
                $arroout = $model->insertarLista($tieId,$total,$dts_Lista);
            } else {
                $arroout = $model->actualizarLista($tieId,$total,$dts_Lista);
            }
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arroout);
        }
    }
    
    public function actionAprobar() {
        $model = new TEMP_CABPEDIDO;
        $tienda = new TIENDA;
        
        $arrayData = array();
        if (Yii::app()->request->isAjaxRequest) {
            $ids = isset($_POST['ids']) ? $_POST['ids'] : "";
            $arrayData = $model->listarPedidosTiendas(null);
            $this->renderPartial('_indexGridPedidos', array(
                'model' => $arrayData,
            ),false, true);
            return;
        }
        $this->titleWindows = Yii::t('TIENDA', 'Approved orders');
        $this->render('aprobar', array(
            'model' => $model->listarPedidosTiendas(null),
            'tienda' => $tienda->recuperarTiendasRol(),
            'estado' => $this->tipoAprobacion(),
        ));
    }
    
    public function actionDelete() {
            if (Yii::app()->request->isPostRequest) {
                //$ids = base64_decode($_POST['ids']);
                $ids = isset($_POST['ids']) ? $_POST['ids'] : 0;
                $res = new TEMP_CABPEDIDO;
                $arroout=$res->anularPedidoTemp($ids);
                header('Content-type: application/json');
                echo CJavaScript::jsonEncode($arroout);
            }

    }
    
    public function actionAnuItemPedTemp() {
            if (Yii::app()->request->isPostRequest) {
                //$ids = base64_decode($_POST['ids']);
                $ids = isset($_POST['ids']) ? $_POST['ids'] : 0;
                $res = new TEMP_CABPEDIDO;
                $arroout=$res->anularItemPedidoTemp($ids);
                header('Content-type: application/json');
                echo CJavaScript::jsonEncode($arroout);
            }

    }

}
