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
        $rutaFileWebP=Yii::app()->theme->baseUrl.Yii::app()->params["rutapro"].$codigo."_P-01.jpg";
        $rutaFileWebG=Yii::app()->theme->baseUrl.Yii::app()->params["rutapro"].$codigo."_G-01.jpg";
        $rutaFile=YiiBase::getPathOfAlias("webroot").Yii::app()->params["rutafilePro"].$codigo."_G-01.jpg"; 
        //$rutaFileWebP=Yii::app()->params["rutapro"].$codigo."_P-01.jpg";
        //$rutaFileWebG=Yii::app()->params["rutapro"].$codigo."_G-01.jpg";
        //$rutaFile=Yii::app()->params["rutafilePro"].$codigo."_G-01.jpg";
        //VSValidador::putMessageLogFile($rutaFile);
        if(file_exists($rutaFile)){
          //return CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . Yii::app()->params['rutaIconos'] . 'search.png'),$rutaFileWeb,array("data-lightbox"=>$codigo."_G-01"));
          return CHtml::link(CHtml::image($rutaFileWebP,null,array('width'=>40,'height'=>40)),$rutaFileWebG,array("data-lightbox"=>$codigo."_G-01"));
        }else{
          return ;
        }
        
    }
    
    public static function mostrarIconos($TbGtable,$codigo,$icono) {        
        $rutaIconos=Yii::app()->theme->baseUrl . Yii::app()->params['rutaIconos'];
        //VSValidador::putMessageLogFile($rutaIconos);
        return CHtml::link(CHtml::image($rutaIconos.$icono),null,array("onclick"=>"javascript:eliminarItemsListas('$codigo','$TbGtable')"));
    }
    
    public static function eliminarDatos($Funcion,$TbGtable,$codigo,$icono) {        
        $rutaIconos=Yii::app()->theme->baseUrl . Yii::app()->params['rutaIconos'];
        //VSValidador::putMessageLogFile($rutaIconos);
        return CHtml::link(CHtml::image($rutaIconos.$icono),null,array("onclick"=>"javascript:$Funcion('$codigo','$TbGtable')"));
    }
    
    public static function asignarDatos($Funcion,$TbGtable,$codigo,$icono) {        
        $rutaIconos=Yii::app()->theme->baseUrl . Yii::app()->params['rutaIconos'];
        return CHtml::link(CHtml::image($rutaIconos.$icono),null,array("onclick"=>"javascript:$Funcion('$codigo','$TbGtable')"));
    }

    public static function activarDatos($Funcion,$TbGtable,$codigo,$estado,$icono) {        
        $rutaIconos=Yii::app()->theme->baseUrl . Yii::app()->params['rutaIconos'];
        //$estado=($estado=="1")?"0":"1";
        return CHtml::link(CHtml::image($rutaIconos.$icono),null,array("onclick"=>"javascript:$Funcion('$codigo','$estado','$TbGtable')"));
    }
    
    public static function tipoAprobacion() {
        return array(
            '1' => Yii::t('TIENDA', 'Realizado'),//Pedido
            '2' => Yii::t('TIENDA', 'Facturado'),//Atendido
            '3' => Yii::t('TIENDA', 'Authorized'),//Autorizado
            '4' => Yii::t('TIENDA', 'Canceled'),//Cancelado 
            //'5' => Yii::t('TIENDA', 'Revised'),//Revisado
        );
    }
    public static function estadoAprobacion($estado) {
        switch ($estado) {
            Case "1":
                $valRes = Yii::t('TIENDA', 'Realizado');//Order
                break;
            Case "2":
                $valRes = Yii::t('TIENDA', 'Facturado');
                break;
            Case "3":
                $valRes = Yii::t('TIENDA', 'Authorized');
                break;
            Case "4":
                $valRes = Yii::t('TIENDA', 'Canceled');//USAR ESTE CODIGO PARA QUE APARESCA EN LA LISTA
                break;
//            Case "5":
//                $valRes = Yii::t('TIENDA', 'Revised');
//                break;
            
            default:
                $valRes = "Error";
        }
        return $valRes;
    }

    public static function generateRandomString($length = 8) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }
    
}
