<?php

/**
 * This is the model class for table "NubeGuiaRemision".
 *
 * The followings are the available columns in table 'NubeGuiaRemision':
 * @property string $IdGuiaRemision
 * @property string $AutorizacionSRI
 * @property string $FechaAutorizacion
 * @property integer $Ambiente
 * @property integer $TipoEmision
 * @property string $RazonSocial
 * @property string $NombreComercial
 * @property string $Ruc
 * @property string $ClaveAcceso
 * @property string $CodigoDocumento
 * @property string $Establecimiento
 * @property string $PuntoEmision
 * @property string $Secuencial
 * @property string $DireccionMatriz
 * @property string $DireccionEstablecimiento
 * @property string $DireccionPartida
 * @property string $RazonSocialTransportista
 * @property string $TipoIdentificacionTransportista
 * @property string $IdentificacionTransportista
 * @property string $Rise
 * @property string $ObligadoContabilidad
 * @property integer $ContribuyenteEspecial
 * @property string $FechaInicioTransporte
 * @property string $FechaFinTransporte
 * @property string $Placa
 * @property string $UsuarioCreador
 * @property string $EmailResponsable
 * @property string $EstadoDocumento
 * @property string $DescripcionError
 * @property string $CodigoError
 * @property string $DirectorioDocumento
 * @property string $NombreDocumento
 * @property integer $GeneradoXls
 * @property string $SecuencialERP
 * @property integer $Estado
 * @property string $IdLote
 *
 * The followings are the available model relations:
 * @property NubeDatoAdicionalGuiaRemision[] $nubeDatoAdicionalGuiaRemisions
 * @property NubeGuiaRemisionDestinatario[] $nubeGuiaRemisionDestinatarios
 */
class NubeGuiaRemision extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'NubeGuiaRemision';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Ambiente, TipoEmision, ContribuyenteEspecial, GeneradoXls, Estado', 'numerical', 'integerOnly'=>true),
			array('AutorizacionSRI, EmailResponsable, DirectorioDocumento', 'length', 'max'=>100),
			array('RazonSocial, NombreComercial, DireccionMatriz, DireccionEstablecimiento, DireccionPartida, RazonSocialTransportista, UsuarioCreador, DescripcionError, NombreDocumento', 'length', 'max'=>300),
			array('Ruc, IdentificacionTransportista', 'length', 'max'=>13),
			array('ClaveAcceso, IdLote', 'length', 'max'=>50),
			array('CodigoDocumento, TipoIdentificacionTransportista, ObligadoContabilidad', 'length', 'max'=>2),
			array('Establecimiento, PuntoEmision', 'length', 'max'=>3),
			array('Secuencial', 'length', 'max'=>15),
			array('Rise', 'length', 'max'=>40),
			array('Placa', 'length', 'max'=>20),
			array('EstadoDocumento', 'length', 'max'=>25),
			array('CodigoError', 'length', 'max'=>4),
			array('SecuencialERP', 'length', 'max'=>30),
			array('FechaAutorizacion, FechaInicioTransporte, FechaFinTransporte', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdGuiaRemision, AutorizacionSRI, FechaAutorizacion, Ambiente, TipoEmision, RazonSocial, NombreComercial, Ruc, ClaveAcceso, CodigoDocumento, Establecimiento, PuntoEmision, Secuencial, DireccionMatriz, DireccionEstablecimiento, DireccionPartida, RazonSocialTransportista, TipoIdentificacionTransportista, IdentificacionTransportista, Rise, ObligadoContabilidad, ContribuyenteEspecial, FechaInicioTransporte, FechaFinTransporte, Placa, UsuarioCreador, EmailResponsable, EstadoDocumento, DescripcionError, CodigoError, DirectorioDocumento, NombreDocumento, GeneradoXls, SecuencialERP, Estado, IdLote', 'safe', 'on'=>'search'),
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
			'nubeDatoAdicionalGuiaRemisions' => array(self::HAS_MANY, 'NubeDatoAdicionalGuiaRemision', 'IdGuiaRemision'),
			'nubeGuiaRemisionDestinatarios' => array(self::HAS_MANY, 'NubeGuiaRemisionDestinatario', 'IdGuiaRemision'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdGuiaRemision' => 'Id Guia Remision',
			'AutorizacionSRI' => 'Autorizacion Sri',
			'FechaAutorizacion' => 'Fecha Autorizacion',
			'Ambiente' => 'Ambiente',
			'TipoEmision' => 'Tipo Emision',
			'RazonSocial' => 'Razon Social',
			'NombreComercial' => 'Nombre Comercial',
			'Ruc' => 'Ruc',
			'ClaveAcceso' => 'Clave Acceso',
			'CodigoDocumento' => 'Codigo Documento',
			'Establecimiento' => 'Establecimiento',
			'PuntoEmision' => 'Punto Emision',
			'Secuencial' => 'Secuencial',
			'DireccionMatriz' => 'Direccion Matriz',
			'DireccionEstablecimiento' => 'Direccion Establecimiento',
			'DireccionPartida' => 'Direccion Partida',
			'RazonSocialTransportista' => 'Razon Social Transportista',
			'TipoIdentificacionTransportista' => 'Tipo Identificacion Transportista',
			'IdentificacionTransportista' => 'Identificacion Transportista',
			'Rise' => 'Rise',
			'ObligadoContabilidad' => 'Obligado Contabilidad',
			'ContribuyenteEspecial' => 'Contribuyente Especial',
			'FechaInicioTransporte' => 'Fecha Inicio Transporte',
			'FechaFinTransporte' => 'Fecha Fin Transporte',
			'Placa' => 'Placa',
			'UsuarioCreador' => 'Usuario Creador',
			'EmailResponsable' => 'Email Responsable',
			'EstadoDocumento' => 'Estado Documento',
			'DescripcionError' => 'Descripcion Error',
			'CodigoError' => 'Codigo Error',
			'DirectorioDocumento' => 'Directorio Documento',
			'NombreDocumento' => 'Nombre Documento',
			'GeneradoXls' => 'Generado Xls',
			'SecuencialERP' => 'Secuencial Erp',
			'Estado' => 'Estado',
			'IdLote' => 'Id Lote',
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

		$criteria->compare('IdGuiaRemision',$this->IdGuiaRemision,true);
		$criteria->compare('AutorizacionSRI',$this->AutorizacionSRI,true);
		$criteria->compare('FechaAutorizacion',$this->FechaAutorizacion,true);
		$criteria->compare('Ambiente',$this->Ambiente);
		$criteria->compare('TipoEmision',$this->TipoEmision);
		$criteria->compare('RazonSocial',$this->RazonSocial,true);
		$criteria->compare('NombreComercial',$this->NombreComercial,true);
		$criteria->compare('Ruc',$this->Ruc,true);
		$criteria->compare('ClaveAcceso',$this->ClaveAcceso,true);
		$criteria->compare('CodigoDocumento',$this->CodigoDocumento,true);
		$criteria->compare('Establecimiento',$this->Establecimiento,true);
		$criteria->compare('PuntoEmision',$this->PuntoEmision,true);
		$criteria->compare('Secuencial',$this->Secuencial,true);
		$criteria->compare('DireccionMatriz',$this->DireccionMatriz,true);
		$criteria->compare('DireccionEstablecimiento',$this->DireccionEstablecimiento,true);
		$criteria->compare('DireccionPartida',$this->DireccionPartida,true);
		$criteria->compare('RazonSocialTransportista',$this->RazonSocialTransportista,true);
		$criteria->compare('TipoIdentificacionTransportista',$this->TipoIdentificacionTransportista,true);
		$criteria->compare('IdentificacionTransportista',$this->IdentificacionTransportista,true);
		$criteria->compare('Rise',$this->Rise,true);
		$criteria->compare('ObligadoContabilidad',$this->ObligadoContabilidad,true);
		$criteria->compare('ContribuyenteEspecial',$this->ContribuyenteEspecial);
		$criteria->compare('FechaInicioTransporte',$this->FechaInicioTransporte,true);
		$criteria->compare('FechaFinTransporte',$this->FechaFinTransporte,true);
		$criteria->compare('Placa',$this->Placa,true);
		$criteria->compare('UsuarioCreador',$this->UsuarioCreador,true);
		$criteria->compare('EmailResponsable',$this->EmailResponsable,true);
		$criteria->compare('EstadoDocumento',$this->EstadoDocumento,true);
		$criteria->compare('DescripcionError',$this->DescripcionError,true);
		$criteria->compare('CodigoError',$this->CodigoError,true);
		$criteria->compare('DirectorioDocumento',$this->DirectorioDocumento,true);
		$criteria->compare('NombreDocumento',$this->NombreDocumento,true);
		$criteria->compare('GeneradoXls',$this->GeneradoXls);
		$criteria->compare('SecuencialERP',$this->SecuencialERP,true);
		$criteria->compare('Estado',$this->Estado);
		$criteria->compare('IdLote',$this->IdLote,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return NubeGuiaRemision the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
