<?php

/**
 * This is the model class for table "CAB_PEDIDO".
 *
 * The followings are the available columns in table 'CAB_PEDIDO':
 * @property string $CPED_ID
 * @property string $TDOC_ID
 * @property string $TIE_ID
 * @property string $TCPED_ID
 * @property string $CPED_FEC_PED
 * @property string $TIP_NOF
 * @property string $NUM_NOF
 * @property string $FEC_VTA
 * @property string $CPED_VAL_BRU
 * @property string $CPED_POR_DES
 * @property string $CPED_VAL_DES
 * @property string $CPED_POR_IVA
 * @property string $CPED_VAL_IVA
 * @property string $CPED_BAS_IVA
 * @property string $CPED_BAS_IV0
 * @property string $CPED_VAL_FLE
 * @property string $CPED_VAL_NET
 * @property string $CPED_EST_PED
 * @property string $CPED_EST_LOG
 * @property string $CPED_FEC_MOD
 * @property string $UTIE_ID_PED
 * @property string $UTIE_ID
 *
 * The followings are the available model relations:
 * @property TEMPCABPEDIDO $tCPED
 * @property TIENDA $tIE
 * @property TIPODOCUMENTOS $tDOC
 * @property USUARIOTIENDA $uTIE
 * @property DETPEDIDO[] $dETPEDIDOs
 */
//Yii::import('system.vendors.PHPMailer.*');//Usar de Forma nativa.
//require_once('class.phpmailer.php');
class CABPEDIDO extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'CAB_PEDIDO';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('TDOC_ID, TIE_ID, TCPED_ID, UTIE_ID', 'required'),
            array('TDOC_ID, TIE_ID, TCPED_ID, UTIE_ID_PED, UTIE_ID', 'length', 'max' => 20),
            array('TIP_NOF', 'length', 'max' => 2),
            array('NUM_NOF, CPED_VAL_BRU, CPED_VAL_DES, CPED_VAL_IVA, CPED_BAS_IVA, CPED_BAS_IV0, CPED_VAL_FLE', 'length', 'max' => 10),
            array('CPED_POR_DES, CPED_POR_IVA', 'length', 'max' => 5),
            array('CPED_VAL_NET', 'length', 'max' => 14),
            array('CPED_EST_PED, CPED_EST_LOG', 'length', 'max' => 1),
            array('CPED_FEC_PED, FEC_VTA, CPED_FEC_MOD', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('CPED_ID, TDOC_ID, TIE_ID, TCPED_ID, CPED_FEC_PED, TIP_NOF, NUM_NOF, FEC_VTA, CPED_VAL_BRU, CPED_POR_DES, CPED_VAL_DES, CPED_POR_IVA, CPED_VAL_IVA, CPED_BAS_IVA, CPED_BAS_IV0, CPED_VAL_FLE, CPED_VAL_NET, CPED_EST_PED, CPED_EST_LOG, CPED_FEC_MOD, UTIE_ID_PED, UTIE_ID', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'tCPED' => array(self::BELONGS_TO, 'TEMPCABPEDIDO', 'TCPED_ID'),
            'tIE' => array(self::BELONGS_TO, 'TIENDA', 'TIE_ID'),
            'tDOC' => array(self::BELONGS_TO, 'TIPODOCUMENTOS', 'TDOC_ID'),
            'uTIE' => array(self::BELONGS_TO, 'USUARIOTIENDA', 'UTIE_ID'),
            'dETPEDIDOs' => array(self::HAS_MANY, 'DETPEDIDO', 'CPED_ID'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'CPED_ID' => 'Cped',
            'TDOC_ID' => 'Tdoc',
            'TIE_ID' => 'Tie',
            'TCPED_ID' => 'Tcped',
            'CPED_FEC_PED' => 'Cped Fec Ped',
            'TIP_NOF' => 'Tip Nof',
            'NUM_NOF' => 'Num Nof',
            'FEC_VTA' => 'Fec Vta',
            'CPED_VAL_BRU' => 'Cped Val Bru',
            'CPED_POR_DES' => 'Cped Por Des',
            'CPED_VAL_DES' => 'Cped Val Des',
            'CPED_POR_IVA' => 'Cped Por Iva',
            'CPED_VAL_IVA' => 'Cped Val Iva',
            'CPED_BAS_IVA' => 'Cped Bas Iva',
            'CPED_BAS_IV0' => 'Cped Bas Iv0',
            'CPED_VAL_FLE' => 'Cped Val Fle',
            'CPED_VAL_NET' => 'Cped Val Net',
            'CPED_EST_PED' => 'Cped Est Ped',
            'CPED_EST_LOG' => 'Cped Est Log',
            'CPED_FEC_MOD' => 'Cped Fec Mod',
            'UTIE_ID_PED' => 'Utie Id Ped',
            'UTIE_ID' => 'Utie',
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

        $criteria->compare('CPED_ID', $this->CPED_ID, true);
        $criteria->compare('TDOC_ID', $this->TDOC_ID, true);
        $criteria->compare('TIE_ID', $this->TIE_ID, true);
        $criteria->compare('TCPED_ID', $this->TCPED_ID, true);
        $criteria->compare('CPED_FEC_PED', $this->CPED_FEC_PED, true);
        $criteria->compare('TIP_NOF', $this->TIP_NOF, true);
        $criteria->compare('NUM_NOF', $this->NUM_NOF, true);
        $criteria->compare('FEC_VTA', $this->FEC_VTA, true);
        $criteria->compare('CPED_VAL_BRU', $this->CPED_VAL_BRU, true);
        $criteria->compare('CPED_POR_DES', $this->CPED_POR_DES, true);
        $criteria->compare('CPED_VAL_DES', $this->CPED_VAL_DES, true);
        $criteria->compare('CPED_POR_IVA', $this->CPED_POR_IVA, true);
        $criteria->compare('CPED_VAL_IVA', $this->CPED_VAL_IVA, true);
        $criteria->compare('CPED_BAS_IVA', $this->CPED_BAS_IVA, true);
        $criteria->compare('CPED_BAS_IV0', $this->CPED_BAS_IV0, true);
        $criteria->compare('CPED_VAL_FLE', $this->CPED_VAL_FLE, true);
        $criteria->compare('CPED_VAL_NET', $this->CPED_VAL_NET, true);
        $criteria->compare('CPED_EST_PED', $this->CPED_EST_PED, true);
        $criteria->compare('CPED_EST_LOG', $this->CPED_EST_LOG, true);
        $criteria->compare('CPED_FEC_MOD', $this->CPED_FEC_MOD, true);
        $criteria->compare('UTIE_ID_PED', $this->UTIE_ID_PED, true);
        $criteria->compare('UTIE_ID', $this->UTIE_ID, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return CABPEDIDO the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function insertarPedidos($Ids,$EstAut) {
        $msg = new VSexception();
        $valida = new VSValidador();
        $idsReturn = array();
        $con = Yii::app()->db;
        $trans = $con->beginTransaction();
        try {
            $cliID=Yii::app()->getSession()->get('CliID', FALSE);
            $cabFact = $this->buscarCabPedidosTemp($con, $Ids);
            for ($i = 0; $i < sizeof($cabFact); $i++) {
                $this->InsertarCabFactura($con, $cabFact, $i,$EstAut,$cliID);
                $idCab = $con->getLastInsertID($con->dbname . '.CAB_PEDIDO');
                $detFact = $this->buscarDetPedidosTemp($con, $cabFact[$i]['TCPED_ID']);
                $this->InsertarDetFactura($con, $detFact, $idCab, $cabFact[$i]['TIE_ID'],$cliID);
                //$this->actTemCabPed($con, $cabFact[$i]['TCPED_ID'],'3');
                $this->actTemCabPed($con, $cabFact[$i]['TCPED_ID'],$EstAut);
                $idsReturn[] = array(
                    "ids" => $idCab,
                );
            }
            $trans->commit();
            $con->active = false;
            return $msg->messageSystem('OK', null, 32, null, $idsReturn);
        } catch (Exception $e) {
            $trans->rollback();
            $con->active = false;
            //throw $e;
            return $msg->messageSystem('NO_OK', $e->getMessage(), 11, null, null);
        }
    }
    
    /*public function actulizaRevisado($Ids,$EstAut) {
        $msg = new VSexception();
        $valida = new VSValidador();
        $idsReturn = array();
        $con = Yii::app()->db;
        $trans = $con->beginTransaction();
        try {            
            $this->actTemCabPed($con, $Ids,$EstAut);
                $idsReturn[] = array(
                    "ids" => $Ids,
                );
            $trans->commit();
            $con->active = false;
            return $msg->messageSystem('OK', null, 30, null, $idsReturn);
        } catch (Exception $e) {
            $trans->rollback();
            $con->active = false;
            //throw $e;
            return $msg->messageSystem('NO_OK', $e->getMessage(), 11, null, null);
        }
    }*/
    
    /*public function insertarPedidosGrupo($Ids,$op,$f_ini,$f_fin) {
        $msg = new VSexception();
        $valida = new VSValidador();
        $idsReturn = array();
        $con = Yii::app()->db;
        $trans = $con->beginTransaction();
        try {
            $EstAut=3;
            $cliID=Yii::app()->getSession()->get('CliID', FALSE);
            if($op==1){
                //se envia por grupo 
                $cabFact = $this->buscarCabPedidosTempGrupo($con, $Ids,$op,$f_ini,$f_fin);
            }else{
                //se envia uno por uno
                $cabFact = $this->buscarCabPedidosTemp($con, $Ids);
            }
            
            for ($i = 0; $i < sizeof($cabFact); $i++) {                
                $this->InsertarCabFactura($con, $cabFact, $i,$EstAut,$cliID);
                $idCab = $con->getLastInsertID($con->dbname . '.CAB_PEDIDO');
                $detFact = $this->buscarDetPedidosTemp($con, $cabFact[$i]['TCPED_ID']);
                $this->InsertarDetFactura($con, $detFact, $idCab, $cabFact[$i]['TIE_ID'],$cliID);                
                $this->actTemCabPed($con, $cabFact[$i]['TCPED_ID'],'3');
                $idsReturn[] = array(
                    "ids" => $idCab,
                );
            }
            $trans->commit();
            $con->active = false;
            return $msg->messageSystem('OK', null, 30, null, $idsReturn);
        } catch (Exception $e) {
            $trans->rollback();
            $con->active = false;
            //throw $e;
            return $msg->messageSystem('NO_OK', $e->getMessage(), 11, null, null);
        }
    }*/
    
    /*private function buscarCabPedidosTempGrupo($con,$ids,$op,$f_ini,$f_fin) {
        //$con = yii::app()->db;
        $rawData = array();
        //Lista solo los que estan listos a envair.. 
        $sql = "SELECT * FROM " . $con->dbname . ".TEMP_CAB_PEDIDO "
                . " WHERE IDS_ARE IN($ids)  "
                . " AND TCPED_EST_LOG IN(1,5) ";
        $sql .= " AND DATE(TCPED_FEC_CRE) BETWEEN '" . date("Y-m-d", strtotime($f_ini)) . "' AND '" . date("Y-m-d", strtotime($f_fin)) . "'  ";
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryAll();
        //$con->active = false;
        return $rawData;
    }*/
    

    private function buscarCabPedidosTemp($con,$ids) {
        //$con = yii::app()->db;
        $rawData = array();
        //Lista solo los que estan listos a envair.. 
        $sql = "SELECT * FROM " . $con->dbname . ".TEMP_CAB_PEDIDO WHERE TCPED_ID IN($ids) AND  TCPED_EST_LOG IN(1,5)";
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryAll();
        //$con->active = false;
        return $rawData;
    }
    
    private function buscarCabPedidos($con,$ids) {
        //$con = yii::app()->db;
        $rawData = array();
        //Lista solo los que estan listos a envair.. 
        $sql = "SELECT * FROM " . $con->dbname . ".CAB_PEDIDO WHERE CPED_ID IN($ids) AND  CPED_EST_LOG=1";
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryAll();
        //$con->active = false;
        return $rawData;
    }
    

    private function buscarDetPedidosTemp($con,$ids) {
        //$con = yii::app()->db;
        $rawData = array();
        //Lista solo los que estan Activos        
        $sql = "SELECT * FROM " . $con->dbname . ".TEMP_DET_PEDIDO WHERE TCPED_ID=$ids AND TDPED_EST_AUT=1 ";
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryAll();
        //$con->active = false;
        return $rawData;
    }

    private function InsertarCabFactura($con, $objEnt, $i,$EstAut,$cliID) {
        //Nota: UTIE_ID= User que revisa  y UTIE_ID_PED= User que hace el pedido
        $utieId = Yii::app()->getSession()->get('UtieId', FALSE);        
        $UserName=Yii::app()->getSession()->get('user_name', FALSE);
        //$idsAre=($objEnt[$i]['IDS_ARE']<>'')?$objEnt[$i]['IDS_ARE']:1;//Valor 1 por defecto en area
        $sql = "INSERT INTO " . $con->dbname . ".CAB_PEDIDO
                (TDOC_ID,TIE_ID,TCPED_ID,CPED_FEC_PED,CPED_VAL_BRU,CPED_POR_DES,CPED_VAL_DES,CPED_POR_IVA,CPED_VAL_IVA,
                 CPED_BAS_IVA,CPED_BAS_IV0,CPED_VAL_FLE,CPED_VAL_NET,CPED_EST_PED,CPED_EST_LOG,UTIE_ID_PED,UTIE_ID,CLI_ID,USUARIO)VALUES
                (2,'" . $objEnt[$i]['TIE_ID'] . "','" . $objEnt[$i]['TCPED_ID'] . "',CURRENT_TIMESTAMP(),
                   '" . $objEnt[$i]['TCPED_TOTAL'] . "',0,0,0,0,0,0,0,'" . $objEnt[$i]['TCPED_TOTAL'] . "','$EstAut','1',
                    '" . $objEnt[$i]['UTIE_ID'] . "','$utieId','$cliID','$UserName') ";

        $command = $con->createCommand($sql);
        $command->execute();
    }

    private function InsertarDetFactura($con, $detFact, $idCab, $tieId,$cliID) {
        for ($i = 0; $i < sizeof($detFact); $i++) {
            $sql = "INSERT INTO " . $con->dbname . ".DET_PEDIDO
                    (CPED_ID,ART_ID,TIE_ID,DPED_CAN_PED,DPED_P_VENTA,DPED_I_M_IVA,DPED_VAL_DES,
                     DPED_POR_DES,DPED_T_VENTA,DPED_OBSERVA,DPED_FEC_CRE,DPED_EST_LOG,CLI_ID)VALUES($idCab,
                     '" . $detFact[$i]['ART_ID'] . "','$tieId','" . $detFact[$i]['TDPED_CAN_PED'] . "',
                     '" . $detFact[$i]['TDPED_P_VENTA'] . "','0','0','0',
                     '" . $detFact[$i]['TDPED_T_VENTA'] . "','" . $detFact[$i]['TDPED_OBSERVA'] . "',CURRENT_TIMESTAMP(),'1','$cliID');";
            $command = $con->createCommand($sql);
            $command->execute();
        }
    }
    
    private function actTemCabPed($con,$ids,$estado) {
        $sql = "UPDATE " . $con->dbname . ".TEMP_CAB_PEDIDO SET TCPED_EST_LOG='$estado' WHERE TCPED_ID=$ids";
        $command = $con->createCommand($sql);
        $command->execute();
    }
    
    private function actCabPedido($con,$ids,$estado) {
        $sql = "UPDATE " . $con->dbname . ".CAB_PEDIDO SET CPED_EST_LOG='$estado' WHERE CPED_ID=$ids";
        $command = $con->createCommand($sql);
        $command->execute();
    }
    
    private function actTempEntregadoCabPed($con,$ids,$estado) {
        $sql = "UPDATE " . $con->dbname . ".TEMP_CAB_PEDIDO SET TCPED_EST_ENV='$estado' WHERE TCPED_ID=$ids";
        $command = $con->createCommand($sql);
        $command->execute();
    }
    
    private function actCabEntregadoPedido($con,$ids,$estado) {
        $sql = "UPDATE " . $con->dbname . ".CAB_PEDIDO SET CPED_EST_ENV='$estado' WHERE CPED_ID=$ids";
        $command = $con->createCommand($sql);
        $command->execute();
    }
    
    public function sendMailPedidos($ids) {
        $con = yii::app()->db;
        $rawData = array();
        $sql = "SELECT A.CPED_ID PedID,CONCAT(REPEAT( '0', 9 - LENGTH(A.CPED_ID) ),A.CPED_ID) Numero,
                        A.CPED_VAL_NET ValorNeto,DATE(A.CPED_FEC_PED) FechaPedido,B.TIE_NOMBRE NombreTienda,
                        CONCAT(E.PER_NOMBRE,' ',E.PER_APELLIDO) NombrePersona,D.USU_CORREO CorreoPersona,
                        CONCAT(H.PER_NOMBRE,' ',H.PER_APELLIDO) NombreUser,G.USU_CORREO CorreoUser
                        FROM " . $con->dbname . ".CAB_PEDIDO A
                                INNER JOIN " . $con->dbname . ".TIENDA B
                                        ON A.TIE_ID=B.TIE_ID
                                INNER JOIN (" . $con->dbname . ".USUARIO_TIENDA C
                                                INNER JOIN (" . $con->dbname . ".USUARIO D
                                                                INNER JOIN " . $con->dbname . ".PERSONA E
                                                                        ON D.PER_ID=E.PER_ID)
                                                        ON C.USU_ID=D.USU_ID)
                                        ON C.UTIE_ID=A.UTIE_ID_PED
                                INNER JOIN (" . $con->dbname . ".USUARIO_TIENDA F
                                                INNER JOIN (" . $con->dbname . ".USUARIO G
                                                                INNER JOIN " . $con->dbname . ".PERSONA H
                                                                        ON G.PER_ID=H.PER_ID)
                                                        ON F.USU_ID=G.USU_ID)
                                        ON F.UTIE_ID=A.UTIE_ID
                WHERE A.CPED_ID=$ids AND CPED_EST_LOG IN(1,2);";
        
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;
        return $rawData;
    }
    
    public function sendMailPedidosTemp($ids) {
        $con = yii::app()->db;
        $rawData = array();
        $sql = "SELECT A.TCPED_ID PedID,CONCAT(REPEAT( '0', 9 - LENGTH(A.TCPED_ID) ),A.TCPED_ID) Numero,
                        A.TCPED_TOTAL ValorNeto,DATE(A.TCPED_FEC_CRE) FechaPedido,B.TIE_NOMBRE NombreTienda,
                        CONCAT(E.PER_NOMBRE,' ',E.PER_APELLIDO) NombrePersona,D.USU_CORREO CorreoPersona,
                        CONCAT(H.PER_NOMBRE,' ',H.PER_APELLIDO) NombreUser,G.USU_CORREO CorreoUser
                        FROM " . $con->dbname . ".TEMP_CAB_PEDIDO A
                                INNER JOIN " . $con->dbname . ".TIENDA B
                                        ON A.TIE_ID=B.TIE_ID
                                INNER JOIN (" . $con->dbname . ".USUARIO_TIENDA C
                                                INNER JOIN (" . $con->dbname . ".USUARIO D
                                                                INNER JOIN " . $con->dbname . ".PERSONA E
                                                                        ON D.PER_ID=E.PER_ID)
                                                        ON C.USU_ID=D.USU_ID)
                                       ON C.UTIE_ID=A.UTIE_ID
                                INNER JOIN (" . $con->dbname . ".USUARIO_TIENDA F
                                                INNER JOIN (" . $con->dbname . ".USUARIO G
                                                                INNER JOIN " . $con->dbname . ".PERSONA H
                                                                        ON G.PER_ID=H.PER_ID)
                                                        ON F.USU_ID=G.USU_ID)
                                        ON F.UTIE_ID=A.UTIE_ID
                WHERE A.TCPED_ID=$ids ;";
        
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;
        return $rawData;
    }
    
    public function mostrarPedidos($control) {
        $rawData = array();
        $objPed=new TIENDA;
        $con = Yii::app()->db;
        //$idsTie=$objPed->recuperarIdsTiendasRol($con);
        $idsTie=$objPed->recuperarIdsTieCliente($con);//Muestra todos los datos de clientes tiendas. DATE(A.CPED_FEC_PED)
        $limitrowsql = Yii::app()->params['limitRowSQL'];
        //$rawData[]=$this->rowProdList();
        $sql = "SELECT A.CPED_ID PedID,A.TIE_ID TieID,A.CPED_VAL_NET ValorNeto,A.CPED_FEC_PED FechaPedido, 
                        B.TIE_NOMBRE NombreTienda,B.TIE_DIRECCION DireccionTienda,E.PER_NOMBRE NombrePersona,
                        CONCAT(REPEAT( '0', 9 - LENGTH(A.CPED_ID) ),A.CPED_ID) Numero,A.CPED_EST_LOG Estado,
                        A.TCPED_ID,A.CPED_EST_ENV EstEnv
                        FROM " . $con->dbname . ".CAB_PEDIDO A
                                INNER JOIN " . $con->dbname . ".TIENDA B
                                        ON A.TIE_ID=B.TIE_ID
                                INNER JOIN (" . $con->dbname . ".USUARIO_TIENDA C
                                                INNER JOIN (" . $con->dbname . ".USUARIO D
                                                                INNER JOIN " . $con->dbname . ".PERSONA E
                                                                        ON D.PER_ID=E.PER_ID)
                                                        ON C.USU_ID=D.USU_ID)
                                        ON C.UTIE_ID=A.UTIE_ID
                WHERE  "; //A.TCPED_EST_LOG=1 AND
        $sqlTieId=($idsTie!='') ? "AND A.TIE_ID IN ($idsTie)" : "";
        if (!empty($control)) {//Verifica la Opcion op para los filtros
            //$sql .= ($control[0]['EST_LOG'] != "0") ? " A.CPED_EST_LOG = '" . $control[0]['EST_LOG'] . "' " : " A.CPED_EST_LOG<>'' ";
            $sql .= ($control[0]['EST_LOG'] != "0") ? " A.CPED_EST_LOG = '" . $control[0]['EST_LOG'] . "' " : " A.CPED_EST_LOG<>'0' ";
            $sql .= ($control[0]['TIE_ID'] > 0) ? "AND A.TIE_ID = '" . $control[0]['TIE_ID'] . "' " : $sqlTieId;
            //$sql .= ($control[0]['COD_PACIENTE'] != "0") ? "AND CDOR_ID_PACIENTE='".$control[0]['COD_PACIENTE']."' " : "";
            //$sql .= ($control[0]['PACIENTE'] != "") ? "AND CONCAT(B.PER_APELLIDO,' ',B.PER_NOMBRE) LIKE '%" . $control[0]['PACIENTE'] . "%' " : "";
            $sql .= "AND DATE(A.CPED_FEC_PED) BETWEEN '" . date("Y-m-d", strtotime($control[0]['F_INI'])) . "' AND '" . date("Y-m-d", strtotime($control[0]['F_FIN'])) . "'  ";
        }else{
            $sql .= "A.CPED_EST_LOG<>'0' ";
            $sql .= $sqlTieId;
        }
        $sql .= "ORDER BY A.CPED_ID DESC LIMIT $limitrowsql";

        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;

        return new CArrayDataProvider($rawData, array(
            'keyField' => 'PedID',
            'sort' => array(
                'attributes' => array(
                    'PedID', 'Numero', 'TieID', 'ValorNeto', 'FechaPedido', 'NombreTienda', 'DireccionTienda', 'NombrePersona', 'Estado'
                ),
            ),
            'totalItemCount' => count($rawData),
            'pagination' => array(
                'pageSize' => Yii::app()->params['pageSize'],
            ),
        ));
    }
    
    public function despacharPedido($ids) {
        $msg= new VSexception();
        $con = Yii::app()->db;
        $trans = $con->beginTransaction();
        try {
            $cabFact = $this->buscarCabPedidos($con, $ids);
            for ($i = 0; $i < sizeof($cabFact); $i++) {
                $this->actCabPedido($con, $cabFact[$i]['CPED_ID'],'2');//Actualiza Cab de Pedido
                $this->actTemCabPed($con, $cabFact[$i]['TCPED_ID'],'2');//Actualiza Temporal
            }
            $trans->commit();
            $con->active = false;
            return $msg->messageSystem('OK',null,10,null, $cabFact);
        } catch (Exception $e) { // se arroja una excepción si una consulta falla
            $trans->rollBack();
            //throw $e;
            $con->active = false;
            return $msg->messageSystem('NO_OK', $e->getMessage(), 11, null, null);
        }
    }
    
    public function entregarPedido($ids) {
        $msg= new VSexception();
        $con = Yii::app()->db;
        $trans = $con->beginTransaction();
        try {
            $cabFact = $this->buscarCabPedidos($con, $ids);
            for ($i = 0; $i < sizeof($cabFact); $i++) {
                $this->actCabEntregadoPedido($con, $cabFact[$i]['CPED_ID'],'1');//Actualiza Cab de Pedido Entregado
                $this->actTempEntregadoCabPed($con, $cabFact[$i]['TCPED_ID'],'1');//Actualiza Temporal Entregado
            }
            $trans->commit();
            $con->active = false;
            return $msg->messageSystem('OK',null,10,null, null);
        } catch (Exception $e) { // se arroja una excepción si una consulta falla
            $trans->rollBack();
            //throw $e;
            $con->active = false;
            return $msg->messageSystem('NO_OK', $e->getMessage(), 11, null, null);
        }
    }
    
    public function mostrarCabPedido($ids) {
        $rawData = array();
        $con = Yii::app()->db;
        $sql = "SELECT  A.CPED_ID PedID,CONCAT(REPEAT( '0', 9 - LENGTH(A.CPED_ID) ),A.CPED_ID) Numero,
                        A.CPED_VAL_NET ValorNeto,DATE(A.CPED_FEC_PED) FechaPedido,B.TIE_NOMBRE NombreTienda,
                        CONCAT(E.PER_NOMBRE,' ',E.PER_APELLIDO) NombrePersona,D.USU_CORREO CorreoPersona,
                        CONCAT(H.PER_NOMBRE,' ',H.PER_APELLIDO) NombreUser,G.USU_CORREO CorreoUser,
                        B.TIE_DIRECCION DirTienda,B.TIE_TELEFONO TelTienda,B.TIE_LUG_ENTREGA LugEntrega,
                        B.TIE_CONTACTO ContactoTienda
                        FROM " . $con->dbname . ".CAB_PEDIDO A
                                INNER JOIN " . $con->dbname . ".TIENDA B
                                        ON A.TIE_ID=B.TIE_ID
                                INNER JOIN (" . $con->dbname . ".USUARIO_TIENDA C
                                                INNER JOIN (" . $con->dbname . ".USUARIO D
                                                                INNER JOIN " . $con->dbname . ".PERSONA E
                                                                        ON D.PER_ID=E.PER_ID)
                                                        ON C.USU_ID=D.USU_ID)
                                        ON C.UTIE_ID=A.UTIE_ID_PED
                                INNER JOIN (" . $con->dbname . ".USUARIO_TIENDA F
                                                INNER JOIN (" . $con->dbname . ".USUARIO G
                                                                INNER JOIN " . $con->dbname . ".PERSONA H
                                                                        ON G.PER_ID=H.PER_ID)
                                                        ON F.USU_ID=G.USU_ID)
                                        ON F.UTIE_ID=A.UTIE_ID
                WHERE A.CPED_ID=$ids AND CPED_EST_LOG IN (1,2,3,4)";
        $rawData = $con->createCommand($sql)->queryRow(); //Recupera Solo 1
        $con->active = false;
        return $rawData;
    }
    
    public function mostrarDetPedido($ids) {
        $rawData = array();
        $con = Yii::app()->db;
        $sql = "SELECT A.DPED_ID DetId,A.ART_ID ArtId,A.DPED_CAN_PED Cant,A.DPED_P_VENTA Precio,
                        A.DPED_T_VENTA TotVta,A.DPED_EST_LOG EstAut,B.COD_ART Codigo,
                        B.ART_DES_COM Nombre,B.ART_I_M_IVA ImIva, A.DPED_OBSERVA Observa
                        FROM " . $con->dbname . ".DET_PEDIDO A
                                INNER JOIN " . $con->dbname . ".ARTICULO B
                                        ON A.ART_ID=B.ART_ID
                WHERE A.CPED_ID=$ids ";
        
        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;
        return $rawData;
    }
    
    
    /**************************** REPORTES CONSULTAS ***************************/
    public function Rep_VentMax($control) {
        $objPed=new TEMP_CABPEDIDO;
        $data = explode(",",$control);//Recibe Datos y los separa
        $f_ini=$data[1];//Fecha Inicio
        $f_fin=$data[2];//Fecha Inicio
        $rawData = array();
        $con = Yii::app()->db;
        $idsTie=$objPed->recuperarIdsTiendasRol($con);
        $sql = "SELECT IFNULL(SUM(A.CPED_VAL_NET),0) ValorNeto,B.TIE_NOMBRE NombreTienda,
                        A.TIE_ID TieID,B.TIE_CUPO Cupo
                        FROM " . $con->dbname . ".CAB_PEDIDO A
                                INNER JOIN " . $con->dbname . ".TIENDA B
                                        ON A.TIE_ID=B.TIE_ID
                WHERE A.CPED_EST_LOG IN (1,2,3,4)  ";
        if (!empty($control)) {//Verifica la Opcion op para los filtros
            $sql .= "AND DATE(A.CPED_FEC_PED) BETWEEN '" . date("Y-m-d", strtotime($f_ini)) . "' AND '" . date("Y-m-d", strtotime($f_fin)) . "'  ";
        }
        $sqlTieId=($idsTie!='') ? "AND A.TIE_ID IN ($idsTie)" : "";
        $sql .= "GROUP BY A.TIE_ID ORDER BY  ValorNeto Desc ";
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;
        return $rawData;
    }
    
    public function Rep_ItemTienda($control) {
        $objPed=new TEMP_CABPEDIDO;
        $data = explode(",",$control);//Recibe Datos y los separa
        $f_ini=$data[1];//Fecha Inicio
        $f_fin=$data[2];//Fecha Inicio
        $tienda=$data[3];//Id Tienda Personalizado
        $rawData = array();
        $con = Yii::app()->db;
        $idsTie=$objPed->recuperarIdsTiendasRol($con);
        //Cambio = 4-06-2015
        //Se agrego la Fecha del Pedido y el Nombre del Usuario tienda que pidio
        $sql = "SELECT B.COD_ART CodArt,B.ART_DES_COM Nombre,IFNULL(SUM(A.DPED_CAN_PED),0) CantPed,
                        C.TIE_NOMBRE Tienda,A.DPED_P_VENTA Pventa,IFNULL(SUM(A.DPED_T_VENTA),0) Tventa,
                        G.PER_NOMBRE NomUser, DATE(D.CPED_FEC_PED) Fec_Ped
                        FROM " . $con->dbname . ".DET_PEDIDO A
                                INNER JOIN (" . $con->dbname . ".CAB_PEDIDO D
                                        INNER JOIN (" . $con->dbname . ".USUARIO_TIENDA E
                                                INNER JOIN (" . $con->dbname . ".USUARIO F
                                                                INNER JOIN " . $con->dbname . ".PERSONA G
                                                                        ON F.PER_ID=G.PER_ID)
                                                        ON E.USU_ID=F.USU_ID)
                                                ON D.UTIE_ID_PED=E.UTIE_ID)
                                    ON A.CPED_ID=D.CPED_ID
                                INNER JOIN " . $con->dbname . ".ARTICULO B
                                        ON A.ART_ID=B.ART_ID
                                INNER JOIN " . $con->dbname . ".TIENDA C
                                        ON A.TIE_ID=C.TIE_ID
                WHERE A.DPED_EST_LOG IN (1,2,3)  ";
        //AND A.TIE_ID=1
        //if (!empty($control)) {//Verifica la Opcion op para los filtros
            $sql .= "AND DATE(A.DPED_FEC_CRE) BETWEEN '" . date("Y-m-d", strtotime($f_ini)) . "' AND '" . date("Y-m-d", strtotime($f_fin)) . "'  ";
        //}
        $sql .=($tienda=='0') ? "AND A.TIE_ID IN ($idsTie)" : " AND A.TIE_ID=$tienda ";
        $sql .= "GROUP BY A.ART_ID,A.TIE_ID ORDER BY  CantPed Desc  ";
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;
        return $rawData;
    }
    
    public function reporteConsumoTienda($control) {
        $objPed=new TEMP_CABPEDIDO;
        $data = explode(",",$control);//Recibe Datos y los separa
        $f_ini=$data[1];//Fecha Inicio
        $f_fin=$data[2];//Fecha Inicio
        $tienda=$data[3];//Id Tienda Personalizado
        $rawData = array();
        $con = Yii::app()->db;
        $cliID=Yii::app()->getSession()->get('CliID', FALSE);

        $sql = "SELECT DATE(A.TDPED_FEC_CRE) FECHA,C.TIE_ID,C.TIE_NOMBRE Tienda,B.COD_ART,B.ART_DES_COM DETALLE,
                    MAX(A.TDPED_P_VENTA) P_VENTA,SUM(A.TDPED_CAN_PED) CAN_PED, MAX(A.TDPED_P_VENTA)*SUM(A.TDPED_CAN_PED) TOTAL
                    FROM " . $con->dbname . ".TEMP_DET_PEDIDO A
                        INNER JOIN " . $con->dbname . ".ARTICULO B ON A.ART_ID=B.ART_ID
                        INNER JOIN " . $con->dbname . ".TIENDA C ON A.TIE_ID=C.TIE_ID
                    WHERE A.TDPED_EST_LOG=1 AND A.CLI_ID=$cliID AND TDPED_EST_AUT=1 ";
                $sql .= "AND DATE(A.TDPED_FEC_CRE) BETWEEN '" . date("Y-m-d", strtotime($f_ini)) . "' AND '" . date("Y-m-d", strtotime($f_fin)) . "'  ";
                $sql .=($tienda=='0') ? "" : " AND C.TIE_ID=$tienda ";
                $sql .= "GROUP BY A.TIE_ID,A.ART_ID ORDER BY  C.TIE_NOMBRE ASC  ";
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;
        return $rawData;
    }

    public function reporteConsumoTiendaPedido($control) {
        $objPed=new TEMP_CABPEDIDO;
        //echo $control;
        $f_ini=$control['FEC_INI'];//Fecha Inicio
        $f_fin=$control['FEC_FIN'];//Fecha Inicio
        $tienda=$control['TIE_ID'];//Id Tienda Personalizado

        $tipoData = isset($control['TIPO']) ?CJavaScript::jsonDecode($control['TIPO']) : array();
        $marcaData = isset($control['MARCA']) ?CJavaScript::jsonDecode($control['MARCA']) : array();


        $cadenaTIPO="";
        for ($i = 0; $i < sizeof($tipoData); $i++) {
            if($i == 0){
                $cadenaTIPO="'" . $tipoData[0]['COD_TIP']  ."'";
            }else{
                $cadenaTIPO .=",'" . $tipoData[$i]['COD_TIP']  ."'";
            }
            
        }

        $cadenaMARCA="";
        for ($i = 0; $i < sizeof($marcaData); $i++) {
            //$cadenaMARCA =($i == 0)? "'" .$marcaData[0]['COD_MAR']."'":",'".$marcaData[$i]['COD_MAR']."'";
            if($i == 0){
                $cadenaMARCA="'" . $marcaData[0]['COD_MAR']  ."'";
            }else{
                $cadenaMARCA .=",'" . $marcaData[$i]['COD_MAR']  ."'";
            }
        }


        $rawData = array();
        $con = Yii::app()->db;
        $cliID=Yii::app()->getSession()->get('CliID', FALSE);

        /*$sql = "SELECT DATE(A.TDPED_FEC_CRE) FECHA,C.TIE_ID,C.TIE_NOMBRE Tienda,B.COD_ART,B.ART_DES_COM DETALLE,
                    MAX(A.TDPED_P_VENTA) P_VENTA,SUM(A.TDPED_CAN_PED) CAN_PED, MAX(A.TDPED_P_VENTA)*SUM(A.TDPED_CAN_PED) TOTAL
                    FROM " . $con->dbname . ".TEMP_DET_PEDIDO A
                        INNER JOIN " . $con->dbname . ".ARTICULO B ON A.ART_ID=B.ART_ID
                        INNER JOIN " . $con->dbname . ".TIENDA C ON A.TIE_ID=C.TIE_ID
                    WHERE A.TDPED_EST_LOG=1 AND A.CLI_ID=$cliID AND TDPED_EST_AUT=1 ";
                $sql .= "AND DATE(A.TDPED_FEC_CRE) BETWEEN '" . date("Y-m-d", strtotime($f_ini)) . "' AND '" . date("Y-m-d", strtotime($f_fin)) . "'  ";
                $sql .=($tienda=='0') ? "" : " AND C.TIE_ID=$tienda ";
                $sql .= "GROUP BY A.TIE_ID,A.ART_ID ORDER BY  C.TIE_NOMBRE ASC  ";*/
        
        $sql = "SELECT DATE(A.DPED_FEC_CRE) FECHA,B.COD_ART,B.ART_DES_COM DETALLE,SUM(A.DPED_CAN_PED) CAN_PED,B.COD_TIP,B.COD_MAR,
                        MAX(A.DPED_P_VENTA) P_VENTA,SUM(A.DPED_T_VENTA) TOTAL,COUNT(A.ART_ID) NCANT
                        FROM " . $con->dbname . ".DET_PEDIDO A
                            INNER JOIN " . $con->dbname . ".ARTICULO B ON A.ART_ID=B.ART_ID
                    WHERE A.DPED_EST_LOG=1 AND A.CLI_ID=$cliID AND A.TIE_ID=$tienda "; 
                $sql .= " AND DATE(A.DPED_FEC_CRE) BETWEEN '" . date("Y-m-d", strtotime($f_ini)) . "' AND '" . date("Y-m-d", strtotime($f_fin)) . "'  ";
                //$sql .= "  AND (B.COD_TIP IN ($cadenaTIPO) OR B.COD_MAR IN ($cadenaMARCA)) ";
                if($cadenaTIPO!='' || $cadenaMARCA!=''){
                    $sql .= " AND (";
                    if($cadenaTIPO!=''){
                        $sql .= " B.COD_TIP IN ($cadenaTIPO) ";
                    }
                    if($cadenaMARCA!=''){
                        $sql .=($cadenaTIPO!='') ? " OR " : "";
                        $sql .= " B.COD_MAR IN ($cadenaMARCA) ";
                    }
                    $sql .= ")";
                }
                $sql .= " GROUP BY A.ART_ID ORDER BY A.ART_ID ASC; ";

        //VSValidador::putMessageLogFile($sql);
        //echo $sql;
        
   
        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;
        return $rawData;
    }

}
