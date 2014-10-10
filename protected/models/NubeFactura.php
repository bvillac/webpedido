<?php

/**
 * This is the model class for table "NubeFactura".
 *
 * The followings are the available columns in table 'NubeFactura':
 * @property string $IdFactura
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
 * @property string $FechaEmision
 * @property string $DireccionEstablecimiento
 * @property string $ContribuyenteEspecial
 * @property string $ObligadoContabilidad
 * @property string $TipoIdentificacionComprador
 * @property string $GuiaRemision
 * @property string $RazonSocialComprador
 * @property string $IdentificacionComprador
 * @property string $TotalSinImpuesto
 * @property string $TotalDescuento
 * @property string $Propina
 * @property string $ImporteTotal
 * @property string $Moneda
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
 * @property NubeDatoAdicionalFactura[] $nubeDatoAdicionalFacturas
 * @property NubeDetalleFactura[] $nubeDetalleFacturas
 * @property NubeFacturaImpuesto[] $nubeFacturaImpuestos
 */
class NubeFactura extends VsSeaIntermedia {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        $dbname = parent::$dbname;
        if ($dbname != "")
            $dbname.=".";
        return $dbname . 'NubeFactura'; //Empresas es la Utilizada.
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Ambiente, TipoEmision, GeneradoXls, Estado', 'numerical', 'integerOnly' => true),
            array('AutorizacionSRI, EmailResponsable, CodigoError, DirectorioDocumento', 'length', 'max' => 100),
            array('RazonSocial, NombreComercial, DireccionMatriz, DireccionEstablecimiento, RazonSocialComprador, UsuarioCreador, DescripcionError, NombreDocumento', 'length', 'max' => 300),
            array('Ruc, GuiaRemision', 'length', 'max' => 20),
            array('ClaveAcceso, ContribuyenteEspecial, CodigoTransaccionERP, IdLote', 'length', 'max' => 50),
            array('CodigoDocumento, ObligadoContabilidad, TipoIdentificacionComprador', 'length', 'max' => 2),
            array('Establecimiento, PuntoEmision', 'length', 'max' => 3),
            array('Secuencial, Moneda', 'length', 'max' => 15),
            array('IdentificacionComprador', 'length', 'max' => 13),
            array('TotalSinImpuesto, TotalDescuento, Propina, ImporteTotal', 'length', 'max' => 19),
            array('EstadoDocumento', 'length', 'max' => 25),
            array('SecuencialERP', 'length', 'max' => 30),
            array('FechaAutorizacion, FechaEmision, FechaCarga', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('IdFactura, AutorizacionSRI, FechaAutorizacion, Ambiente, TipoEmision, RazonSocial, NombreComercial, Ruc, ClaveAcceso, CodigoDocumento, Establecimiento, PuntoEmision, Secuencial, DireccionMatriz, FechaEmision, DireccionEstablecimiento, ContribuyenteEspecial, ObligadoContabilidad, TipoIdentificacionComprador, GuiaRemision, RazonSocialComprador, IdentificacionComprador, TotalSinImpuesto, TotalDescuento, Propina, ImporteTotal, Moneda, UsuarioCreador, EmailResponsable, EstadoDocumento, DescripcionError, CodigoError, DirectorioDocumento, NombreDocumento, GeneradoXls, SecuencialERP, CodigoTransaccionERP, Estado, FechaCarga, IdLote', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'nubeDatoAdicionalFacturas' => array(self::HAS_MANY, 'NubeDatoAdicionalFactura', 'IdFactura'),
            'nubeDetalleFacturas' => array(self::HAS_MANY, 'NubeDetalleFactura', 'IdFactura'),
            'nubeFacturaImpuestos' => array(self::HAS_MANY, 'NubeFacturaImpuesto', 'IdFactura'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'IdFactura' => 'Id Factura',
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
            'FechaEmision' => 'Fecha Emision',
            'DireccionEstablecimiento' => 'Direccion Establecimiento',
            'ContribuyenteEspecial' => 'Contribuyente Especial',
            'ObligadoContabilidad' => 'Obligado Contabilidad',
            'TipoIdentificacionComprador' => 'Tipo Identificacion Comprador',
            'GuiaRemision' => 'Guia Remision',
            'RazonSocialComprador' => 'Razon Social Comprador',
            'IdentificacionComprador' => 'Identificacion Comprador',
            'TotalSinImpuesto' => 'Total Sin Impuesto',
            'TotalDescuento' => 'Total Descuento',
            'Propina' => 'Propina',
            'ImporteTotal' => 'Importe Total',
            'Moneda' => 'Moneda',
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

        $criteria->compare('IdFactura', $this->IdFactura, true);
        $criteria->compare('AutorizacionSRI', $this->AutorizacionSRI, true);
        $criteria->compare('FechaAutorizacion', $this->FechaAutorizacion, true);
        $criteria->compare('Ambiente', $this->Ambiente);
        $criteria->compare('TipoEmision', $this->TipoEmision);
        $criteria->compare('RazonSocial', $this->RazonSocial, true);
        $criteria->compare('NombreComercial', $this->NombreComercial, true);
        $criteria->compare('Ruc', $this->Ruc, true);
        $criteria->compare('ClaveAcceso', $this->ClaveAcceso, true);
        $criteria->compare('CodigoDocumento', $this->CodigoDocumento, true);
        $criteria->compare('Establecimiento', $this->Establecimiento, true);
        $criteria->compare('PuntoEmision', $this->PuntoEmision, true);
        $criteria->compare('Secuencial', $this->Secuencial, true);
        $criteria->compare('DireccionMatriz', $this->DireccionMatriz, true);
        $criteria->compare('FechaEmision', $this->FechaEmision, true);
        $criteria->compare('DireccionEstablecimiento', $this->DireccionEstablecimiento, true);
        $criteria->compare('ContribuyenteEspecial', $this->ContribuyenteEspecial, true);
        $criteria->compare('ObligadoContabilidad', $this->ObligadoContabilidad, true);
        $criteria->compare('TipoIdentificacionComprador', $this->TipoIdentificacionComprador, true);
        $criteria->compare('GuiaRemision', $this->GuiaRemision, true);
        $criteria->compare('RazonSocialComprador', $this->RazonSocialComprador, true);
        $criteria->compare('IdentificacionComprador', $this->IdentificacionComprador, true);
        $criteria->compare('TotalSinImpuesto', $this->TotalSinImpuesto, true);
        $criteria->compare('TotalDescuento', $this->TotalDescuento, true);
        $criteria->compare('Propina', $this->Propina, true);
        $criteria->compare('ImporteTotal', $this->ImporteTotal, true);
        $criteria->compare('Moneda', $this->Moneda, true);
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
     * @return NubeFactura the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
