<?php

class VSDocumentosController extends Controller {

    public function actionIndex() {
        $modelo = new VSDocumentos;
        $this->titleWindows = Yii::t('COMPANIA', 'Company');
        //$dataProvider = new CActiveDataProvider('VSCompania');
        $this->render('index', array(
            //'dataProvider' => $dataProvider,
            'model' => $modelo->mostrarDocumentos(),
        ));
    }

}
