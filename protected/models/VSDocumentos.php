<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class VSDocumentos {

    public function mostrarDocumentos($control) {
        $rawData = array();
        $con = Yii::app()->dbvsseaint;
        
        $sql = "SELECT A.IdFactura IdDoc,A.Estado,A.CodigoTransaccionERP,A.SecuencialERP,A.UsuarioCreador,
                        A.FechaAutorizacion,A.AutorizacionSRI,
                        CONCAT(A.Establecimiento,'-',A.PuntoEmision,'-',A.Secuencial) NumDocumento,
                        A.FechaEmision,A.IdentificacionComprador,A.RazonSocialComprador,
                        A.TotalSinImpuesto,A.TotalDescuento,A.Propina,A.ImporteTotal,
                        B.*,C.Descripcion NombreDocumento,A.AutorizacionSri,A.ClaveAcceso,A.FechaAutorizacion
                        FROM " . $con->dbname . ".NubeFactura A
                                INNER JOIN " . $con->dbname . ".NubeFacturaImpuesto B
                                        ON A.IdFactura=B.IdFactura
                                INNER JOIN VSSEA.VSDirectorio C
                                        ON A.CodigoDocumento=C.TipoDocumento
                WHERE A.Estado='1' AND A.CodigoDocumento='01' ";
        
        
//         if (!empty($control)) {//Verifica la Opcion op para los filtros
//            $sql .= ($control[0]['TIPO_DESCARGO'] != "0") ? " AND A.TDES_ID = '" . $control[0]['TIPO_DESCARGO'] . "' " : " ";
//            $sql .= ($control[0]['COMPANIA'] != "0") ? "AND A.EMP_ID = '" . $control[0]['COMPANIA'] . "' " : "";
//            $sql .= ($control[0]['COD_PACIENTE'] != "0") ? "AND CDOR_ID_PACIENTE='".$control[0]['COD_PACIENTE']."' " : "";
//            //$sql .= ($control[0]['PACIENTE'] != "") ? "AND CONCAT(B.PER_APELLIDO,' ',B.PER_NOMBRE) LIKE '%" . $control[0]['PACIENTE'] . "%' " : "";
//            $sql .= "AND DATE(A.CDOR_FECHA_INGRESO) BETWEEN '" . date("Y-m-d", strtotime($control[0]['F_INI'])) . "' AND '" . date("Y-m-d", strtotime($control[0]['F_FIN'])) . "' ";
//        
//        }

        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;

        return new CArrayDataProvider($rawData, array(
            'keyField' => 'IdDoc',
            'sort' => array(
                'attributes' => array(
                    'IdDoc','Estado','CodigoTransaccionERP', 'SecuencialERP', 'UsuarioCreador',
                    'FechaAutorizacion', 'AutorizacionSRI', 'NumDocumento', 'FechaEmision', 'IdentificacionComprador',
                    'RazonSocialComprador', 'ImporteTotal', 'NombreDocumento', 
                ),
            ),
            'totalItemCount' => count($rawData),
            'pagination' => array(
                'pageSize' => Yii::app()->params['pageSize'],
            //'itemCount'=>count($rawData),
            ),
        ));
    }
    
    public function recuperarTipoDocumentos() {
        $con = yii::app()->dbvssea;
        $sql = "SELECT idDirectorio,TipoDocumento,Descripcion,Ruta 
                FROM " . $con->dbname . ".VSDirectorio WHERE Estado=1;";
        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;
        return $rawData;
    }
    
    public function mostrarCabFactura($id,$tdoc) {
        $rawData = array();
        $con = Yii::app()->dbvsseaint;
        $sql = "SELECT A.IdFactura IdDoc,A.Estado,A.CodigoTransaccionERP,A.SecuencialERP,A.UsuarioCreador,
                        A.FechaAutorizacion,A.AutorizacionSRI,
                        CONCAT(A.Establecimiento,'-',A.PuntoEmision,'-',A.Secuencial) NumDocumento,
                        A.FechaEmision,A.IdentificacionComprador,A.RazonSocialComprador,
                        A.TotalSinImpuesto,A.TotalDescuento,A.Propina,A.ImporteTotal,
                        B.*,C.Descripcion NombreDocumento,A.AutorizacionSri,A.ClaveAcceso,A.FechaAutorizacion
                        FROM " . $con->dbname . ".NubeFactura A
                                INNER JOIN " . $con->dbname . ".NubeFacturaImpuesto B
                                        ON A.IdFactura=B.IdFactura
                                INNER JOIN VSSEA.VSDirectorio C
                                        ON A.CodigoDocumento=C.TipoDocumento
                WHERE A.Estado<>'0' AND A.CodigoDocumento='$tdoc' AND A.IdFactura =$id ";
        $rawData = $con->createCommand($sql)->queryRow();//Recupera Solo 1
        $con->active = false;
        return $rawData;
    }

}
