<?php

/**
 * This is the model class for table "ROL".
 *
 * The followings are the available columns in table 'ROL':
 * @property string $ROL_ID
 * @property string $ROL_NOMBRE
 * @property string $EST_LOG
 * @property string $FEC_CRE
 * @property string $FEC_MOD
 *
 * The followings are the available model relations:
 * @property USUARIOTIENDA[] $uSUARIOTIENDAs
 */
class ROL extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'ROL';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('ROL_NOMBRE', 'length', 'max' => 100),
            array('EST_LOG', 'length', 'max' => 1),
            array('FEC_CRE, FEC_MOD', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('ROL_ID, ROL_NOMBRE, EST_LOG, FEC_CRE, FEC_MOD', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'uSUARIOTIENDAs' => array(self::HAS_MANY, 'USUARIOTIENDA', 'ROL_ID'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'ROL_ID' => 'Rol',
            'ROL_NOMBRE' => 'Rol Nombre',
            'EST_LOG' => 'Est Log',
            'FEC_CRE' => 'Fec Cre',
            'FEC_MOD' => 'Fec Mod',
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

        $criteria->compare('ROL_ID', $this->ROL_ID, true);
        $criteria->compare('ROL_NOMBRE', $this->ROL_NOMBRE, true);
        $criteria->compare('EST_LOG', $this->EST_LOG, true);
        $criteria->compare('FEC_CRE', $this->FEC_CRE, true);
        $criteria->compare('FEC_MOD', $this->FEC_MOD, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ROL the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function buscarTipoUser($IdUser) {
        $conApp = yii::app()->db;
        $rawData = array();
        $sql = "SELECT A.UTIE_ID,A.USU_ID,B.USU_NOMBRE,C.ROL_ID,C.ROL_NOMBRE "
                . "FROM " . $conApp->dbname . ".USUARIO_TIENDA A "
                . " INNER JOIN " . $conApp->dbname . ".USUARIO B "
                . "     ON A.USU_ID=B.USU_ID "
                . " INNER JOIN  " . $conApp->dbname . ".ROL C "
                . "     ON A.ROL_ID=C.ROL_ID "
                . "WHERE A.USU_ID=$IdUser AND B.USU_EST_LOG=1 AND A.UTIE_EST_LOG=1 ";
        //echo $sql;
        //$rawData = $conApp->createCommand($sql)->queryAll(); //Varios registros =>  $rawData[0]['RazonSocial']
        $rawData = $conApp->createCommand($sql)->queryRow();  //Un solo Registro => $rawData['RazonSocial']
        $conApp->active = false;
        return $rawData;
    }

    public function recuperarRolTienda() {
        $con = yii::app()->db;
        $sql = "SELECT ROL_ID,ROL_NOMBRE FROM " . $con->dbname . ".ROL WHERE EST_LOG=1 AND ROL_ID IN(2,3,7,8,9,11);";
        //echo $sql;
        $rawData =$con->createCommand($sql)->query();
        $con->active = false;
        return $rawData;
    }

}
