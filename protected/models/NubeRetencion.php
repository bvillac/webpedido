<?php

/**
 * This is the model class for table "NubeRetencion".
 *
 * The followings are the available columns in table 'NubeRetencion':
 * @property string $IdRetencion
 * @property string $AutorizacionSRI
 * @property string $FechaAutorizacion
 * @property integer $Ambiente
 * @property integer $TipoEmision
 * @property string $RazonSocial
 * @property string $NombreComercial
 * @property string $Ruc
 * @property string $ClaveAcceso
 * @property string $CodigoDocumento
 * @property string $PuntoEmision
 * @property string $Establecimiento
 * @property string $Secuencial
 * @property string $DireccionMatriz
 * @property string $FechaEmision
 * @property string $DireccionEstablecimiento
 * @property string $ContribuyenteEspecial
 * @property string $ObligadoContabilidad
 * @property string $TipoIdentificacionSujetoRetenido
 * @property string $IdentificacionSujetoRetenido
 * @property string $RazonSocialSujetoRetenido
 * @property string $PeriodoFiscal
 * @property string $TotalRetencion
 * @property string $UsuarioCreador
 * @property string $EmailResponsable
 * @property string $EstadoDocumento
 * @property string $DescripcionError
 * @property string $CodigoError
 * @property string $DirectorioDocumento
 * @property string $NombreDocumento
 * @property integer $GeneradoXls
 * @property string $SecuencialERP
 * @property string $CodigoTransaccionERP
 * @property integer $Estado
 * @property string $FechaCarga
 * @property string $IdLote
 *
 * The followings are the available model relations:
 * @property NubeDatoAdicionalRetencion[] $nubeDatoAdicionalRetencions
 * @property NubeDetalleRetencion[] $nubeDetalleRetencions
 */
class NubeRetencion extends VsSeaIntermedia {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        //return 'NubeRetencion';
        $dbname = parent::$dbname;
        if ($dbname != "")
            $dbname.=".";
        return $dbname . 'NubeRetencion'; //Empresas es la Utilizada.
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Ambiente, TipoEmision, GeneradoXls, Estado', 'numerical', 'integerOnly' => true),
            array('AutorizacionSRI, EmailResponsable, DirectorioDocumento', 'length', 'max' => 100),
            array('RazonSocial, NombreComercial, DireccionMatriz, DireccionEstablecimiento, RazonSocialSujetoRetenido, UsuarioCreador, DescripcionError, NombreDocumento', 'length', 'max' => 300),
            array('Ruc', 'length', 'max' => 13),
            array('ClaveAcceso, ContribuyenteEspecial, IdentificacionSujetoRetenido, CodigoTransaccionERP, IdLote', 'length', 'max' => 50),
            array('CodigoDocumento, ObligadoContabilidad, TipoIdentificacionSujetoRetenido', 'length', 'max' => 2),
            array('PuntoEmision, Establecimiento', 'length', 'max' => 3),
            array('Secuencial', 'length', 'max' => 15),
            array('PeriodoFiscal', 'length', 'max' => 10),
            array('TotalRetencion', 'length', 'max' => 19),
            array('EstadoDocumento', 'length', 'max' => 25),
            array('CodigoError', 'length', 'max' => 4),
            array('SecuencialERP', 'length', 'max' => 30),
            array('FechaAutorizacion, FechaEmision, FechaCarga', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('IdRetencion, AutorizacionSRI, FechaAutorizacion, Ambiente, TipoEmision, RazonSocial, NombreComercial, Ruc, ClaveAcceso, CodigoDocumento, PuntoEmision, Establecimiento, Secuencial, DireccionMatriz, FechaEmision, DireccionEstablecimiento, ContribuyenteEspecial, ObligadoContabilidad, TipoIdentificacionSujetoRetenido, IdentificacionSujetoRetenido, RazonSocialSujetoRetenido, PeriodoFiscal, TotalRetencion, UsuarioCreador, EmailResponsable, EstadoDocumento, DescripcionError, CodigoError, DirectorioDocumento, NombreDocumento, GeneradoXls, SecuencialERP, CodigoTransaccionERP, Estado, FechaCarga, IdLote', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'nubeDatoAdicionalRetencions' => array(self::HAS_MANY, 'NubeDatoAdicionalRetencion', 'IdRetencion'),
            'nubeDetalleRetencions' => array(self::HAS_MANY, 'NubeDetalleRetencion', 'IdRetencion'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'IdRetencion' => 'Id Retencion',
            'AutorizacionSRI' => 'Autorizacion Sri',
            'FechaAutorizacion' => 'Fecha Autorizacion',
            'Ambiente' => 'Ambiente',
            'TipoEmision' => 'Tipo Emision',
            'RazonSocial' => 'Razon Social',
            'NombreComercial' => 'Nombre Comercial',
            'Ruc' => 'Ruc',
            'ClaveAcceso' => 'Clave Acceso',
            'CodigoDocumento' => 'Codigo Documento',
            'PuntoEmision' => 'Punto Emision',
            'Establecimiento' => 'Establecimiento',
            'Secuencial' => 'Secuencial',
            'DireccionMatriz' => 'Direccion Matriz',
            'FechaEmision' => 'Fecha Emision',
            'DireccionEstablecimiento' => 'Direccion Establecimiento',
            'ContribuyenteEspecial' => 'Contribuyente Especial',
            'ObligadoContabilidad' => 'Obligado Contabilidad',
            'TipoIdentificacionSujetoRetenido' => 'Tipo Identificacion Sujeto Retenido',
            'IdentificacionSujetoRetenido' => 'Identificacion Sujeto Retenido',
            'RazonSocialSujetoRetenido' => 'Razon Social Sujeto Retenido',
            'PeriodoFiscal' => 'Periodo Fiscal',
            'TotalRetencion' => 'Total Retencion',
            'UsuarioCreador' => 'Usuario Creador',
            'EmailResponsable' => 'Email Responsable',
            'EstadoDocumento' => 'Estado Documento',
            'DescripcionError' => 'Descripcion Error',
            'CodigoError' => 'Codigo Error',
            'DirectorioDocumento' => 'Directorio Documento',
            'NombreDocumento' => 'Nombre Documento',
            'GeneradoXls' => 'Generado Xls',
            'SecuencialERP' => 'Secuencial Erp',
            'CodigoTransaccionERP' => 'Codigo Transaccion Erp',
            'Estado' => 'Estado',
            'FechaCarga' => 'Fecha Carga',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('IdRetencion', $this->IdRetencion, true);
        $criteria->compare('AutorizacionSRI', $this->AutorizacionSRI, true);
        $criteria->compare('FechaAutorizacion', $this->FechaAutorizacion, true);
        $criteria->compare('Ambiente', $this->Ambiente);
        $criteria->compare('TipoEmision', $this->TipoEmision);
        $criteria->compare('RazonSocial', $this->RazonSocial, true);
        $criteria->compare('NombreComercial', $this->NombreComercial, true);
        $criteria->compare('Ruc', $this->Ruc, true);
        $criteria->compare('ClaveAcceso', $this->ClaveAcceso, true);
        $criteria->compare('CodigoDocumento', $this->CodigoDocumento, true);
        $criteria->compare('PuntoEmision', $this->PuntoEmision, true);
        $criteria->compare('Establecimiento', $this->Establecimiento, true);
        $criteria->compare('Secuencial', $this->Secuencial, true);
        $criteria->compare('DireccionMatriz', $this->DireccionMatriz, true);
        $criteria->compare('FechaEmision', $this->FechaEmision, true);
        $criteria->compare('DireccionEstablecimiento', $this->DireccionEstablecimiento, true);
        $criteria->compare('ContribuyenteEspecial', $this->ContribuyenteEspecial, true);
        $criteria->compare('ObligadoContabilidad', $this->ObligadoContabilidad, true);
        $criteria->compare('TipoIdentificacionSujetoRetenido', $this->TipoIdentificacionSujetoRetenido, true);
        $criteria->compare('IdentificacionSujetoRetenido', $this->IdentificacionSujetoRetenido, true);
        $criteria->compare('RazonSocialSujetoRetenido', $this->RazonSocialSujetoRetenido, true);
        $criteria->compare('PeriodoFiscal', $this->PeriodoFiscal, true);
        $criteria->compare('TotalRetencion', $this->TotalRetencion, true);
        $criteria->compare('UsuarioCreador', $this->UsuarioCreador, true);
        $criteria->compare('EmailResponsable', $this->EmailResponsable, true);
        $criteria->compare('EstadoDocumento', $this->EstadoDocumento, true);
        $criteria->compare('DescripcionError', $this->DescripcionError, true);
        $criteria->compare('CodigoError', $this->CodigoError, true);
        $criteria->compare('DirectorioDocumento', $this->DirectorioDocumento, true);
        $criteria->compare('NombreDocumento', $this->NombreDocumento, true);
        $criteria->compare('GeneradoXls', $this->GeneradoXls);
        $criteria->compare('SecuencialERP', $this->SecuencialERP, true);
        $criteria->compare('CodigoTransaccionERP', $this->CodigoTransaccionERP, true);
        $criteria->compare('Estado', $this->Estado);
        $criteria->compare('FechaCarga', $this->FechaCarga, true);
        $criteria->compare('IdLote', $this->IdLote, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return NubeRetencion the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
