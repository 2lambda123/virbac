<aside class="right-side">
    <section class="content-header">
        <h1>
            <?php echo __('Orden de Trabajo'); ?>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">                
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo __('Agregar Orden de Trabajo'); ?></h3>
                    </div>                    
                    <?= $this->Form->create($jobsOrder) ?>
                        <div class="box-body">
                            <fieldset>
                                <div class="form-group">
                                    <label for="StandarList" class="required">Lista Estándar</label>
                                    <select id="StandarList" name="standar_list_id" class="form-control input-sm">                       
                                        <?php foreach ($standarsLists as $key => $value): ?>
                                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                        <?php endforeach ?>                                
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="Sku" class="required">SKU</label>
                                    <input type="number" id="Sku" name="sku" class="form-control input-sm">
                                </div>
                                <div class="form-group">
                                    <label for="Description" class="required">Descripción</label>
                                    <input type="text" id="Description" maxlength="128" name="description" class="form-control input-sm" readonly >
                                </div>
                                <div class="form-group">
                                    <label for="Presentation" class="required">Presentación</label>
                                    <input type="text" id="Presentation" maxlength="128" name="presentation" class="form-control input-sm" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="JobNumber">Número de orden</label>
                                    <input type="number" id="JobNumber" maxlength="128" name="job_number" class="form-control input-sm">
                                </div>                                
                                <div class="form-group">
                                    <label for="Pieces">Cantidad</label>
                                    <input type="number" id="Pieces" maxlength="128" name="pieces" class="form-control input-sm">
                                </div> 
                                 <div class="form-group">
                                    <label for="Date">Fecha:</label>
                                    <div class="input-group input-append date" id="datePicker">
                                        <input type="text" class="form-control" name="creation_date" id="Date" value="<?php echo date('d-m-Y'); ?>" />
                                        <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                </div>                              
                                <div class="form-group">
                                    <label for="Commentary">Comentario</label>
                                    <input type="text" id="Commentary" maxlength="128" name="comment" class="form-control input-sm">
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
<?= $this->Html->script('validation_jobs.js') ?>
<script type="text/javascript">
    $('#datePicker').datepicker({
        format: 'dd-mm-yyyy'
    })
    
  $("#Sku").on('change', function(e) {
    var sku = $("#Sku").val(); 

    if (sku.trim(' ')) {
        filterBySku(sku);
    } else {
       $("#Description").val('');
       $("#Presentation").val('');
    }
  });

    function filterBySku(sku){
        $.ajax({
          url: 'getSku',
          data: { sku: sku },
          type: 'post',
            success: function (result) {
              if(result==''){
                alert('El Sku que ingresaste no existe')
              }
              
              $("#Description").val(result[0]['description']);
              $("#Presentation").val(result[0]['presentation']);
            },
            error: function (result) {
              alert('Ha ocurrido un error, por favor intenta de nuevo.')
            }
        });
  }
</script>