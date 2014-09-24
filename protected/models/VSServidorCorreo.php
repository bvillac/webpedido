<?php

/**
 * This is the model class for table "VSServidorCorreo".
 *
 * The followings are the available columns in table 'VSServidorCorreo':
 * @property integer $Id
 * @property string $IDCompania
 * @property string $Mail
 * @property string $NombreMostrar
 * @property string $Asunto
 * @property string $Cuerpo
 * @property integer $EsHtml
 * @property string $Clave
 * @property string $Usuario
 * @property string $SMTPServidor
 * @property integer $SMTPPuerto
 * @property integer $TiempoRespuesta
 * @property integer $TiempoEspera
 * @property string $ServidorAcuse
 * @property integer $ActivarAcuse
 * @property string $CCO
 * @property integer $UsuarioCreacion
 * @property string $FechaCreacion
 * @property integer $UsuarioModificacion
 * @property string $FechaModificacion
 * @property string $UsuarioEliminacion
 * @property string $FechaEliminacion
 * @property integer $Estado
 *
 * The followings are the available model relations:
 * @property VSCompania $iDCompania
 */
class VSServidorCorreo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'VSServidorCorreo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('EsHtml, SMTPPuerto, TiempoRespuesta, TiempoEspera, ActivarAcuse, UsuarioCreacion, UsuarioModificacion, Estado', 'numerical', 'integerOnly'=>true),
			array('IDCompania', 'length', 'max'=>19),
			array('Mail, Cuerpo, Usuario, SMTPServidor', 'length', 'max'=>100),
			array('NombreMostrar', 'length', 'max'=>200),
			array('Asunto, ServidorAcuse, CCO', 'length', 'max'=>500),
			array('Clave', 'length', 'max'=>25),
			array('UsuarioEliminacion', 'length', 'max'=>150),
			array('FechaCreacion, FechaModificacion, FechaEliminacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, IDCompania, Mail, NombreMostrar, Asunto, Cuerpo, EsHtml, Clave, Usuario, SMTPServidor, SMTPPuerto, TiempoRespuesta, TiempoEspera, ServidorAcuse, ActivarAcuse, CCO, UsuarioCreacion, FechaCreacion, UsuarioModificacion, FechaModificacion, UsuarioEliminacion, FechaEliminacion, Estado', 'safe', 'on'=>'search'),
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
			'iDCompania' => array(self::BELONGS_TO, 'VSCompania', 'IDCompania'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'IDCompania' => 'Idcompania',
			'Mail' => 'Mail',
			'NombreMostrar' => 'Nombre Mostrar',
			'Asunto' => 'Asunto',
			'Cuerpo' => 'Cuerpo',
			'EsHtml' => 'Es Html',
			'Clave' => 'Clave',
			'Usuario' => 'Usuario',
			'SMTPServidor' => 'Smtpservidor',
			'SMTPPuerto' => 'Smtppuerto',
			'TiempoRespuesta' => 'Tiempo Respuesta',
			'TiempoEspera' => 'Tiempo Espera',
			'ServidorAcuse' => 'Servidor Acuse',
			'ActivarAcuse' => 'Activar Acuse',
			'CCO' => 'Cco',
			'UsuarioCreacion' => 'Usuario Creacion',
			'FechaCreacion' => 'Fecha Creacion',
			'UsuarioModificacion' => 'Usuario Modificacion',
			'FechaModificacion' => 'Fecha Modificacion',
			'UsuarioEliminacion' => 'Usuario Eliminacion',
			'FechaEliminacion' => 'Fecha Eliminacion',
			'Estado' => 'Estado',
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
		$criteria->compare('IDCompania',$this->IDCompania,true);
		$criteria->compare('Mail',$this->Mail,true);
		$criteria->compare('NombreMostrar',$this->NombreMostrar,true);
		$criteria->compare('Asunto',$this->Asunto,true);
		$criteria->compare('Cuerpo',$this->Cuerpo,true);
		$criteria->compare('EsHtml',$this->EsHtml);
		$criteria->compare('Clave',$this->Clave,true);
		$criteria->compare('Usuario',$this->Usuario,true);
		$criteria->compare('SMTPServidor',$this->SMTPServidor,true);
		$criteria->compare('SMTPPuerto',$this->SMTPPuerto);
		$criteria->compare('TiempoRespuesta',$this->TiempoRespuesta);
		$criteria->compare('TiempoEspera',$this->TiempoEspera);
		$criteria->compare('ServidorAcuse',$this->ServidorAcuse,true);
		$criteria->compare('ActivarAcuse',$this->ActivarAcuse);
		$criteria->compare('CCO',$this->CCO,true);
		$criteria->compare('UsuarioCreacion',$this->UsuarioCreacion);
		$criteria->compare('FechaCreacion',$this->FechaCreacion,true);
		$criteria->compare('UsuarioModificacion',$this->UsuarioModificacion);
		$criteria->compare('FechaModificacion',$this->FechaModificacion,true);
		$criteria->compare('UsuarioEliminacion',$this->UsuarioEliminacion,true);
		$criteria->compare('FechaEliminacion',$this->FechaEliminacion,true);
		$criteria->compare('Estado',$this->Estado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VSServidorCorreo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
