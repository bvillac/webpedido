<?php

/**
 * This is the model class for table "EMPRESA".
 *
 * The followings are the available columns in table 'EMPRESA':
 * @property string $EMP_ID
 * @property string $EMP_RUC
 * @property string $EMP_RAZONSOCIAL
 * @property string $EMP_NOM_COMERCIAL
 * @property string $EMP_TIPO
 * @property string $EMP_TELEFONO
 * @property string $EMP_FAX
 * @property string $EMP_DIRECCION
 * @property string $EMP_CORREO
 * @property string $EMP_LOGO
 * @property string $EMP_EST_LOG
 * @property string $EMP_FEC_MOD
 * @property string $EMP_FEC_CRE
 *
 * The followings are the available model relations:
 * @property USUARIOEMPRESA[] $uSUARIOEMPRESAs
 */
class EMPRESA extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'EMPRESA';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('EMP_RUC', 'length', 'max'=>15),
			array('EMP_RAZONSOCIAL, EMP_DIRECCION', 'length', 'max'=>300),
			array('EMP_NOM_COMERCIAL', 'length', 'max'=>150),
			array('EMP_TIPO, EMP_CORREO', 'length', 'max'=>45),
			array('EMP_TELEFONO, EMP_FAX', 'length', 'max'=>20),
			array('EMP_LOGO', 'length', 'max'=>100),
			array('EMP_EST_LOG', 'length', 'max'=>1),
			array('EMP_FEC_MOD, EMP_FEC_CRE', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('EMP_ID, EMP_RUC, EMP_RAZONSOCIAL, EMP_NOM_COMERCIAL, EMP_TIPO, EMP_TELEFONO, EMP_FAX, EMP_DIRECCION, EMP_CORREO, EMP_LOGO, EMP_EST_LOG, EMP_FEC_MOD, EMP_FEC_CRE', 'safe', 'on'=>'search'),
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
			'uSUARIOEMPRESAs' => array(self::HAS_MANY, 'USUARIOEMPRESA', 'EMP_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'EMP_ID' => 'Emp',
			'EMP_RUC' => 'Emp Ruc',
			'EMP_RAZONSOCIAL' => 'Emp Razonsocial',
			'EMP_NOM_COMERCIAL' => 'Emp Nom Comercial',
			'EMP_TIPO' => 'Emp Tipo',
			'EMP_TELEFONO' => 'Emp Telefono',
			'EMP_FAX' => 'Emp Fax',
			'EMP_DIRECCION' => 'Emp Direccion',
			'EMP_CORREO' => 'Emp Correo',
			'EMP_LOGO' => 'Emp Logo',
			'EMP_EST_LOG' => 'Emp Est Log',
			'EMP_FEC_MOD' => 'Emp Fec Mod',
			'EMP_FEC_CRE' => 'Emp Fec Cre',
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

		$criteria->compare('EMP_ID',$this->EMP_ID,true);
		$criteria->compare('EMP_RUC',$this->EMP_RUC,true);
		$criteria->compare('EMP_RAZONSOCIAL',$this->EMP_RAZONSOCIAL,true);
		$criteria->compare('EMP_NOM_COMERCIAL',$this->EMP_NOM_COMERCIAL,true);
		$criteria->compare('EMP_TIPO',$this->EMP_TIPO,true);
		$criteria->compare('EMP_TELEFONO',$this->EMP_TELEFONO,true);
		$criteria->compare('EMP_FAX',$this->EMP_FAX,true);
		$criteria->compare('EMP_DIRECCION',$this->EMP_DIRECCION,true);
		$criteria->compare('EMP_CORREO',$this->EMP_CORREO,true);
		$criteria->compare('EMP_LOGO',$this->EMP_LOGO,true);
		$criteria->compare('EMP_EST_LOG',$this->EMP_EST_LOG,true);
		$criteria->compare('EMP_FEC_MOD',$this->EMP_FEC_MOD,true);
		$criteria->compare('EMP_FEC_CRE',$this->EMP_FEC_CRE,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EMPRESA the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
