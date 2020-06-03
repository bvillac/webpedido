<?php

/**
 * This is the model class for table "CLIENTE".
 *
 * The followings are the available columns in table 'CLIENTE':
 * @property string $CLI_ID
 * @property string $COD_CLIE
 * @property string $CLI_CED_RUC
 * @property string $CLI_NOMBRE
 * @property string $CLI_EST_LOG
 * @property string $CLI_FEC_CRE
 * @property string $CLI_FEC_MOD
 *
 * The followings are the available model relations:
 * @property PRECIOCLIENTE[] $pRECIOCLIENTEs
 * @property TIENDA[] $tIENDAs
 */
class CLIENTE extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'CLIENTE';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('COD_CLIE', 'length', 'max'=>20),
			array('CLI_CED_RUC', 'length', 'max'=>15),
			array('CLI_NOMBRE', 'length', 'max'=>100),
			array('CLI_EST_LOG', 'length', 'max'=>1),
			array('CLI_FEC_CRE, CLI_FEC_MOD', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('CLI_ID, COD_CLIE, CLI_CED_RUC, CLI_NOMBRE, CLI_EST_LOG, CLI_FEC_CRE, CLI_FEC_MOD', 'safe', 'on'=>'search'),
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
			'pRECIOCLIENTEs' => array(self::HAS_MANY, 'PRECIOCLIENTE', 'CLI_ID'),
			'tIENDAs' => array(self::HAS_MANY, 'TIENDA', 'CLI_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'CLI_ID' => 'Cli',
			'COD_CLIE' => 'Cod Clie',
			'CLI_CED_RUC' => 'Cli Ced Ruc',
			'CLI_NOMBRE' => 'Cli Nombre',
			'CLI_EST_LOG' => 'Cli Est Log',
			'CLI_FEC_CRE' => 'Cli Fec Cre',
			'CLI_FEC_MOD' => 'Cli Fec Mod',
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

		$criteria->compare('CLI_ID',$this->CLI_ID,true);
		$criteria->compare('COD_CLIE',$this->COD_CLIE,true);
		$criteria->compare('CLI_CED_RUC',$this->CLI_CED_RUC,true);
		$criteria->compare('CLI_NOMBRE',$this->CLI_NOMBRE,true);
		$criteria->compare('CLI_EST_LOG',$this->CLI_EST_LOG,true);
		$criteria->compare('CLI_FEC_CRE',$this->CLI_FEC_CRE,true);
		$criteria->compare('CLI_FEC_MOD',$this->CLI_FEC_MOD,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CLIENTE the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function mostrarCliente() {
            $rawData = array();
            $limitrowsql = Yii::app()->params['limitRowSQL'];
            $con = Yii::app()->db;
            //$cli_Id=Yii::app()->getSession()->get('CliID', FALSE);
            $sql = "SELECT CLI_ID Ids,CLI_CED_RUC Cedula,CLI_NOMBRE Nombre,CLI_CORREO Correo,CLI_DIRECCION Direccion,
                        CLI_CONTACTO Contacto,CLI_TELEFONO Telefono,CLI_VAL_POR Porcentaje
                        FROM " . $con->dbname . ".CLIENTE                                 
                    WHERE CLI_EST_LOG=1 ";
            $sql .= " ORDER BY CLI_iD DESC LIMIT $limitrowsql";
            //echo $sql;
            $rawData = $con->createCommand($sql)->queryAll();
            $con->active = false;

            return new CArrayDataProvider($rawData, array(
                'keyField' => 'Ids',
                'sort' => array(
                    'attributes' => array(
                        'Ids','Nombre', 'Correo', 'Contacto', 'telefono'
                    ),
                ),
                'totalItemCount' => count($rawData),
                'pagination' => array(
                    'pageSize' => Yii::app()->params['pageSize'],
                ),
            ));
        }
        
        public function removerCliente($ids) {
            $msg= new VSexception();
            $con = Yii::app()->db;
            $trans = $con->beginTransaction();
            try {
                $sql = "UPDATE " . $con->dbname . ".CLIENTE SET CLI_EST_LOG='0' WHERE CLI_ID IN($ids)";
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
        
        public function insertarDatosCliente($objEnt) {
            $msg = new VSexception();
            $con = Yii::app()->db;
            $trans = $con->beginTransaction();
            try {
                $this->InsertarCliente($con, $objEnt);
                $IdCli = $con->getLastInsertID($con->dbname . '.CLIENTE');            
 
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
    
     
    private function InsertarCliente($con, $objEnt) {

        //$cli_Id=Yii::app()->getSession()->get('CliID', FALSE);
        $sql = "INSERT INTO " . $con->dbname . ".CLIENTE
                (COD_CLIE,CLI_CED_RUC,CLI_NOMBRE,CLI_CORREO,CLI_CONTACTO,CLI_TELEFONO,CLI_DIRECCION,CLI_VAL_POR,CLI_EST_LOG,CLI_FEC_CRE)VALUES
                ('" . $objEnt['CEDULA'] . "','" . $objEnt['CEDULA'] . "','" . $objEnt['NOMBRE'] . "','" . $objEnt['CORREO'] . "','" . $objEnt['CONTACTO'] . "',
                 '" . $objEnt['TELEFONO'] . "','" . $objEnt['DIRECCION'] . "','" . $objEnt['VAL_POR'] . "','1',CURRENT_TIMESTAMP()) ";
        $command = $con->createCommand($sql);
        $command->execute();
    }
    
    public function buscarPorcentajeCliente($cliId) {
        //$rawData = array();
        $con = Yii::app()->db;
        $sql = "SELECT IFNULL(CLI_VAL_POR,0) VAL_POR FROM " . $con->dbname . ".CLIENTE "
                . " WHERE CLI_ID=$cliId  ";
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryRow();        
        if ($rawData === false)
            return 0; //en caso de que existe problema o no retorne nada tiene false por defecto 
        return $rawData['VAL_POR'];
    }
    
    public function existPrecioCliente($cliId) {
        //$rawData = array();
        //Retonra si Existe CLiente cuando se realiza una copia de precios
        $con = Yii::app()->db;
        $sql = "SELECT CLI_ID FROM " . $con->dbname . ".PRECIO_CLIENTE "
                . " WHERE CLI_ID=$cliId  ";
        //echo $sql;
        $rawData = $con->createCommand($sql)->queryRow();        
        if ($rawData === false)
            return false; //en caso de que existe problema o no retorne nada tiene false por defecto 
        return true;
    }
    
}
