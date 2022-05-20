<?php

/**
 * This is the model class for table "TIENDA".
 *
 * The followings are the available columns in table 'TIENDA':
 * @property string $TIE_ID
 * @property string $CLI_ID
 * @property string $TIE_NOMBRE
 * @property string $TIE_DIRECCION
 * @property string $TIE_TELEFONO
 * @property string $TIE_CUPO
 * @property string $TIE_LUG_ENTREGA
 * @property string $TIE_CONTACTO
 * @property string $FEC_INI_PED
 * @property string $FEC_FIN_PED
 * @property string $TIE_EST_LOG
 * @property string $TIE_FEC_CRE
 * @property string $TIE_FEC_MOD
 *
 * The followings are the available model relations:
 * @property ARTICULOTIENDA[] $aRTICULOTIENDAs
 * @property CABPEDIDO[] $cABPEDIDOs
 * @property TEMPCABPEDIDO[] $tEMPCABPEDIDOs
 * @property CLIENTE $cLI
 * @property USUARIOTIENDA[] $uSUARIOTIENDAs
 */
class TIENDA extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'TIENDA';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('CLI_ID', 'required'),
            array('CLI_ID, TIE_TELEFONO', 'length', 'max' => 20),
            array('TIE_NOMBRE, TIE_DIRECCION, TIE_LUG_ENTREGA, TIE_CONTACTO', 'length', 'max' => 100),
            array('TIE_CUPO', 'length', 'max' => 10),
            array('FEC_INI_PED, FEC_FIN_PED', 'length', 'max' => 2),
            array('TIE_EST_LOG', 'length', 'max' => 1),
            array('TIE_FEC_CRE, TIE_FEC_MOD', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('TIE_ID, CLI_ID, TIE_NOMBRE, TIE_DIRECCION, TIE_TELEFONO, TIE_CUPO, TIE_LUG_ENTREGA, TIE_CONTACTO, FEC_INI_PED, FEC_FIN_PED, TIE_EST_LOG, TIE_FEC_CRE, TIE_FEC_MOD', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'aRTICULOTIENDAs' => array(self::HAS_MANY, 'ARTICULOTIENDA', 'TIE_ID'),
            'cABPEDIDOs' => array(self::HAS_MANY, 'CABPEDIDO', 'TIE_ID'),
            'tEMPCABPEDIDOs' => array(self::HAS_MANY, 'TEMPCABPEDIDO', 'TIE_ID'),
            'cLI' => array(self::BELONGS_TO, 'CLIENTE', 'CLI_ID'),
            'uSUARIOTIENDAs' => array(self::HAS_MANY, 'USUARIOTIENDA', 'TIE_ID'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'TIE_ID' => 'Tie',
            'CLI_ID' => 'Cli',
            'TIE_NOMBRE' => 'Tie Nombre',
            'TIE_DIRECCION' => 'Tie Direccion',
            'TIE_TELEFONO' => 'Tie Telefono',
            'TIE_CUPO' => 'Tie Cupo',
            'TIE_LUG_ENTREGA' => 'Tie Lug Entrega',
            'TIE_CONTACTO' => 'Tie Contacto',
            'FEC_INI_PED' => 'Fec Ini Ped',
            'FEC_FIN_PED' => 'Fec Fin Ped',
            'TIE_EST_LOG' => 'Tie Est Log',
            'TIE_FEC_CRE' => 'Tie Fec Cre',
            'TIE_FEC_MOD' => 'Tie Fec Mod',
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

        $criteria->compare('TIE_ID', $this->TIE_ID, true);
        $criteria->compare('CLI_ID', $this->CLI_ID, true);
        $criteria->compare('TIE_NOMBRE', $this->TIE_NOMBRE, true);
        $criteria->compare('TIE_DIRECCION', $this->TIE_DIRECCION, true);
        $criteria->compare('TIE_TELEFONO', $this->TIE_TELEFONO, true);
        $criteria->compare('TIE_CUPO', $this->TIE_CUPO, true);
        $criteria->compare('TIE_LUG_ENTREGA', $this->TIE_LUG_ENTREGA, true);
        $criteria->compare('TIE_CONTACTO', $this->TIE_CONTACTO, true);
        $criteria->compare('FEC_INI_PED', $this->FEC_INI_PED, true);
        $criteria->compare('FEC_FIN_PED', $this->FEC_FIN_PED, true);
        $criteria->compare('TIE_EST_LOG', $this->TIE_EST_LOG, true);
        $criteria->compare('TIE_FEC_CRE', $this->TIE_FEC_CRE, true);
        $criteria->compare('TIE_FEC_MOD', $this->TIE_FEC_MOD, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TIENDA the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function recuperarTiendasRol() {
        $rol_Id = Yii::app()->getSession()->get('RolId', FALSE);
        $usu_Id = Yii::app()->getSession()->get('user_id', FALSE);
        $cli_Id=Yii::app()->getSession()->get('CliID', FALSE);
        try {
            $con = yii::app()->db;
            //Verificacion por ROL PARA aministrador cod=9
            if($rol_Id==9 || $rol_Id==1){//Rol de Super Administrador                
                $sql = "SELECT TIE_ID,TIE_NOMBRE FROM " . $con->dbname . ".TIENDA "
                        . " WHERE TIE_EST_LOG=1  AND CLI_ID=$cli_Id ORDER BY TIE_NOMBRE;";
            
            } else {
                    $sql = "SELECT B.TIE_ID,B.TIE_NOMBRE
                        FROM " . $con->dbname . ".USUARIO_TIENDA A
                                INNER JOIN " . $con->dbname . ".TIENDA B
                                        ON A.TIE_ID=B.TIE_ID
                    WHERE A.UTIE_EST_LOG=1 AND A.ROL_ID=$rol_Id AND USU_ID=$usu_Id AND A.CLI_ID=$cli_Id "
                            . " ORDER BY B.TIE_NOMBRE ASC";
            }
        
            //echo $sql;
            $rawData = $con->createCommand($sql)->queryAll();
            $con->active = false;
            return $rawData;
        } catch (Exception $e) {
            //throw $e;
            throw new CHttpException(400,'Acción no permitida, Ud. no tiene acceso');

        }
    }
    
    public function recuperarTiendaAsig() {
        $rol_Id = Yii::app()->getSession()->get('RolId', FALSE);
        $usu_Id = Yii::app()->getSession()->get('user_id', FALSE);
        $cli_Id=Yii::app()->getSession()->get('CliID', FALSE);
        try {
            $con = yii::app()->db;
            //Verificacion por ROL PARA aministrador cod=9
            if($rol_Id==9){//Rol de Super Administrador                
                $sql = "SELECT TIE_ID,TIE_NOMBRE FROM " . $con->dbname . ".TIENDA "
                        . " WHERE TIE_EST_LOG=1  AND CLI_ID=$cli_Id ORDER BY TIE_NOMBRE;";
            }elseif($rol_Id==8){//ROL DE SUPERVISOR
                $sql = "SELECT B.TIE_ID,B.TIE_NOMBRE
                        FROM " . $con->dbname . ".USUARIO_TIENDA A
                                INNER JOIN " . $con->dbname . ".TIENDA B
                                        ON A.TIE_ID=B.TIE_ID
                    WHERE A.UTIE_EST_LOG=1 AND A.UTIE_ASIG=1 AND A.ROL_ID=$rol_Id AND USU_ID=$usu_Id AND A.CLI_ID=$cli_Id "
                            . " ORDER BY B.TIE_NOMBRE ASC";
            } else {
                    $sql = "SELECT B.TIE_ID,B.TIE_NOMBRE
                        FROM " . $con->dbname . ".USUARIO_TIENDA A
                                INNER JOIN " . $con->dbname . ".TIENDA B
                                        ON A.TIE_ID=B.TIE_ID
                    WHERE A.UTIE_EST_LOG=1 AND A.ROL_ID=$rol_Id AND USU_ID=$usu_Id AND A.CLI_ID=$cli_Id "
                            . " ORDER BY B.TIE_NOMBRE ASC";
            }
        
            //echo $sql;
            $rawData = $con->createCommand($sql)->queryAll();
            $con->active = false;
            return $rawData;
        } catch (Exception $e) {
            //throw $e;
            throw new CHttpException(400,'Acción no permitida, Ud. no tiene acceso');

        }
    }
    
    public function recuperarTiendasRolCliente($cli_Id) {
        //$rol_Id = Yii::app()->getSession()->get('RolId', FALSE);
        //$usu_Id = Yii::app()->getSession()->get('user_id', FALSE);
        $cli_Id=Yii::app()->getSession()->get('CliID', FALSE);
        try {
            $con = yii::app()->db;
            $sql = "SELECT B.TIE_ID,B.TIE_NOMBRE
                        FROM " . $con->dbname . ".USUARIO_TIENDA A
                                INNER JOIN " . $con->dbname . ".TIENDA B
                                        ON A.TIE_ID=B.TIE_ID
                WHERE A.UTIE_EST_LOG=1 AND A.ROL_ID=8 AND A.CLI_ID=$cli_Id ORDER BY B.TIE_NOMBRE ASC";
            //echo $sql;
            $rawData = $con->createCommand($sql)->queryAll();
            $con->active = false;
            return $rawData;
        } catch (Exception $e) {
            //throw $e;
            throw new CHttpException(400,'Acción no permitida, Ud. no tiene acceso');

        }
    }

    public function mostrarTiendas() {//
        $rawData = array();
        $con = Yii::app()->db;
        //$TieId=Yii::app()->getSession()->get('TieID', FALSE);
        $cli_Id=Yii::app()->getSession()->get('CliID', FALSE);
        $sql = "SELECT A.TIE_ID,A.CLI_ID,A.TIE_NOMBRE,A.TIE_DIRECCION,A.TIE_CUPO,
                    B.CLI_NOMBRE,A.TIE_CONTACTO,A.TIE_TELEFONO,TIE_LUG_ENTREGA
                        FROM " . $con->dbname . ".TIENDA A
                                INNER JOIN " . $con->dbname . ".CLIENTE B
                                        ON A.CLI_ID=B.CLI_ID
                WHERE A.TIE_EST_LOG=1 AND A.CLI_ID=$cli_Id ";

        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;

        return new CArrayDataProvider($rawData, array(
            'keyField' => 'TIE_ID',
            'sort' => array(
                'attributes' => array(
                    'TIE_ID', 'TIE_NOMBRE', 'TIE_DIRECCION', 'TIE_CUPO', 'CLI_NOMBRE', 'TIE_CONTACTO', 'TIE_TELEFONO',
                ),
            ),
            'totalItemCount' => count($rawData),
            'pagination' => array(
                'pageSize' => Yii::app()->params['pageSize'],
            ),
        ));
    }

    public function insertarTienda($objEnt) {
        $msg= new VSexception();
        $con = Yii::app()->db;
        $trans = $con->beginTransaction();
        try {
            //$objEmp[0]['UsuarioCreacion']= Yii::app()->getSession()->get('user_name', FALSE);//Define el usuario Session  
            $sql="INSERT INTO " . $con->dbname . ".TIENDA 
                (CLI_ID,TIE_NOMBRE,TIE_DIRECCION,TIE_TELEFONO,TIE_CUPO,TIE_LUG_ENTREGA,
                TIE_CONTACTO,FEC_INI_PED,FEC_FIN_PED,TIE_EST_LOG)VALUES(
                '" . $objEnt['CLI_ID'] . "',
                '" . $objEnt['TIE_NOMBRE'] . "',
                '" . $objEnt['TIE_DIRECCION'] . "',
                '" . $objEnt['TIE_TELEFONO'] . "',
                '" . $objEnt['TIE_CUPO'] . "',
                '" . $objEnt['TIE_LUG_ENTREGA'] . "',
                '" . $objEnt['TIE_CONTACTO'] . "',
                '" . $objEnt['FEC_INI_PED'] . "',
                '" . $objEnt['FEC_FIN_PED'] . "',
                '1')";
            $command = $con->createCommand($sql);
            $command->execute();
            $trans->commit();
            $con->active = false;
            return $msg->messageSystem('OK',null,10,null, null);
        } catch (Exception $e) {
            $trans->rollback();
            $con->active = false;
            //throw $e;
            return $msg->messageSystem('NO_OK',$e->getMessage(),11,null, null);
        }
    }
    
    public function actualizarTienda($objEnt) {
        $msg= new VSexception();
        $con = yii::app()->db;
        $trans = $con->beginTransaction();
        try {
            $sql = "UPDATE " . $con->dbname . ".TIENDA SET
                    CLI_ID = '" . $objEnt['CLI_ID'] . "',
                    TIE_NOMBRE = '" . $objEnt['TIE_NOMBRE'] . "',
                    TIE_DIRECCION = '" . $objEnt['TIE_DIRECCION'] . "',
                    TIE_TELEFONO = '" . $objEnt['TIE_TELEFONO'] . "',
                    TIE_CUPO = '" . $objEnt['TIE_CUPO'] . "',
                    TIE_LUG_ENTREGA = '" . $objEnt['TIE_LUG_ENTREGA'] . "',
                    TIE_CONTACTO = '" . $objEnt['TIE_CONTACTO'] . "',
                    FEC_INI_PED = '" . $objEnt['FEC_INI_PED'] . "',
                    FEC_FIN_PED = '" . $objEnt['FEC_FIN_PED'] . "',
                    TIE_EST_LOG = '" . $objEnt['TIE_EST_LOG'] . "',
                    TIE_FEC_MOD = CURRENT_TIMESTAMP()
                WHERE TIE_ID=" . $objEnt['TIE_ID'] . " ";
            //echo $sql;
            $command = $con->createCommand($sql);
            $command->execute();

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
    
    public function recuperarTiendas($id) {
        $con = yii::app()->db;
        $sql = "SELECT A.TIE_ID,A.CLI_ID,A.TIE_NOMBRE,A.TIE_DIRECCION,A.TIE_CUPO,
                        B.CLI_NOMBRE,A.TIE_CONTACTO,A.TIE_TELEFONO,A.TIE_LUG_ENTREGA,
                        A.FEC_INI_PED,A.FEC_FIN_PED
                        FROM " . $con->dbname . ".TIENDA A
                                INNER JOIN " . $con->dbname . ".CLIENTE B
                                        ON A.CLI_ID=B.CLI_ID
                WHERE A.TIE_EST_LOG=1 AND A.TIE_ID='$id' ";
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryRow();//Retorna solo 1
        $con->active = false;
        return $rawData;
    }
    
    public function recuperarTiendasCupo($id) {
        $valida = new VSValidador;
        $msg = new VSexception();
        $con = yii::app()->db;
        $idRol=Yii::app()->getSession()->get('RolId', FALSE);//Rol del Usuario.
        $mensaje = "";        
        //BUSCAR DATOS DE LA TIENDA
        $sql = "SELECT A.TIE_CUPO,A.FEC_INI_PED,A.FEC_FIN_PED FROM " . $con->dbname . ".TIENDA A
                WHERE A.TIE_EST_LOG=1 AND A.TIE_ID='$id' ";
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryRow(); //Retorna solo 1
        $anoMes = date("Y-m-");
        $dia = date("Y-m-d");
        $cupo = (float) $rawData["TIE_CUPO"];
        $f_ini = $anoMes . $valida->ajusteNumDoc($rawData["FEC_INI_PED"], 2);
        $f_fin = $anoMes . $valida->ajusteNumDoc($rawData["FEC_FIN_PED"], 2);
        //VERIFICAR FECHA DISPINIBLE DE ACUERDO A RANGO DE FECHAS DE LA TIENDA
        if ($dia >= date($f_ini) AND $dia <= date($f_fin)) {//Si esta Dentro del Rango
            //OBTENER SALDO DISPONIBLE
            $sql = "SELECT IFNULL(SUM(B.CPED_VAL_NET),0) ValNeto 
                        FROM " . $con->dbname . ".CAB_PEDIDO B 
                WHERE  B.CPED_EST_LOG IN(1,2) AND B.TIE_ID='$id' 
                        AND DATE(B.CPED_FEC_PED) BETWEEN '$f_ini' AND  '$f_fin' ";
            //echo $sql;
            $rawData = $con->createCommand($sql)->queryRow(); //Retorna solo 1
            $con->active = false;

            $valNeto = (float) $rawData["ValNeto"];
            $saldo = $cupo - $valNeto; //Saldo Disponible
            if ($saldo > 0) {
                $mensaje = Yii::t('EXCEPTION', 'Your store has an available balance:').' $ '.$saldo;
                /*if($idRol!='7'){//USUARIO TIENDA NO PUEDE VER SU CUPO
                    $mensaje = Yii::t('EXCEPTION', 'Your store has an available balance:').' $ '.$saldo;
                }else{
                    $mensaje = Yii::t('EXCEPTION', 'Your store has available balance');
                }*/
                $arroout["SALDO"] = $saldo; //Saldo Disonible
                
            } else {
                $arroout["SALDO"] = 0; //No tiene Cupo
                $mensaje = Yii::t('EXCEPTION', 'Monthly allowance not available.'); //Saldo No Disponible.
            }
            
        }else{//No esta dentro del Rango establecido $mensaje
            $arroout["SALDO"] = 0; //No tiene Cupo
            $mensaje = Yii::t('EXCEPTION', 'Set the date range for the store to expired therefore we can not fulfill your order!!!'); //Saldo No Disponible.
        }
        $arroout["TIENDA"] =array();
        //VSValidador::putMessageLogFile('llego xxx'.$id);
        if ($id!=''){            
            $arroout["TIENDA"] = $this->recuperarItemsTiendas($id);
        }
        $arroout["MOSTRAR"] = ($idRol!='7')?'SI':'NO';//Retona SI O NO DEPENDIDENDO DEL ROL PARA VER CUPOS DE TIENDAS
        return $msg->messageSystem('OK', null, null,$mensaje , $arroout); //Mensaje Personalizado.
    }

    public function removerTienda($ids) {
        $msg= new VSexception();
        $con = Yii::app()->db;
        $trans = $con->beginTransaction();
        try {
            $sql = "UPDATE " . $con->dbname . ".TIENDA SET TIE_EST_LOG='0' WHERE TIE_ID IN($ids)";
            $comando = $con->createCommand($sql);
            $comando->execute();
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
    
    public function recuperarTiendasCliente() {
        $cli_Id=Yii::app()->getSession()->get('CliID', FALSE);
        $con = yii::app()->db;
        $sql = "SELECT TIE_ID,TIE_NOMBRE FROM " . $con->dbname . ".TIENDA WHERE CLI_ID=$cli_Id AND TIE_EST_LOG=1 ORDER BY TIE_NOMBRE ";
        //echo $sql;
        //$rawData =$con->createCommand($sql)->query();
        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;
        return $rawData;
    }
    
    public function recuperarTiendasClienteAdmin($cli_Id) {
        //$cli_Id=Yii::app()->getSession()->get('CliID', FALSE);
        $con = yii::app()->db;        
        
        $sql = "SELECT GROUP_CONCAT(CONCAT('\'',TIE_ID,'\'') SEPARATOR ',') TIE_ID
                FROM " . $con->dbname . ".TIENDA
          WHERE TIE_EST_LOG=1 AND CLI_ID='$cli_Id';";

        //echo $sql;
        //$rawData =$con->createCommand($sql)->query();
        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;
        return $rawData;
    }
    
    
    
    public function mostrarItemsCheckTiendas($ids,$desCom) {
        $msg= new VSexception();
        $rawData = array();
        $con = Yii::app()->db;
        
        $cli_Id=Yii::app()->getSession()->get('CliID', FALSE);
        $sql = "SELECT B.PCLI_ID IdsPre,B.ART_ID IdsArt,C.COD_ART Codigo,C.ART_DES_COM Nombre,
                    (SELECT D.ARTIE_EST_LOG FROM " . $con->dbname . ".ARTICULO_TIENDA D WHERE D.PCLI_ID=B.PCLI_ID AND D.TIE_ID=$ids) AS Estado
                    FROM " . $con->dbname . ".PRECIO_CLIENTE B
                        INNER JOIN " . $con->dbname . ".ARTICULO C
                            ON C.ART_ID=B.ART_ID
                WHERE B.CLI_ID=$cli_Id AND PCLI_EST_LOG=1 ";
        
        $sql.=($desCom!="")?" AND C.ART_DES_COM LIKE '%$desCom%' ":"";
        $sql.=" ORDER BY C.ART_DES_COM";
        
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;
        return new CArrayDataProvider($rawData, array(
            'keyField' => 'IdsPre',
            'sort' => array(
                'attributes' => array(
                    'Codigo', 'Nombre', 'Estado',
                ),
            ),
            'totalItemCount' => count($rawData),
            'pagination' => array(
                'pageSize' => 1000,//Yii::app()->params['pageSize'],//Solo para que salgan todos
            ),
        ));

    }

    public function mostrarItemsTiendas() {
        $rawData = array();
        $con = Yii::app()->db;
            //$rawData[]=$this->rowProdList();
            $cli_Id=Yii::app()->getSession()->get('CliID', FALSE);
            $sql = "SELECT B.PCLI_ID IdsPre,B.ART_ID IdsArt,C.COD_ART Codigo,C.ART_DES_COM Nombre,'' AS Estado
                                    FROM " . $con->dbname . ".PRECIO_CLIENTE B
                                                    INNER JOIN " . $con->dbname . ".ARTICULO C
                                                            ON C.ART_ID=B.ART_ID
                    WHERE B.CLI_ID=$cli_Id AND PCLI_EST_LOG=1 ";
            $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;

        return new CArrayDataProvider($rawData, array(
            'keyField' => 'IdsPre',
            'sort' => array(
                'attributes' => array(
                    'Codigo', 'Nombre', 'Estado',
                ),
            ),
            'totalItemCount' => count($rawData),
            'pagination' => array(
                'pageSize' => 1000,//Yii::app()->params['pageSize'],//Solo para que salgan todos
            ),
        ));
    }

    public function rowProdList() {
        return array(
            "IdsPre" => '', //0
            "IdsArt" => '', //0
            "Codigo" => '', //0
            "Nombre" => '', //0
            "Estado" => '',
        );
        
    }
    
    public function insertarTiendaItems($objEnt) {
        $msg= new VSexception();
        $con = Yii::app()->db;
        $trans = $con->beginTransaction();
        try {
            $tieId=$objEnt['TIE_ID'];
            $ids = explode(",", $objEnt['IDS']);//Recibe Ids Concatenados
            for ($i = 0; $i < count($ids); $i++) {
                $preId=$ids[$i];
                if($this->existeProductoTienda($con,$tieId,$preId)){
                    //SI existe
                    $sql = "UPDATE " . $con->dbname . ".ARTICULO_TIENDA SET ARTIE_EST_LOG='1' "
                            . "WHERE PCLI_ID=$preId AND TIE_ID=$tieId ";
                    
                }else{
                    //Si No existe
                    $sql="INSERT INTO " . $con->dbname . ".ARTICULO_TIENDA 
                        (TIE_ID,PCLI_ID,ARTIE_EST_LOG)VALUES($tieId,$preId,'1')";
                }
                $command = $con->createCommand($sql);
                $command->execute();
            }
            $this->actualizaItemsTiendas($con,$tieId,$objEnt['IDS']);
            $trans->commit(); 
            $con->active = false;
            return $msg->messageSystem('OK',null,10,null, null);
        } catch (Exception $e) {
            $trans->rollback();
            $con->active = false;
            //throw $e;
            return $msg->messageSystem('NO_OK',$e->getMessage(),11,null, null);
        }
    }
    
    public function insertarItemsTodasTiendas($objEnt) {
        $msg= new VSexception();
        $con = Yii::app()->db;
        $trans = $con->beginTransaction();
        try {
            $dTienda= $this->recuperarTiendasCliente();
            //VSValidador::putMessageLogFile($dTienda);
            //$tieId=$objEnt['TIE_ID'];
            $ids = explode(",", $objEnt['IDS']);//Recibe Ids Concatenados
            for ($x = 0; $x < sizeof($dTienda); $x++) {
                $tieId =$dTienda[$x]['TIE_ID'];
                //VSValidador::putMessageLogFile($tieId);
                for ($i = 0; $i < count($ids); $i++) {
                    $preId=$ids[$i];
                    if($this->existeProductoTienda($con,$tieId,$preId)){
                        //SI existe
                        $sql = "UPDATE " . $con->dbname . ".ARTICULO_TIENDA SET ARTIE_EST_LOG='1' "
                                . "WHERE PCLI_ID=$preId AND TIE_ID=$tieId ";

                    }else{
                        //Si No existe
                        $sql="INSERT INTO " . $con->dbname . ".ARTICULO_TIENDA 
                            (TIE_ID,PCLI_ID,ARTIE_EST_LOG)VALUES($tieId,$preId,'1')";
                    }
                    $command = $con->createCommand($sql);
                    $command->execute();
                }
                //$this->actualizaItemsTiendas($con,$tieId,$objEnt['IDS']);
            }
            
            $trans->commit(); 
            $con->active = false;
            return $msg->messageSystem('OK',null,10,null, null);
        } catch (Exception $e) {
            $trans->rollback();
            $con->active = false;
            //throw $e;
            return $msg->messageSystem('NO_OK',$e->getMessage(),11,null, null);
        }
    }
    
    private function actualizaItemsTiendas($con,$tieId,$ids) {
        $sql = "UPDATE " . $con->dbname . ".ARTICULO_TIENDA SET ARTIE_EST_LOG=0 WHERE TIE_ID=$tieId AND PCLI_ID NOT IN($ids)";
        //echo $sql;
        $command = $con->createCommand($sql);
        $command->execute();
    }
    
    private function existeProductoTienda($con,$TieId,$PreID) {
        $rawData = array();
        $sql = "SELECT PCLI_ID FROM " . $con->dbname . ".ARTICULO_TIENDA WHERE PCLI_ID=$PreID AND TIE_ID=$TieId";
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryRow();
        if ($rawData === false)
            return false; //en caso de que existe problema o no retorne nada tiene false por defecto 
        return true;//$rawData['PCLI_ID'];
    }
    
    public function recuperarItemsTiendas($ids) {
        $rawData = array();
        $con = Yii::app()->db;
        $sql = "SELECT A.ARTIE_ID,A.PCLI_ID,B.ART_ID,C.COD_ART, C.ART_DES_COM ,B.PCLI_P_VENTA,
                        '0' Cantidad,'0' Total,C.ART_I_M_IVA Iva,'' Observacion,A.ARTIE_EST_LOG Estado
                        FROM " . $con->dbname . ".ARTICULO_TIENDA A
                                INNER JOIN (" . $con->dbname . ".PRECIO_CLIENTE B
                                                INNER JOIN " . $con->dbname . ".ARTICULO C
                                                        ON C.ART_ID=B.ART_ID)
                                        ON A.PCLI_ID=B.PCLI_ID AND B.PCLI_EST_LOG=1
                WHERE A.ARTIE_EST_LOG=1 AND A.TIE_ID='$ids' ";
        //$sql.=($ids!=0)?"AND A.TIE_ID=$ids":"";
        $sql.=" ORDER BY C.ART_DES_COM ";
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;
        return $rawData;
    } 




    public function listarItemsTiendas($ids,$desCom) {
        $rawData = array();
        $con = Yii::app()->db;
        //$rawData[]=$this->rowProdList();
        $cli_Id=Yii::app()->getSession()->get('CliID', FALSE);
        
        $sql = "SELECT A.ARTIE_ID,A.PCLI_ID,B.ART_ID,C.COD_ART Codigo, C.ART_DES_COM Nombre,B.PCLI_P_VENTA Precio,
                        '0' Cantidad,'0' Total,C.ART_I_M_IVA Iva,'' Observacion,A.ARTIE_EST_LOG Estado
                        FROM " . $con->dbname . ".ARTICULO_TIENDA A
                                INNER JOIN (" . $con->dbname . ".PRECIO_CLIENTE B
                                                INNER JOIN " . $con->dbname . ".ARTICULO C
                                                        ON C.ART_ID=B.ART_ID)
                                        ON A.PCLI_ID=B.PCLI_ID AND B.PCLI_EST_LOG=1
                WHERE A.ARTIE_EST_LOG=1 AND A.TIE_ID=$ids AND B.CLI_ID = $cli_Id ";
        //$sql.=($ids!=0)?"AND A.TIE_ID=$ids":""; 
        $sql.=($desCom!="")?" AND C.ART_DES_COM LIKE '%$desCom%' ":"";
        $sql.=" ORDER BY C.ART_DES_COM";
        //echo $sql;
        //VSValidador::putMessageLogFile($sql);
        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;

        return new CArrayDataProvider($rawData, array(
            'keyField' => 'ARTIE_ID',
            'sort' => array(
                'attributes' => array(
                    //'Codigo', 'Nombre', 'Estado',
                ),
            ),
            'totalItemCount' => count($rawData),
            'pagination' => array(
                'pageSize' => 1000,//Yii::app()->params['pageSize'],//Solo para que salgan todos
            ),
        ));
    }
    
    public function recuperarTiendasAdmin($ids) {
        $con = yii::app()->db;
        $sql = "SELECT TIE_ID,TIE_NOMBRE FROM " . $con->dbname . ".TIENDA "
                . "WHERE TIE_EST_LOG=1 AND CLI_ID=$ids ORDER BY TIE_NOMBRE ";
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;
        return $rawData;
    }
    
    
    public function updateCupoTienda($tieId,$cupo) {
        $msg= new VSexception();
        $con = Yii::app()->db;
        $trans = $con->beginTransaction();
        try {
            $sql = "UPDATE " . $con->dbname . ".TIENDA SET TIE_CUPO='$cupo' WHERE TIE_ID IN($tieId)";
            $comando = $con->createCommand($sql);
            $comando->execute();
            $trans->commit();
            $con->active = false;
            return $msg->messageSystem('OK',null,10,null, null);
        } catch (Exception $e) { // se arroja una excepción si una consulta falla
            $trans->rollBack();
            //throw $e;
            $con->active = false;
            return $msg->messageSystem('NO_OK', $e->getMessage(), 11, null, null);
        }
    }
    
    public function recuperarIdsTieCliente($con) {
        $cli_Id=Yii::app()->getSession()->get('CliID', FALSE);
        $sql = "SELECT TIE_ID FROM " . $con->dbname . ".TIENDA WHERE CLI_ID=$cli_Id AND TIE_EST_LOG=1 ";
        $rawData =$con->createCommand($sql)->queryAll();
        $tieId="";
        for ($i = 0; $i < sizeof($rawData); $i++) {
            $tieId .= ($i == 0)?$rawData[$i]['TIE_ID']:','.$rawData[$i]['TIE_ID'];
        }
        return $tieId;
    }
    
    public function recuperarClienteArea($ids) {
        $con = yii::app()->db;  
        $ids=($ids<>0)?$ids:1;
        //$ids=Yii::app()->getSession()->get('CliID', FALSE);
        $sql = "SELECT B.IDS_ARE,B.NOM_ARE
                    FROM " . $con->dbname . ".AREAS_CLIENTE A
                      INNER JOIN " . $con->dbname . ".AREAS B ON A.IDS_ARE=B.IDS_ARE
                 WHERE A.EST_LOG=1 AND B.EST_LOG=1 AND A.CLI_ID=$ids;";
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;
        return $rawData;
    }
    
    public function recuperarUserArea() {
        $con = yii::app()->db;  
        //$ids=($ids<>0)?$ids:0;
        $ids = Yii::app()->getSession()->get('user_id', FALSE);
        $sql = "SELECT B.IDS_ARE,B.NOM_ARE
                    FROM " . $con->dbname . ".AREAS_USUARIO A
                      INNER JOIN " . $con->dbname . ".AREAS B ON A.IDS_ARE=B.IDS_ARE
                 WHERE A.EST_LOG=1 AND B.EST_LOG=1 AND A.USU_ID=$ids ORDER BY B.IDS_ARE ;";
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;
        return $rawData;
    }
    
    private function recuperarUserTienda($con,$ids) { 
        $sql = "SELECT * FROM " . $con->dbname . ".USUARIO_TIENDA WHERE UTIE_ID=$ids ;";
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryAll();
        return $rawData;
    }
    
    public function asignarTienda($ids) {
        $msg= new VSexception();
        $con = Yii::app()->db;
        $trans = $con->beginTransaction();
        try {
            $rawData=$this->recuperarUserTienda($con,$ids);
            
            $usuario=$rawData[0]['USU_ID'];
            $cliente=$rawData[0]['CLI_ID'];
            //VSValidador::putMessageLogFile($usuario.$cliente);
            $sql = " UPDATE " . $con->dbname . ".USUARIO_TIENDA SET UTIE_ASIG=NULL WHERE USU_ID=$usuario AND CLI_ID=$cliente; ";
            $comando = $con->createCommand($sql);
            $comando->execute();
            $sql = " UPDATE " . $con->dbname . ".USUARIO_TIENDA SET UTIE_ASIG='1' WHERE UTIE_ID IN($ids);";
            $comando = $con->createCommand($sql);
            $comando->execute();
            //echo $sql;
            $trans->commit();
            $con->active = false;
            return $msg->messageSystem('OK',null,10,null, null);
        } catch (Exception $e) { // se arroja una excepción si una consulta falla
            $trans->rollBack();
            //throw $e;
            $con->active = false;
            return $msg->messageSystem('NO_OK', $e->getMessage(), 11, null, null);
        }
    }


    public function recuperarTipoItem() {
        try {
            $con = yii::app()->db;            
            $sql = "SELECT COD_TIP Ids,NOM_TIP Nombre FROM " . $con->dbname . ".TIPO_ARTICULO "
                        . " WHERE EST_LOG=1  ORDER BY NOM_TIP;";
            //echo $sql;
            $rawData = $con->createCommand($sql)->queryAll();
            $con->active = false;
            return $rawData;
        } catch (Exception $e) {
            //throw $e;
            throw new CHttpException(400,'Acción no permitida, Ud. no tiene acceso');

        }
    }

    public function recuperarMarcaItem() {
        try {
            $con = yii::app()->db;            
            $sql = "SELECT COD_MAR Ids,NOM_MAR Nombre FROM " . $con->dbname . ".MARCA_ARTICULO "
                        . " WHERE EST_LOG=1  ORDER BY NOM_MAR;";
            //echo $sql;
            $rawData = $con->createCommand($sql)->queryAll();
            $con->active = false;
            return $rawData;
        } catch (Exception $e) {
            //throw $e;
            throw new CHttpException(400,'Acción no permitida, Ud. no tiene acceso');

        }
    }
    

}
