<?php

class REPORTESController extends Controller {

    public function actionIndex() {
        $tienda=new TIENDA;
        $this->render('index', array(
            'tienda' => $tienda->recuperarTiendasRol(),
            //'DetPed' => $model->detallePedidoTemp($ids),
        ));
    }

    public function actionGenerarPdf($ids) {
        try {
            $ids = isset($_GET['ids']) ? base64_decode($_GET['ids']) : NULL;
            $modelo = new CABPEDIDO;
            $cabFact = $modelo->mostrarCabPedido($ids);
            $detFact = $modelo->mostrarDetPedido($ids);
            $mPDF1 = Yii::app()->ePdf->mpdf('utf-8', 'A4', '', '', 15, 15, 16, 16, 9, 9, 'P'); //Esto lo pueden configurar como quieren, para eso deben de entrar en la web de MPDF para ver todo lo que permite.
            $mPDF1->useOnlyCoreFonts = true;
            $mPDF1->SetTitle("ORDEN NUM: " . $cabFact['Numero']);
            $mPDF1->SetAuthor("Utimpor");
            //$mPDF1->SetWatermarkText(Yii::t('DOCUMENTOS', 'PRINTED INFORMATION PROVIDED IS VOID IN PROOF TEST ENVIRONMENT'));
            //$mPDF1->showWatermarkText = true;
            //$mPDF1->watermark_font = 'DejaVuSansCondensed';
            //$mPDF1->watermarkTextAlpha = 0.5;
            $mPDF1->SetDisplayMode('fullpage');
            //Load a stylesheet
            //$stylesheet = file_get_contents(Yii::app()->theme->baseUrl.'/css/print.css');
            //$mPDF1->WriteHTML($stylesheet, 1);
            $mPDF1->WriteHTML(
                    $this->renderPartial('ordenPDF', array(
                        'cabFact' => $cabFact,
                        'detFact' => $detFact,
                            ), true)); //hacemos un render partial a una vista preparada, en este caso es la vista docPDF
            //$mPDF1->Output('FACTURA' . date('YmdHis'), 'I');  //Nombre del pdf y parámetro para ver pdf o descargarlo directamente.
            $mPDF1->Output('ORDEN NUM:' . $cabFact['Numero'], 'I');
            //exit;
        } catch (Exception $e) {
            $this->errorControl($e);
        }
    }
    
    public function actionRep_VentMax($data) {
        try {
            $control = base64_decode($data);
            $rep=new REPORTES;
            $modelo = new CABPEDIDO;
            $report = $modelo->Rep_VentMax($control);
            $op = explode(",", $control); //Recibe Datos y los separa
            $mPDF1=$rep->crearBaseReport();
            $nameFile=Yii::t('TIENDA', 'Monthly sales per store.') . "-" . date('YmdHis');
            $Titulo=Yii::t('TIENDA', 'Monthly sales per store.');
            
            $Contenido=$this->renderPartial('ventasMes_Rep', array(
                            'data' => $report,
                            'control' => $control,
                            'titulo' => $Titulo,
                            'f_ini'=> $op[1],//Fecha Inicio
                            'f_fin'=> $op[2],//Fecha Fin
                                ), true);
            
            if ($op[0] == 1) {
                $mPDF1->SetTitle($Titulo);
                $mPDF1->WriteHTML($Contenido); //hacemos un render partial a una vista preparada, en este caso es la vista docPDF
                $mPDF1->Output($nameFile, 'I');
            } else {
                yii::app()->request->sendFile($nameFile.'.xls', $Contenido);
            }
            //exit;
        } catch (Exception $e) {
            $this->errorControl($e);
        }
    }
    public function actionRep_ItemTienda($data) {
        try {
            $control = base64_decode($data);
            print_r($control);
            $rep = new REPORTES;
            $modelo = new CABPEDIDO;
            $report = $modelo->Rep_ItemTienda($control);
            $op = explode(",", $control); //Recibe Datos y los separa
            $mPDF1 = $rep->crearBaseReport();
            $nameFile=Yii::t('TIENDA', 'Items per store') . "-" . date('YmdHis');
            $Titulo=Yii::t('TIENDA', 'Items per store');
            $Contenido=$this->renderPartial('itemTienda_Rep', array(
                            'data' => $report,
                            'control' => $control,
                            'titulo' => $Titulo,
                            'f_ini'=> $op[1],//Fecha Inicio
                            'f_fin'=> $op[2],//Fecha Fin
                                ), true);
            if ($op[0] == 1) {
                $mPDF1->SetTitle($Titulo);
                $mPDF1->WriteHTML($Contenido); //hacemos un render partial a una vista preparada, en este caso es la vista docPDF
                $mPDF1->Output($nameFile, 'I');
            } else {
                yii::app()->request->sendFile($nameFile.'.xls', $Contenido);
            }


            //exit;
        } catch (Exception $e) {
            $this->errorControl($e);
        }
    }
    
    public function actionConsumoTienda($data) {
        try {
            $control = base64_decode($data);
            //print_r($control);
            $rep = new REPORTES;
            $modelo = new CABPEDIDO;
            $report = $modelo->reporteConsumoTienda($control);
            $op = explode(",", $control); //Recibe Datos y los separa
            $mPDF1 = $rep->crearBaseReport();
            $nameFile=Yii::t('TIENDA', 'CONSUMOS') . "-" . date('YmdHis');
            $Titulo=Yii::t('TIENDA', 'CONSUMOS') ." - ". Yii::app()->getSession()->get('CliNom', FALSE);
            $Contenido=$this->renderPartial('consumos_Rep', array(
                            'data' => $report,
                            'control' => $control,
                            'titulo' => $Titulo,
                            'f_ini'=> $op[1],//Fecha Inicio
                            'f_fin'=> $op[2],//Fecha Fin
                                ), true);
            if ($op[0] == 1) {
                $mPDF1->SetTitle($Titulo);
                $mPDF1->WriteHTML($Contenido); //hacemos un render partial a una vista preparada, en este caso es la vista docPDF
                $mPDF1->Output($nameFile, 'I');
            } else {
                yii::app()->request->sendFile($nameFile.'.xls', $Contenido);
            }


            //exit;
        } catch (Exception $e) {
            $this->errorControl($e);
        }
    }

    public function actionResumen() {
        $tienda=new TIENDA;
        $this->render('resumen', array(
            'tienda' => $tienda->recuperarTiendasRol(),
            'tipo' => $tienda->recuperarTipoItem(),
            'marca' => $tienda->recuperarMarcaItem(),
        ));
    }

    public function actionConsumoResumen($data) {
        try {
            //VSValidador::putMessageLogFile("llego");
            $control = base64_decode($data);
            $control =CJavaScript::jsonDecode($control);
            //print_r($control);
            //echo $control[0]['FEC_INI'];
            //echo $control['FEC_INI'];
            //$tipoData = isset($control) ? CJavaScript::jsonDecode($control) : array();
            $rep = new REPORTES;
            $modelo = new CABPEDIDO;
            $report = $modelo->reporteConsumoTiendaPedido($control);
            
            //$valida->putMessageLogFile($report);
            //VSValidador::putMessageLogFile($report);
        
            
            //print_r($report);
            $mPDF1 = $rep->crearBaseReport();
            $nameFile=Yii::t('TIENDA', 'RESUMEN_PEDIDO') . "-" . date('YmdHis');
            $Titulo=Yii::t('TIENDA', 'RESUMEN PEDIDO') ." - ". Yii::app()->getSession()->get('CliNom', FALSE);
            $Contenido=$this->renderPartial('consumos_Resumen', array(
                            'data' => $report,
                            'control' => $control,
                            'titulo' => $Titulo,
                            'Ntienda'=> $control['TIE_NOM'],
                            'f_ini'=> $control['FEC_INI'],//Fecha Inicio
                            'f_fin'=> $control['FEC_FIN'],//Fecha Fin
                                ), true);
            if ($control['OP'] == 1) {
                $mPDF1->SetTitle($Titulo);
                $mPDF1->WriteHTML($Contenido); //hacemos un render partial a una vista preparada, en este caso es la vista docPDF
                $mPDF1->Output($nameFile, 'I');
            } else {
                yii::app()->request->sendFile($nameFile.'.xls', $Contenido);
            }

            //exit;
        } catch (Exception $e) {
            $this->errorControl($e);
        }
    }


}
