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
            default:
                $messageError=$message;
        }
        return $messageError;
    }

}
