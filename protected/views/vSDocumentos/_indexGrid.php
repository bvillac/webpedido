<?php

/**
 * Este Archivo contiene las vista de Compañias
 * @author Ing. Byron Villacreses <byronvillacreses@gmail.com>
 * @copyright Copyright &copy; SolucionesVillacreses 2014-09-24
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
?>

<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'TbG_DOCUMENTO',
    'dataProvider' => $model,
    //'template' => "{items}",
    'htmlOptions' => array('style' => 'cursor: pointer;'),
    //'selectableRows' => 2,
    //'selectionChanged' => 'verificaAcciones',
    //'selectionChanged' => 'fun_mostrarFichaPaciente',
    //'ajaxUrl'=>'Yii::app()->controller->createUrl("cOBRANZAS/", array("importarAfiliado" => $this->grid->dataProvider->pagination->currentPage+1))',
    //'summaryText'=>"<div class='whitesec_search'><p>{count} Full Quality Videos</p></div>",
    //'afterAjaxUpdate' => 'dataPrueba' ,
    //'afterAjaxUpdate'=>'function(id, data){alert(data)}',
    //'beforeAjaxUpdate'=>'function(id,options){alert(unescape(options.url)) }',
    //'beforeAjaxUpdate'=>'function(id,options){ options["type"]="POST"; }',
    //'beforeAjaxUpdate' => 'function(id,options){consultFiltros(options)}',
    'columns' => array(
          /*array(
          'header' => '#',
          'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
          ), */
        /*array(
            'name' => 'IdDoc',
            'header' => Yii::t('COMPANIA', 'IdDoc'),
            'value' => '$data["IdDoc"]',
        ),*/
        array(
            'name' => 'Estado',
            'header' => Yii::t('COMPANIA', 'Estado'),
            'value' => '($data["Estado"]=="1")?"Enviado":($data["Estado"]=="2")?"Autorizado":"Negado"',
        ),
        array(
            'name' => 'CodigoTransaccionERP',
            'header' => Yii::t('COMPANIA', 'CodigoTransaccionERP'),
            'value' => '$data["CodigoTransaccionERP"]',
        ),
        array(
            'name' => 'SecuencialERP',
            'header' => Yii::t('COMPANIA', 'SecuencialERP'),
            'value' => '$data["SecuencialERP"]',
        ),
        array(
            'name' => 'UsuarioCreador',
            'header' => Yii::t('COMPANIA', 'UsuarioCreador'),
            'value' => '$data["UsuarioCreador"]',
        ),
        array(
            'name' => 'FechaAutorizacion',
            'header' => Yii::t('COMPANIA', 'FechaAutorizacion'),
            'value' => '($data["FechaAutorizacion"]<>"")?date(Yii::app()->params["datebydefault"],strtotime($data["FechaAutorizacion"])):"";',
        ),
        array(
            'name' => 'AutorizacionSRI',
            'header' => Yii::t('COMPANIA', 'AutorizacionSRI'),
            'value' => '$data["AutorizacionSRI"]',
        ),
        array(
            'name' => 'NumDocumento',
            'header' => Yii::t('COMPANIA', 'NumDocumento'),
            'value' => '$data["NumDocumento"]',
        ),
        array(
            'name' => 'FechaEmision',
            'header' => Yii::t('COMPANIA', 'FechaEmision'),
            'value' => 'date(Yii::app()->params["datebydefault"],strtotime($data["FechaEmision"]))',
        ),
        array(
            'name' => 'IdentificacionComprador',
            'header' => Yii::t('COMPANIA', 'IdentificacionComprador'),
            'value' => '$data["IdentificacionComprador"]',
        ),
        array(
            'name' => 'RazonSocialComprador',
            'header' => Yii::t('COMPANIA', 'RazonSocialComprador'),
            'value' => '$data["RazonSocialComprador"]',
        ),
        array(
            'name' => 'ImporteTotal',
            'header' => Yii::t('COMPANIA', 'ImporteTotal'),
            'value' => '$data["ImporteTotal"]',
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{edit}{deletex}',
            'buttons' => array(
                'edit' => array(
                    'label' => 'Editar',
                    'imageUrl'=>Yii::app()->theme->baseUrl . Yii::app()->params['rutaIconos'].'edit.png', //ruta del icono
                    //'click' => 'js:obtenerSeleccion',
                ),
                'deletex' => array(
                    'label' => ' Eliminar',
                    'imageUrl'=>Yii::app()->theme->baseUrl . Yii::app()->params['rutaIconos'].'delete.png', //ruta del icono
                    //'click' => 'js:obtenerSeleccion',
                    //'click'=>'function(){$("#dialog_id").dialog("open"); return false;}',
                ),
            ),
        ),
    /* array(
      'class' => 'CButtonColumn',
      'template' => '{add}{edit}{delete}',
      'htmlOptions' => array('style' => 'width: 50px'),
      'buttons' => array(
      'add' => array(
      //'imageUrl'=>Yii::app()->theme->baseUrl . Yii::app()->params['rutaIconos'].'afiliado.png', //ruta del icono
      'label' => '',
      'imageUrl' => '', //ruta del icono
      'click' => 'function(){hola();}',
      //'url' => '$this->grid->controller->createUrl("/Extras/update", array("id"=>$data->id,"asDialog"=>1,"gridId"=>$this->grid->id))',
      //'visible' => '($data->id===null)?false:true;'
      'options' => array('class' => 'icon-add', 'rel' => 'tooltip'),
      ),
      'edit' => array(
      'label' => '',
      'imageUrl' => '', //ruta del icono
      'click' => 'function(){hola();}',
      'options' => array('class' => 'icon-edit', 'rel' => 'tooltip'),
      ),
      'delete' => array(
      'label' => '',
      'imageUrl' => '', //ruta del icono
      'click' => 'function(){hola();}',
      'options' => array('class' => 'icon-remove', 'rel' => 'tooltip'),
      ),
      ),
      ), */
    ),
));
?>
