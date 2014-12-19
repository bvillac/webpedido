<?php

/**
 * This is the model class for table "PRECIO_CLIENTE".
 *
 * The followings are the available columns in table 'PRECIO_CLIENTE':
 * @property string $PCLI_ID
 * @property string $CLI_ID
 * @property string $ART_ID
 * @property string $PCLI_P_VENTA
 * @property string $PCLI_POR_DES
 * @property string $PCLI_VAL_DES
 * @property string $PCLI_EST_LOG
 * @property string $PCLI_FEC_CRE
 * @property string $PCLI_FEC_MOD
 *
 * The followings are the available model relations:
 * @property ARTICULOTIENDA[] $aRTICULOTIENDAs
 * @property CLIENTE $cLI
 * @property ARTICULO $aRT
 */
class PRECIOCLIENTE extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'PRECIO_CLIENTE';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CLI_ID, ART_ID', 'required'),
			array('CLI_ID, ART_ID', 'length', 'max'=>20),
			array('PCLI_P_VENTA, PCLI_VAL_DES', 'length', 'max'=>10),
			array('PCLI_POR_DES', 'length', 'max'=>5),
			array('PCLI_EST_LOG', 'length', 'max'=>1),
			array('PCLI_FEC_CRE, PCLI_FEC_MOD', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('PCLI_ID, CLI_ID, ART_ID, PCLI_P_VENTA, PCLI_POR_DES, PCLI_VAL_DES, PCLI_EST_LOG, PCLI_FEC_CRE, PCLI_FEC_MOD', 'safe', 'on'=>'search'),
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
			'aRTICULOTIENDAs' => array(self::HAS_MANY, 'ARTICULOTIENDA', 'PCLI_ID'),
			'cLI' => array(self::BELONGS_TO, 'CLIENTE', 'CLI_ID'),
			'aRT' => array(self::BELONGS_TO, 'ARTICULO', 'ART_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'PCLI_ID' => 'Pcli',
			'CLI_ID' => 'Cli',
			'ART_ID' => 'Art',
			'PCLI_P_VENTA' => 'Pcli P Venta',
			'PCLI_POR_DES' => 'Pcli Por Des',
			'PCLI_VAL_DES' => 'Pcli Val Des',
			'PCLI_EST_LOG' => 'Pcli Est Log',
			'PCLI_FEC_CRE' => 'Pcli Fec Cre',
			'PCLI_FEC_MOD' => 'Pcli Fec Mod',
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

		$criteria->compare('PCLI_ID',$this->PCLI_ID,true);
		$criteria->compare('CLI_ID',$this->CLI_ID,true);
		$criteria->compare('ART_ID',$this->ART_ID,true);
		$criteria->compare('PCLI_P_VENTA',$this->PCLI_P_VENTA,true);
		$criteria->compare('PCLI_POR_DES',$this->PCLI_POR_DES,true);
		$criteria->compare('PCLI_VAL_DES',$this->PCLI_VAL_DES,true);
		$criteria->compare('PCLI_EST_LOG',$this->PCLI_EST_LOG,true);
		$criteria->compare('PCLI_FEC_CRE',$this->PCLI_FEC_CRE,true);
		$criteria->compare('PCLI_FEC_MOD',$this->PCLI_FEC_MOD,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PRECIOCLIENTE the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
