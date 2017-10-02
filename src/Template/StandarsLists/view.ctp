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
                    <div class="box-body" id="list">
                        <fieldset>
                            <div class="form-group">
                                <label for="Name" class="required">Nombre de la Lista</label>
                                <input type="text" id="Name" name="listname" class="form-control input-sm" value="<?php echo $standarsList->name; ?>" disabled >
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="StepName" class="required">Nuevo Paso</label>
                                        <input type="text" id="StepName" maxlength="128" name="stepname" class="form-control input-sm" disabled>
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
                                                <tr>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
</aside>