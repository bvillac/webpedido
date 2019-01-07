<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class VSValidador {
    
    public function tipoIdent($cedula){
        $valor='07';//Consumidor Final por Defecto
        IF(strlen($cedula)>10) {
            IF(strlen($cedula)==13){
                $valor='04';//VENTA CON RUC
            }ELSEIF(strlen($cedula)>13){
                $valor='06';//VENTA CON PASAPORTE
            }
        }ELSE{
            IF($cedula==Yii::app()->params['consumidorfinal']){//Esta vericacion depende de la empresa
                $valor='07';//VENTA A CONSUMIDOR FINAL*  SON 13 DIGITOS
            }ELSE{
                $valor='05';//VENTA CON CEDULA
            }
        }
        return $valor;

    }
    public function ajusteNumDoc($numDoc,$num){
        $result='';
        IF(strlen($numDoc)<$num){
            $result=$this->add_ceros($numDoc,$num);//Ajusta los 9
        }ELSE{
            $result=substr($numDoc, -($num));//Extrae Solo 9
        }
        return $result;
    }
    public function add_ceros($numero, $ceros) {
        /* Ejemplos para usar.
          $numero="123";
          echo add_ceros($numero,8) */
        $order_diez = explode(".", $numero);
        $dif_diez = $ceros - strlen($order_diez[0]);
        for ($m = 0; $m < $dif_diez; $m++) {
            @$insertar_ceros .= 0;
        }
        return $insertar_ceros .= $numero;
    }
    
    public static function putMessageLogFile($message) {
        if (is_array($message))
            $message = CJavaScript::jsonEncode($message);
        $message = date("Y-m-d H:i:s") . " " . $message . "\n";
        if (!is_dir(dirname(Yii::app()->params["logfile"]))) {
            mkdir(dirname(Yii::app()->params["logfile"]), 0777, true);
            chmod(dirname(Yii::app()->params["logfile"]), 0777);
            touch(Yii::app()->params["logfile"]);
        }
        //se escribe en el fichero
        file_put_contents(Yii::app()->params["logfile"], $message, FILE_APPEND | LOCK_EX);
    }
    public static function mostrarProductos($codigo) {
        //'value' => 'CHtml::link("ver",Yii::app()->theme->baseUrl.Yii::app()->params["rutapro"].$data["Codigo"]."_G-01.jpg",array("data-lightbox"=>$data["Codigo"]."_G-01"))',
        $rutaFileWeb=Yii::app()->theme->baseUrl.Yii::app()->params["rutapro"].$codigo."_G-01.jpg";
        $rutaFile=YiiBase::getPathOfAlias("webroot").Yii::app()->params["rutafilePro"].$codigo."_G-01.jpg"; 
        if(file_exists($rutaFile)){
          //return CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . Yii::app()->params['rutaIconos'] . 'search.png'),$rutaFileWeb,array("data-lightbox"=>$codigo."_G-01"));
          return CHtml::link(CHtml::image($rutaFileWeb,null,array('width'=>40,'height'=>40)),$rutaFileWeb,array("data-lightbox"=>$codigo."_G-01"));
        }else{
          return ;
        }
        
    }
    
}
