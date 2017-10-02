<aside class="right-side">
    <section class="content-header">
        <h1>
            <?php echo __('Usuarios'); ?>
        </h1>
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
                                    <label for="email" class="required">Correo</label>
                                    <input type="text" id="email" name="email" class="form-control input-sm" value="<?php echo $user->email; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="name" class="required">Nombre(s)</label>
                                    <input type="number" id="name" name="name" class="form-control input-sm" value="<?php echo $user->id; ?>" >
                                </div>
                                <div class="form-group">
                                    <label for="paternal_last_name" class="required">Apellido Paterno</label>
                                    <input type="text" id="paternal_last_name" maxlength="128" name="paternal_last_name" class="form-control input-sm" value="<?php echo $user->paternal_last_name; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="maternal_last_name" class="required">Apellido Materno</label>
                                    <input type="text" id="maternal_last_name" maxlength="128" name="maternal_last_name" class="form-control input-sm" value="<?php echo $user->maternal_last_name; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="access_level">Nivel de accesso</label>
                                    <select id="access_level" name="access_level" class="form-control input-sm">
                                        <option value=""></option>                                        
                                        <option value="Operador" <?php echo $user->access_level == "operador" ? 'selected' : ''; ?>>Operador</option>     
                                        <option value="Supervisor" <?php echo $user->access_level == "supervisor" ? 'selected' : ''; ?>>Supervisor</option>
                                    </select>
                                </div>                                
                                <div class="form-group">
                                    <label for="Pieces">Contraseña</label>
                                    <input type="password" id="Pieces" maxlength="128" name="pieces" class="form-control input-sm" value="<?php echo $user->password; ?>">
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