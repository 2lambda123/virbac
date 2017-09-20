<aside class="right-side">
  <section class="content-header">
      <h1>
        <?php echo __('Bienvenido'); ?>
      </h1>
      <ol class="breadcrumb">
        <li><a><i class="fa fa-home"></i> <?php echo __('Inicio'); ?></a></li>
        <li class="active"><?php echo __('Ordenes de Trabajo'); ?></li>
      </ol>
  </section>

  <section class="content">
    <?php $this->Flash->render(); ?>
    <div class="row">
      <div class="text-center">
        <h2>
          <?php
            $date = new DateTime(date("Y-m-d"));
            $week = $date->format("W");
          ?>
        </h2>
          <div class="form-group">
              <label class="col-xs-2 col-xs-offset-3 control-label" style="margin-right: -70px; margin-top: 6px">Fecha:</label>
              <div class="col-xs-3 date">
                  <div class="input-group input-append date" id="datePicker">
                    <input type="text" class="form-control" name="date" id="dateValue" value="<?php echo date('Y-m-d'); ?>" />
                    <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                  </div>
              </div>
          </div>
      </div>
    </div>
    <br/>
    <div id="jobs-rows">
      <?php foreach ($jobsOrders as $jobsOrder): ?>
        <a href="view/<?php echo $jobsOrder->id;?>"><div id="pricing" class="">
          <div class="slideanim">
            <div class="col-md-4 col-xs-12">
              <div class="panel panel-default text-center">
                <div class="panel-heading">
                  <h4><?php echo $jobsOrder->description?></h4>
                </div>
                <div class="panel-body">
                  <p><strong>SKU: </strong><?php echo $jobsOrder->sku?></p>
                  <p><strong>Presentación: </strong><?php echo $jobsOrder->presentation?></p>
                  <p><strong>Número de piezas: </strong><?php echo $jobsOrder->pieces?></p>
                </div>
                <div class="panel-footer">
                </div>
              </div>
            </div>
          </div>
        </a>
      <?php endforeach; ?>
    </div>

  </section>
</aside>
<script type="text/javascript">
  $('#datePicker').datepicker({
    format: 'dd-mm-yyyy'
  })
  .on('hide', function(e) {
    var date = $("#dateValue").val();
    console.log(date)
    filterByDate(date);
  });

  function filterByDate(date){
    $.ajax({
      url: 'jobs-orders/home',
      data: { date: date },
      type: 'post',
        success: function (result) {
          if(!result.error){
            console.log(result);
            refreshingJobs(result)
          }
        },
        error: function (result) {
          console.log(result);
          alert('Ha ocurrido un error, por favor intenta de nuevo.')
        }
    });
  }

  function refreshingJobs(result) {
    var json = result;
    var htmlJob = "";

    for (var i = 0; i < json.length; i++){
      htmlJob += '<a href="view/' + json[i]['id']+ '"><div id="pricing" class=""> \
          <div class="slideanim"> \
            <div class="col-md-4 col-xs-12"> \
              <div class="panel panel-default text-center"> \
                <div class="panel-heading"> \
                  <h4>' + json[i]['description'] + '</h4> \
                </div> \
                <div class="panel-body"> \
                  <p><strong>SKU: </strong>' + json[i]['sku'] + '</p> \
                  <p><strong>Presentación: </strong>' + json[i]['presentation'] + '</p> \
                  <p><strong>Número de piezas: </strong>' + json[i]['pieces'] + '</p> \
                </div> \
                <div class="panel-footer"> \
                </div> \
              </div> \
            </div> \
          </div> \
        </a>'
    }

    $('#jobs-rows').empty();
    $('#jobs-rows').append(htmlJob);
  }
</script>


