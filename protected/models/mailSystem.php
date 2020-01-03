<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Yii::import('system.vendors.PHPMailer.*'); //Usar de Forma nativa.
require_once('PHPMailerAutoload.php');

class mailSystem {
    private $SMTPSecure="ssl";
    private $Port = 465;
    private $Host = "mail.utimpor.com";
    private $Username = "no-responder@utimpor.com";
    private $Password = "ect{UZCJ6hvR";
    private $CharSet = 'UTF-8';
    private $TituloEnvio = 'Pedido en Línea Utimpor.com';

    //put your code here
    public function enviarMail($body,$CabPed) {
        $msg = new VSexception();
        $mail = new PHPMailer();
        //$body = "Hola como estas";
        
        $nomEmpresa=Yii::app()->getSession()->get('CliNom', FALSE);
        $valorNeto= Yii::app()->format->formatNumber($CabPed[0]["ValorNeto"]) ;

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
        //$mail->setFrom('no-responder@utimpor.com', 'Servicio de envío automático Utimpor.com');
        $mail->setFrom('no-responder@utimpor.com', $this->TituloEnvio);
        //$mail->setFrom('bvillacreses@utimpor.com', 'Utimpor.com');

        // asunto y cuerpo alternativo del mensaje
        $mail->Subject = "$valorNeto ($nomEmpresa) Ha Recibido un(a) Orden Nuevo(a)!!!";
        $mail->AltBody = "Data alternativao";

        // si el cuerpo del mensaje es HTML
        $mail->MsgHTML($body);

        // podemos hacer varios AddAdress 
        $mail->AddAddress($CabPed[0]["CorreoUser"], $CabPed[0]["NombreUser"]);//Usuario Autoriza Pedido
        $mail->AddAddress($CabPed[0]["CorreoPersona"], $CabPed[0]["NombrePersona"]);//Usuario Genera Pedido
        //$mail->AddAddress("byron_villacresesf@hotmail.com", "Byron Villa");
        //$mail->AddAddress("byronvillacreses@gmail.com", "Byron Villa");
        
        /******** COPIA OCULTA PARA VENTAS  ***************/
        //Verifica por CLiente el Correo del Administrados 2019-03-01
        $cli_Id=Yii::app()->getSession()->get('CliID', FALSE); 
        if($cli_Id==5){
            $mail->addBCC('ecastro@utimpor.com', 'Ventas Utimpor'); //Para copia Oculta Gerencia
            //$mail->addBCC('bvillacreses@utimpor.com', 'Ventas Utimpor'); //Para copia Oculta Gerencia
            //$mail->addBCC('bodega@utimpor.com', 'Bodega Utimpor'); //Para copia Oculta Gerencia
            $mail->addBCC('icastro@utimpor.com', 'Ventas Utimpor'); //Para copia Oculta
        }else{
            //Para el Resto de Clientes los siguientes correos.
            //$mail->addBCC('ventas@utimpor.com', 'Ventas Utimpor'); //Para copia Oculta
            $mail->addBCC('ecastro@utimpor.com', 'Ventas Utimpor'); //Para copia Oculta Gerencia
            $mail->addBCC('ncastro@utimpor.com', 'Ventas Utimpor'); //Para copia Oculta
            $mail->addBCC('dtroncoso@utimpor.com', 'Ventas Utimpor'); //Para copia Oculta
            $mail->addBCC('icastro@utimpor.com', 'Ventas Utimpor'); //Para copia Oculta 
            //$mail->addBCC('bvillacreses@utimpor.com', 'Ventas Utimpor');
        }
        
        
        //$mail->addBCC('byronvillacreses@gmail.com', 'Byron Villa'); //Para con copia 
        //$mail->addCC('byronvillacreses@gmail.com', 'ByronV'); //Para con copia
        //$mail->addReplyTo('byronvillacreses@gmail.com', 'First Last');
        //
        // si el SMTP necesita autenticación
        $mail->SMTPAuth = true;

        // credenciales usuario
        $mail->Username = "no-responder@utimpor.com";
        $mail->Password = "ect{UZCJ6hvR";
        $mail->CharSet = 'UTF-8';

        if (!$mail->Send()) {
            //echo "Error enviando: " . $mail->ErrorInfo;
            return $msg->messageSystem('NO_OK', "Error enviando: " . $mail->ErrorInfo, 11, null, null);
        } else {
            //echo "¡¡Enviado!!";
            return $msg->messageSystem('OK', "¡¡Enviado!!", 30, null, null);
        }
    }
    
    public function enviarMensaje($body) {
        $msg = new VSexception();
        $mail = new PHPMailer();
        $nomEmpresa=Yii::app()->getSession()->get('CliNom', FALSE);
        $mail->IsSMTP();
        $mail->SMTPSecure = $this->SMTPSecure;
        $mail->Port = $this->Port;
        $mail->Host = $this->Host;
        $mail->setFrom('no-responder@utimpor.com', $this->TituloEnvio);
        // asunto y cuerpo alternativo del mensaje
        $mail->Subject = "($nomEmpresa) Ha Recibido un Correo!!!";
        $mail->AltBody = "Data alternativao";
        // si el cuerpo del mensaje es HTML
        $mail->MsgHTML($body);   
        $mail->AddAddress('ncastro@utimpor.com', 'Ventas Utimpor');
        $mail->addBCC('bvillacreses@utimpor.com', 'Ventas Utimpor');
        $mail->addBCC('ecastro@utimpor.com', 'Ventas Utimpor'); //Para copia Oculta Gerencia
        $mail->addBCC('icastro@utimpor.com', 'Ventas Utimpor');
        $mail->addBCC('yalava@utimpor.com', 'Ventas Utimpor');
        // si el SMTP necesita autenticación
        $mail->SMTPAuth = true;

        // credenciales usuario
        $mail->Username = $this->Username;
        $mail->Password = $this->Password;
        $mail->CharSet = $this->CharSet;

        if (!$mail->Send()) {
            //echo "Error enviando: " . $mail->ErrorInfo;
            return $msg->messageSystem('NO_OK', "Error enviando: " . $mail->ErrorInfo, 11, null, null);
        } else {
            //echo "¡¡Enviado!!";
            return $msg->messageSystem('OK', "¡¡Enviado!!", 20, null, null);
        }
    }
    
    
    //AVISO PEDIDOS DE CLIENTES FINALES Y SUPERVISORES
    public function enviarRevisado($body,$CabPed) {
        $msg = new VSexception();
        $mail = new PHPMailer();
        $nomEmpresa=Yii::app()->getSession()->get('CliNom', FALSE);
        $valorNeto= Yii::app()->format->formatNumber($CabPed[0]["ValorNeto"]) ;
        
        $mail->IsSMTP();
        $mail->SMTPSecure = $this->SMTPSecure;
        $mail->Port = $this->Port;
        $mail->Host = $this->Host;
        $mail->setFrom('no-responder@utimpor.com', $this->TituloEnvio);
        // asunto y cuerpo alternativo del mensaje
        //$mail->Subject = "($nomEmpresa) Correo de Confirmación. Su Orden fue Revisada";
        $mail->Subject = "$valorNeto ($nomEmpresa) Correo de Confirmación. Orden Realizada!!!";
        $mail->AltBody = "Data alternativao";
        // si el cuerpo del mensaje es HTML
        $mail->MsgHTML($body); 
        $mail->AddAddress($CabPed[0]["CorreoUser"], $CabPed[0]["NombreUser"]);//Usuario Supervisor
        $mail->AddAddress($CabPed[0]["CorreoPersona"], $CabPed[0]["NombrePersona"]);//Usuario Genera Pedido
        //$mail->AddAddress('ncastro@utimpor.com', "Byron Villacreses");
        //$mail->addBCC('bvillacreses@utimpor.com', "Byron Villacreses");
        //$mail->addBCC('icastro@utimpor.com', 'Ventas Utimpor');
        //$mail->addBCC('ecastro@utimpor.com', "Enrique Castro");
        // si el SMTP necesita autenticación
        $mail->SMTPAuth = true;

        // credenciales usuario
        $mail->Username = $this->Username;
        $mail->Password = $this->Password;
        $mail->CharSet = $this->CharSet;

        if (!$mail->Send()) {
            //echo "Error enviando: " . $mail->ErrorInfo;
            return $msg->messageSystem('NO_OK', "Error enviando: " . $mail->ErrorInfo, 11, null, null);
        } else {
            //echo "¡¡Enviado!!";
            return $msg->messageSystem('OK', "¡¡Enviado!!", 20, null, null);
        }
    }
    
    public function enviarAutoriza($body) {
        $msg = new VSexception();
        $mail = new PHPMailer();
        $nomEmpresa=Yii::app()->getSession()->get('CliNom', FALSE);
        $mail->IsSMTP();
        $mail->SMTPSecure = $this->SMTPSecure;
        $mail->Port = $this->Port;
        $mail->Host = $this->Host;
        $mail->setFrom('no-responder@utimpor.com', $this->TituloEnvio);
        // asunto y cuerpo alternativo del mensaje
        $mail->Subject = "($nomEmpresa) Ha Recibido un Correo!!!";
        $mail->AltBody = "Data alternativao";
        // si el cuerpo del mensaje es HTML
        $mail->MsgHTML($body);   
        $mail->AddAddress('ncastro@utimpor.com', "Byron Villacreses");
        $mail->addBCC('bvillacreses@utimpor.com', "Byron Villacreses");
        $mail->addBCC('ecastro@utimpor.com', 'Ventas Utimpor');
        //$mail->addBCC('ljaramillo@utimpor.com', "Byron Villacreses");
        // si el SMTP necesita autenticación
        $mail->SMTPAuth = true;

        // credenciales usuario
        $mail->Username = $this->Username;
        $mail->Password = $this->Password;
        $mail->CharSet = $this->CharSet;

        if (!$mail->Send()) {
            //echo "Error enviando: " . $mail->ErrorInfo;
            return $msg->messageSystem('NO_OK', "Error enviando: " . $mail->ErrorInfo, 11, null, null);
        } else {
            //echo "¡¡Enviado!!";
            return $msg->messageSystem('OK', "¡¡Enviado!!", 20, null, null);
        }
    }

}
