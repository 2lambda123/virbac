<aside class="right-side">
    <section class="content-header">
        <h1>
            <?php echo __('Orden de Trabajo'); ?>
        </h1>
    </section>
    <?php
        $date = new DateTime(date($jobsOrder['creation_date']));
        $formatedDate = $date->format("d-m-Y");
    ?>
    <section class="content">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">                
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo __('Ver Orden de Trabajo'); ?></h3>
                    </div>                    
                    <div class="box-body">
                        <fieldset>
                            <div class="form-group">
                                <label for="StandarList" class="required">Lista Estándar</label>
                                <input type="text" disabled value="<?php echo $jobsOrder['standar_list_id']; ?>"" id="StandarList" name="standar_list_id" class="form-control input-sm">
                            </div>
                            <div class="form-group">
                                <label for="Sku" class="required">SKU</label>
                                <input type="text" disabled value="<?php echo $jobsOrder['sku']; ?>""  id="Sku" name="sku" class="form-control input-sm">
                            </div>
                            <div class="form-group">
                                <label for="Description" class="required">Descripción</label>
                                <input type="text" disabled value="<?php echo $jobsOrder['description']; ?>"" id="Description" maxlength="128" name="description" class="form-control input-sm">
                            </div><div class="form-group">
                                <label for="Presentation" class="required">Presentación</label>
                                <input type="text" disabled value="<?php echo $jobsOrder['presentation']; ?>"" id="Presentation" maxlength="128" name="presentation" class="form-control input-sm">
                            </div>
                            <div class="form-group">
                                <label for="JobNumber">Número de orden</label>
                                <input type="text" disabled value="<?php echo $jobsOrder['job_number']; ?>"" id="JobNumber" maxlength="128" name="job_number" class="form-control input-sm">
                            </div>                                
                            <div class="form-group">
                                <label for="Pieces">Cantidad</label>
                                <input type="text" disabled value="<?php echo $jobsOrder['pieces']; ?>"" id="Pieces" maxlength="128" name="pieces" class="form-control input-sm">
                            </div>
                             <div class="form-group">
                                <label for="creation_date">Fecha de fabricación</label>
                                <div class="input-group input-append date" id="datePicker">
                                    <input type="text" class="form-control" name="creation_date" id="Date" value="<?php echo $formatedDate; ?>" disabled />
                                    <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                            </div>                                
                            <div class="form-group">
                                <label for="Commentary">Comentario</label>
                                <input type="text" disabled value="<?php echo $jobsOrder['comment']; ?>"" id="Comment" maxlength="128" name="comment" class="form-control input-sm">
                            </div>
                        </fieldset>
                    </div> 
                    <div class="box-footer">
                        <div class="text-right">
                            <input type="submit" value="Aceptar" class="btn btn-info">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</aside>