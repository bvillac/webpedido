<?php

$opcion['TIP_DOC']='F4';//Tipo Documento
$opcion['NUM_DOC']='000117005';//Numero Documento
$opcion['OP']='1';//1=>todos los Registros y 2=> Un solo registro
//$obj = new NubeFactura;
//$obj->insertarFacturas($opcion);

/*
  echo dirname(__FILE__).'<br>';///var/www/html/websea/protected/views/nubeFactura
  echo $ruta = Yii::app()->basePath.'<br>';///var/www/html/websea/protected
  echo Yii::app()->theme->baseUrl.'<br>';///websea/themes/seablue
  echo Yii::app()->baseUrl; */

/****************** PRUEBA ERRORES SRI **********************/
$obj = new VSFirmaDigital;
//$obj->insertarFacturas();
$response=$obj->validarComprobante('FACTURA-001-001-000117033.xml');
//$response=$obj->validarComprobante('FACTURA-001-001-000117002.xml');XML=1
//$response=$obj->validarComprobante('FACTURA-001-001-000117001.xml');//XML=2
//$response=$obj->autorizacionComprobante('1711201401099236253700110010010001169769089035214');
//$response=$obj->autorizacionComprobante('1711201401099236253700110010010001169769089035214');//Ojo error de diferencias
//$response=$obj->autorizacionComprobante('1711201401099236253700110010010001169779089112915');//Autorizado Normal
//$response=$obj->autorizacionComprobante('1711201401099236253700110010010001170029091055410');//XML=1
//$response=$obj->autorizacionComprobante('1711201401099236253700110010010001170019090977718');//XML=2
//$response=$obj->autorizacionComprobante('1711201401099236253700110010010001170059091288519');//Esta OK

print_r($response);
//[status] => OK [error] => [message] => Respuesta Ok WebService: autorizacionComprobante [data]

//if($response['status']=='OK'){
//    $numeroAutorizacion=(int)$response['data']['RespuestaAutorizacionComprobante']['numeroComprobantes'];
//    $autorizacion=$response['data']['RespuestaAutorizacionComprobante']['autorizaciones']['autorizacion'];
//    if($numeroAutorizacion==1){//Verifica si Autorizo algun Comprobante Apesar de recibirlo Autorizo Comprobante
//        $obj->actualizaDocRecibidoSri($autorizacion,'148','FACTURA-001-001-000117005.xml',Yii::app()->params['seaDocAutFact'],Yii::app()->params['seaDocFact']);
//        $obj->newXMLDocRecibidoSri($autorizacion,'FACTURA-001-001-000117005.xml');
//        //print_r($response['data']);
//    }else{
//        //Ingresa si el Documento a intentado Varias AUTORIZACIONES
//        if($numeroAutorizacion>1){
//            for ($i = 0; $i < sizeof($autorizacion); $i++) {
//                $obj->actualizaDocRecibidoSri($autorizacion[$i],'148','FACTURA-001-001-000117005.xml',Yii::app()->params['seaDocAutFact'],Yii::app()->params['seaDocFact']);
//                if($autorizacion[$i]['estado']=='AUTORIZADO'){
//                    $obj->newXMLDocRecibidoSri($autorizacion[$i],'FACTURA-001-001-000117005.xml');
//                    break;//Si de todo el Recorrido Existe un Autorizado 
//                }
//            }
//        }
//    }
//}


?>