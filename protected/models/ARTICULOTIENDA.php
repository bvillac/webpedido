<?php

/**
 * This is the model class for table "ARTICULO_TIENDA".
 *
 * The followings are the available columns in table 'ARTICULO_TIENDA':
 * @property string $ARTIE_ID
 * @property string $TIE_ID
 * @property string $PCLI_ID
 * @property string $ARTIE_EST_LOG
 * @property string $ARTIE_FEC_CRE
 * @property string $ARTIE_FEC_MOD
 *
 * The followings are the available model relations:
 * @property PRECIOCLIENTE $pCLI
 * @property TIENDA $tIE
 * @property TEMPDETPEDIDO[] $tEMPDETPEDIDOs
 */
class ARTICULOTIENDA extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'ARTICULO_TIENDA';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('TIE_ID, PCLI_ID', 'required'),
            array('TIE_ID, PCLI_ID', 'length', 'max' => 20),
            array('ARTIE_EST_LOG', 'length', 'max' => 1),
            array('ARTIE_FEC_CRE, ARTIE_FEC_MOD', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('ARTIE_ID, TIE_ID, PCLI_ID, ARTIE_EST_LOG, ARTIE_FEC_CRE, ARTIE_FEC_MOD', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'pCLI' => array(self::BELONGS_TO, 'PRECIOCLIENTE', 'PCLI_ID'),
            'tIE' => array(self::BELONGS_TO, 'TIENDA', 'TIE_ID'),
            'tEMPDETPEDIDOs' => array(self::HAS_MANY, 'TEMPDETPEDIDO', 'ARTIE_ID'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'ARTIE_ID' => 'Artie',
            'TIE_ID' => 'Tie',
            'PCLI_ID' => 'Pcli',
            'ARTIE_EST_LOG' => 'Artie Est Log',
            'ARTIE_FEC_CRE' => 'Artie Fec Cre',
            'ARTIE_FEC_MOD' => 'Artie Fec Mod',
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

        $criteria->compare('ARTIE_ID', $this->ARTIE_ID, true);
        $criteria->compare('TIE_ID', $this->TIE_ID, true);
        $criteria->compare('PCLI_ID', $this->PCLI_ID, true);
        $criteria->compare('ARTIE_EST_LOG', $this->ARTIE_EST_LOG, true);
        $criteria->compare('ARTIE_FEC_CRE', $this->ARTIE_FEC_CRE, true);
        $criteria->compare('ARTIE_FEC_MOD', $this->ARTIE_FEC_MOD, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ARTICULOTIENDA the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function recuperarClientes() {
        $con = yii::app()->db;
        $idRol=Yii::app()->getSession()->get('RolId', FALSE);//Rol del Usuario.
        $cli_Id=Yii::app()->getSession()->get('CliID', FALSE);
        if($idRol==1 || $idRol==2){
            $sql = "SELECT CLI_ID,CLI_NOMBRE FROM " . $con->dbname . ".CLIENTE WHERE CLI_EST_LOG=1 ";
        } else {
            $sql = "SELECT CLI_ID,CLI_NOMBRE FROM " . $con->dbname . ".CLIENTE WHERE CLI_ID=$cli_Id AND CLI_EST_LOG=1 ";
        }
        return $con->createCommand($sql)->query();
    }

}
