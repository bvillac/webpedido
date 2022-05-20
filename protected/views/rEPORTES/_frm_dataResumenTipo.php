<div id="div-table">
    <div class="form-group rowLine">
        
        <div class="col-lg-8">
            <?php
            echo CHtml::dropDownList(
                    'cmb_tipo', '0'
                    , array('0' => Yii::t('TIENDA', 'All')) + CHtml::listData($tipo, 'Ids', 'Nombre')
                    , array(
                //'onchange' => 'js:mostrarListaTienda(this.value)',
                'class' => 'form-control'
                    )
            );
            ?> 
        </div>
        <div class="col-lg-4">
            <?php //echo CHtml::link(Yii::t('CONTROL_ACCIONES', 'Agregar'), array('rEPORTES/Rep_ItemTienda'), array('id' => 'btn_add_tipo', 'name' => 'btn_add_tipo', 'title' => Yii::t('CONTROL_ACCIONES', 'Agregar'), 'class' => 'btn btn-primary btn-sm', "target"=>"_blank",'onclick' => 'fun_ConsumoTienda(1)')); ?>
            <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Agregar'), array('id' => 'btn_add_tipo', 'name' => 'btn_add_tipo', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'agregarItemsTipo("new")')); ?>
        </div>
        
    </div>
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="TbG_Tipo">
                <thead>
                    <tr>
                        <th>Nombre</th>                    
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
  
    
    

</div>

