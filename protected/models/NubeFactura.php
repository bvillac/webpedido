<?php

/**
 * This is the model class for table "NubeFactura".
 *
 * The followings are the available columns in table 'NubeFactura':
 * @property string $IdFactura
 * @property string $AutorizacionSRI
 * @property string $FechaAutorizacion
 * @property integer $Ambiente
 * @property integer $TipoEmision
 * @property string $RazonSocial
 * @property string $NombreComercial
 * @property string $Ruc
 * @property string $ClaveAcceso
 * @property string $CodigoDocumento
 * @property string $Establecimiento
 * @property string $PuntoEmision
 * @property string $Secuencial
 * @property string $DireccionMatriz
 * @property string $FechaEmision
 * @property string $DireccionEstablecimiento
 * @property string $ContribuyenteEspecial
 * @property string $ObligadoContabilidad
 * @property string $TipoIdentificacionComprador
 * @property string $GuiaRemision
 * @property string $RazonSocialComprador
 * @property string $IdentificacionComprador
 * @property string $TotalSinImpuesto
 * @property string $TotalDescuento
 * @property string $Propina
 * @property string $ImporteTotal
 * @property string $Moneda
 * @property string $UsuarioCreador
 * @property string $EmailResponsable
 * @property string $EstadoDocumento
 * @property string $DescripcionError
 * @property string $CodigoError
 * @property string $DirectorioDocumento
 * @property string $NombreDocumento
 * @property integer $GeneradoXls
 * @property string $SecuencialERP
 * @property string $CodigoTransaccionERP
 * @property integer $Estado
 * @property string $FechaCarga
 * @property string $IdLote
 *
 * The followings are the available model relations:
 * @property NubeDatoAdicionalFactura[] $nubeDatoAdicionalFacturas
 * @property NubeDetalleFactura[] $nubeDetalleFacturas
 * @property NubeFacturaImpuesto[] $nubeFacturaImpuestos
 */
class NubeFactura extends VsSeaIntermedia {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        $dbname = parent::$dbname;
        if ($dbname != "")
            $dbname.=".";
        return $dbname . 'NubeFactura'; //Empresas es la Utilizada.
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Ambiente, TipoEmision, GeneradoXls, Estado', 'numerical', 'integerOnly' => true),
            array('AutorizacionSRI, EmailResponsable, CodigoError, DirectorioDocumento', 'length', 'max' => 100),
            array('RazonSocial, NombreComercial, DireccionMatriz, DireccionEstablecimiento, RazonSocialComprador, UsuarioCreador, DescripcionError, NombreDocumento', 'length', 'max' => 300),
            array('Ruc, GuiaRemision', 'length', 'max' => 20),
            array('ClaveAcceso, ContribuyenteEspecial, CodigoTransaccionERP, IdLote', 'length', 'max' => 50),
            array('CodigoDocumento, ObligadoContabilidad, TipoIdentificacionComprador', 'length', 'max' => 2),
            array('Establecimiento, PuntoEmision', 'length', 'max' => 3),
            array('Secuencial, Moneda', 'length', 'max' => 15),
            array('IdentificacionComprador', 'length', 'max' => 13),
            array('TotalSinImpuesto, TotalDescuento, Propina, ImporteTotal', 'length', 'max' => 19),
            array('EstadoDocumento', 'length', 'max' => 25),
            array('SecuencialERP', 'length', 'max' => 30),
            array('FechaAutorizacion, FechaEmision, FechaCarga', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('IdFactura, AutorizacionSRI, FechaAutorizacion, Ambiente, TipoEmision, RazonSocial, NombreComercial, Ruc, ClaveAcceso, CodigoDocumento, Establecimiento, PuntoEmision, Secuencial, DireccionMatriz, FechaEmision, DireccionEstablecimiento, ContribuyenteEspecial, ObligadoContabilidad, TipoIdentificacionComprador, GuiaRemision, RazonSocialComprador, IdentificacionComprador, TotalSinImpuesto, TotalDescuento, Propina, ImporteTotal, Moneda, UsuarioCreador, EmailResponsable, EstadoDocumento, DescripcionError, CodigoError, DirectorioDocumento, NombreDocumento, GeneradoXls, SecuencialERP, CodigoTransaccionERP, Estado, FechaCarga, IdLote', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'nubeDatoAdicionalFacturas' => array(self::HAS_MANY, 'NubeDatoAdicionalFactura', 'IdFactura'),
            'nubeDetalleFacturas' => array(self::HAS_MANY, 'NubeDetalleFactura', 'IdFactura'),
            'nubeFacturaImpuestos' => array(self::HAS_MANY, 'NubeFacturaImpuesto', 'IdFactura'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'IdFactura' => 'Id Factura',
            'AutorizacionSRI' => 'Autorizacion Sri',
            'FechaAutorizacion' => 'Fecha Autorizacion',
            'Ambiente' => 'Ambiente',
            'TipoEmision' => 'Tipo Emision',
            'RazonSocial' => 'Razon Social',
            'NombreComercial' => 'Nombre Comercial',
            'Ruc' => 'Ruc',
            'ClaveAcceso' => 'Clave Acceso',
            'CodigoDocumento' => 'Codigo Documento',
            'Establecimiento' => 'Establecimiento',
            'PuntoEmision' => 'Punto Emision',
            'Secuencial' => 'Secuencial',
            'DireccionMatriz' => 'Direccion Matriz',
            'FechaEmision' => 'Fecha Emision',
            'DireccionEstablecimiento' => 'Direccion Establecimiento',
            'ContribuyenteEspecial' => 'Contribuyente Especial',
            'ObligadoContabilidad' => 'Obligado Contabilidad',
            'TipoIdentificacionComprador' => 'Tipo Identificacion Comprador',
            'GuiaRemision' => 'Guia Remision',
            'RazonSocialComprador' => 'Razon Social Comprador',
            'IdentificacionComprador' => 'Identificacion Comprador',
            'TotalSinImpuesto' => 'Total Sin Impuesto',
            'TotalDescuento' => 'Total Descuento',
            'Propina' => 'Propina',
            'ImporteTotal' => 'Importe Total',
            'Moneda' => 'Moneda',
            'UsuarioCreador' => 'Usuario Creador',
            'EmailResponsable' => 'Email Responsable',
            'EstadoDocumento' => 'Estado Documento',
            'DescripcionError' => 'Descripcion Error',
            'CodigoError' => 'Codigo Error',
            'DirectorioDocumento' => 'Directorio Documento',
            'NombreDocumento' => 'Nombre Documento',
            'GeneradoXls' => 'Generado Xls',
            'SecuencialERP' => 'Secuencial Erp',
            'CodigoTransaccionERP' => 'Codigo Transaccion Erp',
            'Estado' => 'Estado',
            'FechaCarga' => 'Fecha Carga',
            'IdLote' => 'Id Lote',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('IdFactura', $this->IdFactura, true);
        $criteria->compare('AutorizacionSRI', $this->AutorizacionSRI, true);
        $criteria->compare('FechaAutorizacion', $this->FechaAutorizacion, true);
        $criteria->compare('Ambiente', $this->Ambiente);
        $criteria->compare('TipoEmision', $this->TipoEmision);
        $criteria->compare('RazonSocial', $this->RazonSocial, true);
        $criteria->compare('NombreComercial', $this->NombreComercial, true);
        $criteria->compare('Ruc', $this->Ruc, true);
        $criteria->compare('ClaveAcceso', $this->ClaveAcceso, true);
        $criteria->compare('CodigoDocumento', $this->CodigoDocumento, true);
        $criteria->compare('Establecimiento', $this->Establecimiento, true);
        $criteria->compare('PuntoEmision', $this->PuntoEmision, true);
        $criteria->compare('Secuencial', $this->Secuencial, true);
        $criteria->compare('DireccionMatriz', $this->DireccionMatriz, true);
        $criteria->compare('FechaEmision', $this->FechaEmision, true);
        $criteria->compare('DireccionEstablecimiento', $this->DireccionEstablecimiento, true);
        $criteria->compare('ContribuyenteEspecial', $this->ContribuyenteEspecial, true);
        $criteria->compare('ObligadoContabilidad', $this->ObligadoContabilidad, true);
        $criteria->compare('TipoIdentificacionComprador', $this->TipoIdentificacionComprador, true);
        $criteria->compare('GuiaRemision', $this->GuiaRemision, true);
        $criteria->compare('RazonSocialComprador', $this->RazonSocialComprador, true);
        $criteria->compare('IdentificacionComprador', $this->IdentificacionComprador, true);
        $criteria->compare('TotalSinImpuesto', $this->TotalSinImpuesto, true);
        $criteria->compare('TotalDescuento', $this->TotalDescuento, true);
        $criteria->compare('Propina', $this->Propina, true);
        $criteria->compare('ImporteTotal', $this->ImporteTotal, true);
        $criteria->compare('Moneda', $this->Moneda, true);
        $criteria->compare('UsuarioCreador', $this->UsuarioCreador, true);
        $criteria->compare('EmailResponsable', $this->EmailResponsable, true);
        $criteria->compare('EstadoDocumento', $this->EstadoDocumento, true);
        $criteria->compare('DescripcionError', $this->DescripcionError, true);
        $criteria->compare('CodigoError', $this->CodigoError, true);
        $criteria->compare('DirectorioDocumento', $this->DirectorioDocumento, true);
        $criteria->compare('NombreDocumento', $this->NombreDocumento, true);
        $criteria->compare('GeneradoXls', $this->GeneradoXls);
        $criteria->compare('SecuencialERP', $this->SecuencialERP, true);
        $criteria->compare('CodigoTransaccionERP', $this->CodigoTransaccionERP, true);
        $criteria->compare('Estado', $this->Estado);
        $criteria->compare('FechaCarga', $this->FechaCarga, true);
        $criteria->compare('IdLote', $this->IdLote, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return NubeFactura the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function insertarFacturas() {
        $con = Yii::app()->dbvsseaint;
        $trans = $con->beginTransaction();
        $objEmpData= new EMPRESA;
        /****VARIBLES DE SESION*******/
        $emp_id=Yii::app()->getSession()->get('emp_id', FALSE);
        $est_id=Yii::app()->getSession()->get('est_id', FALSE);
        $pemi_id=Yii::app()->getSession()->get('pemi_id', FALSE);
        try {
            $cabFact = $this->buscarFacturas();
            $empresaEnt=$objEmpData->buscarDataEmpresa($emp_id,$est_id,$pemi_id);//recuperar info deL Contribuyente
            $codDoc='01';//Documento Factura
            for ($i = 0; $i < sizeof($cabFact); $i++) {
                $this->InsertarCabFactura($con,$cabFact, $empresaEnt,$codDoc, $i);
                $idCab = $con->getLastInsertID($con->dbname . '.NubeFactura');
                $detFact=$this->buscarDetFacturas($cabFact[$i]['TIP_NOF'],$cabFact[$i]['NUM_NOF']);
                $this->InsertarDetFactura($con,$detFact,$idCab);
            }
            $trans->commit();
            $con->active = false;
            $this->actualizaErpCabFactura($cabFact);
            echo "ERP Actualizado";
            return true;
        } catch (Exception $e) {
            $trans->rollback();
            $con->active = false;
            throw $e;
            return false;
        }   
    }

    private function buscarFacturas() {
        $conCont = yii::app()->dbcont;
        $rawData = array();
        //$sql = "SELECT TIP_NOF,CONCAT(REPEAT('0',9-LENGTH(RIGHT(NUM_NOF,9))),RIGHT(NUM_NOF,9)) NUM_NOF,
        $sql = "SELECT TIP_NOF, NUM_NOF,
                        CED_RUC,NOM_CLI,FEC_VTA,DIR_CLI,VAL_BRU,POR_DES,VAL_DES,VAL_FLE,BAS_IVA,
                        BAS_IV0,POR_IVA,VAL_IVA,VAL_NET,POR_R_F,VAL_R_F,POR_R_I,VAL_R_I,GUI_REM,0 PROPINA
                    FROM " . $conCont->dbname . ".VC010101 
                WHERE IND_UPD='L' AND FEC_VTA>'2014-05-01' AND ENV_DOC='0' LIMIT 2";

        //echo $sql;
        $rawData = $conCont->createCommand($sql)->queryAll();
        $conCont->active = false;
        return $rawData;
    }
    private function buscarDetFacturas($tipDoc,$numDoc) {
        $conCont = yii::app()->dbcont;
        $rawData = array();
        $sql = "SELECT TIP_NOF,NUM_NOF,FEC_VTA,COD_ART,NOM_ART,CAN_DES,P_VENTA,
                        T_VENTA,VAL_DES,I_M_IVA,VAL_IVA
                    FROM " . $conCont->dbname . ".VD010101
                WHERE TIP_NOF='$tipDoc' AND NUM_NOF='$numDoc' AND IND_EST='L'";
        //echo $sql;
        $rawData = $conCont->createCommand($sql)->queryAll();
        $conCont->active = false;
        return $rawData;
    }
    
    private function InsertarCabFactura($con,$objEnt,$objEmp,$codDoc,$i) {
        $valida=new VSValidador();
        $tip_iden=$valida->tipoIdent($objEnt[$i]['CED_RUC']);
        $Secuencial=$valida->ajusteNumDoc($objEnt[$i]['NUM_NOF'],9);
        //$GuiaRemi=$valida->ajusteNumDoc($objEnt[$i]['GUI_REM'],9);
        $GuiaRemi=(strlen($objEnt[$i]['GUI_REM'])>0)?$objEmp['Establecimiento'].'-'.$objEmp['PuntoEmision'].'-'.$valida->ajusteNumDoc($objEnt[$i]['GUI_REM'],9):'';
        $ced_ruc=($tip_iden=='07')?'9999999999999':$objEnt[$i]['CED_RUC'];
        /*Datos para Genera Clave*/
        //$tip_doc,$fec_doc,$ruc,$ambiente,$serie,$numDoc,$tipoemision
        $objCla=new VSClaveAcceso();
        $serie=$objEmp['Establecimiento'].$objEmp['PuntoEmision'];
        $fec_doc=date("Y-m-d", strtotime($objEnt[0]['FEC_VTA']));
        $ClaveAcceso=$objCla->claveAcceso($codDoc,$fec_doc,$objEmp['Ruc'],$objEmp['Ambiente'],$serie,$Secuencial,$objEmp['TipoEmision']);
        /*************************/
        $sql = "INSERT INTO " . $con->dbname . ".NubeFactura
                            (Ambiente,TipoEmision, RazonSocial, NombreComercial, Ruc,ClaveAcceso,CodigoDocumento, Establecimiento,
                            PuntoEmision, Secuencial, DireccionMatriz, FechaEmision, DireccionEstablecimiento, ContribuyenteEspecial,
                            ObligadoContabilidad, TipoIdentificacionComprador, GuiaRemision, RazonSocialComprador, IdentificacionComprador,
                            TotalSinImpuesto, TotalDescuento, Propina, ImporteTotal, Moneda, SecuencialERP, CodigoTransaccionERP,Estado,FechaCarga) VALUES (
                            '" . $objEmp['Ambiente'] . "',
                            '" . $objEmp['TipoEmision'] . "',
                            '" . $objEmp['RazonSocial'] . "',
                            '" . $objEmp['NombreComercial'] . "',
                            '" . $objEmp['Ruc'] . "',
                            '$ClaveAcceso',
                            '$codDoc',
                            '" . $objEmp['Establecimiento'] . "',
                            '" . $objEmp['PuntoEmision'] . "',
                            '$Secuencial',
                            '" . $objEmp['DireccionMatriz'] . "', 
                            '$fec_doc', 
                            '" . $objEmp['DireccionMatriz'] . "', 
                            '" . $objEmp['ContribuyenteEspecial'] . "', 
                            '" . $objEmp['ObligadoContabilidad'] . "', 
                            '$tip_iden', 
                            '$GuiaRemi',               
                            '" . $objEnt[$i]['NOM_CLI'] . "', 
                            '$ced_ruc', 
                            '" . $objEnt[$i]['VAL_BRU'] . "', 
                            '" . $objEnt[$i]['VAL_DES'] . "', 
                            '" . $objEnt[$i]['PROPINA'] . "', 
                            '" . $objEnt[$i]['VAL_NET'] . "', 
                            '" . $objEmp['Moneda'] . "', 
                            '$Secuencial', 
                            '" . $objEnt[0]['TIP_NOF'] . "',
                            '1',CURRENT_TIMESTAMP() )";
                            

                            //"@Ambiente,@TipoEmision,@RazonSocial,@NombreComercial,@Ruc,@CodigoDocumento,@Establecimiento, " &
                            //"@PuntoEmision,@Secuencial,@DireccionMatriz,@FechaEmision,@DireccionEstablecimiento,@ContribuyenteEspecial, " &
                            //"@ObligadoContabilidad,@TipoIdentificacionComprador,@GuiaRemision,@RazonSocialComprador,@IdentificacionComprador," &
                            //"@TotalSinImpuesto,@TotalDescuento,@Propina,@ImporteTotal,@Moneda,@SecuencialERP,@CodigoTransaccionERP,@Estado,GETDATE()) " &
                            //" SELECT @@IDENTITY";

        //DATE(" . $cabOrden[0]['CDOR_FECHA_INGRESO'] . "),
        //$sql .= "AND DATE(A.CDOR_FECHA_INGRESO) BETWEEN '" . date("Y-m-d", strtotime($control[0]['F_INI'])) . "' AND '" . date("Y-m-d", strtotime($control[0]['F_FIN'])) . "' ";
        //echo $sql;
        $command = $con->createCommand($sql);
        $command->execute();
    }
    
    private function InsertarDetFactura($con,$detFact,$idCab) {
        $valSinImp = 0;
        $val_iva12 = 0;
        $vet_iva12 = 0;
        $val_iva0 = 0;
        $vet_iva0 = 0;
        //TIP_NOF,NUM_NOF,FEC_VTA,COD_ART,NOM_ART,CAN_DES,P_VENTA,T_VENTA,VAL_DES,I_M_IVA,VAL_IVA
        for ($i = 0; $i < sizeof($detFact); $i++) {
            $valSinImp=floatval($detFact[$i]['T_VENTA'])-floatval($detFact[$i]['VAL_DES']);
            if($detFact[$i]['I_M_IVA']=='1'){
                $val_iva12 = $val_iva12 + floatval($detFact[$i]['VAL_IVA']);
                $vet_iva12 = $vet_iva12 + $valSinImp;
            }else{
                $val_iva0 = 0;
                $vet_iva0 = $vet_iva0 + $valSinImp;
            }
            
            $sql = "INSERT INTO " . $con->dbname . ".NubeDetalleFactura 
                    (CodigoPrincipal,CodigoAuxiliar,Descripcion,Cantidad,PrecioUnitario,Descuento,PrecioTotalSinImpuesto,IdFactura) VALUES (
                    '" . $detFact[$i]['COD_ART'] . "', 
                    '1',
                    '" . $detFact[$i]['NOM_ART'] . "', 
                    '" . $detFact[$i]['CAN_DES'] . "',
                    '" . $detFact[$i]['P_VENTA'] . "',
                    '" . $detFact[$i]['VAL_DES'] . "',
                    '$valSinImp',
                    '$idCab')";
            $command = $con->createCommand($sql);
            $command->execute();
            $idDet = $con->getLastInsertID($con->dbname . '.NubeDetalleFactura');
            if($detFact[$i]['I_M_IVA']=='1'){//Verifico si el ITEM tiene Impuesto
                //Segun Datos Sri
                $this->InsertarDetImpFactura($con,$idDet,'2','2','12',$valSinImp,$detFact[$i]['VAL_IVA']);//12%
            }else{//Caso Contrario no Genera Impuesto
                $this->InsertarDetImpFactura($con,$idDet,'2','0','0',$valSinImp,$detFact[$i]['VAL_IVA']);//0%
            }
        }
        //Insertar Datos de Iva 0%
        If ($vet_iva0 > 0){
            $this->InsertarFacturaImpuesto($con,$idCab,'2','0','0', $vet_iva0,$val_iva0);
        }
        //Inserta Datos de Iva 12
        If ($vet_iva12 > 0){
            $this->InsertarFacturaImpuesto($con,$idCab,'2','2','12', $vet_iva12,$val_iva12);
        }
            
    }
    private function InsertarDetImpFactura($con,$idDet,$codigo,$CodigoPor,$Tarifa,$t_venta,$val_iva){
        $sql = "INSERT INTO " . $con->dbname . ".NubeDetalleFacturaImpuesto 
                 (Codigo,CodigoPorcentaje,BaseImponible,Tarifa,Valor,IdDetalleFactura)VALUES(
                 '$codigo','$CodigoPor','$t_venta','$Tarifa','$val_iva','$idDet')";
        $command = $con->createCommand($sql);
        $command->execute();
    }
    private function InsertarFacturaImpuesto($con,$idCab,$codigo,$CodigoPor,$Tarifa,$t_venta,$val_iva){
        $sql = "INSERT INTO " . $con->dbname . ".NubeFacturaImpuesto 
                 (Codigo,CodigoPorcentaje,BaseImponible,Tarifa,Valor,IdFactura)VALUES(
                 '$codigo','$CodigoPor','$t_venta','$Tarifa','$val_iva','$idCab')";
        
        $command = $con->createCommand($sql);
        $command->execute();
    }
    
    private function actualizaErpCabFactura($cabFact) {
        $conContUp = yii::app()->dbcont;
        $transCont = $conContUp->beginTransaction();
        try {    
            for ($i = 0; $i < sizeof($cabFact); $i++) {
                $numero = $cabFact[$i]['NUM_NOF'];
                $tipo = $cabFact[$i]['TIP_NOF'];
                $sql = "UPDATE " . $conContUp->dbname . ".VC010101 SET ENV_DOC=1
                        WHERE TIP_NOF='$tipo' AND NUM_NOF='$numero' AND IND_UPD='L'";
                //echo $sql;
                $command = $conContUp->createCommand($sql);
                $command->execute();
            }
            $transCont->commit();
            $conContUp->active = false;
            return true;
        } catch (Exception $e) {
            $transCont->rollback();
            $conContUp->active = false;
            throw $e;
            return false;
        }
    }
    
    
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
        
        
         if (!empty($control)) {//Verifica la Opcion op para los filtros
            $sql .= ($control[0]['TIPO_APR'] != "0") ? " AND A.Estado = '" . $control[0]['TIPO_APR'] . "' " : " ";
            $sql .= ($control[0]['CEDULA'] > 0) ? "AND A.IdentificacionComprador = '" . $control[0]['CEDULA'] . "' " : "";
            //$sql .= ($control[0]['COD_PACIENTE'] != "0") ? "AND CDOR_ID_PACIENTE='".$control[0]['COD_PACIENTE']."' " : "";
            //$sql .= ($control[0]['PACIENTE'] != "") ? "AND CONCAT(B.PER_APELLIDO,' ',B.PER_NOMBRE) LIKE '%" . $control[0]['PACIENTE'] . "%' " : "";
            $sql .= "AND DATE(A.FechaEmision) BETWEEN '" . date("Y-m-d", strtotime($control[0]['F_INI'])) . "' AND '" . date("Y-m-d", strtotime($control[0]['F_FIN'])) . "' ";
        
        }

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
                        A.FechaAutorizacion,A.AutorizacionSRI,A.DireccionMatriz,A.DireccionEstablecimiento,
                        CONCAT(A.Establecimiento,'-',A.PuntoEmision,'-',A.Secuencial) NumDocumento,
                        A.ContribuyenteEspecial,A.ObligadoContabilidad,A.TipoIdentificacionComprador,
                        A.CodigoDocumento,A.Establecimiento,A.PuntoEmision,A.Secuencial,
                        A.FechaEmision,A.IdentificacionComprador,A.RazonSocialComprador,
                        A.TotalSinImpuesto,A.TotalDescuento,A.Propina,A.ImporteTotal,
                        B.*,C.Descripcion NombreDocumento,A.AutorizacionSri,A.ClaveAcceso,A.FechaAutorizacion,
                        A.Ambiente,A.TipoEmision,A.GuiaRemision,A.Moneda
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
    
    public function mostrarDetFactura($id) {
        $rawData = array();
        $con = Yii::app()->dbvsseaint;
        $sql = "SELECT A.*,B.BaseImponible,B.Tarifa,B.Valor
                        FROM " . $con->dbname . ".NubeDetalleFactura A
                                INNER JOIN " . $con->dbname . ".NubeDetalleFacturaImpuesto B
                                        ON A.IdDetalleFactura=B.IdDetalleFactura
                WHERE A.IdFactura =$id";
        $rawData = $con->createCommand($sql)->queryAll();//Recupera Solo 1
        $con->active = false;
        return $rawData;
    }
    
    public function mostrarDetFacturaImp($id) {
        $rawData = array();
        $con = Yii::app()->dbvsseaint;
//        $sql = "SELECT A.*,B.BaseImponible,B.Tarifa,B.Valor
//                        FROM " . $con->dbname . ".NubeDetalleFactura A
//                                INNER JOIN " . $con->dbname . ".NubeDetalleFacturaImpuesto B
//                                        ON A.IdDetalleFactura=B.IdDetalleFactura
//                WHERE A.IdFactura =$id";
        $sql = "SELECT * FROM " . $con->dbname . ".NubeDetalleFactura WHERE IdFactura=$id" ;
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryAll();//Recupera Solo 1
        $con->active = false;
        for ($i = 0; $i < sizeof($rawData); $i++) {
           $rawData[$i]['impuestos']=$this->mostrarDetalleImp($rawData[$i]['IdDetalleFactura']);//Retorna el Detalle del Impuesto
        }
        return $rawData;
    }
    
    private function mostrarDetalleImp($id) {
        $rawData = array();
        $con = Yii::app()->dbvsseaint;
        $sql = "SELECT * FROM " . $con->dbname . ".NubeDetalleFacturaImpuesto WHERE IdDetalleFactura=$id";
        $rawData = $con->createCommand($sql)->queryAll();//Recupera Solo 1
        $con->active = false;
        return $rawData;
    }
    
    public function mostrarFacturaImp($id) {
        $rawData = array();
        $con = Yii::app()->dbvsseaint;
        $sql = "SELECT * FROM " . $con->dbname . ".NubeFacturaImpuesto WHERE IdFactura=$id";
        $rawData = $con->createCommand($sql)->queryAll();//Recupera Solo 1
        $con->active = false;
        return $rawData;
    }
    
    public function mostrarFacturaDataAdicional($id) {
        $rawData = array();
        $con = Yii::app()->dbvsseaint;
        $sql = "SELECT * FROM " . $con->dbname . ".NubeDatoAdicionalFactura WHERE IdFactura=$id";
        $rawData = $con->createCommand($sql)->queryAll();//Recupera Solo 1
        $con->active = false;
        return $rawData;
    }
    
    
     /**
     * Función 
     *
     * @author Byron Villacreses
     * @access public
     * @return Retorna Los Datos de las Facturas GENERADAS
     */
    public function retornarPersona($valor, $op) {
        $con = Yii::app()->dbvsseaint;
        $rawData = array();
        //Patron de Busqueda
        /* http://www.mclibre.org/consultar/php/lecciones/php_expresiones_regulares.html */
        $patron = "/^[[:digit:]]+$/"; //Los patrones deben empezar y acabar con el carácter / (barra).
        if (preg_match($patron, $valor)) {
            $op = "CED"; //La cadena son sólo números.
        } else {
            $op = "NOM"; //La cadena son Alfanumericos.
            //Las separa en un array 
            $aux = explode(" ", $valor);
            $condicion = " ";
            for ($i = 0; $i < count($aux); $i++) {
                //Crea la Sentencia de Busqueda
                //$condicion .=" AND (PER_NOMBRE LIKE '%$aux[$i]%' OR PER_APELLIDO LIKE '%$aux[$i]%' ) ";
                $condicion .=" AND RazonSocialComprador LIKE '%$aux[$i]%' ";
            }
        }
        $sql = "SELECT A.IdentificacionComprador,A.RazonSocialComprador
                    FROM VSSEAINTERMEDIA.NubeFactura A
                  WHERE A.Estado<>0	GROUP BY IdentificacionComprador ";

        switch ($op) {
            case 'CED':
                $sql .=" AND IdentificacionComprador LIKE '%$valor%' ";
                break;
            case 'NOM':
                $sql .=$condicion;
                break;
            default:
        }
        $sql .= " LIMIT " . Yii::app()->params['limitRow'];
        //$sql .= " LIMIT 10";

        //echo $sql;
        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;
        return $rawData;
    }


    

}
