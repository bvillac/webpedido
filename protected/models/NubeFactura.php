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
        try {
            $cabFact = $this->buscarFacturas();
            $empresaEnt=$this->buscarDataEmpresa('1');//recuperar info deL Contribuyente
            $codDoc='01';//Documento Factura
            for ($i = 0; $i < sizeof($cabFact); $i++) {
                //echo $dataFact[$i]['NOM_CLI'];
                $this->InsertarCabFactura($con,$cabFact, $empresaEnt,$codDoc, $i);
                //$idCab = $con->getLastInsertID($con->dbname . '.NubeFactura');
                //$detFact=$this->buscarDetFacturas($dataFact[$i]['TIP_NOF'],$dataFact[$i]['NUM_NOF']);
                
            }
            
            //
            //$this->datoFirmaDigital($con, $objEmp, $idEmp);
            $trans->commit();
            $con->active = false;
            echo "OK";
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
                WHERE IND_UPD='L' AND FEC_VTA>'2014-05-01' LIMIT 2";

//        $sql = "SELECT B.AFMED_ID,B.ANT_ID,B.DIAG_ID,D.TANT_NOMBRE,B.AFMED_PARENTESCO_ID,B.AFMED_EST_SI,B.AFMED_NUMERO_ANO,B.AFMED_INDICADOR 
//                    FROM DB_MEDICO.FICHA_MEDICA A
//                        INNER JOIN (" . $con->dbname . ".ANTECEDENTES_FICHA_MEDICA B
//                            INNER JOIN (" . $con->dbname . ".ANTECEDENTES C
//                                    INNER JOIN " . $con->dbname . ".TIPO_ANTECEDENTES D
//                                        ON D.TANT_ID=C.TANT_ID)
//                            ON B.ANT_ID=C.ANT_ID)
//                        ON A.FMED_ID=B.FMED_ID
//                    WHERE A.FMED_ESTADO_LOGICO=1 AND A.FMED_ID=$id AND B.AFMED_INDICADOR='$ident';";
        //echo $sql;
        $rawData = $conCont->createCommand($sql)->queryAll();
        $conCont->active = false;
        return $rawData;
    }
    private function buscarDetFacturas($tipDoc,$numDoc) {
        $conCont = yii::app()->dbcont;
        $rawData = array();
        //$sql = "SELECT TIP_NOF,CONCAT(REPEAT('0',9-LENGTH(RIGHT(NUM_NOF,9))),RIGHT(NUM_NOF,9)) NUM_NOF,
        $sql = "SELECT TIP_NOF,NUM_NOF,
                        CED_RUC,NOM_CLI,FEC_VTA,DIR_CLI,VAL_BRU,POR_DES,VAL_DES,VAL_FLE,BAS_IVA,
                        BAS_IV0,POR_IVA,VAL_IVA,VAL_NET,POR_R_F,VAL_R_F,POR_R_I,VAL_R_I,RIGHT(GUI_REM,9) GUI_REM,0 PROPINA
                    FROM " . $conCont->dbname . ".VC010101 
                WHERE IND_UPD='L' AND FEC_VTA>'2014-05-01' LIMIT 2";
        //echo $sql;
        $rawData = $conCont->createCommand($sql)->queryAll();
        $conCont->active = false;
        return $rawData;
    }
    
    
    private function buscarDataEmpresa($id) {
        $conSea = yii::app()->dbvssea;
        $rawData = array();
        $sql = "SELECT * FROM " . $conSea->dbname . ".VSCompania WHERE IdCompania=$id;";
        //echo $sql;
        $rawData = $conSea->createCommand($sql)->queryAll();
        $conSea->active = false;
        return $rawData;
    }
    
    private function InsertarCabFactura($con,$objEnt,$objEmp,$codDoc,$i) {
        $tip_iden=$this->tipoIdent($objEnt[$i]['CED_RUC']);
        $Secuencial=$this->ajusteNumDoc($objEnt[$i]['NUM_NOF']);
        $GuiaRemi=$this->ajusteNumDoc($objEnt[$i]['GUI_REM']);
        $ced_ruc=($tip_iden=='07')?'9999999999999':$objEnt[$i]['CED_RUC'];
        $sql = "INSERT INTO " . $con->dbname . ".NubeFactura
                            (Ambiente,TipoEmision, RazonSocial, NombreComercial, Ruc, CodigoDocumento, Establecimiento,
                            PuntoEmision, Secuencial, DireccionMatriz, FechaEmision, DireccionEstablecimiento, ContribuyenteEspecial,
                            ObligadoContabilidad, TipoIdentificacionComprador, GuiaRemision, RazonSocialComprador, IdentificacionComprador,
                            TotalSinImpuesto, TotalDescuento, Propina, ImporteTotal, Moneda, SecuencialERP, CodigoTransaccionERP,Estado,FechaCarga) VALUES (
                            '" . $objEmp[0]['Ambiente'] . "',
                            '" . $objEmp[0]['TipoEmision'] . "',
                            '" . $objEmp[0]['RazonSocial'] . "',
                            '" . $objEmp[0]['NombreComercial'] . "',
                            '" . $objEmp[0]['Ruc'] . "',
                            '$codDoc',
                            '" . $objEmp[0]['Establecimiento'] . "',
                            '" . $objEmp[0]['PuntoEmision'] . "',
                            '$Secuencial',
                            '" . $objEmp[0]['DireccionMatriz'] . "', 
                            '" . $objEnt[$i]['FEC_VTA'] . "', 
                            '" . $objEmp[0]['DireccionMatriz'] . "', 
                            '" . $objEmp[0]['ContribuyenteEspecial'] . "', 
                            '" . $objEmp[0]['ObligadoContabilidad'] . "', 
                            '$tip_iden', 
                            '" . $objEmp[0]['Establecimiento'].'-'.$objEmp[0]['PuntoEmision'].'-'.$GuiaRemi. "', 
                            '" . $objEnt[$i]['NOM_CLI'] . "', 
                            '$ced_ruc', 
                            '" . $objEnt[$i]['VAL_BRU'] . "', 
                            '" . $objEnt[$i]['VAL_DES'] . "', 
                            '" . $objEnt[$i]['PROPINA'] . "', 
                            '" . $objEnt[$i]['VAL_NET'] . "', 
                            '" . $objEmp[0]['Moneda'] . "', 
                            '" . $objEnt[$i]['NUM_NOF'] . "', 
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
    
    private function tipoIdent($cedula){
        $valor='07';//Consumidor Final por Defecto
        IF(strlen($cedula)>10) {
            IF(strlen($cedula)==13){
                $valor='04';//VENTA CON RUC
            }ELSEIF(strlen($cedula)>13){
                $valor='06';//VENTA CON PASAPORTE
            }
        }ELSE{
            IF($cedula=='9999999999'){//Esta vericacion depende de la empresa
                $valor='07';//VENTA A CONSUMIDOR FINAL*  SON 13 DIGITOS
            }ELSE{
                $valor='05';//VENTA CON CEDULA
            }
        }
        return $valor;

    }
    private function ajusteNumDoc($numDoc){
        $result='';
        IF(strlen($numDoc)<9){
            $result=add_ceros($numDoc,9);//Ajusta los 9
        }ELSE{
            $result=substr($numDoc, -9);//Extrae Solo 9
        }
        return $result;
    }
    private function add_ceros($numero, $ceros) {
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

}
