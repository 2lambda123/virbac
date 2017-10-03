<aside class="right-side">
    <section class="content-header">
        <h1>
            <?php echo __('Progreso'); ?>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">                
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo __('Orden de Trabajo'); ?></h3>
                    </div>                        
                    <div class="box-body">
                        <fieldset>
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
                            <div class="form-group">
                                <label for="JobNumber">Número de orden</label>
                                <input type="number" id="JobNumber" maxlength="128" name="job_number" class="form-control input-sm" value="<?php echo $jobsOrder[0]['job_number'];?>" disabled >
                            </div>                                
                            <div class="form-group">
                                <label for="Pieces">Cantidad</label>
                                <input type="number" id="Pieces" maxlength="128" name="pieces" class="form-control input-sm" value="<?php echo $jobsOrder[0]['pieces'];?>" disabled >
                            </div>
                            <label>Lista</label>
                            <br/>
                            <?php foreach($jobsOrder as $steps): ?>
                                <div class="row">
                                    <div class="form-group col-md-offset-<?php echo $steps['step_id'] == $steps['substep_id'] ? '4' : '5'; ?> col-md-4">
                                        <div class="pretty circle primary">
                                            <input class="steps" type="checkbox" value="<?php echo $steps['id']; ?>" <?php echo $steps['status'] == 'missing' ? '': 'checked disabled'; ?> >
                                            <label><i class="fa fa-check"></i> <?php echo $steps['name']; ?></label>
                                        </div>
                                    </div>
                                </div>                            
                            <?php endforeach; ?>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </section>
</aside>

<div class="modal fade" id="usersModal" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Actualizar Lista</h4>
        </div>
        <div class="modal-body">
            <form id="modalInfo">
                <div class="form-group">
                    <label>Usuarios</label>
                    <select id="users" class="form-control input-sm" name="user_id">
                        <option value=""></option>                       
                        <?php foreach ($users as $user): ?>
                            <option value="<?php echo $user['id']; ?>"><?php echo $user['name'] . ' ' . $user['paternal_last_name'] . ' ' . $user['maternal_last_name']; ?></option>
                        <?php endforeach ?>                                
                    </select>
                </div>            
                <div class="form-group">
                    <label>Estatus</label>
                    <select id="status" class="form-control input-sm" name="status">                       
                        <option value=""></option>
                        <option value="completed">Completada</option>
                        <option value="reassigned">Reasignada</option>
                    </select>
                </div>            
                <div class="form-group" hidden>
                    <label>Comentario</label>
                    <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
                </div>
            </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" onClick="updateChecklist(this)">Actualizar</button>
        </div>
      </div>
    </div>
</div>
<?= $this->Html->css('pretty.min.css') ?>
<?= $this->Html->script('validation_checklist.js') ?>
<script type="text/javascript">
    var baseUrl = '<?php echo $this->request->webroot; ?>';
    var saveReference;

    $('.steps').on('click', function(event){
        saveReference = $(this);

        $(this).prop("checked", false);
        $('#modalInfo').validate().resetForm();     
        $('#comment').parent().hide(); 
        $('#usersModal').modal('show');
    });

    $("#status").on('change', function(event){
        if ($('#status').val() == 'reassigned') {
            $('#comment').parent().show();
        } else {
            $('#comment').parent().hide();        
            $('#comment').val('');        
        }
    });

    function updateChecklist(event){
        if (!$('#modalInfo').valid()) {
            return;
        } 
        $.ajax({
            url: baseUrl + 'steps/edit/' + saveReference.val(),
            data: $('#modalInfo').serialize(),
            type: 'post',
            success: function (result) {
                if (result.success) {
                    saveReference.prop("checked", true);
                    saveReference.attr("disabled", true);
                    $('#usersModal').modal('hide');
                    alert('Se ha actualizado con éxito.');
                } else {
                    alert('Ha ocurrido un error, por favor intenta de nuevo.')
                }
            },
            error: function (result) {
              alert('Ha ocurrido un error, por favor intenta de nuevo.')
            }
        });
    }
</script>