<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VSacceso
 *
 * @author root
 */
class VSacceso {
    //put your code here
    public function menuModulosFrm() {
        $id=Yii::app()->getSession()->get('RolId', FALSE);//Rol del Usuario.
        $frmActivo=strtolower(Yii::app()->controller->route);
        $conApp = yii::app()->db;
        $rawData = array();
        $sql = "SELECT B.OMOD_ID,B.OMOD_PADRE_ID,B.OMOD_NOMBRE,B.MOD_ID,C.MOD_NOMBRE,B.OMOD_TIPO, "
                        ."B.OMOD_TIPO_BOTON,B.OMOD_ACCION,B.OMOD_FUNCTION,B.OMOD_ENTIDAD,B.OMOD_ORDEN "
                        ."FROM " . $conApp->dbname . ".OMODULO_ROL A "
                                ."INNER JOIN (" . $conApp->dbname . ".OBJETO_MODULO B "
                                                ."INNER JOIN " . $conApp->dbname . ".MODULO C "
                                                        ."ON C.MOD_ID=B.MOD_ID AND C.MOD_ESTADO_LOGICO) "
                                        ."ON A.OMOD_ID=B.OMOD_ID AND B.OMOD_ESTADO_LOGICO=1 "
                ."WHERE A.ROL_ID=$id AND A.OMROL_ESTADO_LOGICO=1 ORDER BY MOD_ID,OMOD_ORDEN";
        $rawData = $conApp->createCommand($sql)->queryAll(); //Varios registros =>  $rawData[0]['RazonSocial']
        $conApp->active = false;
        $auxInicio=0;
        $auxCierre=0;
        $auxInicio3=0;
        $auxCierre3=0;
        //$menulat='<li><a href="site/index.php"><i class="fa fa-dashboard fa-fw"></i>'.Yii::t('MENU','Begin').'</a></li>';
        $menulat='<li>';
            $menulat.=CHtml::link(Yii::t('MENU','Begin'),array('/site'),array('class' => 'fa fa-dashboard fa-fw'));;
        $menulat.='</li>';
        for ($i = 0; $i < count($rawData); $i++) {
            if($auxInicio!=$rawData[$i]['MOD_ID']){
                $auxInicio=$rawData[$i]['MOD_ID'];
                $menulat.='<li class="">';
                $menulat.=$this->recuperarMenu($rawData,$i);
                $maxCierre=$this->countMenu($rawData, $i,'MOD_ID');
                $auxCierre=1;
                if($rawData[$i]['OMOD_ID']==$rawData[$i]['OMOD_PADRE_ID']){//Verifico si Es Principal Cuando son iguales
                    $menulat.=$this->recuperarSubMenu($rawData,$i);//Menu Secundari..
                }
            }else{
                $auxCierre++;
                $cantSubMenu=$this->countMenu($rawData,$i,'OMOD_PADRE_ID');
                if($cantSubMenu==1){//Verifica si Solo tiene 1 Submenu
                    //Cuando Tieno Solo 1 ITEMS
                    if($rawData[$i]['OMOD_ID']==$rawData[$i]['OMOD_PADRE_ID']){//Verifico si Es Principal Cuando son iguales
                        $menulat.=$this->recuperarSubMenu($rawData,$i);//Menu Secundari..
                    }
                    $auxInicio3=0;
                }else{
                    //Cuando Tiene varios ITEMS osea 1 Tercer Nivel
                    if($auxInicio3!=$rawData[$i]['OMOD_PADRE_ID']){
                        $auxInicio3=$rawData[$i]['OMOD_PADRE_ID'];
                        $menulat.='<li class="">';
                        $menulat.=$this->recuperarMenu3Nivel($rawData,$i);
                        $menulat.=$this->recuperarSubMenu3Nivel($rawData,$i);//Tecer Nivel..
                        $auxCierre3=1;
                    }else{
                        $auxCierre3++;
                        $menulat.=$this->recuperarSubMenu3Nivel($rawData,$i);//Tecer Nivel..
                    }
                    $menulat.=($auxCierre3==$cantSubMenu)?'</ul></li>':'';//Cierre del Menu Tercer Nivel
                }
            }
            $menulat.=($auxCierre==$maxCierre)?'</ul></li>':'';//Cierre del Menu Modulo
        }
        //MANUALES DEL SISTEMA
        $menulat.='<li>';
            //https://fontawesome.com/v4.7.0/icons/
            //$menulat.=CHtml::link(Yii::t('MENU',' Manuales (PDF)'),array('/pEDIDOS/manuales','op'=>$id),array('class' => 'fa fa-download'));//Manual segun Rol
            //$menulat.=CHtml::link(Yii::t('MENU',' Conexión (PDF)'),array('/pEDIDOS/manuales','op'=>10),array('class' => 'fa fa-download'));//Conexion Segura
            $menulat.=CHtml::link(Yii::t('MENU',' Comentarios'),array('/pEDIDOS/comentario'),array('class' => 'fa fa-book'));//Comentarios
        $menulat.='</li>';
        return $menulat;
    }
    
    private function countMenu($key,$x,$campo){
        $cont=0;
        for ($i = $x; $i < count($key); $i++) {
            if($key[$x][$campo]==$key[$i][$campo]){
                $cont++;
            }else{
                break;
            }
        }
        return $cont;
    }
   
    private function recuperarMenu($key,$i){
        $result='';
        $result.='<a href="#">';
                $result.='<i class="fa fa-sitemap fa-fw"></i>'; 
                    $result.=$key[$i]['MOD_NOMBRE'];
                $result.='<span class="fa arrow"></span>';
        $result.='</a>';
        $result.='<ul class="nav nav-second-level collapse" style="height: 0px;">';
        return $result;
    }
    
    private function recuperarMenu3Nivel($key,$i){
        $result='';
        $result.='<a href="#">';
                $result.='<i class="fa fa-sitemap fa-fw"></i>'; 
                        $result.=$key[$i]['OMOD_NOMBRE'];
                $result.='<span class="fa arrow"></span>';
        $result.='</a>';
        $result.='<ul class="nav nav-third-level collapse in" style="height: auto;">';
        return $result;
    }
    
    private function recuperarSubMenu($key,$i){
        $result='';
        $imglink='<i class="fa fa-edit fa-fw"></i>';
        $result.='<li>';
            $result.=CHtml::link($imglink . Yii::t('MENU', $key[$i]['OMOD_NOMBRE']), array($key[$i]['OMOD_ACCION'])); 
        $result.='</li>';
        return $result;
    }
    
    private function recuperarSubMenu3Nivel($key,$i){
        $result='<li>';
            $result.=CHtml::link(Yii::t('MENU', $key[$i]['OMOD_NOMBRE']), array($key[$i]['OMOD_ACCION'])); 
        $result.='</li>';
        return $result;
    }
    
}
