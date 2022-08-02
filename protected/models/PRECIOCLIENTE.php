<?php

/**
 * This is the model class for table "PRECIO_CLIENTE".
 *
 * The followings are the available columns in table 'PRECIO_CLIENTE':
 * @property string $PCLI_ID
 * @property string $CLI_ID
 * @property string $ART_ID
 * @property string $PCLI_P_VENTA
 * @property string $PCLI_POR_DES
 * @property string $PCLI_VAL_DES
 * @property string $PCLI_EST_LOG
 * @property string $PCLI_FEC_CRE
 * @property string $PCLI_FEC_MOD
 *
 * The followings are the available model relations:
 * @property ARTICULOTIENDA[] $aRTICULOTIENDAs
 * @property CLIENTE $cLI
 * @property ARTICULO $aRT
 */
class PRECIOCLIENTE extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'PRECIO_CLIENTE';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('CLI_ID, ART_ID', 'required'),
            array('CLI_ID, ART_ID', 'length', 'max' => 20),
            array('PCLI_P_VENTA, PCLI_VAL_DES', 'length', 'max' => 10),
            array('PCLI_POR_DES', 'length', 'max' => 5),
            array('PCLI_EST_LOG', 'length', 'max' => 1),
            array('PCLI_FEC_CRE, PCLI_FEC_MOD', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('PCLI_ID, CLI_ID, ART_ID, PCLI_P_VENTA, PCLI_POR_DES, PCLI_VAL_DES, PCLI_EST_LOG, PCLI_FEC_CRE, PCLI_FEC_MOD', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'aRTICULOTIENDAs' => array(self::HAS_MANY, 'ARTICULOTIENDA', 'PCLI_ID'),
            'cLI' => array(self::BELONGS_TO, 'CLIENTE', 'CLI_ID'),
            'aRT' => array(self::BELONGS_TO, 'ARTICULO', 'ART_ID'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'PCLI_ID' => 'Pcli',
            'CLI_ID' => 'Cli',
            'ART_ID' => 'Art',
            'PCLI_P_VENTA' => 'Pcli P Venta',
            'PCLI_POR_DES' => 'Pcli Por Des',
            'PCLI_VAL_DES' => 'Pcli Val Des',
            'PCLI_EST_LOG' => 'Pcli Est Log',
            'PCLI_FEC_CRE' => 'Pcli Fec Cre',
            'PCLI_FEC_MOD' => 'Pcli Fec Mod',
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

        $criteria->compare('PCLI_ID', $this->PCLI_ID, true);
        $criteria->compare('CLI_ID', $this->CLI_ID, true);
        $criteria->compare('ART_ID', $this->ART_ID, true);
        $criteria->compare('PCLI_P_VENTA', $this->PCLI_P_VENTA, true);
        $criteria->compare('PCLI_POR_DES', $this->PCLI_POR_DES, true);
        $criteria->compare('PCLI_VAL_DES', $this->PCLI_VAL_DES, true);
        $criteria->compare('PCLI_EST_LOG', $this->PCLI_EST_LOG, true);
        $criteria->compare('PCLI_FEC_CRE', $this->PCLI_FEC_CRE, true);
        $criteria->compare('PCLI_FEC_MOD', $this->PCLI_FEC_MOD, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PRECIOCLIENTE the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function insertarPrecioTienda($cliId,$dts_PrecioTienda) {
        $msg= new VSexception();
        $con = Yii::app()->db;
        $trans = $con->beginTransaction();
        try {
            for ($i = 0; $i < sizeof($dts_PrecioTienda); $i++) {
                $artID=$dts_PrecioTienda[$i]['ART_ID'];
                $codArt=$dts_PrecioTienda[$i]['COD_ART'];
                $precio=$dts_PrecioTienda[$i]['ART_P_VENTA'];
                if($this->existeProducto($con,$cliId,$artID)){
                    //Si existe actualizo los datos.
                    $sql = "UPDATE " . $con->dbname . ".PRECIO_CLIENTE SET PCLI_P_VENTA='$precio',PCLI_EST_LOG='1' "
                            . "WHERE ART_ID =$artID AND CLI_ID=$cliId ";
                }else{
                    //Si no Existe lo Inserto
                    $sql = "INSERT INTO " . $con->dbname . ".PRECIO_CLIENTE "
                        . "(CLI_ID,ART_ID,COD_ART,PCLI_P_VENTA,PCLI_POR_DES,PCLI_VAL_DES,PCLI_EST_LOG)"
                        . "VALUES "
                        . "($cliId,$artID,'$codArt','$precio','0','0','1') ";
                }
                //echo $sql;
                $command = $con->createCommand($sql);
                $command->execute();
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
    
    private function existeProducto($con,$cliId,$artID) {
        $rawData = array();
        $sql = "SELECT PCLI_ID FROM " . $con->dbname . ".PRECIO_CLIENTE "
                . "WHERE CLI_ID=$cliId AND ART_ID=$artID ";
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryRow();
        if ($rawData === false)
            return false; //en caso de que existe problema o no retorne nada tiene false por defecto 
        return true;//$rawData['PCLI_ID'];
    }

    public function removerTiendaPrecio($data) {
        $msg= new VSexception();
        $con = Yii::app()->db;
        $trans = $con->beginTransaction();
        try {
            $cliId=$data['cliId'];
            $codArt=$data['codArt'];
            $sql = "UPDATE " . $con->dbname . ".PRECIO_CLIENTE SET PCLI_EST_LOG='0' WHERE ART_ID =$codArt AND CLI_ID=$cliId ";
            //echo $sql;
            $comando = $con->createCommand($sql);
            $comando->execute();
            $trans->commit();
            $con->active = false;
            return $msg->messageSystem('OK',null,12,null, null);
        } catch (Exception $e) { // se arroja una excepción si una consulta falla
            $trans->rollBack();
            //throw $e;
            $con->active = false;
            return $msg->messageSystem('NO_OK',$e->getMessage(),11,null, null);
        }
    }
    
    public function retornarPrecioTienda($ids) {
        $con = Yii::app()->db;
        $rawData = array();
        $sql = "SELECT A.PCLI_ID,A.CLI_ID,A.PCLI_P_VENTA,A.PCLI_EST_LOG,
                        B.ART_ID,B.COD_ART,B.ART_DES_COM
                        FROM " . $con->dbname . ".PRECIO_CLIENTE A
                                INNER JOIN " . $con->dbname . ".ARTICULO B
                                        ON A.ART_ID=B.ART_ID
                WHERE CLI_ID=$ids AND PCLI_EST_LOG='1' ";
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;
        return $rawData;
    }
    
    public function calcularPrecioTienda($cliId,$vPor) {
        $msg= new VSexception();
        $cliente=new CLIENTE();
        //$vPor=$cliente->buscarPorcentajeCliente($cliId);
        //Temina la funcion si el resultado =0 Para no calcular nada
        if($vPor==0){return $msg->messageSystem('NO_OK',null,null,'Porcentaje = 0 No existe Calculo', null);}
        $con = Yii::app()->db;
        $trans = $con->beginTransaction();
        try {            
            //CALCUALR PORCENTAJE CLIENTAS AMBAS FORMULAS DAN EL MISMO RESULTADO
            //=(Pv * (1 - (Desc_Global) / 100))	
            //=P_COSTO/((100-POR_N01)/100) ;	
            //## APLICA EL 18% 25% 28% 
            $sql = "UPDATE " . $con->dbname . ".PRECIO_CLIENTE A
                        INNER JOIN " . $con->dbname . ".ARTICULO B
                            ON A.ART_ID=B.ART_ID
                        SET A.PCLI_P_VENTA=(B.ART_P_VENTA * (1 - ($vPor) / 100)),A.PCLI_FEC_MOD=CURRENT_TIMESTAMP()
                    WHERE A.CLI_ID=$cliId AND A.PCLI_EST_LOG=1; ";
            //echo $sql;
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
    
    public function copiarPrecioTienda($cliId,$vPor) {
        $msg= new VSexception();
        $cliSesion=Yii::app()->getSession()->get('CliID', FALSE);// a este cliete se copiaran los Items
        $cliente=new CLIENTE();
        $valor=$cliente->existPrecioCliente($cliSesion);
        //Temina la funcion si el resultado =0 Para no calcular nada
        if($valor){return $msg->messageSystem('NO_OK',null,null,'Ya Existe una copia de Items para cliente selecionado', null);}
        $con = Yii::app()->db;
        $trans = $con->beginTransaction();
       
        try {            
            //CALCUALR PORCENTAJE CLIENTAS AMBAS FORMULAS DAN EL MISMO RESULTADO
            //=(Pv * (1 - (Desc_Global) / 100))	
            //=P_COSTO/((100-POR_N01)/100) ;	
            //## APLICA EL 18% 25% 28% 
            
            $sql = "INSERT INTO " . $con->dbname . ".PRECIO_CLIENTE 
                          (CLI_ID,ART_ID,COD_ART,PCLI_P_VENTA,PCLI_I_M_IVA,PCLI_POR_DES,PCLI_VAL_DES,PCLI_EST_LOG)
                SELECT $cliSesion,ART_ID,COD_ART,PCLI_P_VENTA,PCLI_I_M_IVA,0,0,'1' 
                        FROM " . $con->dbname . ".PRECIO_CLIENTE
                WHERE CLI_ID=$cliId;";
            
            //echo $sql;
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



    public function insertarFavorito($dts_Listafavorito) {
        $msg= new VSexception();
        $con = Yii::app()->db;
        $cliId=Yii::app()->getSession()->get('CliID', FALSE);//
        $usuId = Yii::app()->getSession()->get('user_id', FALSE);
        $tieId = Yii::app()->getSession()->get('TieID', FALSE);
        $trans = $con->beginTransaction();
        try {
            $this->removerListaFavorito($con,$cliId,$usuId,$tieId);
                for ($i = 0; $i < sizeof($dts_Listafavorito); $i++) {
                    $artID=$dts_Listafavorito[$i]['ART_ID'];
                    $codArt=$dts_Listafavorito[$i]['COD_ART'];
                    $sql = " INSERT INTO " . $con->dbname . ".LISTA_FAVORITOS "
                            . "(TIE_ID,CLI_ID,USU_ID,ART_ID,COD_ART,EST_LOG)"
                            . "VALUES "
                            . "($tieId,$cliId,$usuId,$artID,'$codArt','1') ";
                    //echo $sql;
                    $command = $con->createCommand($sql);
                    $command->execute();
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

    private function removerListaFavorito($con,$cliId,$usuId,$tieId) {
        $sql = "DELETE FROM " . $con->dbname . ".LISTA_FAVORITOS WHERE TIE_ID=$tieId AND CLI_ID=$cliId AND USU_ID=$usuId ";
        $command = $con->createCommand($sql);
        $command->execute();
    }

    public function retornarlistaFavoritos($ids) {
        $con = Yii::app()->db;
        $rawData = array();
        $cliId=Yii::app()->getSession()->get('CliID', FALSE);//
        $usuId = Yii::app()->getSession()->get('user_id', FALSE);
        $tieId = Yii::app()->getSession()->get('TieID', FALSE);

        $sql = "SELECT A.ART_ID,A.COD_ART,B.ART_DES_COM
                    FROM " . $con->dbname . ".LISTA_FAVORITOS A
                        INNER JOIN " . $con->dbname . ".ARTICULO B
                            ON A.ART_ID=B.ART_ID AND A.COD_ART=B.COD_ART
                        WHERE A.TIE_ID=$tieId AND A.CLI_ID=$cliId AND A.USU_ID=$usuId ; ";

        //$sql = "SELECT * FROM " . $con->dbname . ".LISTA_FAVORITOS 
        //            WHERE TIE_ID=1 AND CLI_ID=1 AND USU_ID=1; ";
        
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryAll();
        $con->active = false;
        return $rawData;
    }
    



  
}
