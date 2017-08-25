<aside class="right-side">
    <section class="content-header">
        <h1>
            <?php echo __('Lista'); ?>
        </h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i> <?php echo __('Inicio'); ?></li>
            <li><i class="fa fa-users"></i><?php echo __('Lista'); ?></li>
            <li class="active"><?php echo __('Agregar'); ?></li>
        </ol>
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
                                <div class="form-group">
                                    <label for="Description" class="required">Descripción</label>
                                    <input type="text" id="Description" name="listDescripción" class="form-control input-sm" value="<?php echo $standarsList->description; ?>" >
                                </div>
                                <div class="form-group">
                                    <label for="Presentation" class="required">Presentación</label>
                                    <input type="text" id="Presentation" maxlength="128" name="listPresentación" class="form-control input-sm" value="<?php echo $standarsList->presentation; ?>" >
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="StepName" class="required">Nuevo Paso</label>
                                            <input type="text" id="StepName" maxlength="128" name="stepname" class="form-control input-sm">
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
                                                <th>Nombre</th>
                                                <th>Borrar</th>
                                            </thead>
                                            <tbody id="step-body">
                                                <?php $i = 0; ?>
                                                <?php foreach ($standarsSteps as $value): ?>
                                                    <tr id="<?php echo $i; ?>">
                                                        <td><?php echo $value['name'];?></td>
                                                        <td>
                                                            <button type="button" class="delete-step" onclick="deleteSteps(this)" title="Eliminar" value="<?php echo $i; ?>">
                                                                <i class="fa fa-fw fa-trash-o"></i>
                                                            </button>
                                                        </td>
                                                        <input type="hidden" name="standars-steps[name]" value="<?php echo $value['name'];?>">
                                                    </tr>
                                                    <?php $i++; ?>
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
    $('#add-step').on('click', function(){
        var rowCount = $('#step-body tr').length;
            rowId = Math.random().toString().replace('0.', '');
        var deleteButton = '<button type="button" class="delete-step" onclick="deleteSteps(this)" title="Eliminar" value="' + rowId + '">\
                                <i class="fa fa-fw fa-trash-o"></i>\
                            </button>';
        var newStep = '<tr id="' + rowId + '">\
                        <td>' + $('#StepName').val() + '</td>\
                        <td>' + deleteButton + '</td>\
                        <input type="hidden" name="standars-steps[]" value="' + $('#StepName').val() + '">\
                      </tr>';
        $('#step-body').append(newStep);
    });   

    function deleteSteps(self){
        var rowId = $(self).val();
        $('#' + rowId).remove();
    }
</script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>      
<?= $this->Html->script('validation_list.js') ?>