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
                                    <input type="text" id="Name" name="listname" class="form-control input-sm" value="<?php echo $standarsList->name; ?>" >
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="StepName" class="required">Nuevo Paso</label>
                                            <input type="text" id="StepName" maxlength="128" name="stepname" class="form-control input-sm" >
                                        </div>
                                    </div>
                                    <div class="col-md-4" style="margin-top: 22px">
                                        <input type="button" id="add-step" value="Nuevo Paso" class="btn btn-success">
                                    </div>                                
                                </div>                                
                                <br/>
                            </fieldset>
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-offset-4 col-md-4"> 
                                        <table class="table table-hover text-center">
                                            <thead>
                                                <th>Paso</th>
                                                <th>Subpaso</th>
                                                <th></th>
                                                <th></th>
                                            </thead>
                                            <tbody id="step-body">
                                                <?php foreach ($standarsSteps as $value): ?>
                                                    <tr class="<?php echo $value['substep_id'];?>">
                                                        <td><?php echo $value['id'] == $value['substep_id'] ? $value['name'] : '';?></td>
                                                        <td><?php echo $value['id'] != $value['substep_id'] ? $value['name'] : '';?></td>
                                                        <td>
                                                            <button type="button" class="add-substep" onclick="addSubstep(this)" title="Agregar Subpaso" >
                                                                <i class="fa fa-fw fa-plus"></i>
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="delete-step" onclick="deleteSteps(this)" title="Eliminar" >
                                                                <i class="fa fa-fw fa-trash-o"></i> 
                                                            </button>
                                                        </td>
                                                        <input type="hidden" name="data[<?php echo $value['id'];?>][id]" value="<?php echo $value['id'];?>">
                                                        <input type="hidden" name="data[<?php echo $value['id'];?>][substep_id]" value="<?php echo $value['id'];?>">
                                                        <input type="hidden" name="data[<?php echo $value['id'];?>][name]" value="<?php echo $value['name'];?>">
                                                    </tr>
                                                <?php endforeach ?>
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
<script type="text/javascript">
    /* Random number limit 2147483647 */
    var rowId = Math.floor(Math.random() * 2147483407) + 1;
    var addButton = '<button type="button" class="add-substep" onclick="addSubstep(this)" title="Agregar Subpaso" >\
                        <i class="fa fa-fw fa-plus"></i>\
                    </button>';
    var deleteButton = '<button type="button" class="delete-step" onclick="deleteSteps(this)" title="Eliminar" >\
                            <i class="fa fa-fw fa-trash-o"></i> \
                        </button>';
    
    $('#add-step').on('click', function(){
        var stepName = $('#StepName').val();
        rowId = rowId + 1;

        if (stepName.trim() == ''){
            return;
        }
        var newStep = '<tr class="' + rowId + '">\
                        <td>' + stepName + '</td>\
                        <td></td>\
                        <td>' + addButton + '</td>\
                        <td>' + deleteButton + '</td>\
                        <input type="hidden" name="data[' + rowId + '][id]" value="' + rowId + '">\
                        <input type="hidden" name="data[' + rowId + '][substep_id]" value="' + rowId + '">\
                        <input type="hidden" name="data[' + rowId + '][name]" value="' + stepName + '">\
                      </tr>';
        $('#step-body').append(newStep);
        $('#StepName').val(' ');
    });   

    function addSubstep(self){
        var subStep = prompt("Ingresa el Subpaso:");
        rowId = rowId + 1;

        if (subStep.trim() == ''){
            return;
        }

        var newSubStep = '<tr class="' + $(self).parent().next().next().val() + '">\
                <td></td>\
                <td>' + subStep + '</td>\
                <td></td>\
                <td>' + deleteButton + '</td>\
                <input type="hidden" name="data[' + rowId + '][id]" value="' + rowId + '">\
                <input type="hidden" name="data[' + rowId + '][substep_id]" value="' + $(self).parent().next().next().val() + '">\
                <input type="hidden" name="data[' + rowId + '][name]" value="' + subStep + '">\
              </tr>';
        var trFather = $(self).parent().parent();
        $(trFather).after(newSubStep);

    }

    function deleteSteps(self){
        var id = $(self).parent().parent().attr('class');
        $('.' + id).remove();
    }
</script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>      
<?= $this->Html->script('validation_list.js') ?>