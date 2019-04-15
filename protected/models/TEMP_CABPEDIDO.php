<?php

/**
 * This is the model class for table "TEMP_CAB_PEDIDO".
 *
 * The followings are the available columns in table 'TEMP_CAB_PEDIDO':
 * @property string $TCPED_ID
 * @property string $TDOC_ID
 * @property string $TIE_ID
 * @property string $UTIE_ID
 * @property string $TCPED_TOTAL
 * @property string $TCPED_EST_LOG
 * @property string $TCPED_FEC_CRE
 * @property string $TCPED_FEC_MOD
 *
 * The followings are the available model relations:
 * @property CABPEDIDO[] $cABPEDIDOs
 * @property TIPODOCUMENTOS $tDOC
 * @property TIENDA $tIE
 * @property USUARIOTIENDA $uTIE
 * @property TEMPDETPEDIDO[] $tEMPDETPEDIDOs
 */
class TEMP_CABPEDIDO extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'TEMP_CAB_PEDIDO';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('TDOC_ID, TIE_ID, UTIE_ID', 'required'),
            array('TDOC_ID, TIE_ID, UTIE_ID', 'length', 'max' => 20),
            array('TCPED_TOTAL', 'length', 'max' => 14),
            array('TCPED_EST_LOG', 'length', 'max' => 1),
            array('TCPED_FEC_CRE, TCPED_FEC_MOD', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('TCPED_ID, TDOC_ID, TIE_ID, UTIE_ID, TCPED_TOTAL, TCPED_EST_LOG, TCPED_FEC_CRE, TCPED_FEC_MOD', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'cABPEDIDOs' => array(self::HAS_MANY, 'CABPEDIDO', 'TCPED_ID'),
            'tDOC' => array(self::BELONGS_TO, 'TIPODOCUMENTOS', 'TDOC_ID'),
            'tIE' => array(self::BELONGS_TO, 'TIENDA', 'TIE_ID'),
            'uTIE' => array(self::BELONGS_TO, 'USUARIOTIENDA', 'UTIE_ID'),
            'tEMPDETPEDIDOs' => array(self::HAS_MANY, 'TEMPDETPEDIDO', 'TCPED_ID'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'TCPED_ID' => 'Tcped',
            'TDOC_ID' => 'Tdoc',
            'TIE_ID' => 'Tie',
            'UTIE_ID' => 'Utie',
            'TCPED_TOTAL' => 'Tcped Total',
            'TCPED_EST_LOG' => 'Tcped Est Log',
            'TCPED_FEC_CRE' => 'Tcped Fec Cre',
            'TCPED_FEC_MOD' => 'Tcped Fec Mod',
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

        $criteria->compare('TCPED_ID', $this->TCPED_ID, true);
        $criteria->compare('TDOC_ID', $this->TDOC_ID, true);
        $criteria->compare('TIE_ID', $this->TIE_ID, true);
        $criteria->compare('UTIE_ID', $this->UTIE_ID, true);
        $criteria->compare('TCPED_TOTAL', $this->TCPED_TOTAL, true);
        $criteria->compare('TCPED_EST_LOG', $this->TCPED_EST_LOG, true);
        $criteria->compare('TCPED_FEC_CRE', $this->TCPED_FEC_CRE, true);
        $criteria->compare('TCPED_FEC_MOD', $this->TCPED_FEC_MOD, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TEMP_CABPEDIDO the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function insertarLista($tieId,$idsAre,$total, $dts_Lista) {
        $msg = new VSexception();
        $valida = new VSValidador();
        $con = Yii::app()->db;
        $trans = $con->beginTransaction();
        try {
            
            $this->InsertarCabListPedTemp($con,$total, $tieId,$idsAre);
            $idCab = $con->getLastInsertID($con->dbname . '.TEMP_CAB_PEDIDO');
            for ($i = 0; $i < sizeof($dts_Lista); $i++) {
                $artieId = $dts_Lista[$i]['ARTIE_ID'];
                $artId = $dts_Lista[$i]['ART_ID'];
                $cant = $dts_Lista[$i]['CANT'];
                $precio = $dts_Lista[$i]['PRECIO'];
                $subtotal = $dts_Lista[$i]['TOTAL'];
                $observ = $dts_Lista[$i]['OBSERV'];  
                $sql = "INSERT INTO " . $con->dbname . ".TEMP_DET_PEDIDO
                        (TCPED_ID,ARTIE_ID,ART_ID,TDPED_CAN_PED,TDPED_P_VENTA,TDPED_T_VENTA,
                        TDPED_EST_AUT,TDPED_OBSERVA,TDPED_EST_LOG,TDPED_FEC_CRE)VALUES
                        ($idCab,$artieId,$artId,$cant,$precio,$subtotal,'1','$observ','1',CURRENT_TIMESTAMP())";
                //echo $sql;
                $command = $con->createCommand($sql);
                $command->execute();
            }
            $trans->commit();
            $con->active = false;
            return $msg->messagePedidos('OK',$valida->ajusteNumDoc($idCab, 9),'PE',null, 30, null, $idCab);
        } catch (Exception $e) {
            $trans->rollback();
            $con->active = false;
            //throw $e;
            return $msg->messageSystem('NO_OK', $e->getMessage(), 11, null, null);
        }
    }
    
    public function actualizarLista($cabId,$total, $dts_Lista) {
        $msg = new VSexception();
        $valida = new VSValidador();
        $con = Yii::app()->db;
        $trans = $con->beginTransaction();
        try {
            $this->actualizaCabListPedTemp($con,$total, $cabId);
            for ($i = 0; $i < sizeof($dts_Lista); $i++) {
                $detId = $dts_Lista[$i]['DetId'];
                $cant = $dts_Lista[$i]['CANT'];
                $subtotal = $dts_Lista[$i]['TOTAL'];
                $observ = $dts_Lista[$i]['OBSERV']; 
                $sql = "UPDATE " . $con->dbname . ".TEMP_DET_PEDIDO "
                        . "SET TDPED_CAN_PED=$cant,TDPED_T_VENTA=$subtotal,TDPED_OBSERVA='$observ',TDPED_FEC_MOD=CURRENT_TIMESTAMP() "
                        . "WHERE TDPED_ID=$detId AND TDPED_EST_LOG='1' ";
                //echo $sql;
                $command = $con->createCommand($sql);
                $command->execute();
            }
            $trans->commit();
            $con->active = false;
            return $msg->messagePedidos('OK',$valida->ajusteNumDoc($cabId, 9),'PE',null, 30, null, null);
        } catch (Exception $e) {
            $trans->rollback();
            $con->active = false;
            //throw $e;
            return $msg->messageSystem('NO_OK', $e->getMessage(), 11, null, null);
        }
    }
    
    private function InsertarCabListPedTemp($con,$total,$tieId,$idsAre) {
        $utieId=Yii::app()->getSession()->get('UtieId', FALSE);        
        $sql="INSERT INTO " . $con->dbname . ".TEMP_CAB_PEDIDO
                (TDOC_ID,TIE_ID,UTIE_ID,TCPED_TOTAL,TCPED_EST_LOG,TCPED_FEC_CRE,IDS_ARE)VALUES
                (1,$tieId,$utieId,$total,1,CURRENT_TIMESTAMP(),$idsAre);";
        $command = $con->createCommand($sql);
        $command->execute();
    }
    
    private function actualizaCabListPedTemp($con,$total,$cabId) {
        $sql = "UPDATE " . $con->dbname . ".TEMP_CAB_PEDIDO SET TCPED_TOTAL=$total "
                . "WHERE TCPED_ID=$cabId";
        $command = $con->createCommand($sql);
        $command->execute();
    }
    
    public function recuperarIdsTiendasRol($con) {
        $rol_Id=Yii::app()->getSession()->get('RolId', FALSE);
        $usu_Id=Yii::app()->getSession()->get('user_id', FALSE);
        $sql = "SELECT B.TIE_ID
                        FROM " . $con->dbname . ".USUARIO_TIENDA A
                                INNER JOIN " . $con->dbname . ".TIENDA B
                                        ON A.TIE_ID=B.TIE_ID
                WHERE A.UTIE_EST_LOG=1 AND A.ROL_ID=$rol_Id AND USU_ID=$usu_Id ";
        //echo $sql;
        $rawData =$con->createCommand($sql)->queryAll();
        $tieId="";
        for ($i = 0; $i < sizeof($rawData); $i++) {
            $tieId .= ($i == 0)?$rawData[$i]['TIE_ID']:','.$rawData[$i]['TIE_ID'];
        }
                
        return $tieId;
    }
    
    
    public function listarPedidosTiendas($control) {
        $rawData = array();
        $con = Yii::app()->db;
        $idsTie=$this->recuperarIdsTiendasRol($con);
        $limitrowsql = Yii::app()->params['limitRowSQL'];
        //$rawData[]=$this->rowProdList();
        $sql = "SELECT A.TCPED_ID PedID,A.TIE_ID TieID,A.TCPED_TOTAL Total,DATE(A.TCPED_FEC_CRE) FechaPedido, 
                        B.TIE_NOMBRE NombreTienda,B.TIE_DIRECCION DireccionTienda,E.PER_NOMBRE NombrePersona,
                        CONCAT(REPEAT( '0', 9 - LENGTH(A.TCPED_ID) ),A.TCPED_ID) Numero,A.TCPED_EST_LOG Estado
                        FROM " . $con->dbname . ".TEMP_CAB_PEDIDO A
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
            $sql .= ($control[0]['EST_LOG'] != "0") ? " A.TCPED_EST_LOG = '" . $control[0]['EST_LOG'] . "' " : " A.TCPED_EST_LOG<>'' ";
            $sql .= ($control[0]['TIE_ID'] > 0) ? "AND A.TIE_ID = '" . $control[0]['TIE_ID'] . "' " : $sqlTieId;
            //$sql .= ($control[0]['COD_PACIENTE'] != "0") ? "AND CDOR_ID_PACIENTE='".$control[0]['COD_PACIENTE']."' " : "";
            //$sql .= ($control[0]['PACIENTE'] != "") ? "AND CONCAT(B.PER_APELLIDO,' ',B.PER_NOMBRE) LIKE '%" . $control[0]['PACIENTE'] . "%' " : "";
            $sql .= "AND DATE(A.TCPED_FEC_CRE) BETWEEN '" . date("Y-m-d", strtotime($control[0]['F_INI'])) . "' AND '" . date("Y-m-d", strtotime($control[0]['F_FIN'])) . "'  ";
        }else{
            $sql .= "A.TCPED_EST_LOG<>'' ";
            $sql .= $sqlTieId;
        }
        $sql .= "ORDER BY A.TCPED_ID DESC LIMIT $limitrowsql";
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;

        return new CArrayDataProvider($rawData, array(
            'keyField' => 'PedID',
            'sort' => array(
                'attributes' => array(
                    'PedID', 'Numero', 'TieID', 'Total', 'FechaPedido', 'NombreTienda', 'DireccionTienda', 'NombrePersona', 'Estado'
                ),
            ),
            'totalItemCount' => count($rawData),
            'pagination' => array(
                'pageSize' => Yii::app()->params['pageSize'],
            ),
        ));
    }

    public function anularPedidoTemp($ids) {
        $msg= new VSexception();
        $con = Yii::app()->db;
        $trans = $con->beginTransaction();
        try {
            $sql = "UPDATE " . $con->dbname . ".TEMP_CAB_PEDIDO SET TCPED_EST_LOG='4' "
                    . "WHERE TCPED_ID IN($ids) AND TCPED_EST_LOG IN(1)";//Anula solo los peidos
            $comando = $con->createCommand($sql);
            $comando->execute();
            $trans->commit();
            $con->active = false;
            return $msg->messageSystem('OK',null,12,null, null);
        } catch (Exception $e) { // se arroja una excepción si una consulta falla
            $trans->rollBack();
            //throw $e;
            $con->active = false;
            return $msg->messageSystem('NO_OK', $e->getMessage(), 11, null, null);
        }
    }
    
    public function anularItemPedidoTemp($ids) {
        $msg= new VSexception();
        $con = Yii::app()->db;
        $trans = $con->beginTransaction();
        try {
            $sql = "UPDATE " . $con->dbname . ".TEMP_DET_PEDIDO SET TDPED_CAN_PED=0,TDPED_T_VENTA=0,TDPED_EST_AUT='0' WHERE TDPED_ID IN($ids)";
            $comando = $con->createCommand($sql);
            $comando->execute();
            $trans->commit();
            $con->active = false;
            return $msg->messageSystem('OK',null,12,null, null);
        } catch (Exception $e) { // se arroja una excepción si una consulta falla
            $trans->rollBack();
            //throw $e;
            $con->active = false;
            return $msg->messageSystem('NO_OK', $e->getMessage(), 11, null, null);
        }
    }
    
    public function cabeceraPedidoTemp($ids) {
        $con = yii::app()->db;
        $sql = "SELECT A.TCPED_ID PedID,CONCAT(REPEAT( '0', 9 - LENGTH(A.TCPED_ID) ),A.TCPED_ID) Numero,B.TIE_ID TieID,
                        A.TCPED_TOTAL Total,DATE(A.TCPED_FEC_CRE) FechaPedido,B.TIE_NOMBRE NombreTienda
                        FROM " . $con->dbname . ".TEMP_CAB_PEDIDO A
                                INNER JOIN " . $con->dbname . ".TIENDA B
                                        ON A.TIE_ID=B.TIE_ID
                WHERE A.TCPED_ID=$ids ;";
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryRow();//Retorna solo 1
        $con->active = false;
        return $rawData;
    }
    
    public function detallePedidoTemp($ids) {
        $rawData = array();
        $con = Yii::app()->db;
        //$rawData[]=$this->rowProdList();
        $sql = "SELECT A.TDPED_ID DetId,A.ART_ID ArtId,A.TDPED_CAN_PED Cantidad,A.TDPED_P_VENTA Precio,
                        A.TDPED_T_VENTA TotVta,A.TDPED_EST_AUT EstAut,A.TDPED_OBSERVA Observacion,B.COD_ART Codigo,
                        B.ART_DES_COM Nombre,B.ART_I_M_IVA ImIva
                        FROM " . $con->dbname . ".TEMP_DET_PEDIDO A
                                INNER JOIN " . $con->dbname . ".ARTICULO B
                                        ON A.ART_ID=B.ART_ID
                WHERE A.TCPED_ID=$ids ";
        
        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;

        return new CArrayDataProvider($rawData, array(
            'keyField' => 'DetId',
            'sort' => array(
                'attributes' => array(
                    'DetId','ArtId','Cantidad','Precio','TotVta','EstAut','Observacion','Codigo','Nombre','ImIva'
                ),
            ),
            'totalItemCount' => count($rawData),
            'pagination' => array(
                'pageSize' => Yii::app()->params['pageSize'],
            ),
        ));
    }
    
    
    public function listarPedidosTiendasResumen($control) {
        VSValidador::putMessageLogFile("llego");
        //VSValidador::putMessageLogFile($control);
        $rawData = array();
        $con = Yii::app()->db;
        $idsTie=$this->recuperarIdsTiendasRol($con);
        $limitrowsql = Yii::app()->params['limitRowSQL'];
        //$rawData[]=$this->rowProdList();
        $sql = "SELECT A.TCPED_ID PedID,A.TIE_ID TieID,A.TCPED_TOTAL Total,DATE(A.TCPED_FEC_CRE) FechaPedido, 
                        B.TIE_NOMBRE NombreTienda,F.NOM_ARE Area,B.TIE_DIRECCION DireccionTienda,E.PER_NOMBRE NombrePersona,
                        CONCAT(REPEAT( '0', 9 - LENGTH(A.TCPED_ID) ),A.TCPED_ID) Numero,A.TCPED_EST_LOG Estado
                        FROM " . $con->dbname . ".TEMP_CAB_PEDIDO A
                                INNER JOIN " . $con->dbname . ".TIENDA B
                                        ON A.TIE_ID=B.TIE_ID
                                INNER JOIN " . $con->dbname . ".AREAS F
                                        ON A.IDS_ARE=F.IDS_ARE
                                INNER JOIN (" . $con->dbname . ".USUARIO_TIENDA C
                                                INNER JOIN (" . $con->dbname . ".USUARIO D
                                                                INNER JOIN " . $con->dbname . ".PERSONA E
                                                                        ON D.PER_ID=E.PER_ID)
                                                        ON C.USU_ID=D.USU_ID)
                                        ON C.UTIE_ID=A.UTIE_ID
                WHERE  "; //A.TCPED_EST_LOG=1 AND
        $sqlTieId=($idsTie!='') ? "AND A.TIE_ID IN ($idsTie)" : "";
        if (!empty($control)) {//Verifica la Opcion op para los filtros
            $sql .= ($control[0]['EST_LOG'] != "0") ? " A.TCPED_EST_LOG = '" . $control[0]['EST_LOG'] . "' " : " A.TCPED_EST_LOG<>'' ";
            //$sql .= ($control[0]['TIE_ID'] > 0) ? "AND A.TIE_ID = '" . $control[0]['TIE_ID'] . "' " : $sqlTieId;
            $sql .= ($control[0]['TIE_ID'] != 0) ? "AND A.TIE_ID = '" . $control[0]['TIE_ID'] . "' " : "";
            $sql .= ($control[0]['IDS_ARE'] != "0") ? "AND A.IDS_ARE='".$control[0]['IDS_ARE']."' " : "";
            //$sql .= ($control[0]['PACIENTE'] != "") ? "AND CONCAT(B.PER_APELLIDO,' ',B.PER_NOMBRE) LIKE '%" . $control[0]['PACIENTE'] . "%' " : "";
            $sql .= "AND DATE(A.TCPED_FEC_CRE) BETWEEN '" . date("Y-m-d", strtotime($control[0]['F_INI'])) . "' AND '" . date("Y-m-d", strtotime($control[0]['F_FIN'])) . "'  ";
        }else{
            $sql .= "A.TCPED_EST_LOG<>'' ";
            $sql .= $sqlTieId;
        }
        $sql .= "ORDER BY A.TCPED_ID DESC LIMIT $limitrowsql";
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;

        return new CArrayDataProvider($rawData, array(
            'keyField' => 'PedID',
            'sort' => array(
                'attributes' => array(
                    'PedID', 'Numero', 'TieID', 'Total', 'FechaPedido', 'NombreTienda','Area', 'DireccionTienda', 'NombrePersona', 'Estado'
                ),
            ),
            'totalItemCount' => count($rawData),
            'pagination' => array(
                'pageSize' => Yii::app()->params['pageSize'],
            ),
        ));
    }
    
    
    public function listarPedidosTiendasGrupoResumen($control) {
        VSValidador::putMessageLogFile("llego");
        //VSValidador::putMessageLogFile($control);
        $rawData = array();
        $con = Yii::app()->db;
        $idsTie=$this->recuperarIdsTiendasRol($con);
        $limitrowsql = Yii::app()->params['limitRowSQL'];
        
        $sql = "SELECT A.IDS_ARE IDS,F.NOM_ARE AREA,COUNT(A.TCPED_ID)TOT_DOC,SUM(A.TCPED_TOTAL) TOTAL                        
                    FROM " . $con->dbname . ".TEMP_CAB_PEDIDO A
                            INNER JOIN " . $con->dbname . ".TIENDA B
                                    ON A.TIE_ID=B.TIE_ID
                            INNER JOIN " . $con->dbname . ".AREAS F
                                    ON A.IDS_ARE=F.IDS_ARE
                            INNER JOIN (" . $con->dbname . ".USUARIO_TIENDA C
                                            INNER JOIN (" . $con->dbname . ".USUARIO D
                                                            INNER JOIN " . $con->dbname . ".PERSONA E
                                                                    ON D.PER_ID=E.PER_ID)
                                                    ON C.USU_ID=D.USU_ID)
                                    ON C.UTIE_ID=A.UTIE_ID
                WHERE  A.TCPED_EST_LOG=1 ";        
            $sql .= " AND DATE(A.TCPED_FEC_CRE) BETWEEN '" . date("Y-m-d", strtotime($control[0]['F_INI'])) . "' AND '" . date("Y-m-d", strtotime($control[0]['F_FIN'])) . "'  ";
            $sql .= " GROUP BY A.IDS_ARE ";
            $sql .= " ORDER BY A.IDS_ARE DESC LIMIT $limitrowsql";
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;

        return new CArrayDataProvider($rawData, array(
            'keyField' => 'IDS',
            'sort' => array(
                'attributes' => array(
                    'IDS', 'AREA', 'TOT_DOC', 'TOTAL',
                ),
            ),
            'totalItemCount' => count($rawData),
            'pagination' => array(
                'pageSize' => Yii::app()->params['pageSize'],
            ),
        ));
    }


}
