<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class VSDocumentos extends VsSeaIntermedia {

    public function mostrarDocumentos($control) {
        $rawData = array();
        $con = Yii::app()->dbvssea;

        $sql = "SELECT A.IdCompania,A.Ruc,A.RazonSocial,A.NombreComercial,A.DireccionMatriz 
                    FROM " . $con->dbname . ".VSCompania A WHERE A.Estado='1'";
        
         if (!empty($control)) {//Verifica la Opcion op para los filtros
            $sql .= ($control[0]['TIPO_DESCARGO'] != "0") ? " AND A.TDES_ID = '" . $control[0]['TIPO_DESCARGO'] . "' " : " ";
            $sql .= ($control[0]['COMPANIA'] != "0") ? "AND A.EMP_ID = '" . $control[0]['COMPANIA'] . "' " : "";
            $sql .= ($control[0]['COD_PACIENTE'] != "0") ? "AND CDOR_ID_PACIENTE='".$control[0]['COD_PACIENTE']."' " : "";
            //$sql .= ($control[0]['PACIENTE'] != "") ? "AND CONCAT(B.PER_APELLIDO,' ',B.PER_NOMBRE) LIKE '%" . $control[0]['PACIENTE'] . "%' " : "";
            $sql .= "AND DATE(A.CDOR_FECHA_INGRESO) BETWEEN '" . date("Y-m-d", strtotime($control[0]['F_INI'])) . "' AND '" . date("Y-m-d", strtotime($control[0]['F_FIN'])) . "' ";
        
        }

        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;

        return new CArrayDataProvider($rawData, array(
            'keyField' => 'IdCompania',
            'sort' => array(
                'attributes' => array(
                    'IdCompania', 'Ruc', 'RazonSocial', 'NombreComercial', 'DireccionMatriz',
                ),
            ),
            'totalItemCount' => count($rawData),
            'pagination' => array(
                'pageSize' => Yii::app()->params['pageSize'],
            //'itemCount'=>count($rawData),
            ),
        ));
    }

}
