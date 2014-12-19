<?php

/**
 * This is the model class for table "TEMP_CAB_PEDIDO".
 *
 * The followings are the available columns in table 'TEMP_CAB_PEDIDO':
 * @property string $TCPED_ID
 * @property string $TDOC_ID
 * @property string $TIE_ID
 * @property string $UTIE_ID
 * @property string $TCPED_TOTAL
 * @property string $TCPED_EST_LOG
 * @property string $TCPED_FEC_CRE
 * @property string $TCPED_FEC_MOD
 *
 * The followings are the available model relations:
 * @property CABPEDIDO[] $cABPEDIDOs
 * @property TIPODOCUMENTOS $tDOC
 * @property TIENDA $tIE
 * @property USUARIOTIENDA $uTIE
 * @property TEMPDETPEDIDO[] $tEMPDETPEDIDOs
 */
class TEMP_CABPEDIDO extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'TEMP_CAB_PEDIDO';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TDOC_ID, TIE_ID, UTIE_ID', 'required'),
			array('TDOC_ID, TIE_ID, UTIE_ID', 'length', 'max'=>20),
			array('TCPED_TOTAL', 'length', 'max'=>14),
			array('TCPED_EST_LOG', 'length', 'max'=>1),
			array('TCPED_FEC_CRE, TCPED_FEC_MOD', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('TCPED_ID, TDOC_ID, TIE_ID, UTIE_ID, TCPED_TOTAL, TCPED_EST_LOG, TCPED_FEC_CRE, TCPED_FEC_MOD', 'safe', 'on'=>'search'),
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
			'cABPEDIDOs' => array(self::HAS_MANY, 'CABPEDIDO', 'TCPED_ID'),
			'tDOC' => array(self::BELONGS_TO, 'TIPODOCUMENTOS', 'TDOC_ID'),
			'tIE' => array(self::BELONGS_TO, 'TIENDA', 'TIE_ID'),
			'uTIE' => array(self::BELONGS_TO, 'USUARIOTIENDA', 'UTIE_ID'),
			'tEMPDETPEDIDOs' => array(self::HAS_MANY, 'TEMPDETPEDIDO', 'TCPED_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'TCPED_ID' => 'Tcped',
			'TDOC_ID' => 'Tdoc',
			'TIE_ID' => 'Tie',
			'UTIE_ID' => 'Utie',
			'TCPED_TOTAL' => 'Tcped Total',
			'TCPED_EST_LOG' => 'Tcped Est Log',
			'TCPED_FEC_CRE' => 'Tcped Fec Cre',
			'TCPED_FEC_MOD' => 'Tcped Fec Mod',
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

		$criteria->compare('TCPED_ID',$this->TCPED_ID,true);
		$criteria->compare('TDOC_ID',$this->TDOC_ID,true);
		$criteria->compare('TIE_ID',$this->TIE_ID,true);
		$criteria->compare('UTIE_ID',$this->UTIE_ID,true);
		$criteria->compare('TCPED_TOTAL',$this->TCPED_TOTAL,true);
		$criteria->compare('TCPED_EST_LOG',$this->TCPED_EST_LOG,true);
		$criteria->compare('TCPED_FEC_CRE',$this->TCPED_FEC_CRE,true);
		$criteria->compare('TCPED_FEC_MOD',$this->TCPED_FEC_MOD,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TEMP_CABPEDIDO the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
