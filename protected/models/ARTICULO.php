<?php

/**
 * This is the model class for table "ARTICULO".
 *
 * The followings are the available columns in table 'ARTICULO':
 * @property string $ART_ID
 * @property string $COD_ART
 * @property string $ART_DES_COM
 * @property string $COD_LIN
 * @property string $COD_TIP
 * @property string $COD_MAR
 * @property string $ART_I_M_IVA
 * @property string $ART_P_VENTA
 * @property string $ART_IMAGEN
 * @property string $ART_EST_LOG
 * @property string $ART_FEC_CRE
 * @property string $ART_FEC_MOD
 *
 * The followings are the available model relations:
 * @property DETPEDIDO[] $dETPEDIDOs
 * @property PRECIOCLIENTE[] $pRECIOCLIENTEs
 * @property TEMPDETPEDIDO[] $tEMPDETPEDIDOs
 */
class ARTICULO extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ARTICULO';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('COD_ART', 'length', 'max'=>20),
			array('ART_DES_COM, ART_IMAGEN', 'length', 'max'=>100),
			array('COD_LIN, COD_TIP, COD_MAR', 'length', 'max'=>3),
			array('ART_I_M_IVA, ART_EST_LOG', 'length', 'max'=>1),
			array('ART_P_VENTA', 'length', 'max'=>10),
			array('ART_FEC_CRE, ART_FEC_MOD', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ART_ID, COD_ART, ART_DES_COM, COD_LIN, COD_TIP, COD_MAR, ART_I_M_IVA, ART_P_VENTA, ART_IMAGEN, ART_EST_LOG, ART_FEC_CRE, ART_FEC_MOD', 'safe', 'on'=>'search'),
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
			'dETPEDIDOs' => array(self::HAS_MANY, 'DETPEDIDO', 'ART_ID'),
			'pRECIOCLIENTEs' => array(self::HAS_MANY, 'PRECIOCLIENTE', 'ART_ID'),
			'tEMPDETPEDIDOs' => array(self::HAS_MANY, 'TEMPDETPEDIDO', 'ART_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ART_ID' => 'Art',
			'COD_ART' => 'Cod Art',
			'ART_DES_COM' => 'Art Des Com',
			'COD_LIN' => 'Cod Lin',
			'COD_TIP' => 'Cod Tip',
			'COD_MAR' => 'Cod Mar',
			'ART_I_M_IVA' => 'Art I M Iva',
			'ART_P_VENTA' => 'Art P Venta',
			'ART_IMAGEN' => 'Art Imagen',
			'ART_EST_LOG' => 'Art Est Log',
			'ART_FEC_CRE' => 'Art Fec Cre',
			'ART_FEC_MOD' => 'Art Fec Mod',
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

		$criteria->compare('ART_ID',$this->ART_ID,true);
		$criteria->compare('COD_ART',$this->COD_ART,true);
		$criteria->compare('ART_DES_COM',$this->ART_DES_COM,true);
		$criteria->compare('COD_LIN',$this->COD_LIN,true);
		$criteria->compare('COD_TIP',$this->COD_TIP,true);
		$criteria->compare('COD_MAR',$this->COD_MAR,true);
		$criteria->compare('ART_I_M_IVA',$this->ART_I_M_IVA,true);
		$criteria->compare('ART_P_VENTA',$this->ART_P_VENTA,true);
		$criteria->compare('ART_IMAGEN',$this->ART_IMAGEN,true);
		$criteria->compare('ART_EST_LOG',$this->ART_EST_LOG,true);
		$criteria->compare('ART_FEC_CRE',$this->ART_FEC_CRE,true);
		$criteria->compare('ART_FEC_MOD',$this->ART_FEC_MOD,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ARTICULO the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
