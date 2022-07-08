<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $model=new USUARIO;
        //$this->render('index');
        $this->render('index', array(
            'cliente' => $model->recuperarClienteUsuario(),
            'tienda' => $model->recuperarTiendasUsuario('0'),
        ));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {        
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-Type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            //validar la entrada del usuario y redirigir a la página anterior si es válido
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        //$this->redirect(Yii::app()->homeUrl);
        $this->redirect('login');
    }

    public function actionLoginTienda() {
        if (Yii::app()->request->isPostRequest) {
            $model = new USUARIO;
            $user = isset($_POST['DATA']) ? $_POST['DATA'] :'';
            $arroout = $model->recuperarTiendasUsuario($user);
            //20-12-2019 Actualiza el Rol segun la tienda selecionada
            Yii::app()->session['RolId']=$arroout[0]['ROL_ID'];
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arroout);
            return;
        }
    }
    
    public function actionLoginData() {
        if (Yii::app()->request->isPostRequest) {
            $msg = new VSexception();
            $model=new USUARIO;
            $session = Yii::app()->getSession();
            $idTie = isset($_POST['idTie']) ? $_POST['idTie'] : '';
            $idCli = isset($_POST['idCli']) ? $_POST['idCli'] : '';
            $nomTie = isset($_POST['idTie']) ? $_POST['nomTie'] : '';
            $nomCli = isset($_POST['nomCli']) ? $_POST['nomCli'] : '';
            $session->add('TieID', $idTie);
            $session->add('CliID', $idCli);
            $session->add('TieNom', $nomTie);
            $session->add('CliNom', $nomCli);
            $arroout = $msg->messageSystem('OK',null,10,null, null);
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arroout);
            return;
            //$this->render('index', array(
            //    'cliente' => $model->recuperarClienteUsuario(),
            //    'tienda' => $model->recuperarTiendasUsuario($idCli),
            //));
        }
    }

    /**
     * Displays the Recuperar clave page
     */
    public function actionRecuperar() {
        //$model = new LoginForm;
        //$this->render('recuperar', array('model' => $model));
        $this->render('recuperar');
    }

    public function actionRecuperarClave() {
        if (Yii::app()->request->isPostRequest) {
            $msg = new VSexception();
            $model = new USUARIO;
            //cambiarPassword
            $correo = isset($_POST['correo']) ? $_POST['correo'] :'';
            if($model->existeCorreoUsuario($correo)){//si Retorna 1 existe
                $NuevaClave=VSValidador::generateRandomString(8);
                //VSValidador::putMessageLogFile("correo existe ".$correo.' '.$NuevaClave);
                $arroout=$model->cambiarPasswordLogin($correo,$NuevaClave);
                if($arroout["status"]=="OK"){
                    $dataMail = new mailSystem;            
                    $htmlMail='<div id="div-table">';
                        $htmlMail.='<div class="trow">';
                                $htmlMail.='<p>';
                                    //$htmlMail.=$info;
                                    //$htmlMail.='<p style="font-family:Verdana,Geneva,sans-serif; font-size:12">Estimado Usuario, <br aria-hidden="true"><br aria-hidden="true">Su contraseña ha sido reseteada exitosamente. Por favor ingrese a <a href="http://edocstvcable.com/contrasena.php?variable=saXtV5z4oAJ7ld9G4XfTV5q6ccD7CpWvF7XDJQUij08suWbAHa3kgZLeDSA672eeTAdGW2QB9fvf902wv67%2FlA%3D%3D" target="_blank" rel="noopener noreferrer" data-auth="NotApplicable" data-linkindex="0" id="LPlnk129798">edocstvcable.com/</a> e ingrese la contraseña indicada a continuación para iniciar el proceso de reseteo:<br aria-hidden="true"><br aria-hidden="true">Contraseña temporal: '. $NuevaClave .'<br aria-hidden="true"></p>';
                                    $htmlMail.='<p style="font-family:Verdana,Geneva,sans-serif; font-size:12">Estimado Usuario, ';
                                    $htmlMail.='<br aria-hidden="true"><br aria-hidden="true">Su contraseña ha sido reseteada exitosamente. ';
                                    $htmlMail.=' Por favor ingrese a <a href="https://pedidos.utimpor.com/" target="_blank" rel="noopener noreferrer" data-auth="NotApplicable" data-linkindex="0" id="">pedidos.utimpor.com/</a> ';
                                    $htmlMail.=' e ingrese la contraseña indicada a continuación:<br aria-hidden="true"><br aria-hidden="true">';
                                    $htmlMail.=' Contraseña temporal: '. $NuevaClave .'<br aria-hidden="true"></p>';
                                $htmlMail.='</p>';
                        $htmlMail.='</div>';
                    $htmlMail.='</div>';      
                    $titulo="Utimpor S.A. - Contrasena Restablecida";      
                    $arroout=$dataMail->enviarCorreoClave($htmlMail,$titulo,$correo);
                    $arroout = $msg->messageSystem('OK',null,19,null, null);
                }else{
                    $arroout = $msg->messageSystem('NO_OK',null,21,null, null);
                }
            }else{
                //VSValidador::putMessageLogFile(" NO EXISTE correo  ".$correo);
                $arroout = $msg->messageSystem('NO_OK',null,21,null, null);
            }
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($arroout);
            return;
        }
    }

}
