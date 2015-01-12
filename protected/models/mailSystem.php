<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mailSystem
 *
 * @author root
 */
Yii::import('system.vendors.PHPMailer.*'); //Usar de Forma nativa.
require_once('PHPMailerAutoload.php');

class mailSystem {

    //put your code here
    public function enviarMail($body) {
        $msg = new VSexception();
        $mail = new PHPMailer();
        //$body = "Hola como estas";

        $mail->IsSMTP();
        //Para tls
        //$mail->SMTPSecure = 'tls';
        //$mail->Port = 587;
        //Para ssl
        $mail->SMTPSecure = "ssl";
        $mail->Port = 465;
        // la dirección del servidor, p. ej.: smtp.servidor.com
        $mail->Host = "mail.utimpor.com";

        // dirección remitente, p. ej.: no-responder@miempresa.com
        // nombre remitente, p. ej.: "Servicio de envío automático"
        $mail->setFrom('no-responder@utimpor.com', 'Servicio de envío automático Utimpor.com');
        //$mail->setFrom('bvillacreses@utimpor.com', 'Utimpor.com');

        // asunto y cuerpo alternativo del mensaje
        $mail->Subject = "Ha Recibido un(a) Orden Nuevo(a)!!!";
        $mail->AltBody = "Data alternativao";

        // si el cuerpo del mensaje es HTML
        $mail->MsgHTML($body);

        // podemos hacer varios AddAdress
        $mail->AddAddress("byron_villacresesf@hotmail.com", "Byron Villa");
        //$mail->AddAddress("byronvillacreses@gmail.com", "Byron Villa");
        $mail->addCC('byronvillacreses@gmail.com', 'ByronV'); //Para con copia
        //$mail->addReplyTo('byronvillacreses@gmail.com', 'First Last');
        //
        // si el SMTP necesita autenticación
        $mail->SMTPAuth = true;

        // credenciales usuario
        $mail->Username = "no-responder@utimpor.com";
        $mail->Password = "F0E4CwUyWy?h";
        $mail->CharSet = 'UTF-8';

        if (!$mail->Send()) {
            //echo "Error enviando: " . $mail->ErrorInfo;
            return $msg->messageSystem('NO_OK', "Error enviando: " . $mail->ErrorInfo, 11, null, null);
        } else {
            //echo "¡¡Enviado!!";
            return $msg->messageSystem('OK', "¡¡Enviado!!", 30, null, null);
        }
    }

}
