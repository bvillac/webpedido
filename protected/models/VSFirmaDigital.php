<?php

/**
 * This is the model class for table "VSFirmaDigital".
 *
 * The followings are the available columns in table 'VSFirmaDigital':
 * @property integer $Id
 * @property string $IdCompania
 * @property string $Clave
 * @property string $FechaCaducidad
 * @property string $EmpresaCertificadora
 * @property integer $Estado
 * @property integer $UsuarioCreacion
 * @property string $FechaCreacion
 * @property integer $UsuarioModificacion
 * @property string $FechaModificacion
 * @property integer $UsuarioEliminacion
 * @property string $FechaEliminacion
 *
 * The followings are the available model relations:
 * @property VSCompania $idCompania
 */
class VSFirmaDigital extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'VSFirmaDigital';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Estado, UsuarioCreacion, UsuarioModificacion, UsuarioEliminacion', 'numerical', 'integerOnly'=>true),
			array('IdCompania', 'length', 'max'=>19),
			array('Clave', 'length', 'max'=>25),
			array('EmpresaCertificadora', 'length', 'max'=>250),
			array('FechaCaducidad, FechaCreacion, FechaModificacion, FechaEliminacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, IdCompania, Clave, FechaCaducidad, EmpresaCertificadora, Estado, UsuarioCreacion, FechaCreacion, UsuarioModificacion, FechaModificacion, UsuarioEliminacion, FechaEliminacion', 'safe', 'on'=>'search'),
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
			'idCompania' => array(self::BELONGS_TO, 'VSCompania', 'IdCompania'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'IdCompania' => 'Id Compania',
			'Clave' => 'Clave',
			'FechaCaducidad' => 'Fecha Caducidad',
			'EmpresaCertificadora' => 'Empresa Certificadora',
			'Estado' => 'Estado',
			'UsuarioCreacion' => 'Usuario Creacion',
			'FechaCreacion' => 'Fecha Creacion',
			'UsuarioModificacion' => 'Usuario Modificacion',
			'FechaModificacion' => 'Fecha Modificacion',
			'UsuarioEliminacion' => 'Usuario Eliminacion',
			'FechaEliminacion' => 'Fecha Eliminacion',
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

		$criteria->compare('Id',$this->Id);
		$criteria->compare('IdCompania',$this->IdCompania,true);
		$criteria->compare('Clave',$this->Clave,true);
		$criteria->compare('FechaCaducidad',$this->FechaCaducidad,true);
		$criteria->compare('EmpresaCertificadora',$this->EmpresaCertificadora,true);
		$criteria->compare('Estado',$this->Estado);
		$criteria->compare('UsuarioCreacion',$this->UsuarioCreacion);
		$criteria->compare('FechaCreacion',$this->FechaCreacion,true);
		$criteria->compare('UsuarioModificacion',$this->UsuarioModificacion);
		$criteria->compare('FechaModificacion',$this->FechaModificacion,true);
		$criteria->compare('UsuarioEliminacion',$this->UsuarioEliminacion);
		$criteria->compare('FechaEliminacion',$this->FechaEliminacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VSFirmaDigital the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
