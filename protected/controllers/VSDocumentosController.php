<?php

class VSDocumentosController extends Controller {

    //http://yiiframeworkespanol.blogspot.com/2014_05_01_archive.html
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    public function accessRules() {
        return array(
            array('allow', // permite a todos los usuarios ejecutar las acciones
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // permite a los usuarios logueados ejecutar las acciones 
                'actions' => array('create', 'update', 'GenerarPdf'),
                'users' => array('@'),
            ),
            array('allow', // permite que únicamente el usuario admin ejecute las , 
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // niega cualquier otra acción para cualquier usuario
                'users' => array('*'),
            ),
        );
    }

    
}
