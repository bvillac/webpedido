<?php

/**
 * This is the model class for table "ARTICULO".
 *
 * The followings are the available columns in table 'ARTICULO':
 * @property string $ART_ID
 * @property string $COD_ART
 * @property string $ART_DES_COM
 * @property string $COD_LIN
 * @property string $COD_TIP
 * @property string $COD_MAR
 * @property string $ART_I_M_IVA
 * @property string $ART_P_VENTA
 * @property string $ART_IMAGEN
 * @property string $ART_EST_LOG
 * @property string $ART_FEC_CRE
 * @property string $ART_FEC_MOD
 *
 * The followings are the available model relations:
 * @property DETPEDIDO[] $dETPEDIDOs
 * @property PRECIOCLIENTE[] $pRECIOCLIENTEs
 * @property TEMPDETPEDIDO[] $tEMPDETPEDIDOs
 */
class ARTICULO extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'ARTICULO';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('COD_ART', 'length', 'max' => 20),
            array('ART_DES_COM, ART_IMAGEN', 'length', 'max' => 100),
            array('COD_LIN, COD_TIP, COD_MAR', 'length', 'max' => 3),
            array('ART_I_M_IVA, ART_EST_LOG', 'length', 'max' => 1),
            array('ART_P_VENTA', 'length', 'max' => 10),
            array('ART_FEC_CRE, ART_FEC_MOD', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('ART_ID, COD_ART, ART_DES_COM, COD_LIN, COD_TIP, COD_MAR, ART_I_M_IVA, ART_P_VENTA, ART_IMAGEN, ART_EST_LOG, ART_FEC_CRE, ART_FEC_MOD', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'dETPEDIDOs' => array(self::HAS_MANY, 'DETPEDIDO', 'ART_ID'),
            'pRECIOCLIENTEs' => array(self::HAS_MANY, 'PRECIOCLIENTE', 'ART_ID'),
            'tEMPDETPEDIDOs' => array(self::HAS_MANY, 'TEMPDETPEDIDO', 'ART_ID'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'ART_ID' => 'Art',
            'COD_ART' => 'Cod Art',
            'ART_DES_COM' => 'Art Des Com',
            'COD_LIN' => 'Cod Lin',
            'COD_TIP' => 'Cod Tip',
            'COD_MAR' => 'Cod Mar',
            'ART_I_M_IVA' => 'Art I M Iva',
            'ART_P_VENTA' => 'Art P Venta',
            'ART_IMAGEN' => 'Art Imagen',
            'ART_EST_LOG' => 'Art Est Log',
            'ART_FEC_CRE' => 'Art Fec Cre',
            'ART_FEC_MOD' => 'Art Fec Mod',
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

        $criteria->compare('ART_ID', $this->ART_ID, true);
        $criteria->compare('COD_ART', $this->COD_ART, true);
        $criteria->compare('ART_DES_COM', $this->ART_DES_COM, true);
        $criteria->compare('COD_LIN', $this->COD_LIN, true);
        $criteria->compare('COD_TIP', $this->COD_TIP, true);
        $criteria->compare('COD_MAR', $this->COD_MAR, true);
        $criteria->compare('ART_I_M_IVA', $this->ART_I_M_IVA, true);
        $criteria->compare('ART_P_VENTA', $this->ART_P_VENTA, true);
        $criteria->compare('ART_IMAGEN', $this->ART_IMAGEN, true);
        $criteria->compare('ART_EST_LOG', $this->ART_EST_LOG, true);
        $criteria->compare('ART_FEC_CRE', $this->ART_FEC_CRE, true);
        $criteria->compare('ART_FEC_MOD', $this->ART_FEC_MOD, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ARTICULO the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * Función 
     *
     * @author Byron Villacreses
     * @access public
     * @return Retorna Los Datos de las Facturas GENERADAS
     */
    public function retornarBusArticulo($valor, $op) {
        $con = Yii::app()->db;
        $rawData = array();
        //Patron de Busqueda
        /* http://www.mclibre.org/consultar/php/lecciones/php_expresiones_regulares.html */
        $patron = "/^[[:digit:]]+$/"; //Los patrones deben empezar y acabar con el carácter / (barra).
        if (preg_match($patron, $valor)) {
            $op = "CED"; //La cadena son sólo números.
        } else {
            $op = "NOM"; //La cadena son Alfanumericos.
            //Las separa en un array 
            $aux = explode(" ", $valor);
            $condicion = " ";
            for ($i = 0; $i < count($aux); $i++) {
                //Crea la Sentencia de Busqueda
                //$condicion .=" AND (PER_NOMBRE LIKE '%$aux[$i]%' OR PER_APELLIDO LIKE '%$aux[$i]%' ) ";
                $condicion .=" AND (ART_DES_COM LIKE '%$aux[$i]%' OR COD_ART LIKE '%$aux[$i]%' )";
            }
        }
        $sql = "SELECT ART_ID,COD_ART,ART_DES_COM"
                . " FROM " . $con->dbname . ".ARTICULO "
                . "WHERE ART_EST_LOG=1 ";

        switch ($op) {
            case 'CED':
                $sql .=" AND COD_ART LIKE '%$valor%' ";
                break;
            case 'NOM':
                $sql .=$condicion;
                break;
            default:
        }
        $sql .= " LIMIT " . Yii::app()->params['limitRow'];
        //VSValidador::putMessageLogFile($sql);
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;
        return $rawData;
    }
    
    public function retornarBusArticuloTienda($valor,$tieId,$op) {
        $con = Yii::app()->db;
        $rawData = array();
        $cli_Id=Yii::app()->getSession()->get('CliID', FALSE);
        //Patron de Busqueda
        /* http://www.mclibre.org/consultar/php/lecciones/php_expresiones_regulares.html */
        $patron = "/^[[:digit:]]+$/"; //Los patrones deben empezar y acabar con el carácter / (barra).
        if (preg_match($patron, $valor)) {
            $op = "COD"; //La cadena son sólo números.
        } else {
            $op = "NOM"; //La cadena son Alfanumericos.
            //Las separa en un array 
            $aux = explode(" ", $valor);
            $condicion = " ";
            for ($i = 0; $i < count($aux); $i++) {
                //Crea la Sentencia de Busqueda
                //$condicion .=" AND (PER_NOMBRE LIKE '%$aux[$i]%' OR PER_APELLIDO LIKE '%$aux[$i]%' ) ";
                $condicion .=" AND (C.ART_DES_COM LIKE '%$aux[$i]%' OR C.COD_ART LIKE '%$aux[$i]%' )";
            }
        }

//            $sql = "SELECT A.ART_ID,A.COD_ART,A.ART_DES_COM
//                        FROM " . $con->dbname . ".ARTICULO A
//                    INNER JOIN " . $con->dbname . ".PRECIO_CLIENTE B ON A.ART_ID=B.ART_ID
//                WHERE A.ART_EST_LOG=1 AND B.CLI_ID=$cli_Id ";
       
        $sql = "SELECT A.ARTIE_ID,B.ART_ID,C.COD_ART,C.ART_DES_COM,B.PCLI_P_VENTA                        
                    FROM " . $con->dbname . ".ARTICULO_TIENDA A
                            INNER JOIN (" . $con->dbname . ".PRECIO_CLIENTE B
                                            INNER JOIN " . $con->dbname . ".ARTICULO C
                                                    ON C.ART_ID=B.ART_ID)
                                    ON A.PCLI_ID=B.PCLI_ID AND B.PCLI_EST_LOG=1
            WHERE A.ARTIE_EST_LOG=1 AND B.CLI_ID=$cli_Id AND A.TIE_ID=$tieId ";//GROUP BY A.ARTIE_ID
        switch ($op) {
            case 'COD':
                $sql .=" AND C.COD_ART LIKE '%$valor%' ";
                break;
            case 'NOM':
                $sql .=$condicion;
                break;
            default:
        }
        $sql .= " LIMIT " . Yii::app()->params['limitRow'];// GROUP BY C.COD_ART
        //revisar porque se repiten
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;
        return $rawData;
    }


    public function insertarImgComentario($nombreFile,$nombreUser) {
        $msg = new VSexception();
        $con = Yii::app()->db;
        $trans = $con->beginTransaction();
        try {
            $cli_Id=Yii::app()->getSession()->get('CliID', FALSE);
            $sql = "INSERT INTO " . $con->dbname . ".IMG_COMENTARIO
                    (CLI_ID,USU_NOMBRE,ICOM_ARCHIVO,EST_LOG,FEC_CRE)VALUES
                    ($cli_Id,'$nombreUser','$nombreFile','1',CURRENT_TIMESTAMP()) ";
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


    public function borrarImagComentario($nombreUser) {
        $msg= new VSexception();
        $con = Yii::app()->db;
        $trans = $con->beginTransaction();
        try {
            //Borra todas las imagenes relacionadas con ese nombre
            $sql = "DELETE FROM " . $con->dbname . ".IMG_COMENTARIO  WHERE USU_NOMBRE='$nombreUser' ";
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

    public function mostrarImagComentario($nombreUser) {
        $rawData = array();
        $con = Yii::app()->db;
        $sql = "SELECT ICOM_ARCHIVO NomImag FROM " . $con->dbname . ".IMG_COMENTARIO WHERE USU_NOMBRE='$nombreUser';";
        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;
        return $rawData;
    }


    /**
     * Función 
     *
     * @author Byron Villacreses
     * @access public
     * @return Retorna Los Datos de las Facturas GENERADAS
     */
    public function retornarBusArticuloFavorito($valor, $op) {
        $con = Yii::app()->db;
        $rawData = array();
        $cli_Id=Yii::app()->getSession()->get('CliID', FALSE);
        //Patron de Busqueda
        /* http://www.mclibre.org/consultar/php/lecciones/php_expresiones_regulares.html */
        $patron = "/^[[:digit:]]+$/"; //Los patrones deben empezar y acabar con el carácter / (barra).
        if (preg_match($patron, $valor)) {
            $op = "CED"; //La cadena son sólo números.
        } else {
            $op = "NOM"; //La cadena son Alfanumericos.
            //Las separa en un array 
            $aux = explode(" ", $valor);
            $condicion = " ";
            for ($i = 0; $i < count($aux); $i++) {
                //Crea la Sentencia de Busqueda
                $condicion .=" AND (A.ART_DES_COM LIKE '%$aux[$i]%' OR A.COD_ART LIKE '%$aux[$i]%' )";
            }
        }
        $sql = "SELECT A.ART_ID,A.COD_ART,A.ART_DES_COM "
                . " FROM " . $con->dbname . ".ARTICULO A "
                . "     INNER JOIN " . $con->dbname . ".PRECIO_CLIENTE B "
                . "         ON A.ART_ID=B.ART_ID "
                . "WHERE A.ART_EST_LOG=1 AND B.CLI_ID=$cli_Id ";

        switch ($op) {
            case 'CED':
                $sql .=" AND A.COD_ART LIKE '%$valor%' ";
                break;
            case 'NOM':
                $sql .=$condicion;
                break;
            default:
        }
        $sql .= " LIMIT " . Yii::app()->params['limitRow'];
        //VSValidador::putMessageLogFile($sql);
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;
        return $rawData;
    }


    public function mostrarItems($control) {
        $rawData = array();
        $con = Yii::app()->db;
        $limitrowsql = Yii::app()->params['limitRowSQL'];

        $sql = "SELECT ART_ID Ids,COD_ART Codigo,ART_DES_COM Nombre,ART_EST_LOG Estado
                        FROM " . $con->dbname . ".ARTICULO
                    WHERE ART_EST_LOG<>'' ";
        if (!empty($control)) {//Verifica la Opcion op para los filtros
            //$sql .= ($control['ROL_ID'] != "0") ? "AND D.ROL_ID='".$control['ROL_ID']."' " : "";
            $sql .= ($control['DET_NOM'] != "") ? "AND ART_DES_COM LIKE '%".$control['DET_NOM']."%' " : "";
        }
        $sql .= "ORDER BY COD_ART ASC LIMIT $limitrowsql";
        //echo $sql;
        

        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;

        return new CArrayDataProvider($rawData, array(
            'keyField' => 'Codigo',
            'sort' => array(
                'attributes' => array(
                    'Ids', 'Codigo','Nombre', 
                ),
            ),
            'totalItemCount' => count($rawData),
            'pagination' => array(
                'pageSize' => Yii::app()->params['pageSize'],
            ),
        ));
        
        
    }

    public function consultarItems($id) {
        $con = yii::app()->db;

        $sql = "SELECT ART_ID Ids,COD_ART Codigo,ART_DES_COM Nombre,ART_EST_LOG Estado
                    FROM " . $con->dbname . ".ARTICULO WHERE COD_ART='$id';";
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryRow();//Retorna solo 1
        $con->active = false;
        return $rawData;
    }


    public function insertarItems($objEnt) {
        $msg = new VSexception();
        $con = Yii::app()->db;
        $trans = $con->beginTransaction();
        try {
            //$this->InsertarPersona($con, $objEnt);
            $sql = "INSERT INTO " . $con->dbname . ".ARTICULO
                (COD_ART,ART_DES_COM,COD_LIN,COD_TIP,COD_MAR,ART_I_M_IVA,ART_P_COSTO,ART_P_PROME,ART_P_VENTA,ART_EST_LOG,ART_FEC_CRE)VALUES
                ('" . $objEnt['cod_art'] . "','" . $objEnt['des_com'] . "','01','01','01','1','0.00','0.00','0.00','1',CURRENT_TIMESTAMP()) ";
            $command = $con->createCommand($sql);
            $command->execute();
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



    public function actualizarItems($objEnt) {
        $msg= new VSexception();
        $con = yii::app()->db;
        $trans = $con->beginTransaction();
        try {
            $sql = "UPDATE " . $con->dbname . ".ARTICULO
                            SET  ART_DES_COM = '" . $objEnt['des_com'] . "',
                                ART_EST_LOG = '" . $objEnt['estado'] . "',
                                ART_FEC_MOD = CURRENT_TIMESTAMP()
                            WHERE COD_ART= '" . $objEnt['cod_art'] . "'";
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


    public function retornarBuscarItems($valor, $op) {
        $con = Yii::app()->db;
        $rawData = array();

        $sql = "SELECT COD_ART Ids,ART_DES_COM Nombre "
                . "FROM " . $con->dbname . ".ARTICULO "
                . "WHERE ART_EST_LOG<>'' AND ART_DES_COM LIKE '%$valor%' ";
        $sql .= " LIMIT " . Yii::app()->params['limitRow'];
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;
        return $rawData;
    }

    public function activarItem($ids,$Estado) {
        $msg= new VSexception();
        $con = Yii::app()->db;
        $trans = $con->beginTransaction();
        try {
            
            //VSValidador::putMessageLogFile($usuario.$cliente);
            $sql = " UPDATE " . $con->dbname . ".ARTICULO 
                            SET ART_EST_LOG='$Estado' WHERE COD_ART='$ids'; ";
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


    
    
    
    
    

}
