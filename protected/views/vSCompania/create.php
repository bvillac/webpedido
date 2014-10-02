<?php
/* @var $this VSCompaniaController */
/* @var $model VSCompania */

$this->breadcrumbs = array(
    'Vscompanias' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List VSCompania', 'url' => array('index')),
    array('label' => 'Manage VSCompania', 'url' => array('admin')),
);
?>


<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading"> Create VSCompania </div>
        <div class="panel-body">
            <?php $this->renderPartial('_form', array('model' => $model)); ?>
        </div>
    </div>

</div>

