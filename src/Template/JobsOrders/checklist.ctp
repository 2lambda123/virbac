<aside class="right-side">
    <section class="content-header">
        <h1>
            <?php echo __('Progreso'); ?>
        </h1>
    </section>
    <?php $isAdmin = $this->request->session()->read('Auth.type') == 'admin'; ?>
    <section class="content">
        <div class="row">
            <div class="box box-warning">
                <div class="box-header">
                    <h3 class="box-title"><?php echo __('Orden de Trabajo'); ?></h3>
                </div>
                <form id="formSteps" action="<?php echo $this->request->webroot . "steps/edit/$id";?>" method="POST" >                        
                    <div class="box-body">
                        <fieldset>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Sku" class="required">SKU</label>
                                        <input type="number" id="Sku" name="sku" class="form-control input-sm" value="<?php echo $jobsOrder[0]['sku'];?>" disabled >
                                    </div>
                                    <div class="form-group">
                                        <label for="Description" class="required">Descripción</label>
                                        <input type="text" id="Description" maxlength="128" name="description" class="form-control input-sm" value="<?php echo $jobsOrder[0]['description'];?>" disabled >
                                    </div>
                                    <div class="form-group">
                                        <label for="Presentation" class="required">Presentación</label>
                                        <input type="text" id="Presentation" maxlength="128" name="presentation" class="form-control input-sm" value="<?php echo $jobsOrder[0]['presentation'];?>" disabled >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="JobNumber">Número de orden</label>
                                        <input type="number" id="JobNumber" maxlength="128" name="job_number" class="form-control input-sm" value="<?php echo $jobsOrder[0]['job_number'];?>" disabled >
                                    </div>                                
                                    <div class="form-group">
                                        <label for="Pieces">Cantidad</label>
                                        <input type="number" id="Pieces" maxlength="128" name="pieces" class="form-control input-sm" value="<?php echo $jobsOrder[0]['pieces'];?>" disabled >
                                    </div>
                                    <?php 
                                        $users_print = []; 
                                        foreach ($users as $user) {
                                            $users_print[$user['id']]['name'] = $user['name'];
                                            $users_print[$user['id']]['paternal_last_name'] = $user['paternal_last_name'];
                                        }
                                    ?>
                                    <div class="form-group">
                                        <label>Usuario que realizó las tareas</label>
                                        <select id="user" class="form-control input-sm" name="user">
                                            <option></option>                       
                                            <?php foreach ($users as $user): ?>
                                                <option value="<?php echo $user['id']; ?>"><?php echo $user['name'] . ' ' . $user['paternal_last_name'] . ' ' . $user['maternal_last_name']; ?></option>
                                            <?php endforeach ?>                                
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="row text-center">
                                <div class="col-md-5">
                                    <label>Pasos</label>
                                </div>
                                <div class="col-md-1">
                                    <label>Cantidad</label>
                                </div>
                                <div class="col-md-1">
                                    <label>Completado</label>
                                </div>
                                <div class="col-md-1">
                                    <label>Reasignado</label>
                                </div>                                              
                                <div class="col-md-1">
                                    <label>Usuario</label>
                                </div>                                
                                <div class="col-md-3">
                                    <label>Comentario</label>
                                </div>
                            </div>
                            <br/>
                            <?php foreach($jobsOrder as $steps): ?>
                                <div class="row text-center" style="margin-bottom: 15px">
                                    <div class="col-md-5">
                                        <div class="col-md-offset-<?php echo $steps['step_id'] == $steps['substep_id'] ? '0' : '4'; ?>">
                                            <label><?php echo $steps['name']; ?></label>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <p><?php echo $steps['quantity']; ?></p>
                                    </div>                                
                                    <div class="form-group col-md-1">
                                        <div class="pretty circle primary">
                                            <input class="steps" type="radio" name="<?php echo $steps['id']; ?>[status]" value="completed" <?php echo $steps['status'] == 'completed' ? 'checked': '';?> <?php echo $steps['status'] != 'missing' ? 'disabled': '';?>  checkstate="false" >
                                            <label><i class="fa fa-check"></i></label>
                                        </div>                                    
                                    </div>
                                    <div class="col-md-1">
                                        <div class="pretty circle warning">
                                            <input class="steps" type="radio" name="<?php echo $steps['id']; ?>[status]" value="reassigned" <?php echo $steps['status'] == 'reassigned' ? 'checked': '';?> <?php echo ($steps['status'] != 'missing'  ||  !$isAdmin) ? 'disabled': '';?> checkstate="false" >
                                            <label><i class="fa fa-check"></i></label>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <p><?php echo empty($users_print[$steps['user_id']]['name']) ? '' : $users_print[$steps['user_id']]['name'] . ' ' . $users_print[$steps['user_id']]['paternal_last_name'] ;?></p>
                                    </div>
                                    <div class="col-md-3">
                                        <textarea class="form-control" rows="2" id="comment" name="<?php echo $steps['id']; ?>[comment]"  value="<?php echo $steps['comment'];?>" disabled><?php echo $steps['comment'];?></textarea>
                                    </div>
                                    <input type="hidden" name="<?php echo $steps['id']; ?>[id]" value="<?php echo $steps['id']; ?>"  />                                   
                                    <input class="users" type="hidden" name="<?php echo $steps['id']; ?>[user_id]" <?php echo $steps['status'] != 'missing' ? 'disabled': '';?> />
                                </div>
                            <?php endforeach; ?> 
                            <div class="box-footer">
                                <div class="text-right">
                                    <input type="submit" value="Aceptar" class="btn btn-info">
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </form>
            </div>
        </div>
    </section>
</aside>
<?= $this->Html->css('pretty.min.css') ?>
<?= $this->Html->script('validation_checklist.js') ?>
<script type="text/javascript">

    $(".steps").on('click', function(event){
        var reference;

        if ($(this).val() == 'reassigned') {
            if ($(this).attr('checkstate') == 'false') {
                reference = $(this).parent().parent().next().next().children().eq(0);
                reference.attr('disabled', false);
                $(this).attr('checkstate', 'true');
            } else {
                reference = $(this).parent().parent().next().next().children().eq(0);
                $(this).prop('checked', false);
                $(this).attr('checkstate', 'false');
                reference.val('');
                reference.attr('disabled', true);
            }
        } else {
            if ($(this).attr('checkstate') == 'false') {
                reference = $(this).parent().parent().next().next().next().children().eq(0);
                reference.attr('disabled', true);
                reference.val('');
                $(this).attr('checkstate', 'true');
            } else {
                $(this).prop('checked', false);
                $(this).attr('checkstate', 'false');
            }
        }
    });


    $('#formSteps').submit(function(){
        var user = $('#user').val()
        $("input[type='radio']:checked").not(":disabled").parent().parent().parent().children().next().next().next().next().next().next().next().val(user);
    });
</script>