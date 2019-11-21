<?php

/**
 * This is the model class for table "PERSONA".
 *
 * The followings are the available columns in table 'PERSONA':
 * @property string $PER_ID
 * @property string $PER_CED_RUC
 * @property string $PER_NOMBRE
 * @property string $PER_APELLIDO
 * @property string $PER_FEC_NACIMIENTO
 * @property string $PER_GENERO
 * @property string $PER_EST_LOG
 * @property string $PER_FEC_CRE
 * @property string $PER_FEC_MOD
 *
 * The followings are the available model relations:
 * @property DATAPERSONA[] $dATAPERSONAs
 * @property USUARIO[] $uSUARIOs
 */
class PERSONA extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'PERSONA';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PER_CED_RUC', 'length', 'max'=>15),
			array('PER_NOMBRE, PER_APELLIDO', 'length', 'max'=>100),
			array('PER_GENERO, PER_EST_LOG', 'length', 'max'=>1),
			array('PER_FEC_NACIMIENTO, PER_FEC_CRE, PER_FEC_MOD', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('PER_ID, PER_CED_RUC, PER_NOMBRE, PER_APELLIDO, PER_FEC_NACIMIENTO, PER_GENERO, PER_EST_LOG, PER_FEC_CRE, PER_FEC_MOD', 'safe', 'on'=>'search'),
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
			'dATAPERSONAs' => array(self::HAS_MANY, 'DATAPERSONA', 'PER_ID'),
			'uSUARIOs' => array(self::HAS_MANY, 'USUARIO', 'PER_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'PER_ID' => 'Per',
			'PER_CED_RUC' => 'Per Ced Ruc',
			'PER_NOMBRE' => 'Per Nombre',
			'PER_APELLIDO' => 'Per Apellido',
			'PER_FEC_NACIMIENTO' => 'Per Fec Nacimiento',
			'PER_GENERO' => 'Per Genero',
			'PER_EST_LOG' => 'Per Est Log',
			'PER_FEC_CRE' => 'Per Fec Cre',
			'PER_FEC_MOD' => 'Per Fec Mod',
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

		$criteria->compare('PER_ID',$this->PER_ID,true);
		$criteria->compare('PER_CED_RUC',$this->PER_CED_RUC,true);
		$criteria->compare('PER_NOMBRE',$this->PER_NOMBRE,true);
		$criteria->compare('PER_APELLIDO',$this->PER_APELLIDO,true);
		$criteria->compare('PER_FEC_NACIMIENTO',$this->PER_FEC_NACIMIENTO,true);
		$criteria->compare('PER_GENERO',$this->PER_GENERO,true);
		$criteria->compare('PER_EST_LOG',$this->PER_EST_LOG,true);
		$criteria->compare('PER_FEC_CRE',$this->PER_FEC_CRE,true);
		$criteria->compare('PER_FEC_MOD',$this->PER_FEC_MOD,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PERSONA the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        
        public function mostrarUsuarioPersona() {
        $rawData = array();
        $con = Yii::app()->db;

        /*$sql = "SELECT A.PER_ID PerId,CONCAT(A.PER_NOMBRE,' ',A.PER_APELLIDO) Nombre,A.PER_GENERO Genero,
                B.USU_NOMBRE User,B.USU_CORREO Correo,A.PER_EST_LOG Estado
                FROM " . $con->dbname . ".PERSONA A
                        INNER JOIN  " . $con->dbname . ".USUARIO B
                                ON A.PER_ID=B.PER_ID
        WHERE A.PER_EST_LOG=1 ";*/
        
        $cli_Id=Yii::app()->getSession()->get('CliID', FALSE);
        $sql = "SELECT A.PER_ID PerId,CONCAT(A.PER_NOMBRE,' ',A.PER_APELLIDO) Nombre,A.PER_GENERO Genero,
                B.USU_NOMBRE User,B.USU_CORREO Correo,A.PER_EST_LOG Estado
                FROM " . $con->dbname . ".PERSONA A
                        INNER JOIN  (" . $con->dbname . ".USUARIO B
                                    INNER JOIN " . $con->dbname . ".USUARIO_TIENDA C ON B.USU_ID=C.USU_ID )
                                ON A.PER_ID=B.PER_ID
        WHERE A.PER_EST_LOG=1 AND C.CLI_ID=$cli_Id GROUP BY A.PER_ID  ORDER BY A.PER_ID ASC ";
        
        //echo $sql;

        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;

        return new CArrayDataProvider($rawData, array(
            'keyField' => 'PerId',
            'sort' => array(
                'attributes' => array(
                    'PerId', 'Nombre', 'User', 'Correo', 'Genero', 'Estado',
                ),
            ),
            'totalItemCount' => count($rawData),
            'pagination' => array(
                'pageSize' => Yii::app()->params['pageSize'],
            ),
        ));
    }

    public function insertarDatosPersona($objEnt) {
        $msg = new VSexception();
        $con = Yii::app()->db;
        $trans = $con->beginTransaction();
        try {
            $this->InsertarPersona($con, $objEnt);
            $IdPer = $con->getLastInsertID($con->dbname . '.PERSONA');            
            $this->InsertarUsuario($con, $objEnt, $IdPer);
            $IdUsu = $con->getLastInsertID($con->dbname . '.USUARIO');
            //$this->InsertarAreaPer($con, $objEnt, $IdUsu);
            $this->InsertarDataPer($con, $objEnt, $IdPer);
            //$this->insertarUserTienda($con, $objEnt, $IdUsu);
            $trans->commit();
            $con->active = false;
            return $msg->messageSystem('OK', null, 10, null, null);
        } catch (Exception $e) {
            $trans->rollback();
            $con->active = false;
            throw $e;
            return $msg->messageSystem('NO_OK', $e->getMessage(), 11, null, null);
        }
    }

    private function InsertarPersona($con, $objEnt) {
        $sql = "INSERT INTO " . $con->dbname . ".PERSONA
                (PER_CED_RUC,PER_NOMBRE,PER_APELLIDO,PER_FEC_NACIMIENTO,PER_GENERO,PER_EST_LOG,PER_FEC_CRE)VALUES
                ('" . $objEnt['dni'] . "','" . $objEnt['nombre'] . "','" . $objEnt['apellido'] . "',
                 '" . date("Y-m-d", strtotime($objEnt['fec_nac'])). "','" . $objEnt['genero'] . "','1',CURRENT_TIMESTAMP()) ";
        $command = $con->createCommand($sql);
        $command->execute();
    }

    private function InsertarDataPer($con, $objEnt, $IdPer) {
        $sql = "INSERT INTO " . $con->dbname . ".DATA_PERSONA 
                (PER_ID,DPER_DESCRIPCION,DPER_DIRECCION,DPER_TELEFONO,DPER_CONTACTO,DPER_EST_LOG,DPER_FEC_CRE)VALUES
                ($IdPer,'DATOS','" . $objEnt['direccion'] . "','" . $objEnt['telefono'] . "','" . $objEnt['contacto'] . "',
                  '1',CURRENT_TIMESTAMP()) ";
        $command = $con->createCommand($sql);
        $command->execute();
    }
    
    private function InsertarAreaPer($con, $objEnt, $IdUsu) {
        $sql = "INSERT INTO " . $con->dbname . ".AREAS_USUARIO 
                (IDS_ARE,USU_ID,EST_LOG)VALUES
                ('" . $objEnt['area'] . "',$IdUsu,'1') ";
        $command = $con->createCommand($sql);
        $command->execute();
    }

    private function InsertarUsuario($con, $objEnt, $IdPer) {
        $usuNombre = $objEnt['usuario'];
        $correo = $objEnt['correo'];
        $pass = $objEnt['password'];
        $sql = "INSERT INTO " . $con->dbname . ".USUARIO
                (PER_ID,USU_NOMBRE,USU_ALIAS,USU_CORREO,USU_PASSWORD,USU_EST_LOG,USU_FEC_CRE)VALUES
                ($IdPer,'$usuNombre','$usuNombre','$correo',MD5('$pass'),'1',CURRENT_TIMESTAMP()) ";
        $command = $con->createCommand($sql);
        $command->execute();
    }
    
    private function insertarUserTienda($con, $objEnt, $IdUser){
        //$perUser=new USUARIO();
        
        $tie = 160;//$objEnt['TIE'];//Tienda de Prueba
        $rol = 7;//$objEnt['ROL'];//CLIENTE TIENDA
        $ids = $IdUser;//$objEnt['IDS'];        
        //if (!$perUser->existeUsuTienda($con, $IdUser, $tie, $rol)) {
            //Si No existe            
            $cli_Id=Yii::app()->getSession()->get('CliID', FALSE);
            $sql = "INSERT INTO " . $con->dbname . ".USUARIO_TIENDA
                    (USU_ID,TIE_ID,ROL_ID,CLI_ID,UTIE_EST_LOG,UTIE_FEC_CRE)VALUES
                    ($ids,$tie,$rol,$cli_Id,'1',CURRENT_TIMESTAMP()) ";
            $command = $con->createCommand($sql);
            $command->execute();
        //}
    }
            

    public function recuperarPersonas($id) {
        $con = yii::app()->db;
        $sql = "SELECT A.PER_ID,A.PER_NOMBRE,A.PER_APELLIDO,A.PER_CED_RUC,A.PER_FEC_NACIMIENTO,
                        A.PER_GENERO,C.DPER_DIRECCION,C.DPER_TELEFONO,C.DPER_CONTACTO,
                        B.USU_NOMBRE,B.USU_CORREO,A.PER_EST_LOG,MD5(B.USU_PASSWORD) PASS,C.DPER_ID
                        FROM " . $con->dbname . ".PERSONA A
                                INNER JOIN  " . $con->dbname . ".USUARIO B
                                        ON A.PER_ID=B.PER_ID
                                LEFT JOIN  " . $con->dbname . ".DATA_PERSONA C
                                        ON A.PER_ID=C.PER_ID
                WHERE A.PER_EST_LOG=1 AND A.PER_ID='$id' ";
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryRow();//Retorna solo 1
        $con->active = false;
        return $rawData;
    }
    
    
    public function actualizarDatosPersona($objEnt) {
        $msg= new VSexception();
        $con = yii::app()->db;
        $trans = $con->beginTransaction();
        try {
            $this->modificaPersona($con, $objEnt);
            $ids=$objEnt['dperId'];//$this->idTabla($con,'DATA_PERSONA',$objEnt['perId'],'PER_ID','DPER_ID');
            $this->modificarDataPer($con, $objEnt,$ids);
            //$this->modificarDataArea($con, $objEnt,$ids);
            $this->modificarDataUser($con, $objEnt);
            
            $trans->commit();
            $con->active = false;
            return $msg->messageSystem('OK', null, 10, null, null);
        } catch (Exception $e) {
            $trans->rollback();
            $con->active = false;
            //throw $e;
            return $msg->messageSystem('NO_OK', $e->getMessage(), 11, null, null);
        }
    }
    
    private function modificaPersona($con, $objEnt) {        
        $sql = "UPDATE " . $con->dbname . ".PERSONA
                    SET  PER_CED_RUC = '" . $objEnt['dni'] . "',
                    PER_NOMBRE = '" . $objEnt['nombre'] . "',
                    PER_APELLIDO = '" . $objEnt['apellido'] . "',
                    PER_FEC_NACIMIENTO = '" . date("Y-m-d", strtotime($objEnt['fec_nac'])) . "',
                    PER_GENERO = '" . $objEnt['genero'] . "',
                    PER_EST_LOG = '" . $objEnt['estado'] . "',
                    PER_FEC_MOD = CURRENT_TIMESTAMP()
                    WHERE PER_ID= '" . $objEnt['perId'] . "'";
        $command = $con->createCommand($sql);
        $command->execute();
    }
    
     private function idTabla($con,$tabla,$ids,$campoIds,$returcampo) {
        $rawData = array();
        $sql = "SELECT $returcampo FROM " . $con->dbname . ".$tabla "
                . "WHERE $campoIds=$ids  ";
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryRow();
        if ($rawData === false)
            return false; //en caso de que existe problema o no retorne nada tiene false por defecto 
        return true;//$rawData['PCLI_ID'];
    }
    
    
    private function modificarDataPer($con, $objEnt, $Ids) {
        $sql = "UPDATE " . $con->dbname . ".DATA_PERSONA
                    SET
                    DPER_DESCRIPCION = 'DATOS',
                    DPER_DIRECCION = '" . $objEnt['direccion'] . "',
                    DPER_TELEFONO = '" . $objEnt['telefono'] . "',
                    DPER_CELULAR = '',
                    DPER_CONTACTO = '" . $objEnt['contacto'] . "',
                    DPER_EST_LOG = 1,
                    DPER_FEC_MOD = CURRENT_TIMESTAMP()
                    WHERE DPER_ID=$Ids";
        $command = $con->createCommand($sql);
        $command->execute();
    }
    
    private function modificarDataArea($con, $objEnt, $Ids) {
        $sql = "UPDATE " . $con->dbname . ".AREAS_USUARIO
                    SET                    
                        IDS_ARE = '" . $objEnt['area'] . "',
                        FEC_MOD = CURRENT_TIMESTAMP()
                    WHERE USU_ID=$Ids";
        $command = $con->createCommand($sql);
        $command->execute();
    }
    
    private function modificarDataUser($con, $objEnt) {  
        //USU_NOMBRE = '" . $objEnt['usuario'] . "',
        $sql = "UPDATE " . $con->dbname . ".USUARIO
                    SET  USU_CORREO = '" . $objEnt['correo'] . "',
                    USU_FEC_MOD = CURRENT_TIMESTAMP()
                    WHERE PER_ID= '" . $objEnt['perId'] . "'";
        $command = $con->createCommand($sql);
        $command->execute();
    }
    
    public function removerPersona($ids) {
        $msg= new VSexception();
        $con = Yii::app()->db;
        $trans = $con->beginTransaction();
        try {
            $sql = "UPDATE " . $con->dbname . ".PERSONA SET PER_EST_LOG='0' WHERE PER_ID IN($ids)";
            $comando = $con->createCommand($sql);
            $comando->execute();
            $sql = "UPDATE " . $con->dbname . ".USUARIO SET USU_EST_LOG='0' WHERE PER_ID IN($ids)";
            $comando = $con->createCommand($sql);
            $comando->execute();
            //echo $sql;
            $trans->commit();
            $con->active = false;
            return $msg->messageSystem('OK',null,12,null, null);
        } catch (Exception $e) { // se arroja una excepción si una consulta falla
            $trans->rollBack();
            //throw $e;
            $con->active = false;
            return $msg->messageSystem('NO_OK', $e->getMessage(), 11, null, null);
        }
    }
    
    
    public function mostrarUsuarioTienda($control) {
        $rawData = array();
        $limitrowsql = Yii::app()->params['limitRowSQL'];
        $con = Yii::app()->db;
        $cli_Id=Yii::app()->getSession()->get('CliID', FALSE);
        $sql = "SELECT A.UTIE_ID UtieId,B.USU_NOMBRE Usuario,A.UTIE_FEC_CRE Fecha,
                        CONCAT(E.PER_NOMBRE,' ',E.PER_APELLIDO) Persona,F.CLI_NOMBRE Cliente,
                        C.TIE_NOMBRE TiendaNombre,D.ROL_NOMBRE Rol,A.UTIE_EST_LOG Estado,A.UTIE_ASIG Asig
                        FROM " . $con->dbname . ".USUARIO_TIENDA A
                                INNER JOIN (" . $con->dbname . ".USUARIO B
                                            INNER JOIN " . $con->dbname . ".PERSONA E
						ON B.PER_ID=E.PER_ID)
                                        ON A.USU_ID=B.USU_ID
                                INNER JOIN (" . $con->dbname . ".TIENDA C
                                            INNER JOIN VSSEAPEDIDO.CLIENTE F
						ON C.CLI_ID=F.CLI_ID)
                                        ON A.TIE_ID=C.TIE_ID
                                INNER JOIN " . $con->dbname . ".ROL D
                                        ON A.ROL_ID=D.ROL_ID
                WHERE A.UTIE_EST_LOG=1   ";
        if (!empty($control)) {//Verifica la Opcion op para los filtros
            $sql .= ($control['TIE_ID'] != "0") ? "AND C.TIE_ID='".$control['TIE_ID']."' " : "";
            $sql .= ($control['CLI_ID'] != "0") ? "AND C.CLI_ID='".$control['CLI_ID']."' " : "";
            $sql .= ($control['ROL_ID'] != "0") ? "AND D.ROL_ID='".$control['ROL_ID']."' " : "";
        }
        $sql .= "ORDER BY A.UTIE_ID DESC LIMIT $limitrowsql";
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;

        return new CArrayDataProvider($rawData, array(
            'keyField' => 'UtieId',
            'sort' => array(
                'attributes' => array(
                    'Usuario', 'TiendaNombre', 'Rol', 'Fecha', 'Estado','Cliente','Persona'
                ),
            ),
            'totalItemCount' => count($rawData),
            'pagination' => array(
                'pageSize' => Yii::app()->params['pageSize'],
            ),
        ));
    }
    
    
    public function insertarDatosUserCliente($objEnt) {
        $msg = new VSexception();
        $con = Yii::app()->db;
        $trans = $con->beginTransaction();
        try {
            $this->InsertarUserCliente($con, $objEnt);
            $IdPer = $con->getLastInsertID($con->dbname . '.USUINI_EMPRESA');            
            //$this->InsertarUsuario($con, $objEnt, $IdPer);
            //$IdUsu = $con->getLastInsertID($con->dbname . '.USUARIO');
            //$this->InsertarAreaPer($con, $objEnt, $IdUsu);
            //$this->InsertarDataPer($con, $objEnt, $IdPer);
            //$this->insertarUserTienda($con, $objEnt, $IdUsu);
            $trans->commit();
            $con->active = false;
            return $msg->messageSystem('OK', null, 10, null, null);
        } catch (Exception $e) {
            $trans->rollback();
            $con->active = false;
            //throw $e;
            return $msg->messageSystem('NO_OK', $e->getMessage(), 11, null, null);
        }
    }
    
    private function InsertarUserCliente($con, $objEnt) {
        $cli_Id=Yii::app()->getSession()->get('CliID', FALSE);
        $sql = "INSERT INTO " . $con->dbname . ".USUINI_EMPRESA
                (TIE_ID,CLI_ID,ROL_ID,IDS_ARE,UEMP_NOMBRE,UEMP_ALIAS,UEMP_CORREO,TIE_CUPO,EST_LOG,FEC_CRE)VALUES
                (0,$cli_Id,'" . $objEnt['ROL_ID'] . "','" . $objEnt['IDS_ARE'] . "','" . $objEnt['UEMP_NOMBRE'] . "','" . $objEnt['UEMP_ALIAS'] . "',
                 '" . $objEnt['UEMP_CORREO'] . "','" . $objEnt['TIE_CUPO'] . "','1',CURRENT_TIMESTAMP()) ";
        $command = $con->createCommand($sql);
        $command->execute();
    }
    
    
    public function mostrarUserCliente() {
        $rawData = array();
        $limitrowsql = Yii::app()->params['limitRowSQL'];
        $con = Yii::app()->db;
        $cli_Id=Yii::app()->getSession()->get('CliID', FALSE);
        
        $sql = "SELECT A.UEMP_ID Ids,IF(A.ROL_ID=1,'USUARIO','SUPERVISOR') Rol,B.NOM_ARE Area,A.UEMP_NOMBRE Nombre,A.UEMP_ALIAS Departamento,
                    A.UEMP_CORREO Correo,A.TIE_CUPO Cupo,A.EST_LOG,DATE(A.FEC_CRE) Fecha 
                    FROM " . $con->dbname . ".USUINI_EMPRESA A
                            INNER JOIN " . $con->dbname . ".AREAS B ON A.IDS_ARE=B.IDS_ARE
                WHERE A.EST_LOG=1 AND A.CLI_ID=$cli_Id ";
        $sql .= " ORDER BY A.UEMP_ID DESC LIMIT $limitrowsql";
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;

        return new CArrayDataProvider($rawData, array(
            'keyField' => 'Ids',
            'sort' => array(
                'attributes' => array(
                    'Ids','Area' ,'Nombre', 'Rol', 'Departamento', 'Correo'
                ),
            ),
            'totalItemCount' => count($rawData),
            'pagination' => array(
                'pageSize' => Yii::app()->params['pageSize'],
            ),
        ));
    }
    
    public function removerUserCliente($ids) {
        $msg= new VSexception();
        $con = Yii::app()->db;
        $trans = $con->beginTransaction();
        try {
            $sql = "UPDATE " . $con->dbname . ".USUINI_EMPRESA SET EST_LOG='0' WHERE UEMP_ID IN($ids)";
            $comando = $con->createCommand($sql);
            $comando->execute();
            //echo $sql;
            $trans->commit();
            $con->active = false;
            return $msg->messageSystem('OK',null,12,null, null);
        } catch (Exception $e) { // se arroja una excepción si una consulta falla
            $trans->rollBack();
            //throw $e;
            $con->active = false;
            return $msg->messageSystem('NO_OK', $e->getMessage(), 11, null, null);
        }
    }
    
    public function autorizarUserCliente() {
        $msg= new VSexception();
        $con = Yii::app()->db;
        $trans = $con->beginTransaction();
        //Estado 2 = Autorizado
        try {
            $cli_Id=Yii::app()->getSession()->get('CliID', FALSE);//
            $sql = "UPDATE " . $con->dbname . ".USUINI_EMPRESA SET EST_LOG='2' WHERE EST_LOG=1 AND CLI_ID='$cli_Id'";
            $comando = $con->createCommand($sql);
            $comando->execute();
            //echo $sql;
            $trans->commit();
            $con->active = false;
            return $msg->messageSystem('OK',null,12,null, null);
        } catch (Exception $e) { // se arroja una excepción si una consulta falla
            $trans->rollBack();
            //throw $e;
            $con->active = false;
            return $msg->messageSystem('NO_OK', $e->getMessage(), 11, null, null);
        }
    }
    
    
    public function insertarDatosItemCliente($objEnt) {
        $msg = new VSexception();
        $con = Yii::app()->db;
        $trans = $con->beginTransaction();
        try {
            $this->InsertarItemCliente($con, $objEnt);
            $IdPer = $con->getLastInsertID($con->dbname . '.USUINI_EMPRESA');            
            $trans->commit();
            $con->active = false;
            return $msg->messageSystem('OK', null, 10, null, null);
        } catch (Exception $e) {
            $trans->rollback();
            $con->active = false;
            //throw $e;
            return $msg->messageSystem('NO_OK', $e->getMessage(), 11, null, null);
        }
    }
    
    private function InsertarItemCliente($con, $objEnt) {
        $cli_Id=Yii::app()->getSession()->get('CliID', FALSE);//AEMP_ID
        $sql = "INSERT INTO " . $con->dbname . ".ART_EMPRESA
                (CLI_ID,AEMP_NOMBRE,AEMP_OBSERVA,AEMP_ARCHIVO,AEMP_RUTA,EST_LOG,FEC_CRE)VALUES
                ($cli_Id,'" . $objEnt['AEMP_NOMBRE'] . "','" . $objEnt['AEMP_OBSERVA'] . "','" . $objEnt['AEMP_ARCHIVO'] . "','" . $objEnt['AEMP_RUTA'] . "',
                 '1',CURRENT_TIMESTAMP()) ";
        $command = $con->createCommand($sql);
        $command->execute();
    }
    
    
    public function mostrarItemCliente() {
        $rawData = array();
        $limitrowsql = Yii::app()->params['limitRowSQL'];
        $con = Yii::app()->db;
        $cli_Id=Yii::app()->getSession()->get('CliID', FALSE);
        
        $sql = "SELECT AEMP_ID Ids,AEMP_NOMBRE Nombre,AEMP_OBSERVA Observa,AEMP_ARCHIVO Archivo,
                    AEMP_RUTA Ruta,EST_LOG,DATE(FEC_CRE) Fecha 
                    FROM " . $con->dbname . ".ART_EMPRESA
                WHERE EST_LOG=1 AND CLI_ID=$cli_Id ";
        $sql .= " ORDER BY AEMP_ID DESC LIMIT $limitrowsql";

        //echo $sql;
        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;

        return new CArrayDataProvider($rawData, array(
            'keyField' => 'Ids',
            'sort' => array(
                'attributes' => array(
                    'Ids','Nombre', 'Observa', 'Archivo', 'Fecha'
                ),
            ),
            'totalItemCount' => count($rawData),
            'pagination' => array(
                'pageSize' => Yii::app()->params['pageSize'],
            ),
        ));
    }
    
    
    public function removerItemCliente($ids) {
        $msg= new VSexception();
        $con = Yii::app()->db;
        $trans = $con->beginTransaction();
        try {
            $sql = "UPDATE " . $con->dbname . ".ART_EMPRESA SET EST_LOG='0' WHERE AEMP_ID IN($ids)";
            $comando = $con->createCommand($sql);
            $comando->execute();
            //echo $sql;
            $trans->commit();
            $con->active = false;
            return $msg->messageSystem('OK',null,12,null, null);
        } catch (Exception $e) { // se arroja una excepción si una consulta falla
            $trans->rollBack();
            //throw $e;
            $con->active = false;
            return $msg->messageSystem('NO_OK', $e->getMessage(), 11, null, null);
        }
    }
    
    public function autorizarItemCliente() {
        $msg= new VSexception();
        $con = Yii::app()->db;
        $trans = $con->beginTransaction();
        //Estado 2 = Autorizado
        try {
            $cli_Id=Yii::app()->getSession()->get('CliID', FALSE);//
            $sql = "UPDATE " . $con->dbname . ".ART_EMPRESA SET EST_LOG='2' WHERE EST_LOG=1 AND CLI_ID='$cli_Id'";
            $comando = $con->createCommand($sql);
            $comando->execute();
            //echo $sql;
            $trans->commit();
            $con->active = false;
            return $msg->messageSystem('OK',null,12,null, null);
        } catch (Exception $e) { // se arroja una excepción si una consulta falla
            $trans->rollBack();
            //throw $e;
            $con->active = false;
            return $msg->messageSystem('NO_OK', $e->getMessage(), 11, null, null);
        }
    }
    
    
    

        
        
}
