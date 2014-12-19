<?php

/**
 * This is the model class for table "TIENDA".
 *
 * The followings are the available columns in table 'TIENDA':
 * @property string $TIE_ID
 * @property string $CLI_ID
 * @property string $TIE_NOMBRE
 * @property string $TIE_DIRECCION
 * @property string $TIE_TELEFONO
 * @property string $TIE_CUPO
 * @property string $TIE_LUG_ENTREGA
 * @property string $TIE_CONTACTO
 * @property string $FEC_INI_PED
 * @property string $FEC_FIN_PED
 * @property string $TIE_EST_LOG
 * @property string $TIE_FEC_CRE
 * @property string $TIE_FEC_MOD
 *
 * The followings are the available model relations:
 * @property ARTICULOTIENDA[] $aRTICULOTIENDAs
 * @property CABPEDIDO[] $cABPEDIDOs
 * @property TEMPCABPEDIDO[] $tEMPCABPEDIDOs
 * @property CLIENTE $cLI
 * @property USUARIOTIENDA[] $uSUARIOTIENDAs
 */
class TIENDA extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'TIENDA';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CLI_ID', 'required'),
			array('CLI_ID, TIE_TELEFONO', 'length', 'max'=>20),
			array('TIE_NOMBRE, TIE_DIRECCION, TIE_LUG_ENTREGA, TIE_CONTACTO', 'length', 'max'=>100),
			array('TIE_CUPO', 'length', 'max'=>10),
			array('FEC_INI_PED, FEC_FIN_PED', 'length', 'max'=>2),
			array('TIE_EST_LOG', 'length', 'max'=>1),
			array('TIE_FEC_CRE, TIE_FEC_MOD', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('TIE_ID, CLI_ID, TIE_NOMBRE, TIE_DIRECCION, TIE_TELEFONO, TIE_CUPO, TIE_LUG_ENTREGA, TIE_CONTACTO, FEC_INI_PED, FEC_FIN_PED, TIE_EST_LOG, TIE_FEC_CRE, TIE_FEC_MOD', 'safe', 'on'=>'search'),
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
			'aRTICULOTIENDAs' => array(self::HAS_MANY, 'ARTICULOTIENDA', 'TIE_ID'),
			'cABPEDIDOs' => array(self::HAS_MANY, 'CABPEDIDO', 'TIE_ID'),
			'tEMPCABPEDIDOs' => array(self::HAS_MANY, 'TEMPCABPEDIDO', 'TIE_ID'),
			'cLI' => array(self::BELONGS_TO, 'CLIENTE', 'CLI_ID'),
			'uSUARIOTIENDAs' => array(self::HAS_MANY, 'USUARIOTIENDA', 'TIE_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'TIE_ID' => 'Tie',
			'CLI_ID' => 'Cli',
			'TIE_NOMBRE' => 'Tie Nombre',
			'TIE_DIRECCION' => 'Tie Direccion',
			'TIE_TELEFONO' => 'Tie Telefono',
			'TIE_CUPO' => 'Tie Cupo',
			'TIE_LUG_ENTREGA' => 'Tie Lug Entrega',
			'TIE_CONTACTO' => 'Tie Contacto',
			'FEC_INI_PED' => 'Fec Ini Ped',
			'FEC_FIN_PED' => 'Fec Fin Ped',
			'TIE_EST_LOG' => 'Tie Est Log',
			'TIE_FEC_CRE' => 'Tie Fec Cre',
			'TIE_FEC_MOD' => 'Tie Fec Mod',
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

		$criteria->compare('TIE_ID',$this->TIE_ID,true);
		$criteria->compare('CLI_ID',$this->CLI_ID,true);
		$criteria->compare('TIE_NOMBRE',$this->TIE_NOMBRE,true);
		$criteria->compare('TIE_DIRECCION',$this->TIE_DIRECCION,true);
		$criteria->compare('TIE_TELEFONO',$this->TIE_TELEFONO,true);
		$criteria->compare('TIE_CUPO',$this->TIE_CUPO,true);
		$criteria->compare('TIE_LUG_ENTREGA',$this->TIE_LUG_ENTREGA,true);
		$criteria->compare('TIE_CONTACTO',$this->TIE_CONTACTO,true);
		$criteria->compare('FEC_INI_PED',$this->FEC_INI_PED,true);
		$criteria->compare('FEC_FIN_PED',$this->FEC_FIN_PED,true);
		$criteria->compare('TIE_EST_LOG',$this->TIE_EST_LOG,true);
		$criteria->compare('TIE_FEC_CRE',$this->TIE_FEC_CRE,true);
		$criteria->compare('TIE_FEC_MOD',$this->TIE_FEC_MOD,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TIENDA the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
