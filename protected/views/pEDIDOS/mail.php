<?php
/* * ** INICIO ENVIAR CORREOS **** */
//Yii::import('system.vendors.PHPMailer.*'); //Usar de Forma nativa.
//require_once('PHPMailerAutoload.php');
//$mail = new PHPMailer();

/* $mail->setFrom('byronvillacreses@gmail.com', 'ByronV'); //Qui envia el Correo
  $mail->Subject = "Mi Asunto";
  $mail->msgHTML('<h1> HOLA COMO ESTAS ???</h1>');
  $mail->addAddress('byronvillacreses@gmail.com', 'ByronV'); //Para quien es el Correo
  //$mail->addCC('byronvillacreses@gmail.com','ByronV');//Para con copia
  //$mail->addBCC('byronvillacreses@gmail.com','ByronV');//Para copia oculta
  if ($mail->send()) {
  echo "Enviado Correctamente";
  } else {
  echo "problemas";
  } */

/* * ** FIN ENVIAR CORREOS **** */
?>

<?php
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 */
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
//date_default_timezone_set('Etc/UTC');
//require '../PHPMailerAutoload.php';
//Create a new PHPMailer instance
/* $mail = new PHPMailer;

  //Tell PHPMailer to use SMTP
  $mail->isSMTP();

  //Enable SMTP debugging
  // 0 = off (for production use)
  // 1 = client messages
  // 2 = client and server messages
  $mail->SMTPDebug = 2;

  //Ask for HTML-friendly debug output
  $mail->Debugoutput = 'html';

  //Set the hostname of the mail server
  $mail->Host = 'smtp.gmail.com';

  //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
  $mail->Port = 587;

  //Set the encryption system to use - ssl (deprecated) or tls
  $mail->SMTPSecure = 'tls';

  //Whether to use SMTP authentication
  $mail->SMTPAuth = true;

  //Username to use for SMTP authentication - use full email address for gmail
  //$mail->Username = "username@gmail.com";
  $mail->Username = "byronvillacreses@gmail.com";

  //Password to use for SMTP authentication
  $mail->Password = "leo190781";

  //Set who the message is to be sent from
  $mail->setFrom('byronvillacreses@gmail.com', 'First Last');

  //Set an alternative reply-to address
  //$mail->addReplyTo('replyto@example.com', 'First Last');

  //Set who the message is to be sent to
  $mail->addAddress('byron_villacresesf@hotmail.com', 'Byron Villa');

  //Set the subject line
  $mail->Subject = 'PHPMailer GMail SMTP test';

  //Read an HTML message body from an external file, convert referenced images to embedded,
  //convert HTML into a basic plain-text alternative body
  //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
  $mail->msgHTML('<h1> HOLA COMO ESTAS ???</h1>');

  //Replace the plain text body with one created manually
  //$mail->AltBody = 'This is a plain-text message body';

  //Attach an image file
  //$mail->addAttachment('images/phpmailer_mini.png');

  //send the message, check for errors
  if (!$mail->send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
  } else {
  echo "Message sent!";
  }
  ?>

  <?php

  //Set who the message is to be sent from
  //$mail->setFrom('byronvillacreses@gmail.com', 'First Last');
  //Set an alternative reply-to address
  //$mail->addReplyTo('replyto@example.com', 'First Last');
  //Set who the message is to be sent to
  //$mail->addAddress('byron_villacresesf@hotmail.com', 'John Doe');
  //Set the subject line
  //$mail->Subject = 'PHPMailer mail() test';
  //Read an HTML message body from an external file, convert referenced images to embedded,
  //convert HTML into a basic plain-text alternative body
  //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
  //$mail->msgHTML('<h1> HOLA COMO ESTAS ???</h1>');
  //Replace the plain text body with one created manually
  //$mail->AltBody = 'This is a plain-text message body';
  //Attach an image file
  //$mail->addAttachment('images/phpmailer_mini.png');
  //Nuestra cuenta
  //$mail->Username ='byronvillacreses@gmail.com';
  //$mail->Password = 'leo190781'; //Su password
 */

/* $mail->setFrom('ventas@utimpor.com', 'ByronV'); //Qui envia el Correo
  //Agregar destinatario
  $mail->addAddress('byron_villacresesf@hotmail.com', 'John Doe');
  $mail->addReplyTo('byronvillacreses@gmail.com', 'First Last');

  $mail->Subject = 'PHPMailer mail() test';
  //Para adjuntar archivo
  //$mail->AddAttachment($archivo['tmp_name'], $archivo['name']);
  $mail->msgHTML('<h1> HOLA COMO ESTAS ???</h1>');
  $mail->AltBody = 'This is a plain-text message body';

  //send the message, check for errors
  if (!$mail->send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
  } else {
  echo "Message Enviado!";
  } */
?>

<?php
//############# CORREO PARA EL USUARIO ################
/* $nom_usu="Byron VIlla";
  //$para = $cor_usu; //correo del usuario ADMINISTRADOR
  $para = 'byron_villacresesf@hotmail.com'; //correo del usuario
  $asunto = " $nom_usu :  Orden N: 1";
  $mensaje="HOla como aestas";
  $cabeceras = 'MIME-Version: 1.0' . "\r\n";
  $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
  //$cabeceras .= 'From: admin@utimpor.com' . "\r\n";
  $cabeceras .= "From: Utimpor.com <admin@utimpor.com>\r\n";
  //$cabeceras .= "Return-path: admin@utimpor.com\r\n";
  //$cabeceras .= "Cc: byronvillacreses@gmail.com\r\n";//direcciones que recibián copia(no recomendada)
  $cabeceras .= "Bcc: byronvillacreses@gmail.com\r\n";//direcciones que recibirán copia
  //$cabeceras .= "Bcc: ventas@utimpor.com,ventas2@utimpor.com,yalava@utimpor.com,byron_villacresesf@hotmail.com\r\n"; //direcciones que recibirán copia
  mail($para, $asunto, $mensaje, $cabeceras); // or die("Error al Enviar el Email");
  echo "enviado"; */
?>

<?php
/* $mail = new PHPMailer();

  $body = "Hola como estas";

  $mail->IsSMTP();
  //Para ssl
  $mail->SMTPSecure = "ssl";
  $mail->Port = 465;
  // la dirección del servidor, p. ej.: smtp.servidor.com
  $mail->Host = "mail.utimpor.com";

  // dirección remitente, p. ej.: no-responder@miempresa.com
  $mail->From = "bvillacreses@utimpor.com";

  // nombre remitente, p. ej.: "Servicio de envío automático"
  $mail->FromName = "Byron Villacress";

  // asunto y cuerpo alternativo del mensaje
  $mail->Subject = "Correo de preuba";
  $mail->AltBody = "Data alternativao";

  // si el cuerpo del mensaje es HTML
  $mail->MsgHTML($body);
  //$mail->msgHTML('<h1> HOLA COMO ESTAS ???</h1>');

  // podemos hacer varios AddAdress
  $mail->AddAddress("byron_villacresesf@hotmail.com", "Byron Villa");
  //$mail->AddAddress("byronvillacreses@gmail.com", "Byron Villa");
  $mail->addCC('byronvillacreses@gmail.com','ByronV');//Para con copia
  //$mail->addReplyTo('byronvillacreses@gmail.com', 'First Last');

  // si el SMTP necesita autenticación
  $mail->SMTPAuth = true;

  // credenciales usuario
  $mail->Username = "bvillacreses@utimpor.com";
  $mail->Password = "b1234";

  if (!$mail->Send()) {
  echo "Error enviando: " . $mail->ErrorInfo;
  } else {
  echo "¡¡Enviado!!";
  } */
?>

<style>
    .titleLabel{
                /*font-size:7pt;*/
                /*color:#000;*/
                font-weight: bold ;
            }
</style>
<?php
for ($i = 0; $i < sizeof($CabPed); $i++) {
    ?>
    
    <div id="div-table">
        <div class="trow">
            <p>
                <label class="titleLabel">Estimad@:</label><br> <?php echo $CabPed[$i]["NombreUser"] ?> <br> 
                Su pedio se envio con Exito!!!
            </p>
        </div>
        <div class="trow">
            <div class="tcol-td form-group">
                <label class="titleLabel"><?php echo Yii::t('TIENDA', 'Summary') ?> : </label>
            </div>
        </div>
        <div class="trow">
            <div class="tcol-td form-group">
                <label class="titleLabel"><?php echo Yii::t('TIENDA', 'Number Order') ?> : </label>
                <span><?php echo $CabPed[$i]["Numero"] ?></span>
            </div>
        </div>
        <div class="trow">
            <div class="tcol-td form-group">
                <label class="titleLabel"><?php echo Yii::t('TIENDA', 'Store name') ?> : </label>
                <span><?php echo $CabPed[$i]["NombreTienda"] ?></span>
            </div>
        </div>
        <div class="trow">
            <div class="tcol-td form-group">
                <label class="titleLabel"><?php echo Yii::t('TIENDA', 'Issue date') ?> : </label>
                <span><?php echo $CabPed[$i]["FechaPedido"] ?></span>
            </div>
        </div>
        <div class="trow">
            <div class="tcol-td form-group">
                <label class="titleLabel"><?php echo Yii::t('TIENDA', 'User order') ?> : </label>
                <span><?php echo $CabPed[$i]["NombrePersona"] ?></span>
            </div>
        </div>
        <div class="trow">
            <div class="tcol-td form-group">
                <label class="titleLabel"><?php echo Yii::t('TIENDA', 'Net amount') ?> : </label>
                <span><?php echo Yii::app()->format->formatNumber($CabPed[$i]["ValorNeto"]) ?></span>
            </div>
        </div>
        <div class="trow">
            <div class="tcol-td form-group">
                <p>
                    Adem&aacute;s puede realizar la impresi&oacute;n su documento accediendo a nuestro portal aqui.<br>
                    Atentamente,<br>
                    <label class="titleLabel">Utimpor S.A.</label>
                    
                </p>
            </div>
        </div>
        
    </div>


<?php
}?>