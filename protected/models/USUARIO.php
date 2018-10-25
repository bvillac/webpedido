<?php

/**
 * This is the model class for table "USUARIO".
 *
 * The followings are the available columns in table 'USUARIO':
 * @property string $USU_ID
 * @property string $PER_ID
 * @property string $USU_NOMBRE
 * @property string $USU_ALIAS
 * @property string $USU_CORREO
 * @property string $USU_PASSWORD
 * @property string $USU_EST_LOG
 * @property string $USU_FEC_CRE
 * @property string $USU_FEC_MOD
 *
 * The followings are the available model relations:
 * @property PERSONA $pER
 * @property USUARIOTIENDA[] $uSUARIOTIENDAs
 */
class USUARIO extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'USUARIO';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('PER_ID', 'required'),
            array('PER_ID', 'length', 'max' => 20),
            array('USU_NOMBRE', 'length', 'max' => 100),
            array('USU_ALIAS, USU_PASSWORD', 'length', 'max' => 50),
            array('USU_CORREO', 'length', 'max' => 60),
            array('USU_EST_LOG', 'length', 'max' => 1),
            array('USU_FEC_CRE, USU_FEC_MOD', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('USU_ID, PER_ID, USU_NOMBRE, USU_ALIAS, USU_CORREO, USU_PASSWORD, USU_EST_LOG, USU_FEC_CRE, USU_FEC_MOD', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'pER' => array(self::BELONGS_TO, 'PERSONA', 'PER_ID'),
            'uSUARIOTIENDAs' => array(self::HAS_MANY, 'USUARIOTIENDA', 'USU_ID'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'USU_ID' => 'Usu',
            'PER_ID' => 'Per',
            'USU_NOMBRE' => 'Usu Nombre',
            'USU_ALIAS' => 'Usu Alias',
            'USU_CORREO' => 'Usu Correo',
            'USU_PASSWORD' => 'Usu Password',
            'USU_EST_LOG' => 'Usu Est Log',
            'USU_FEC_CRE' => 'Usu Fec Cre',
            'USU_FEC_MOD' => 'Usu Fec Mod',
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

        $criteria->compare('USU_ID', $this->USU_ID, true);
        $criteria->compare('PER_ID', $this->PER_ID, true);
        $criteria->compare('USU_NOMBRE', $this->USU_NOMBRE, true);
        $criteria->compare('USU_ALIAS', $this->USU_ALIAS, true);
        $criteria->compare('USU_CORREO', $this->USU_CORREO, true);
        $criteria->compare('USU_PASSWORD', $this->USU_PASSWORD, true);
        $criteria->compare('USU_EST_LOG', $this->USU_EST_LOG, true);
        $criteria->compare('USU_FEC_CRE', $this->USU_FEC_CRE, true);
        $criteria->compare('USU_FEC_MOD', $this->USU_FEC_MOD, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return USUARIO the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function recuperarTiendasUsuario($idstie) {
        $ids = Yii::app()->getSession()->get('user_id', FALSE);
        $con = yii::app()->db;
//        $sql = "SELECT B.TIE_ID,C.TIE_NOMBRE "
//                . " FROM " . $con->dbname . ".USUARIO A
//                        INNER JOIN (" . $con->dbname . ".USUARIO_TIENDA B
//                                        INNER JOIN " . $con->dbname . ".TIENDA C
//                                                ON B.TIE_ID=C.TIE_ID)
//                                ON A.USU_ID=B.USU_ID
//                WHERE A.USU_EST_LOG=1 ";
//        $sql .= ($ids != "") ? "AND A.USU_ID=$ids " : " ";

        $sql = "SELECT B.TIE_ID,B.TIE_NOMBRE 
                        FROM VSSEAPEDIDO.CLIENTE A
                                INNER JOIN (VSSEAPEDIDO.TIENDA B
                                                INNER JOIN VSSEAPEDIDO.USUARIO_TIENDA C
                                                        ON B.TIE_ID=C.TIE_ID AND UTIE_EST_LOG=1)
                                        ON A.CLI_ID=B.CLI_ID
                WHERE A.CLI_EST_LOG=1 ";
        $sql .= ($ids != "") ? "AND C.USU_ID=$ids " : "";
        $sql .= ($idstie != "") ? "AND A.CLI_ID=$idstie " : "";

        //echo $sql;
        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;
        return $rawData;
    }

    public function recuperarClienteUsuario() {
        $ids = Yii::app()->getSession()->get('user_id', FALSE);
        $con = yii::app()->db;
        $sql = "SELECT DISTINCT(D.CLI_ID) CLI_ID,D.CLI_NOMBRE 
                        FROM " . $con->dbname . ".USUARIO A
                                INNER JOIN (" . $con->dbname . ".USUARIO_TIENDA B
                                        INNER JOIN (" . $con->dbname . ".TIENDA C
                                                INNER JOIN " . $con->dbname . ".CLIENTE D
                                                        ON D.CLI_ID=C.CLI_ID)
                                                ON B.TIE_ID=C.TIE_ID)
                                ON A.USU_ID=B.USU_ID
                WHERE A.USU_EST_LOG=1 ";
        $sql .= ($ids != "") ? "AND A.USU_ID=$ids " : " ";
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;
        return $rawData;
    }
    
    
     public function retornarBuscarUser($valor, $op) {
        $con = Yii::app()->db;
        $rawData = array();

        $sql = "SELECT USU_ID Ids,USU_NOMBRE Nombre "
                . "FROM " . $con->dbname . ".USUARIO "
                . "WHERE USU_EST_LOG=1 AND USU_NOMBRE LIKE '%$valor%' ";
        $sql .= " LIMIT " . Yii::app()->params['limitRow'];
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;
        return $rawData;
    }
    
    
    public function insertarUsuTiendas($objEnt) {
        $msg = new VSexception();
        $con = Yii::app()->db;
        $trans = $con->beginTransaction();
        $cli_Id=Yii::app()->getSession()->get('CliID', FALSE);
        try {
            $tie = $objEnt['TIE'];
            $rol = $objEnt['ROL'];
            $ids = $objEnt['IDS'];
            if (!$this->existeUsuTienda($con, $ids, $tie, $rol)) {
                //Si No existe
                $sql = "INSERT INTO " . $con->dbname . ".USUARIO_TIENDA
                        (USU_ID,TIE_ID,ROL_ID,CLI_ID,UTIE_EST_LOG,UTIE_FEC_CRE)VALUES
                        ($ids,$tie,$rol,$cli_Id,'1',CURRENT_TIMESTAMP()) ";
                $command = $con->createCommand($sql);
                $command->execute();
            }

            $trans->commit();
            $con->active = false;
            return $msg->messageSystem('OK', null, 10, null, null);
        } catch (Exception $e) {
            $trans->rollback();
            $con->active = false;
            //throw $e;
            return $msg->messageSystem('NO_OK', $e->getMessage(), 11, null, null);
        }
    }

    private function existeUsuTienda($con,$ids,$tie,$rol) {
        $rawData = array();
        $sql = "SELECT UTIE_ID FROM " . $con->dbname . ".USUARIO_TIENDA 
                    WHERE USU_ID=$ids AND TIE_ID=$tie AND ROL_ID=$rol ";
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryRow();
        if ($rawData === false)
            return false; //en caso de que existe problema o no retorne nada tiene false por defecto 
        return true;//$rawData['UTIE_ID'];
    }
    
    public function removerUserTie($ids) {
        $msg= new VSexception();
        $con = Yii::app()->db;
        $trans = $con->beginTransaction();
        try {
            $sql = "UPDATE " . $con->dbname . ".USUARIO_TIENDA SET UTIE_EST_LOG='0' WHERE UTIE_ID IN($ids)";
            $comando = $con->createCommand($sql);
            $comando->execute();
            //echo $sql;
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
    
    public function cambiarPassword($pass) {
        $ids = Yii::app()->getSession()->get('user_id', FALSE);
        $msg= new VSexception();
        $con = Yii::app()->db;
        $trans = $con->beginTransaction();
        try {
            $sql = "UPDATE " . $con->dbname . ".USUARIO SET USU_PASSWORD=MD5('$pass') WHERE USU_ID=$ids ";
            $comando = $con->createCommand($sql);
            $comando->execute();
            //echo $sql;
            $trans->commit();
            $con->active = false;
            return $msg->messageSystem('OK',null,20,null, null);
        } catch (Exception $e) { // se arroja una excepción si una consulta falla
            $trans->rollBack();
            //throw $e;
            $con->active = false;
            return $msg->messageSystem('NO_OK', $e->getMessage(), 11, null, null);
        }
    }



    

}
