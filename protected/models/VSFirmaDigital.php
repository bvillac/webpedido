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
Yii::import('system.vendors.nusoap.lib.*');
require_once('nusoap.php');

class VSFirmaDigital extends VsSeaActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        $dbname = parent::$dbname;
        if ($dbname != "")
            $dbname.=".";
        return $dbname . 'VSFirmaDigital'; //Empresas es la Utilizada.
        //return 'VSFirmaDigital';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Estado, UsuarioCreacion, UsuarioModificacion, UsuarioEliminacion', 'numerical', 'integerOnly' => true),
            array('IdCompania', 'length', 'max' => 19),
            array('Clave', 'length', 'max' => 25),
            array('EmpresaCertificadora', 'length', 'max' => 250),
            array('FechaCaducidad, FechaCreacion, FechaModificacion, FechaEliminacion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Id, IdCompania, Clave, FechaCaducidad, EmpresaCertificadora, Estado, UsuarioCreacion, FechaCreacion, UsuarioModificacion, FechaModificacion, UsuarioEliminacion, FechaEliminacion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idCompania' => array(self::BELONGS_TO, 'VSCompania', 'IdCompania'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('Id', $this->Id);
        $criteria->compare('IdCompania', $this->IdCompania, true);
        $criteria->compare('Clave', $this->Clave, true);
        $criteria->compare('FechaCaducidad', $this->FechaCaducidad, true);
        $criteria->compare('EmpresaCertificadora', $this->EmpresaCertificadora, true);
        $criteria->compare('Estado', $this->Estado);
        $criteria->compare('UsuarioCreacion', $this->UsuarioCreacion);
        $criteria->compare('FechaCreacion', $this->FechaCreacion, true);
        $criteria->compare('UsuarioModificacion', $this->UsuarioModificacion);
        $criteria->compare('FechaModificacion', $this->FechaModificacion, true);
        $criteria->compare('UsuarioEliminacion', $this->UsuarioEliminacion);
        $criteria->compare('FechaEliminacion', $this->FechaEliminacion, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return VSFirmaDigital the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function recuperarFirmaDigital($id) {
        $con = yii::app()->dbvssea;
        $rawData = array();
        $sql = "SELECT Clave,RutaFile FROM " . $con->dbname . ".VSFirmaDigital WHERE idCompania=$id AND Estado=1";
        $rawData = $con->createCommand($sql)->queryRow();
        $con->active = false;
        return $rawData;
    }

    public function recuperarXAdES_BES() {
        /* EJEMPO DE FIRMADO */
        //$obj = new VSFirmaDigital;
        //Varibles de EntornoFirma
        $config = array(
            //"digest_alg" => "sha1",
            "private_key_bits" => 2048,
            //"private_key_type" => OPENSSL_KEYTYPE_RSA,
        );
        
        $XmlDsigRSASHA1Url = "http://www.w3.org/2000/09/xmldsig#rsa-sha1";

        $Dataf = $this->recuperarFirmaDigital('1');
        $x509 = Yii::app()->phpseclib->createX509(); //Crear el ObjetoX509
        $RutaFile = explode(".", base64_decode($Dataf['RutaFile'])); //Obtiene el Nombre del Certificado x Default = .p12
        $file = Yii::app()->params['seaFirma'] . $RutaFile[0] . '.crt'; //Se crea el Archivo .crt para que lo pueda leer
        //Leer el archivo certificado
        $fd = fopen($file, 'r');
        $p12buf = fread($fd, filesize($file));
        fclose($fd);
        //Se carga el Certificado para Manipular
        $cert = $x509->loadX509($p12buf);//Obtengo el Certificado Digital
        $DataCn = explode(",", $x509->getIssuerDN(true)); //Dastos del Usuario Firma
        $X509IssuerName = trim($DataCn[4]) . ',' . trim($DataCn[3]) . ',' . trim($DataCn[2]) . ',' . trim($DataCn[1]) . ',' . trim($DataCn[0]); //Crear el String segun SRI


        $xmldata = '<ds:Signature xmlns:ds="http://www.w3.org/2000/09/xmldsig#" xmlns:etsi="http://uri.etsi.org/01903/v1.3.2#" Id="Signature504735">
                        <ds:SignedInfo Id="Signature-SignedInfo1024952">
                            <ds:CanonicalizationMethod Algorithm="http://www.w3.org/TR/2001/REC-xml-c14n-20010315"/>
                            <ds:SignatureMethod Algorithm="http://www.w3.org/2000/09/xmldsig#rsa-sha1"/>
                            <ds:Reference Id="SignedPropertiesID429729" Type="http://uri.etsi.org/01903#SignedProperties" URI="#Signature504735-SignedProperties48056">
                                <ds:DigestMethod Algorithm="http://www.w3.org/2000/09/xmldsig#sha1"/>
                                <ds:DigestValue><!-- Digest del elemento referenciado en Base64 --></ds:DigestValue>
                            </ds:Reference>
                            <ds:Reference URI="#Certificate1237555">
                                <ds:DigestMethod Algorithm="http://www.w3.org/2000/09/xmldsig#sha1"/>
                                <ds:DigestValue><!-- Digest del elemento referenciado en Base64 --></ds:DigestValue>
                            </ds:Reference>
                            <ds:Reference Id="Reference-ID-200615" URI="">
                                <ds:DigestMethod Algorithm="http://www.w3.org/2000/09/xmldsig#sha1"/>
                                <ds:DigestValue><!-- Digest del elemento referenciado en Base64 --></ds:DigestValue>
                            </ds:Reference>
                        </ds:SignedInfo>
                        <ds:SignatureValue Id="SignatureValue552465">
                            <!-- Valor de la firma en Base64 -->
                        </ds:SignatureValue>
                        <ds:KeyInfo Id="Certificate1237555">
                            <ds:X509Data>
                                <ds:X509Certificate>
                                    <!-- Certificado firmante en Base64 -->
                                </ds:X509Certificate>
                            </ds:X509Data>
                            <ds:KeyValue>
                                <ds:RSAKeyValue>
                                    <ds:Modulus><!-- Módulo de la clave RSA en Base64 --></ds:Modulus>
                                    <ds:Exponent><!-- Exponente de la clave RSA en Base64 --></ds:Exponent>
                                </ds:RSAKeyValue>
                            </ds:KeyValue>
                        </ds:KeyInfo>
                        <ds:Object Id="Signature504735-Object873466">
                            <etsi:QualifyingProperties Target="#Signature504735">
                                <etsi:SignedProperties Id="Signature504735-SignedProperties48056">
                                    <etsi:SignedSignatureProperties>
                                        <etsi:SigningTime><!-- Fecha y hora de la firma --></etsi:SigningTime>
                                        <etsi:SigningCertificate>
                                            <etsi:Cert>
                                                <etsi:CertDigest>
                                                    <ds:DigestMethod Algorithm="http://www.w3.org/2000/09/xmldsig#sha1"/>
                                                    <ds:DigestValue><!-- Digest del certificado en Base64 --></ds:DigestValue>
                                                </etsi:CertDigest>
                                                <etsi:IssuerSerial>
                                                    <ds:X509IssuerName>' . trim($X509IssuerName) . '</ds:X509IssuerName>
                                                    <ds:X509SerialNumber>' . trim($cert['tbsCertificate']['serialNumber']) . '</ds:X509SerialNumber>
                                                </etsi:IssuerSerial>
                                            </etsi:Cert>
                                        </etsi:SigningCertificate>
                                    </etsi:SignedSignatureProperties>
                                    <etsi:SignedDataObjectProperties>
                                        <etsi:DataObjectFormat ObjectReference="#Reference-ID-200615">
                                            <etsi:Description><!-- Descripcion del objeto firmado ---></etsi:Description>
                                            <etsi:MimeType><!-- Tipo MIME del objeto firmado --></etsi:MimeType>
                                        </etsi:DataObjectFormat>
                                    </etsi:SignedDataObjectProperties>
                                </etsi:SignedProperties>
                            </etsi:QualifyingProperties>
                        </ds:Object>
                    </ds:Signature>';
        return $xmldata;
    }
    
    public function firmaXAdES_BES($Documento) {

        $obj = new VSFirmaDigital;
        $Dataf = $obj->recuperarFirmaDigital('1');
        $fileCertificado = Yii::app()->params['seaFirma'] . base64_decode($Dataf['RutaFile']);
        $pass = base64_decode($Dataf['Clave']);
        $filexml = Yii::app()->params['seaDocXml'] . $Documento;
        //$client = new nusoap_client('http://www.lapolitecnica.net/webservices/servicio.php?wsdl', 'wsdl');

        $client = new nusoap_client('http://127.0.0.1:8080/FIRMARSRI/FirmaElectronicaSRI?wsdl', 'wsdl');
        $err = $client->getError();
        if ($err) {
            echo 'Error en Constructor' . $err;
        }
        //$param = array('param_id' => '2', 'param_txt' => 'DVD');
        $param = array(
            'pathOrigen' => $filexml,
            'pathFirmado' => Yii::app()->params['seaDocFact'],
            'pathCertificado' => $fileCertificado,
            'clave' => $pass,
            'nombreFirmado' => $Documento
        );

        $result = $client->call('firmar', $param);

        if ($client->fault) {
            echo 'Fallo';
            print_r($result);
        } else { // Chequea errores
            $err = $client->getError();
            if ($err) {  // Muestra el error
                echo 'Error' . $err;
            } else {  // Muestra el resultado
                //echo 'Resultado';
                //print_r($result);
                //echo $result['return'];
            }
        }
    }

}
