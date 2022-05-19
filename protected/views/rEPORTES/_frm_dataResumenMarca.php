<div id="div-table">
    <div class="form-group rowLine">
        
        <div class="col-lg-8">
            <?php
            echo CHtml::dropDownList(
                    'cmb_marca', '0'
                    , array('0' => Yii::t('TIENDA', 'All')) + CHtml::listData($marca, 'Ids', 'Nombre')
                    , array(
                //'onchange' => 'js:mostrarListaTienda(this.value)',
                'class' => 'form-control'
                    )
            );
            ?> 
        </div>
        <div class="col-lg-4">
        <?php echo CHtml::button(Yii::t('CONTROL_ACCIONES', 'Agregar'), array('id' => 'btn_add_marca', 'name' => 'btn_add_marca', 'class' => 'btn btn-primary btn-sm', 'onclick' => 'agregarItemsMarca("new")')); ?>
        </div>
        
    </div>

    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="TbG_Marca">
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

