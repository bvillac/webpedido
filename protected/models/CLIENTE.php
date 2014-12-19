<?php

/**
 * This is the model class for table "CLIENTE".
 *
 * The followings are the available columns in table 'CLIENTE':
 * @property string $CLI_ID
 * @property string $COD_CLIE
 * @property string $CLI_CED_RUC
 * @property string $CLI_NOMBRE
 * @property string $CLI_EST_LOG
 * @property string $CLI_FEC_CRE
 * @property string $CLI_FEC_MOD
 *
 * The followings are the available model relations:
 * @property PRECIOCLIENTE[] $pRECIOCLIENTEs
 * @property TIENDA[] $tIENDAs
 */
class CLIENTE extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'CLIENTE';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('COD_CLIE', 'length', 'max'=>20),
			array('CLI_CED_RUC', 'length', 'max'=>15),
			array('CLI_NOMBRE', 'length', 'max'=>100),
			array('CLI_EST_LOG', 'length', 'max'=>1),
			array('CLI_FEC_CRE, CLI_FEC_MOD', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('CLI_ID, COD_CLIE, CLI_CED_RUC, CLI_NOMBRE, CLI_EST_LOG, CLI_FEC_CRE, CLI_FEC_MOD', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'pRECIOCLIENTEs' => array(self::HAS_MANY, 'PRECIOCLIENTE', 'CLI_ID'),
			'tIENDAs' => array(self::HAS_MANY, 'TIENDA', 'CLI_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'CLI_ID' => 'Cli',
			'COD_CLIE' => 'Cod Clie',
			'CLI_CED_RUC' => 'Cli Ced Ruc',
			'CLI_NOMBRE' => 'Cli Nombre',
			'CLI_EST_LOG' => 'Cli Est Log',
			'CLI_FEC_CRE' => 'Cli Fec Cre',
			'CLI_FEC_MOD' => 'Cli Fec Mod',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('CLI_ID',$this->CLI_ID,true);
		$criteria->compare('COD_CLIE',$this->COD_CLIE,true);
		$criteria->compare('CLI_CED_RUC',$this->CLI_CED_RUC,true);
		$criteria->compare('CLI_NOMBRE',$this->CLI_NOMBRE,true);
		$criteria->compare('CLI_EST_LOG',$this->CLI_EST_LOG,true);
		$criteria->compare('CLI_FEC_CRE',$this->CLI_FEC_CRE,true);
		$criteria->compare('CLI_FEC_MOD',$this->CLI_FEC_MOD,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CLIENTE the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
