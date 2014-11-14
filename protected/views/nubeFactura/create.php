<?php

/* @var $this NubeFacturaController */
/* @var $model NubeFactura */

/* $this->breadcrumbs=array(
  'Nube Facturas'=>array('index'),
  'Create',
  );

  $this->menu=array(
  array('label'=>'List NubeFactura', 'url'=>array('index')),
  array('label'=>'Manage NubeFactura', 'url'=>array('admin')),
  ); */
?>

<?php //$this->renderPartial('_form', array('model'=>$model));  ?>

<?php

//require_once(Yii::app()->basePath . '/extensions/my-php-file.php');
//$obj = new NubeFactura;
//$obj->insertarFacturas();
//$obj->ClaveAcceso('01','2014-01-01','1790221806001','1','001001','000003012','1');
//$obj->modulo11('060820140109928098410011001001000101253002199121');
//*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//echo "hola";
//$bcode = new CBarCode();
//echo $bcode->output('060820140109928098410011001001000101253002199121',1);


/*
  echo dirname(__FILE__).'<br>';///var/www/html/websea/protected/views/nubeFactura
  echo $ruta = Yii::app()->basePath.'<br>';///var/www/html/websea/protected
  echo Yii::app()->theme->baseUrl.'<br>';///websea/themes/seablue
  echo Yii::app()->baseUrl; */
?>
<?php

/* EJEMPO DE FIRMADO */
$obj = new VSFirmaDigital;
$Dataf = $obj->recuperarFirmaDigital('1');
//echo base64_decode($Dataf['Clave']);
//echo base64_decode($Dataf['RutaFile']);

$x509 = Yii::app()->phpseclib->createX509();//Crear el ObjetoX509
$RutaFile = explode(".", base64_decode($Dataf['RutaFile']));//Obtiene el Nombre del Certificado x Default = .p12
$file = Yii::app()->params['seaFirma'] . $RutaFile[0] . '.crt';//Se crea el Archivo .crt para que lo pueda leer

//Leer el archivo certificado
$fd = fopen($file, 'r');
$p12buf = fread($fd, filesize($file));
fclose($fd);
//se carga el Certificado para Manipular
$cert = $x509->loadX509($p12buf);
//echo 'COMPONENTE <BR>';
//print_r($cert).'<BR>';
/*echo '<BR> CLAVE PUBLICA <BR>';
echo $x509->getPublicKey();
echo '<BR> CLAVE PUBLICA <BR>';
echo $x509->getDN(true);
echo '<BR> CLAVE PUBLICA <BR>';
print_r($x509->getDN());
echo '<BR> CLAVE PUBLICA <BR>';
print_r($x509->getIssuerDNProp('CN'));
echo '<BR> CLAVE PUBLICA <BR>';
print_r($x509->getIssuerDN('CN'));
echo '<BR> CLAVE PUBLICA <BR>';
echo $x509->getIssuerDN(true);*/
//echo trim($x509->getIssuerDN(true));

/*print_r($x509->getPublicKey());
echo '<BR> CLAVE PUBLICA <BR>';
$ps= $x509->getPublicKey();
print_r($ps);
echo '<BR> CLAVE PUBLICA <BR>';
$ps= $x509->getPublicKey();
print_r($ps);
echo '<BR> CLAVE PUBLICA <BR>';
$ps= $x509->getPublicKey();
print_r($ps);*/

$keys = Yii::app()->phpseclib->createRSA()->createKey();
print_r($keys);


//echo $cert['signature'];
//echo $cert['tbsCertificate']['serialNumber'];
//echo $x509->getIssuerDN(true);
//echo $cert['tbsCertificate']['signature']['algorithm'];
//print_r($cert['tbsCertificate']['signature']['parameters']);
//print_r($cert['tbsCertificate']['issuer']);
//Nota hay que seguir ingresando arry por array para scar los valores
//echo $cert['tbsCertificate']['issuer']['rdnSequence'][0][0]['value']['printableString'];





/* $file = Yii::app()->params['seaFirma']."carlos_enrique_castro_espana.crt";
  Yii::import('system.vendors.phpseclib.classes.*');
  //require_once('File/X509.php');
  include('File/X509.php');
  echo Yii::app()->params['seaFirma'].base64_decode($Dataf['RutaFile']);
  $x509 = new File_X509();
  $fd = fopen($file, 'r');
  $p12buf = fread($fd, filesize($file));
  fclose($fd);
  //$cert = $x509->loadX509(Yii::app()->params['seaFirma'].base64_decode($Dataf['RutaFile']));
  $cert = $x509->loadX509($p12buf);
  print_r($cert);
  //echo $x509->getPublicKey(); */


/*$file = Yii::app()->params['seaFirma'] . base64_decode($Dataf['RutaFile']);
  //echo $file;
  // puede ser .crt o .cert también
  $fd = fopen($file, 'r');
  $p12buf = fread($fd, filesize($file));
  fclose($fd);

  $p12cert = array();
  $pass = base64_decode($Dataf['Clave']); 
  // En este array almacenaremos la info del privatekey
  openssl_pkcs12_read($p12buf, $p12cert, $pass);
  //echo $p12cert["pkey"];
  //print_r($p12cert);

  echo "<h1>Mi Primer Test</h1>";
  if (openssl_pkcs12_read($p12buf, $p12cert, $pass)) {
  echo "Funciona";
  } else {
  echo "No funciona";
  }
  $privatekey = $p12cert["pkey"];
  $res = openssl_pkey_new();
  openssl_pkey_export($res, $p12cert["pkey"]);
  //print_r($res);
  $publickey = openssl_pkey_get_details($res);
  //print_r($publickey);
  $publickey = $publickey["key"];
  print_r($publickey);

  echo "<h2>Private Key:</h2>$privatekey<br><h2>Public Key:</h2>$publickey<BR>";

  $cleartext = htmlentities('<center><b>Texto HTML</b></center>');

  echo "<h2>Original:</h2>$cleartext<BR><BR>";

  openssl_public_encrypt($cleartext, $crypttext, $publickey);

  echo "<h2>Encriptada:</h2>$crypttext<BR><BR>";

  $PK2 = openssl_get_privatekey($p12cert["pkey"]);

  $Crypted = openssl_private_decrypt($crypttext, $Decrypted, $PK2);
  if (!$Crypted) {
  $MSG.="<p class='error'>Imposible desencriptar ($CCID).</p>";
  } else {
  echo "<h2>Desencriptada:</h2>" . $Decrypted;
  } */
?>