<?php
echo $this->renderPartial('_include');
$valida = new VSValidador();
?>
<div class="col-lg-12">
    <?php
    $this->renderPartial('_frm_dataPedido', array(
        'tienda' => $tienda,
        'estado' => $estado
    ));
    ?>

</div>
<div class="col-lg-12">
<?php echo $this->renderPartial('_indexGridPedidos', array('model' => $model)); ?>
</div>