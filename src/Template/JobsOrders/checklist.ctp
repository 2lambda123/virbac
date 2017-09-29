<aside class="right-side">
    <section class="content-header">
        <h1>
            <?php echo __('Progreso '); ?>
        </h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i> <?php echo __('Inicio'); ?></li>
            <li><i class="fa fa-users"></i><?php echo __('Orden de Trabajo'); ?></li>
            <li class="active"><?php echo __('Ver'); ?></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">                
                <div class="box box-warning">
                  <div class="slideanim">
                    <div class="col-md-12 col-xs-12" style="padding: 1cm 0cm 0cm 0cm">
                      <div class="panel panel-default text-center">
                        <div class="panel-heading">
                          <h4><?php echo $jobsOrder[0]['description']?></h4>
                        </div>
                        <div class="panel-body">
                          <p><strong>SKU: </strong><?php echo $jobsOrder[0]['sku']?></p>
                          <p><strong>Presentación: </strong><?php echo $jobsOrder[0]['presentation']?></p>
                          <p><strong>Número de piezas: </strong><?php echo $jobsOrder[0]['pieces']?></p>
                          <p><strong>Fecha de creación: </strong><?php echo $jobsOrder[0]['creation_date']?></p>



                           <div class="row" style="padding: 0cm 0cm 0cm 7cm">
                              <div class="progress col-md-8" id="progress1">
                                 <div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;">
                                 </div>
                                 <span class="progress-type">Overall Progress</span>
                                 <span class="progress-completed">20%</span>
                             </div>
                         </div>

                                <div class="box-body">
                                    <fieldset>
                                       <div class="funkyradio">
                                          <?php foreach ($jobsOrder as $jobsOrder): ?>
                                            <?php if ($jobsOrder['substep_id'] == $jobsOrder['id_step'] ): ?>
                                                <div class="funkyradio-primary">
                                                    <input type="hidden" name="data[][id_step]" value="<?php echo $jobsOrder['id_step']; ?>" />
                                                    <input type="checkbox" name="data[][name]" onclick="myFunction()" id="<?php echo $jobsOrder['id_step']; ?>" value="<?php echo $jobsOrder['name']; ?>" <?php echo $jobsOrder['status'] == 'miss' ? 'unchecked': 'checked disabled="disabled"'; ?>  />
                                                    <label for="<?php echo $jobsOrder['id_step']; ?>"><?php echo $jobsOrder['name']; ?></label>
                                                 </div>
                    
                                            <?php else: ?>
                                            <div class="funkyradio-primary">
                                                    <input type="hidden" name="data[][id_step]" value="<?php echo $jobsOrder['id_step']; ?>" />
                                                    <input type="checkbox" name="data[][name]"  onclick="myFunction()" id="<?php echo $jobsOrder['id_step']; ?>" value="<?php echo $jobsOrder['name']; ?>" <?php echo $jobsOrder['status'] == 'miss' ? 'unchecked': 'checked disabled="disabled"';?>  />
                                                    <label for="<?php echo $jobsOrder['id_step']; ?>"><?php echo $jobsOrder['name']; ?></label>
                                                 </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                    </fieldset>
                                    
                                </div> 


                        </div>
                      </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="text-right">
                        <input type="submit" value="Aceptar" class="btn btn-info" href="<?php echo $this->request->webroot; ?>?">
                    </div>
                </div>
                </div>
            </div>
        </div>

<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
    </section>
</aside>
<style type="text/css">
/* steps*/

.funkyradio div {
  clear: both;
  overflow: hidden;
}

.funkyradio label {
  width: 100%;
  border-radius: 3px;
  border: 1px solid #D1D3D4;
  font-weight: normal;
}


.funkyradio input[type="checkbox"]:empty {
  display: none;
}


.funkyradio input[type="checkbox"]:empty ~ label {
  position: relative;
  line-height: 2.5em;
  text-indent: 3.25em;
  margin-top: 2em;
  cursor: pointer;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}


.funkyradio input[type="checkbox"]:empty ~ label:before {
  position: absolute;
  display: block;
  top: 0;
  bottom: 0;
  left: 0;
  content: '';
  width: 2.5em;
  background: #D1D3D4;
  border-radius: 3px 0 0 3px;
}


.funkyradio input[type="checkbox"]:hover:not(:checked) ~ label {
  color: #888;
}


.funkyradio input[type="checkbox"]:hover:not(:checked) ~ label:before {
  content: '\2714';
  text-indent: .9em;
  color: #C2C2C2;
}


.funkyradio input[type="checkbox"]:checked ~ label {
  color: #777;
}


.funkyradio input[type="checkbox"]:checked ~ label:before {
  content: '\2714';
  text-indent: .9em;
  color: #333;
  background-color: #ccc;
}


.funkyradio input[type="checkbox"]:focus ~ label:before {
  box-shadow: 0 0 0 3px #999;
}




.funkyradio-primary input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #337ab7;

}


</style>

<script>
</script>
