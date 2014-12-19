<?php

/**
 * This is the model class for table "PERSONA".
 *
 * The followings are the available columns in table 'PERSONA':
 * @property string $PER_ID
 * @property string $PER_CED_RUC
 * @property string $PER_NOMBRE
 * @property string $PER_APELLIDO
 * @property string $PER_FEC_NACIMIENTO
 * @property string $PER_GENERO
 * @property string $PER_EST_LOG
 * @property string $PER_FEC_CRE
 * @property string $PER_FEC_MOD
 *
 * The followings are the available model relations:
 * @property DATAPERSONA[] $dATAPERSONAs
 * @property USUARIO[] $uSUARIOs
 */
class PERSONA extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'PERSONA';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PER_CED_RUC', 'length', 'max'=>15),
			array('PER_NOMBRE, PER_APELLIDO', 'length', 'max'=>100),
			array('PER_GENERO, PER_EST_LOG', 'length', 'max'=>1),
			array('PER_FEC_NACIMIENTO, PER_FEC_CRE, PER_FEC_MOD', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('PER_ID, PER_CED_RUC, PER_NOMBRE, PER_APELLIDO, PER_FEC_NACIMIENTO, PER_GENERO, PER_EST_LOG, PER_FEC_CRE, PER_FEC_MOD', 'safe', 'on'=>'search'),
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
			'dATAPERSONAs' => array(self::HAS_MANY, 'DATAPERSONA', 'PER_ID'),
			'uSUARIOs' => array(self::HAS_MANY, 'USUARIO', 'PER_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'PER_ID' => 'Per',
			'PER_CED_RUC' => 'Per Ced Ruc',
			'PER_NOMBRE' => 'Per Nombre',
			'PER_APELLIDO' => 'Per Apellido',
			'PER_FEC_NACIMIENTO' => 'Per Fec Nacimiento',
			'PER_GENERO' => 'Per Genero',
			'PER_EST_LOG' => 'Per Est Log',
			'PER_FEC_CRE' => 'Per Fec Cre',
			'PER_FEC_MOD' => 'Per Fec Mod',
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

		$criteria->compare('PER_ID',$this->PER_ID,true);
		$criteria->compare('PER_CED_RUC',$this->PER_CED_RUC,true);
		$criteria->compare('PER_NOMBRE',$this->PER_NOMBRE,true);
		$criteria->compare('PER_APELLIDO',$this->PER_APELLIDO,true);
		$criteria->compare('PER_FEC_NACIMIENTO',$this->PER_FEC_NACIMIENTO,true);
		$criteria->compare('PER_GENERO',$this->PER_GENERO,true);
		$criteria->compare('PER_EST_LOG',$this->PER_EST_LOG,true);
		$criteria->compare('PER_FEC_CRE',$this->PER_FEC_CRE,true);
		$criteria->compare('PER_FEC_MOD',$this->PER_FEC_MOD,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PERSONA the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
