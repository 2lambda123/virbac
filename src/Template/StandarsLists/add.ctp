<aside class="right-side">
    <section class="content-header">
        <h1>
            <?php echo __('Lista'); ?>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">                
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo __('Lista'); ?></h3>
                    </div>                    
                    <?= $this->Form->create($standarsList) ?>
                        <div class="box-body" id="list">
                            <fieldset>
                                <div class="form-group">
                                    <label for="Name" class="required">Nombre de la Lista</label>
                                    <input type="text" id="Name" name="name" class="form-control input-sm">
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="StepName" class="required">Nuevo Paso</label>
                                            <input type="text" id="StepName" maxlength="128" class="form-control input-sm">
                                        </div>
                                    </div>
                                    <div class="col-md-4" style="margin-top: 22px">
                                        <input type="button" id="add-step" value="Nuevo Paso" class="btn btn-success">
                                    </div>                                
                                </div>                                  
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="Quantity" class="required">Cantidad</label>
                                            <input type="number" id="Quantity" class="form-control input-sm">
                                        </div>
                                    </div>                               
                                </div>                                
                                <br/>
                            </fieldset>
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-offset-4 col-md-4"> 
                                        <table class="table table-hover text-center">
                                            <thead>
                                                <th>Cantidad</th>
                                                <th>Paso</th>
                                                <th>Subpaso</th>
                                                <th></th>
                                                <th></th>
                                            </thead>
                                            <tbody id="step-body">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <br/> 
                        <div class="box-footer">
                            <div class="text-right">
                                <input type="submit" value="Aceptar" class="btn btn-info">
                            </div>                            
                        </div>
                    <?= $this->Form->end() ?>                                       
                </div>
            </div>
        </div>
    </section>
</aside>
<?= $this->Html->script('validation_list.js') ?>
<script type="text/javascript">
    /* Random number limit 2147483647 */
    var rowId = Math.floor(Math.random() * 2147483407) + 1;
    var addButton = '<button type="button" class="add-substep" onclick="addSubstep(this)" title="Agregar Subpaso" >\
                        <i class="fa fa-fw fa-plus"></i>\
                    </button>';
    var deleteButton = '<button type="button" class="delete-step" onclick="deleteSteps(this)" title="Eliminar" >\
                            <i class="fa fa-fw fa-trash-o"></i> \
                        </button>';    
    var deleteSubButton = '<button type="button" class="delete-step" onclick="deleteSubSteps(this)" title="Eliminar" >\
                            <i class="fa fa-fw fa-trash-o"></i> \
                        </button>';
    
    $('#add-step').on('click', function(){
        var stepName = $('#StepName').val();
        var quantity = $('#Quantity').val();
        rowId = rowId + 1;

        if (stepName.trim() == ''){
            return;
        }
        var newStep = '<tr class="' + rowId + '">\
                        <td>' + quantity + '</td>\
                        <td>' + stepName + '</td>\
                        <td></td>\
                        <td>' + addButton + '</td>\
                        <td>' + deleteButton + '</td>\
                        <input type="hidden" name="data[' + rowId + '][id]" value="' + rowId + '">\
                        <input type="hidden" name="data[' + rowId + '][substep_id]" value="' + rowId + '">\
                        <input type="hidden" name="data[' + rowId + '][name]" value="' + stepName + '">\
                        <input type="hidden" name="data[' + rowId + '][quantity]" value="' + quantity + '">\
                      </tr>';
        $('#step-body').append(newStep);
        $('#StepName').val(' ');
        $('#Quantity').val('');
    });   

    function addSubstep(self){
        var subStep = prompt("Ingresa el Subpaso:");
        var quantity = prompt("Ingresa la cantidad:");
        rowId = rowId + 1;

        if (subStep.trim() == ''){
            return;
        }

        var newSubStep = '<tr class="' + $(self).parent().next().next().val() + '">\
                <td>' + quantity + '</td>\
                <td></td>\
                <td>' + subStep + '</td>\
                <td></td>\
                <td>' + deleteSubButton + '</td>\
                <input type="hidden" name="data[' + rowId + '][id]" value="' + rowId + '">\
                <input type="hidden" name="data[' + rowId + '][substep_id]" value="' + $(self).parent().next().next().val() + '">\
                <input type="hidden" name="data[' + rowId + '][name]" value="' + subStep + '">\
                <input type="hidden" name="data[' + rowId + '][quantity]" value="' + quantity + '">\
              </tr>';
        var trFather = $(self).parent().parent();
        $(trFather).after(newSubStep);
    }

    function deleteSteps(self){
        var id = $(self).parent().parent().attr('class');
        $('.' + id).remove();
    }    

    function deleteSubSteps(self){
        $(self).parent().parent().remove();
    }
</script>