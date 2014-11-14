<?php

/**
 * This is the model class for table "VSCompania".
 *
 * The followings are the available columns in table 'VSCompania':
 * @property string $IdCompania
 * @property string $Ruc
 * @property string $RazonSocial
 * @property string $NombreComercial
 * @property string $Mail
 * @property integer $EsContribuyente
 * @property string $Direccion
 * @property string $UsuarioCreacion
 * @property string $FechaCreacion
 * @property string $UsuarioModificacion
 * @property string $FechaModificacion
 * @property string $UsuarioEliminacion
 * @property string $FechaEliminacion
 * @property string $Estado
 *
 * The followings are the available model relations:
 * @property VSAlerta[] $vSAlertas
 * @property VSCertificadoDigital[] $vSCertificadoDigitals
 * @property VSClaveContingencia[] $vSClaveContingencias
 * @property VSDirectorio[] $vSDirectorios
 * @property VSFirmaDigital[] $vSFirmaDigitals
 * @property VSProceso[] $vSProcesos
 * @property VSServiciosSRI[] $vSServiciosSRIs
 * @property VSServidorCorreo[] $vSServidorCorreos
 * @property VSUsuario[] $vSUsuarios
 */
class VSCompania extends VsSeaActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return VSCompania the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        $dbname = parent::$dbname;
        if ($dbname != "")
            $dbname.=".";
        return $dbname . 'VSCompania'; //Empresas es la Utilizada.
        //return 'VSCompania';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('IdCompania, Ruc', 'required'),
            array('EsContribuyente', 'numerical', 'integerOnly' => true),
            array('IdCompania', 'length', 'max' => 20),
            array('Ruc', 'length', 'max' => 50),
            array('RazonSocial, NombreComercial, Direccion', 'length', 'max' => 300),
            array('Mail', 'length', 'max' => 100),
            array('UsuarioCreacion, UsuarioModificacion, UsuarioEliminacion', 'length', 'max' => 150),
            array('Estado', 'length', 'max' => 1),
            array('FechaCreacion, FechaModificacion, FechaEliminacion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('IdCompania, Ruc, RazonSocial, NombreComercial, Mail, EsContribuyente, Direccion, UsuarioCreacion, FechaCreacion, UsuarioModificacion, FechaModificacion, UsuarioEliminacion, FechaEliminacion, Estado', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'vSAlertas' => array(self::HAS_MANY, 'VSAlerta', 'IdCompania'),
            'vSCertificadoDigitals' => array(self::HAS_MANY, 'VSCertificadoDigital', 'IdCompania'),
            'vSClaveContingencias' => array(self::HAS_MANY, 'VSClaveContingencia', 'IdCompania'),
            'vSDirectorios' => array(self::HAS_MANY, 'VSDirectorio', 'IdCompania'),
            'vSFirmaDigitals' => array(self::HAS_MANY, 'VSFirmaDigital', 'IdCompania'),
            'vSProcesos' => array(self::HAS_MANY, 'VSProceso', 'IdCompania'),
            'vSServiciosSRIs' => array(self::HAS_MANY, 'VSServiciosSRI', 'IdCompania'),
            'vSServidorCorreos' => array(self::HAS_MANY, 'VSServidorCorreo', 'IDCompania'),
            'vSUsuarios' => array(self::HAS_MANY, 'VSUsuario', 'IdCompania'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'IdCompania' => 'Id Compania',
            'Ruc' => 'Ruc',
            'RazonSocial' => 'Razon Social',
            'NombreComercial' => 'Nombre Comercial',
            'Mail' => 'Mail',
            'EsContribuyente' => 'Es Contribuyente',
            'Direccion' => 'Direccion',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('IdCompania', $this->IdCompania, true);
        $criteria->compare('Ruc', $this->Ruc, true);
        $criteria->compare('RazonSocial', $this->RazonSocial, true);
        $criteria->compare('NombreComercial', $this->NombreComercial, true);
        $criteria->compare('Mail', $this->Mail, true);
        $criteria->compare('EsContribuyente', $this->EsContribuyente);
        $criteria->compare('Direccion', $this->Direccion, true);
        $criteria->compare('UsuarioCreacion', $this->UsuarioCreacion, true);
        $criteria->compare('FechaCreacion', $this->FechaCreacion, true);
        $criteria->compare('UsuarioModificacion', $this->UsuarioModificacion, true);
        $criteria->compare('FechaModificacion', $this->FechaModificacion, true);
        $criteria->compare('UsuarioEliminacion', $this->UsuarioEliminacion, true);
        $criteria->compare('FechaEliminacion', $this->FechaEliminacion, true);
        $criteria->compare('Estado', $this->Estado, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Función que muestra los Usuario de Ficha Medica con Busquedas.
     *
     * @author Byron Villacreses
     * @access public
     * @return Un Array con Datos Seleccionados
     */
    public function mostrarCompanias() {
        $rawData = array();
        $con = Yii::app()->dbvssea;
        
        $sql = "SELECT A.IdCompania,A.Ruc,A.RazonSocial,A.NombreComercial,A.DireccionMatriz 
                    FROM " . $con->dbname . ".VSCompania A WHERE A.Estado='1'";
        
        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;
        
        return new CArrayDataProvider($rawData, array(
                    'keyField' => 'IdCompania',
                    'sort' => array(
                        'attributes' => array(
                            'IdCompania', 'Ruc', 'RazonSocial', 'NombreComercial', 'DireccionMatriz',
                        ),
                    ),
                    'totalItemCount' => count($rawData),
                    'pagination' => array(
                        'pageSize' => Yii::app()->params['pageSize'],
                    //'itemCount'=>count($rawData),
                    ),
                ));
        
    }
    
    
    public function insertarEmpresa($objEmp) {
        $con = Yii::app()->dbvssea;
        $trans = $con->beginTransaction();
        try {
            //$objEmp[0]['UsuarioCreacion']= Yii::app()->getSession()->get('user_name', FALSE);//Define el usuario Session
            $this->insertarDatosEmpresa($con, $objEmp);
            $idEmp = $con->getLastInsertID($con->dbname.'.VSCompania');
            $this->datoFirmaDigital($con, $objEmp, $idEmp);
            $trans->commit();
            $con->active = false;
            return true;
        } catch (Exception $e) {
            $trans->rollback();
            $con->active = false;
            throw $e;
            return false;
        }
    }
    
    private function insertarDatosEmpresa($con, $objEmp) {
        $sql = "INSERT INTO " . $con->dbname . ".VSCompania
                (Ruc,RazonSocial,NombreComercial,Mail,ContribuyenteEspecial,DireccionMatriz,UsuarioCreacion,FechaCreacion,Estado)VALUES(
                 '" . $objEmp[0]['Ruc'] . "',
                 '" . $objEmp[0]['RazonSocial'] . "',
                 '" . $objEmp[0]['NombreComercial'] . "',
                 '" . $objEmp[0]['Mail'] . "',
                 '" . $objEmp[0]['EsContribuyente'] . "',
                 '" . $objEmp[0]['Direccion'] . "',
                 '" . Yii::app()->getSession()->get('user_name', FALSE) . "',
                 CURRENT_TIMESTAMP(),
                 '" . $objEmp[0]['Estado'] . "')";
        //DATE(" . $cabOrden[0]['CDOR_FECHA_INGRESO'] . "),
        //echo $sql;
        $command = $con->createCommand($sql);
        $command->execute();
    }
    private function datoFirmaDigital($con, $objEmp,$idEmp) {
        $sql = "INSERT INTO " . $con->dbname . ".VSFirmaDigital 
                (IdCompania,Clave,RutaFile,FechaCaducidad,EmpresaCertificadora,UsuarioCreacion,FechaCreacion,Estado)VALUES(
                " . $idEmp . ",
                '" . $objEmp[0]['Clave'] . "',
                '" . $objEmp[0]['RutaFirma'] . "',
                '" . $objEmp[0]['FechaCaducidad'] . "',
                '" . $objEmp[0]['EmpresaCertificadora'] . "',
                '" . Yii::app()->getSession()->get('user_id', FALSE) . "',
                CURRENT_TIMESTAMP(),
                 '" . $objEmp[0]['Estado'] . "')";

        //DATE(" . $cabOrden[0]['CDOR_FECHA_INGRESO'] . "),
        //echo $sql;
        $command = $con->createCommand($sql);
        $command->execute();
    }
    
    public function removerEmpresa($ids) {
        $con = Yii::app()->dbvssea;
        $trans = $con->beginTransaction();
        try {
            $sql = "UPDATE " . $con->dbname . ".VSCompania SET Estado='0' WHERE idCompania IN($ids)";
            $comando = $con->createCommand($sql);
            $comando->execute();
            $trans->commit();
            $con->active = false;
            return true;
        } catch (Exception $e) { // se arroja una excepción si una consulta falla
            $trans->rollBack();
            throw $e;
            $con->active = false;
            return false;
        }
    }
    
    public function recuperarEmpresa($id) {
        $con = yii::app()->dbvssea;
        $sql = "SELECT A.IdCompania,A.Ruc,A.RazonSocial,A.NombreComercial,A.Mail,A.ContribuyenteEspecial EsContribuyente,
	A.DireccionMatriz Direccion,B.Clave,B.FechaCaducidad,B.EmpresaCertificadora 
	FROM " . $con->dbname . ".VSCompania A
		INNER JOIN " . $con->dbname . ".VSFirmaDigital B
			ON A.IdCompania=B.IdCompania
        WHERE A.Estado=1 AND A.IdCompania='$id'";
        //echo $sql;
        return $con->createCommand($sql)->query();
    }
    
    public function actualizarEmpresa($objEmp) {
        $con = yii::app()->dbvssea;
        $trans = $con->beginTransaction();
        try {
            //$objEmp[0]['UsuarioModificacion']= Yii::app()->getSession()->get('user_name', FALSE);//Define el usuario Session
            $this->actualizaEmpresa($con, $objEmp); //Actiañoza datos de la Empresa
            $this->actualizaFirmaDigital($con, $objEmp); //Actiañoza datos de la Firma Digital
            
            $trans->commit();
            $con->active = false;
            return true;
        } catch (Exception $e) {
            $trans->rollback();
            $con->active = false;
            throw $e;
            return false;
        }
    }
    
    private function actualizaEmpresa($con, $objEmp) {
         $sql = "UPDATE " . $con->dbname . ".VSCompania SET
                    Ruc = '" . $objEmp[0]['Ruc'] . "',
                    RazonSocial = '" . $objEmp[0]['RazonSocial'] . "',
                    NombreComercial = '" . $objEmp[0]['NombreComercial'] . "',
                    Mail = '" . $objEmp[0]['Mail'] . "',
                    ContribuyenteEspecial = '" . $objEmp[0]['EsContribuyente'] . "',
                    DireccionMatriz = '" . $objEmp[0]['Direccion'] . "',
                    UsuarioModificacion = '" . Yii::app()->getSession()->get('user_name', FALSE) . "',
                    FechaModificacion = CURRENT_TIMESTAMP()
                WHERE IdCompania=" . $objEmp[0]['IdCompania'] . " ";
        //echo $sql;
        $command = $con->createCommand($sql);
        $command->execute();
    }
    
    private function actualizaFirmaDigital($con, $objEmp) {
        $sql = "UPDATE " . $con->dbname . ".VSFirmaDigital SET
                    Clave = '" . base64_encode($objEmp[0]['Clave']) . "',
                    RutaFile = '" . base64_encode($objEmp[0]['RutaFirma']) . "',
                    FechaCaducidad = '" . $objEmp[0]['FechaCaducidad'] . "',
                    EmpresaCertificadora = '" . $objEmp[0]['EmpresaCertificadora'] . "',
                    UsuarioModificacion = '" . Yii::app()->getSession()->get('user_id', FALSE) . "',
                    FechaModificacion = CURRENT_TIMESTAMP()
                WHERE IdCompania=" . $objEmp[0]['IdCompania'] . " ";
        //echo $sql;
        $command = $con->createCommand($sql);
        $command->execute();
    }

}
