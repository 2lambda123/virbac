<aside class="right-side">
    <section class="content-header">
        <h1>
            <?php echo __('Usuarios'); ?>
        </h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i> <?php echo __('Inicio'); ?></li>
            <li><i class="fa fa-users"></i><?php echo __('Usuarios'); ?></li>
            <li class="active"><?php echo __('Agregar'); ?></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">                
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo __('Agregar Usuario'); ?></h3>
                    </div>                    
                    <?= $this->Form->create($user) ?>
                        <div class="box-body">
                            <fieldset>
                                <div class="form-group">
                                    <label for="name" class="required">Nombre(s)</label>
                                    <input type="test" id="name" name="name" class="form-control input-sm">
                                </div>
                                <div class="form-group">
                                    <label for="paternal_last_name" class="required">Apellido Paterno</label>
                                    <input type="text" id="paternal_last_name" maxlength="128" name="paternal_last_name" class="form-control input-sm">
                                </div><div class="form-group">
                                    <label for="maternal_last_name" class="required">Apellido Materno</label>
                                    <input type="text" id="maternal_last_name" maxlength="128" name="maternal_last_name" class="form-control input-sm">
                                </div>
                                <div class="form-group">
                                    <label for="access_level" class="required">Nivel de acceso</label>
                                    <select id="access_level" name="access_level" class="form-control input-sm">   
                                        <option value=""></option>
                                        <option value="operador">Operador</option>
                                        <option value="supervisor">Supervisor</option>
                                    </select>                                
                                </div>                                
                                <div class="form-group">
                                    <label for="Pieces">Contraseña</label>
                                    <input type="password" id="password" maxlength="128" name="password" class="form-control input-sm">
                                </div>                                
                            </fieldset>
                        </div> 
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
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>      
<?= $this->Html->script('validation_users.js') ?>