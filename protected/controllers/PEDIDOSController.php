<?php

class PEDIDOSController extends Controller {
    
     public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array(
                    'create', 'update','Save','Listar','DataTienda','DataTiendaUpdate',
                    'Aprobar','Delete','AnuItemPedTemp','EnvPedAut','EntregarPed','Listarpedido',
                    'Liquidar','GenerarPdf','Consultar','Manuales','RevisarAdmin','Comentario'),
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
    
    /*private function tipoAprobacion() {
        return array(
            '1' => Yii::t('TIENDA', 'Order'),
            '2' => Yii::t('TIENDA', 'Dressed'),
            '3' => Yii::t('TIENDA', 'Authorized'),
            '4' => Yii::t('TIENDA', 'Canceled'),
        );
    }*/

    public function actionIndex() {
        $this->render('index');
    }
    
    public function actionUpdate($id) {
        $ids = base64_decode($id);
        $model = new TEMP_CABPEDIDO;
        $tienda = new TIENDA;
        $model->TDOC_ID = $ids; //mantiene el ID  Actualizar
        $CabPed=$model->cabeceraPedidoTemp($ids);
        $DetPed=$model->detallePedidoTemp($ids);
        $cupo=$tienda->recuperarTiendasCupo($CabPed["TieID"]);
        if (Yii::app()->request->isAjaxRequest) {
             return;
        }
        //$this->titleWindows = Yii::t('TIENDA', 'Store');
        $this->render('update', array(
            'CabPed' => $CabPed,
            'DetPed' => $DetPed,
            'cupo' => $cupo["data"]["SALDO"],
            'mostrar' => "SI",//$cupo["data"]["MOSTRAR"],
        ));
    }
    
    public function actionDataTiendaUpdate() {
        if (Yii::app()->request->isAjaxRequest) {
            $ids = isset($_POST['ids']) ? $_POST['ids'] : "";
            $arrayData = array();
            $data = new TIENDA;
            $arrayData = $data->recuperarTiendasCupo($ids);
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arrayData);
        }
    }


    public function actionListar() {
        $model = new TIENDA;
        $arrayData = array();
        $cli_Id=Yii::app()->getSession()->get('CliID', FALSE);
        if (Yii::app()->request->isAjaxRequest) {
            //VSValidador::putMessageLogFile("llego");
            $op = isset($_POST['op']) ? $_POST['op'] : "";
            $ids = isset($_POST['ids']) ? $_POST['ids'] : "0";
            $des_com = isset($_POST['des_com']) ? $_POST['des_com'] : "";
            switch ($op) {
                case 'Tienda':
                    $arrayData = $model->listarItemsTiendas($ids,$des_com);
                    break;
                case 'Buscar':
                    $contBuscar = isset($_POST['CONT_BUSCAR']) ? CJavaScript::jsonDecode($_POST['CONT_BUSCAR']) : array();
                    $ids=($contBuscar[0]['TIE_ID']!='')?$contBuscar[0]['TIE_ID']:"0";
                    $des_com=($contBuscar[0]['DES_COM']!='')?$contBuscar[0]['DES_COM']:"";
                    $arrayData = $model->listarItemsTiendas($ids,$des_com);
                    break;
                default: 
            }
            
            $this->renderPartial('_indexGrid', array(
                'model' => $arrayData,
            ),false, true);
            return;
        }
        //$this->titleWindows = Yii::t('TIENDA', 'List orders');
        $this->titleWindows = Yii::t('TIENDA', 'Hacer Pedidos');
        $this->render('listar', array(
            'model' => $model->listarItemsTiendas(0,""),
            //'tienda' => $model->recuperarTiendasRol(),
            'tienda' => $model->recuperarTiendaAsig(),
            //'area' => $model->recuperarUserArea(),
            'cliID' => $cli_Id,
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
        //$valida = new VSValidador();
        $cli_Id=Yii::app()->getSession()->get('CliID', FALSE);        
        if (Yii::app()->request->isPostRequest) {
            $model = new TEMP_CABPEDIDO;
            $dts_Lista = isset($_POST['DTS_LISTA']) ? CJavaScript::jsonDecode($_POST['DTS_LISTA']) : array();
            $tieId = isset($_POST['TIE_ID']) ? $_POST['TIE_ID'] : 0;
            $total = isset($_POST['TOTAL']) ? $_POST['TOTAL'] : 0;
            $accion = isset($_POST['ACCION']) ? $_POST['ACCION'] : "";
            //$idsAre=isset($_POST['IDS_ARE'])? $_POST['IDS_ARE']:1;//Valor 1 por defecto en area
            if ($accion == "Create") {
                $arroout = $model->insertarLista($tieId,$total,$dts_Lista);
                //Nota solo Para cliente Marximex puede Enviar los pedidos
                //directamentes para autorizar sin necesidad e una aprobacion
                //es decir se guardara la tabla temp y la tablas de comunicacion.
                if( $cli_Id=="4"){//Solo para Clientes Marcimex
                    //$arroout=$this->pedidoAprobado($arroout);
                }
            } else {                  
                //Opcion para actualizar
                $PedId = isset($_POST['PED_ID']) ? $_POST['PED_ID'] : 0;
                $arroout = $model->actualizarLista($PedId,$tieId,$total,$dts_Lista);
            }
            
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arroout);
        }
    }
    
    private function pedidoAprobado($arroout) {
        $valida = new VSValidador();
        $msg = new VSexception();
        $model = new CABPEDIDO;
        $dataMail = new mailSystem;
        $IdsTemp = $arroout['data']; //Obtiene Id insertar temporarl
        $arroout = array();

        $arroout = $model->insertarPedidos($IdsTemp);
        $IdCab = $arroout['data']; //Obtiene el Id de Cab de Pedido
        //$valida->putMessageLogFile($arroout);
        $CabPed = $model->sendMailPedidos($IdCab[0]['ids']);
        $htmlMail = $this->renderPartial('mensaje', array(
            'CabPed' => $CabPed,
                ), true);
        $dataMail->enviarMail($htmlMail, $CabPed);
        return $msg->messagePedidos('OK',$valida->ajusteNumDoc($IdsTemp, 9),'PE',null, 30, null, null);
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
            //'estado' => $this->tipoAprobacion(),
            'estado' => VSValidador::tipoAprobacion(),
        ));
        
    }
    
    public function actionListarpedido() {
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
        $this->titleWindows = Yii::t('TIENDA', 'Listar Pedidos');
        $this->render('listarpedido', array(
            'model' => $model->listarPedidosTiendas(null),
            'tienda' => $tienda->recuperarTiendasRol(),
            //'estado' => $this->tipoAprobacion(),
            'estado' => VSValidador::tipoAprobacion(),
        ));
        
    }
    
    public function actionRevisar() {
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
        $this->titleWindows = Yii::t('TIENDA', 'Revisar Pedidos');
        $this->render('revisar', array(
            'model' => $model->listarPedidosTiendas(null),
            'tienda' => $tienda->recuperarTiendasRol(),
            //'estado' => $this->tipoAprobacion(),
            'estado' => VSValidador::tipoAprobacion(),
        ));
        
    }
    
    public function actionLiquidar() {
        $model = new CABPEDIDO;
        $tienda = new TIENDA;
        
        $arrayData = array();
        if (Yii::app()->request->isAjaxRequest) {            
            $contBuscar = isset($_POST['CONT_BUSCAR']) ? CJavaScript::jsonDecode($_POST['CONT_BUSCAR']) : array();
            $arrayData = $model->mostrarPedidos($contBuscar);
            $this->renderPartial('_indexGridLiquidar', array(
                'model' => $arrayData,
                    ), false, true);
            return;
        }
        $this->titleWindows = Yii::t('TIENDA', 'Liquidate order');
        $this->render('liquidar', array(
            'model' => $model->mostrarPedidos(null),
            //'tienda' => $tienda->recuperarTiendasRol(),
            'tienda' => $tienda->recuperarTiendasCliente(),
            'estado' => VSValidador::tipoAprobacion(),
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
    
    //AUTORIZADO
    public function actionEnvPedAut() {
        if (Yii::app()->request->isPostRequest) {
            //$ids = base64_decode($_POST['ids']);
            $ids = isset($_POST['ids']) ? $_POST['ids'] : 0;
            $estado = isset($_POST['EstPed']) ? $_POST['EstPed'] : "AUT";
            
            //$EstAut=($estado=="AUT")?1:5;
            $res = new CABPEDIDO;
            $ModUsu = new USUARIO;
            $dataMail = new mailSystem; 
            //Opcion 1=PEDIDO Y 5=REVISADO
            if($estado=="REV"){
                $EstAut=5;//Revisado 
                $arroout = $res->actulizaRevisado($ids,$EstAut);
            }else{
                $EstAut=3;//3=Autorizado 1=Pedido
                $arroout = $res->insertarPedidos($ids,$EstAut);
                
            }
            $IdCab=$arroout["data"];
            //print_r($IdCab);
            //VSValidador::putMessageLogFile($IdCab);
            $idsUser = Yii::app()->getSession()->get('user_id', FALSE);
            //Para el envio de Correos
            for ($i = 0; $i < sizeof($IdCab); $i++) {
                if($EstAut==5){//REVISADO
                    $CabPed=$res->sendMailPedidosTemp($IdCab[$i]['ids']);
                    $objUser=$ModUsu->recuperarCorreoUsuario($idsUser);//Usuario que Revisa
                
                    $CabPed[0]["CorreoUser"]=$objUser[0]["USU_CORREO"];
                    $CabPed[0]["NombreUser"]=$objUser[0]["USU_NOMBRE"];
                            
                    $htmlMail = $this->renderPartial(
                        'mensaje', array(
                        'CabPed' => $CabPed,
                            ), true);
                    $dataMail->enviarRevisado($htmlMail,$CabPed);
                }else{
                    $CabPed=$res->sendMailPedidos($IdCab[$i]['ids']);
                    $htmlMail = $this->renderPartial(
                        'mensaje', array(
                        'CabPed' => $CabPed,
                            ), true);
                    $dataMail->enviarMail($htmlMail,$CabPed);
                    
                    
                }
                
                
            }
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arroout);
        }
    }
    
    public function actionAtenderPed() {
        if (Yii::app()->request->isPostRequest) {
            //$ids = base64_decode($_POST['ids']);
            $ids = isset($_POST['ids']) ? $_POST['ids'] : 0;
            $res = new CABPEDIDO;
            //$dataMail = new mailSystem;
            $arroout = $res->despacharPedido($ids);
//            $IdCab=$arroout["data"];
//            for ($i = 0; $i < sizeof($IdCab); $i++) {
//                $CabPed=$res->sendMailPedidos($IdCab[$i]['ids']);
//                $htmlMail = $this->renderPartial('mensaje', array(
//                'CabPed' => $CabPed,
//                    ), true);
//                $dataMail->enviarMail($htmlMail,$CabPed);
//            }
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arroout);
        }
    }
    
    //Actualiza el Estado de Pedido a Recibido
    public function actionEntregarPed() {
        if (Yii::app()->request->isPostRequest) {
            //$ids = base64_decode($_POST['ids']);
            $ids = isset($_POST['ids']) ? $_POST['ids'] : 0;
            $res = new CABPEDIDO;
            //$dataMail = new mailSystem;
            $arroout = $res->entregarPedido($ids);
//            $IdCab=$arroout["data"];
//            for ($i = 0; $i < sizeof($IdCab); $i++) {
//                $CabPed=$res->sendMailPedidos($IdCab[$i]['ids']);
//                $htmlMail = $this->renderPartial('mensaje', array(
//                'CabPed' => $CabPed,
//                    ), true);
//                $dataMail->enviarMail($htmlMail,$CabPed);
//            }
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arroout);
        }
    }

    public function actionBuscaDataIndex() {
        if (Yii::app()->request->isAjaxRequest) {
            $arrayData = array();
            $model = new TEMP_CABPEDIDO;
            $contBuscar = isset($_POST['CONT_BUSCAR']) ? CJavaScript::jsonDecode($_POST['CONT_BUSCAR']) : array();
            $arrayData = $model->listarPedidosTiendas($contBuscar);
            $this->renderPartial('_indexGridPedidos', array(
                'model' => $arrayData,
                    ), false, true);
            return;
        }
    }
    
    public function actionBuscaDataLiquidar() {
        if (Yii::app()->request->isAjaxRequest) {
            $arrayData = array();
            $model = new CABPEDIDO;
            $contBuscar = isset($_POST['CONT_BUSCAR']) ? CJavaScript::jsonDecode($_POST['CONT_BUSCAR']) : array();
            $arrayData = $model->mostrarPedidos($contBuscar);
            $this->renderPartial('_indexGridLiquidar', array(
                'model' => $arrayData,
                    ), false, true);
            return;
        }
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
            $mPDF1->watermarkTextAlpha = 0.5;
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
    
    public function actionGenerarTempPdf($ids) {
        try {
            $ids = isset($_GET['ids']) ? base64_decode($_GET['ids']) : NULL;
            $modelo = new TEMP_CABPEDIDO; 
            $cabFact = $modelo->mostrarCabPedidoTemp($ids);
            $detFact = $modelo->mostrarDetPedidoTemp($ids);
            $mPDF1 = Yii::app()->ePdf->mpdf('utf-8', 'A4', '', '', 15, 15, 16, 16, 9, 9, 'P'); //Esto lo pueden configurar como quieren, para eso deben de entrar en la web de MPDF para ver todo lo que permite.
            $mPDF1->useOnlyCoreFonts = true;
            $mPDF1->SetTitle("ORDEN NUM: " . $cabFact['Numero']);
            $mPDF1->SetAuthor("Utimpor");
            //$mPDF1->SetWatermarkText(Yii::t('DOCUMENTOS', 'PRINTED INFORMATION PROVIDED IS VOID IN PROOF TEST ENVIRONMENT'));
            //$mPDF1->showWatermarkText = true;
            //$mPDF1->watermark_font = 'DejaVuSansCondensed';
            $mPDF1->watermarkTextAlpha = 0.5;
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
    
    public function actionConsultar() {
        $model = new TEMP_CABPEDIDO;
        $tienda = new TIENDA;        
        $arrayData = array();
        $cli_Id=Yii::app()->getSession()->get('CliID', FALSE);
        if (Yii::app()->request->isAjaxRequest) {
            $ids = isset($_POST['ids']) ? $_POST['ids'] : "";
            $arrayData = $model->listarPedidosTiendas(null);
            $this->renderPartial('_indexGridPedidos', array(
                'model' => $arrayData,
            ),false, true);
            return;
        }
        $this->titleWindows = Yii::t('TIENDA', 'View orders');
        $this->render('consultar', array(
            'model' => $model->listarPedidosTiendas(null),
            'tienda' => $tienda->recuperarTiendaAsig(),
            'estado' => VSValidador::tipoAprobacion(),
            'cliID' => $cli_Id,
        ));
        
    }
    
    public function actionBuscarItemsUpdate() {
        //if (Yii::app()->request->isAjaxRequest) {
        if (Yii::app()->request->isPostRequest) {
            $valor = isset($_POST['valor']) ? $_POST['valor'] : "";
            $op = isset($_POST['op']) ? $_POST['op'] : "";//tie_id
            $tieId = isset($_POST['tie_id']) ? $_POST['tie_id'] : "";//
            $arrayData = array();
            $data = new ARTICULO();
            $arrayData = $data->retornarBusArticuloTienda($valor,$tieId,$op);
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arrayData);
            return;
        }
    }
    
    public function actionBuscarItemsTienda() {
        if (Yii::app()->request->isAjaxRequest) {
        //if (Yii::app()->request->isPostRequest) {
            $valor = isset($_POST['valor']) ? $_POST['valor'] : "";
            $op = isset($_POST['op']) ? $_POST['op'] : "";//tie_id
            $tieId = isset($_POST['tie_id']) ? $_POST['tie_id'] : "";//
            $arrayData = array();
            $data = new ARTICULO();
            $arrayData = $data->retornarBusArticuloTienda($valor,$tieId,$op);
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arrayData);
            return;
        }
    }
    
    public function actionManuales($op) {
        $ruta='';
        switch ($op) {
            case '7':
                $nombreDocumento='Pedidos_Tienda.pdf';
                $ruta=Yii::app()->basePath.'../../themes/seablue/images/manuales/Pedidos_Tienda.pdf';
                break;
            case '8':
                $nombreDocumento='Pedidos_Tienda.pdf';
                $ruta=Yii::app()->basePath.'../../themes/seablue/images/manuales/Pedidos_Tienda.pdf';
                break;
            case '10':
                $nombreDocumento='Conexion_Segura.pdf';
                $ruta=Yii::app()->basePath.'../../themes/seablue/images/manuales/Conexion_Segura.pdf';
                break;
            default:
                $nombreDocumento='Pedidos_Tienda.pdf';
                $ruta=Yii::app()->basePath.'../../themes/seablue/images/manuales/Pedidos_Tienda.pdf';
        }
        
        $this->renderPartial('descargarManual', array(
            'ruta' => $ruta,
            'nombreDocumento' => $nombreDocumento,
        ));
    }
    
    public function actionRevisarAdmin() {
        $model = new TEMP_CABPEDIDO();
        $tienda = new TIENDA;
        $cliente = new ARTICULOTIENDA; 
        $arrayData = array();
        //VSValidador::putMessageLogFile("llego6689");
        
        if (Yii::app()->request->isAjaxRequest) {
            //VSValidador::putMessageLogFile("llego6654");
            $contBuscar = isset($_POST['CONT_BUSCAR']) ? CJavaScript::jsonDecode($_POST['CONT_BUSCAR']) : array();
            //VSValidador::putMessageLogFile($contBuscar);
            $grupo = $contBuscar[0]['OP'];
            if($grupo==0){
                //Presenta por grupo
                $arrayData = $model->listarPedidosTiendasGrupoResumen($contBuscar);
                $this->renderPartial('_indexGridTiendaGrupoRes', array(
                    'model' => $arrayData,
                        ), false, true);
            }else{
                //Presenta independiente
                $arrayData = $model->listarPedidosTiendasResumen($contBuscar);
                $this->renderPartial('_indexGridTiendaRes', array(
                    'model' => $arrayData,
                        ), false, true);
            }          
            
            return;
            
        }
        $cli_Id=Yii::app()->getSession()->get('CliID', FALSE);
        $this->titleWindows = Yii::t('TIENDA', 'Administración de Pedidos');
        $this->render('revisaradmin', array(
            'model' => $model->listarPedidosTiendasResumen(null),
            //'tienda' => $tienda->recuperarTiendasRolCliente(0),
            'tienda' => $tienda->recuperarTiendasRol(),
            'area' => $tienda->recuperarClienteArea($cli_Id),
            'cliente' => $cliente->recuperarClientes(),
            'estado' => VSValidador::tipoAprobacion(),
            //'cliID' => $cli_Id,
        ));
        
        
        
    }
    
    
    public function actionClienteTienda() {
        if (Yii::app()->request->isPostRequest) {
            $model = new TIENDA;
            $ids = isset($_POST['DATA']) ? $_POST['DATA'] :'';
            //$arroout = $model->recuperarTiendasAdmin($ids);
            $arroout = $model->recuperarTiendasRolCliente($ids);
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arroout);
            return;
        }
    }
    public function actionClienteAreas() {
        if (Yii::app()->request->isPostRequest) {
            $model = new TIENDA;
            $ids = isset($_POST['DATA']) ? $_POST['DATA'] :'';
            $arroout = $model->recuperarClienteArea($ids);
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arroout);
            return;
        }
    }
    
    public function actionEnvPedAutGrupo() {
        if (Yii::app()->request->isPostRequest) {
            //$ids = base64_decode($_POST['ids']);
            $ids = isset($_POST['ids']) ? $_POST['ids'] : 0;
            $op = isset($_POST['op']) ? $_POST['op'] : '';
            $f_ini = isset($_POST['f_ini']) ? $_POST['f_ini'] : '';
            $f_fin = isset($_POST['f_fin']) ? $_POST['f_fin'] : '';
            $res = new CABPEDIDO;
            $dataMail = new mailSystem;
            $arroout = $res->insertarPedidosGrupo($ids,$op,$f_ini,$f_fin);
            //VSValidador::putMessageLogFile($arroout);
            $IdCab=$arroout["data"];
            //print_r($IdCab);
            for ($i = 0; $i < sizeof($IdCab); $i++) {
                $CabPed=$res->sendMailPedidos($IdCab[$i]['ids']);
                $htmlMail = $this->renderPartial('mensaje', array(
                'CabPed' => $CabPed,
                    ), true);
                $dataMail->enviarMail($htmlMail,$CabPed);
            }
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arroout);
        }
    }
    
    public function actionComentario() { 
        if (Yii::app()->request->isPostRequest) {
            $info = isset($_POST['info']) ? $_POST['info'] : "";
            $dataMail = new mailSystem;            
            $htmlMail='<div id="div-table">';
                $htmlMail.='<div class="trow">';
                        $htmlMail.='<p>';
                            $htmlMail.='<label class="titleLabel">Usuario: </label>'. Yii::app()->getSession()->get('user_name', FALSE) .'<br>     Nuestro Usuario hace el siguiente comentario!!! ';
                        $htmlMail.='</p>';
                $htmlMail.='</div>';
                $htmlMail.='<div class="trow">';
                        $htmlMail.='<p>';
                            $htmlMail.=$info;
                        $htmlMail.='</p>';
                $htmlMail.='</div>';
            $htmlMail.='</div>';            
            $arroout=$dataMail->enviarMensaje($htmlMail);
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arroout); 
            return;
        }
        $this->titleWindows = Yii::t('TIENDA', 'Comentarios');
        $this->render('comentario', array(         
            //'cliID' => $cli_Id,
        ));
    }

}