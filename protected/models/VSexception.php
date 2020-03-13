<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VSexception
 *
 * @author root
 */
class VSexception {

    //put your code here
    public function messageSystem($status,$error,$op,$message,$data) {
        $arroout["status"] = $status;
        $arroout["error"] = $error;
        $arroout["message"] = $this->messageError($op,$message);
        $arroout["data"] = $data;
        return $arroout;
    }
    
    public function messageFileXML($status,$nomDocfile,$ClaveAcceso,$op,$message,$data) {
        $arroout = array(
            'status' => $status,
            'nomDoc' => $nomDocfile,
            'ClaveAcceso' => $ClaveAcceso,
            'message' =>  $this->messageError($op,$message),
            'data' => $data
        );
        return $arroout;
    }
    
    public function messagePedidos($status,$numDoc,$nomDoc,$error,$op,$message,$data) {
        $arroout = array(
            'status' => $status,
            'documento' => ' Pedido Nº: '.$nomDoc.'-'.$numDoc,
            'error' => $error,
            'message' =>  $this->messageError($op,$message),
            'data' => $data
        );
        return $arroout;
    }
    
    private function messageError($op,$message){
        $messageError='';
        switch ($op) {
            case 1:
                //Documento no se Encontro.
                $messageError=Yii::t('EXCEPTION', 'Error document was not found.');
                break;
            case 2:
                $messageError=Yii::t('EXCEPTION', 'Gender xml file correctly.');
                break;
            case 3:
                $messageError=Yii::t('EXCEPTION', 'Failed to perform the signed document.');
                break;
            case 4:
                $messageError=Yii::t('EXCEPTION', 'Failed to perform the signed document.');
                break;
            case 6://Petion invalida volver a intentar
                //$messageError=Yii::t('EXCEPTION', 'Invalid request. Please do not repeatt this request again.');
                break;
            case 10://Petion invalida volver a intentar
                $messageError=Yii::t('EXCEPTION', '<strong>Well done!</strong> your information was successfully saved.');
                break;
            case 11://Petion invalida no volver a intentar
                $messageError=Yii::t('EXCEPTION', 'Invalid request. Please do not repeatt this request again.');
                break;
            case 12://Datos eliminados Correctamente
                $messageError=Yii::t('EXCEPTION', '<strong>Well done!</strong> your information was successfully delete.');
                break;
            case 20://La solicitud fÚe realizada correctamente.
                $messageError=Yii::t('EXCEPTION', 'The request was completed successfully.');
                break;
            case 21://No podemos encontrar los datos que está solicitando.
                $messageError=Yii::t('EXCEPTION', 'We can not find the information you are requesting.');
                break;
            case 30://Su Orden fue guardada correctamente.
                $messageError=Yii::t('EXCEPTION', '<strong>Well done!</strong> your order was successfully saved.');
                break;
            case 31://Su Orden fue guardada correctamente."REALIZADA"
                $messageError=Yii::t('EXCEPTION', '<strong>Well done!</strong> your order was successfully realized.');
                break;
            case 32://Su Orden fue guardada correctamente."AUTORIZADO"
                $messageError=Yii::t('EXCEPTION', '<strong>Well done!</strong> your order was successfully authorized.');
                break;
           
            
            default:
                $messageError=$message;
        }
        return $messageError;
    }

}
