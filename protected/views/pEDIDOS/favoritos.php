<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php echo $this->renderPartial('_include'); ?>



<div class="col-lg-8">
    <div class="panel panel-default">
        <div class="panel-heading"><?php //echo Yii::t('GENERAL', 'Favoritos') ?> <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Buscar Listado Favoritos'), array('id' => 'btn_save', 'name' => 'btn_save', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'mostrarlistadofavoritos()')); ?></div>
        <div class="panel-body">
            <?php $this->renderPartial('_frm_dataFavorito'); ?>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="TbG_Favorito">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Imagen</th>                                                        
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
            <!--            <tr class="odd gradeX">
                            <td>Trident</td>
                            <td>Internet Explorer 4.0</td>
                            <td class="center">4</td>
                        </tr>
                        <tr class="even gradeC">
                            <td>Trident</td>
                            <td>Internet Explorer 5.0</td>
                            <td class="center">5</td>
                        </tr>-->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    //se ejecuta un Escrip de Incio
    loadDataCreateFavorito();
</script>


