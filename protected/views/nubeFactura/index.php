<?php
/**
 * Este Archivo contiene las vista de Compañias
 * @author Ing. Byron Villacreses <byronvillacreses@gmail.com>
 * @copyright Copyright &copy; SolucionesVillacreses 2014-09-24
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
?>
<?php echo $this->renderPartial('_include'); ?>
<div class="col-lg-12">
    <?php echo $this->renderPartial('_frm_BuscarGrid', array('model' => $model, 'tip_descargo' => $tip_descargo, 'proveedor' => $proveedor)); ?>
    <?php echo $this->renderPartial('_indexGrid', array('model' => $model)); ?>
</div>
