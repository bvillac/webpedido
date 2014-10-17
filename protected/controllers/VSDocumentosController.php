<?php

class VSDocumentosController extends Controller {

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
        ));
    }

}
