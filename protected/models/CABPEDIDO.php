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

    public function insertarPedidos($Ids) {
        $msg = new VSexception();
        $valida = new VSValidador();
        $con = Yii::app()->db;
        $trans = $con->beginTransaction();
        try {
            $cabFact = $this->buscarCabPedidosTemp($con,$Ids);
            for ($i = 0; $i < sizeof($cabFact); $i++) {
                $this->InsertarCabFactura($con, $cabFact, $i);
                $idCab = $con->getLastInsertID($con->dbname . '.CAB_PEDIDO');
                $detFact = $this->buscarDetPedidosTemp($con,$cabFact[$i]['TCPED_ID']);
                $this->InsertarDetFactura($con, $detFact, $idCab, $cabFact[$i]['TIE_ID']);
                $this->actTemCabPed($con,$cabFact[$i]['TCPED_ID']);
            }
            $trans->commit();
            $con->active = false;
            return $msg->messageSystem('OK', null, 30, null, null);
        } catch (Exception $e) {
            $trans->rollback();
            $con->active = false;
            //throw $e;
            return $msg->messageSystem('NO_OK', $e->getMessage(), 11, null, null);
        }
    }

    private function buscarCabPedidosTemp($con,$ids) {
        //$con = yii::app()->db;
        $rawData = array();
        //Lista solo los que estan listos a envair.. 
        $sql = "SELECT * FROM " . $con->dbname . ".TEMP_CAB_PEDIDO WHERE TCPED_ID IN($ids) AND  TCPED_EST_LOG=1";
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

    private function InsertarCabFactura($con, $objEnt, $i) {
        $utieId = Yii::app()->getSession()->get('UtieId', FALSE);
        $sql = "INSERT INTO VSSEAPEDIDO.CAB_PEDIDO
                (TDOC_ID,TIE_ID,TCPED_ID,CPED_FEC_PED,CPED_VAL_BRU,CPED_POR_DES,CPED_VAL_DES,CPED_POR_IVA,CPED_VAL_IVA,
                 CPED_BAS_IVA,CPED_BAS_IV0,CPED_VAL_FLE,CPED_VAL_NET,CPED_EST_PED,CPED_EST_LOG,UTIE_ID_PED,UTIE_ID)VALUES
                (2,'" . $objEnt[$i]['TIE_ID'] . "','" . $objEnt[$i]['TCPED_ID'] . "',CURRENT_TIMESTAMP(),
                   '" . $objEnt[$i]['TCPED_TOTAL'] . "',0,0,0,0,0,0,0,'" . $objEnt[$i]['TCPED_TOTAL'] . "','1','1',
                    '" . $objEnt[$i]['UTIE_ID'] . "','$utieId') ";

        $command = $con->createCommand($sql);
        $command->execute();
    }

    private function InsertarDetFactura($con, $detFact, $idCab, $tieId) {
        for ($i = 0; $i < sizeof($detFact); $i++) {
            $sql = "INSERT INTO " . $con->dbname . ".DET_PEDIDO
                    (CPED_ID,ART_ID,TIE_ID,DPED_CAN_PED,DPED_P_VENTA,DPED_I_M_IVA,DPED_VAL_DES,
                     DPED_POR_DES,DPED_T_VENTA,DPED_FEC_CRE,DPED_EST_LOG)VALUES($idCab,
                     '" . $detFact[$i]['ART_ID'] . "','$tieId','" . $detFact[$i]['TDPED_CAN_PED'] . "',
                     '" . $detFact[$i]['TDPED_P_VENTA'] . "','0','0','0',
                     '" . $detFact[$i]['TDPED_T_VENTA'] . "',CURRENT_TIMESTAMP(),'1');";
            $command = $con->createCommand($sql);
            $command->execute();
        }
    }
    
    private function actTemCabPed($con,$ids) {
        $sql = "UPDATE " . $con->dbname . ".TEMP_CAB_PEDIDO SET TCPED_EST_LOG='3' WHERE TCPED_ID=$ids";
        $command = $con->createCommand($sql);
        $command->execute();
    }

}
