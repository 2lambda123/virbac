<aside class="right-side">
    <section class="content-header">
        <h1>
            <?php echo __('Lista'); ?>
        </h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i> <?php echo __('Inicio'); ?></li>
            <li><i class="fa fa-users"></i><?php echo __('Lista'); ?></li>
            <li class="active"><?php echo __('Eliminar'); ?></li>
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
                                    <input type="text" id="Name" name="name" class="form-control input-sm" value="<?php echo $standarsList->name; ?>" disabled >
                                </div>
                                <div class="form-group">
                                    <label for="Description" class="required">Descripción</label>
                                    <input type="text" id="Description" name="description" class="form-control input-sm" value="<?php echo $standarsList->description; ?>" disabled >
                                </div>
                                <div class="form-group">
                                    <label for="Presentation" class="required">Presentación</label>
                                    <input type="text" id="Presentation" maxlength="128" name="presentation" class="form-control input-sm" value="<?php echo $standarsList->presentation; ?>" disabled >
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
                                                            <button type="button" class="delete-step" title="Eliminar" value="<?php echo $i; ?>">
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
                        </div>
                    <?= $this->Form->end() ?>                                       
                </div>
            </div>
        </div>
    </section>
</aside>