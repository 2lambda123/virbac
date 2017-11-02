<aside class="right-side">
  <section class="content-header">
      <h1>
        <?php echo __('Bienvenido'); ?>
      </h1>
  </section>
  <section class="content">
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
                    <input type="text" class="form-control" name="date" id="dateValue" value="<?php echo date('d-m-Y'); ?>" />
                    <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                  </div>
              </div>
          </div>
      </div>
    </div>
    <br/>
    <div id="jobs-rows">
      <?php foreach ($jobsOrders as $jobsOrder): ?>
        <?php $percentCompleted =   floor((1 - ($jobsOrder['missing'] / $jobsOrder['stepsNumber'])) * 100); ?>
        <a href="<?php echo $this->request->webroot; ?>jobs-orders/checklist/<?php echo $jobsOrder['id'];?>">
          <div class="slideanim">
            <div class="col-md-4 col-xs-12">
              <div class="panel panel-default text-center" style="border-radius: 5px">
                <div class="panel-heading">
                  <h4><?php echo $jobsOrder['description']; ?></h4>
                </div>
                <div class="panel-body">
                  <div class="col-md-6" style="text-align: left">
                    <label>Orden:</label><span> <?php echo $jobsOrder['job_number']; ?></span>
                    <br/>
                    <label>Fecha a envasar:</label><span> <?php echo $jobsOrder['creation_date']; ?></span>
                    <br/>
                    <label>Sku:</label><span> <?php echo $jobsOrder['sku']; ?></span>
                    <br/>
                    <label>Presentación:</label><span> <?php echo $jobsOrder['presentation']; ?></span>
                    <br/>
                    <label>No. de piezas:</label><span> <?php echo $jobsOrder['pieces']; ?></span>
                  </div>
                  <div class="col-md-6">
                    <div class="progress blue" percent="<?php echo $percentCompleted;?>">
                        <span class="progress-left">
                            <span class="progress-bar"></span>
                        </span>
                        <span class="progress-right">
                            <span class="progress-bar"></span>
                        </span>
                        <div class="progress-value"><?php echo $percentCompleted ;?>%</div>
                    </div>
                  </div>
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
  var baseUrl = '<?php echo $this->request->webroot; ?>';
  $(function(){
    progressCircle();
  });

  function progressCircle(){
    $('.progress').each(function(element){
      var percentCompleted = parseInt($( this ).attr('percent'));
      var animationLeft, animationRight;

      switch(percentCompleted){
        case 0:
          animationLeft = 'loading-0 1.5s linear forwards 1.8s';
          animationRight = 'loading-0 1.5s linear forwards 1.8s';
          break;
        case 10:
          animationLeft = 'loading-1 1.5s linear forwards 1.8s';
          animationRight = 'loading-0 1.5s linear forwards 1.8s';        
          break;
        case 20:
          animationLeft = 'loading-2 1.5s linear forwards 1.8s';
          animationRight = 'loading-0 1.5s linear forwards 1.8s';          
          break;
        case 30:
          animationLeft = 'loading-3 1.5s linear forwards 1.8s';
          animationRight = 'loading-0 1.5s linear forwards 1.8s';
          break;
        case 40:
          animationLeft = 'loading-4 1.5s linear forwards 1.8s';
          animationRight = 'loading-0 1.5s linear forwards 1.8s';
          break;
        case 50:
          animationLeft = 'loading-5 1.5s linear forwards 1.8s';
          animationRight = 'loading-0 1.5s linear forwards 1.8s';
          break;
        case 60:
          animationLeft = 'loading-5 1.5s linear forwards 1.8s';
          animationRight = 'loading-1 1.5s linear forwards 1.8s';
          break;
        case 70:
          animationLeft = 'loading-5 1.5s linear forwards 1.8s';
          animationRight = 'loading-2 1.5s linear forwards 1.8s';          
          break;
        case 80:
          animationLeft = 'loading-5 1.5s linear forwards 1.8s';
          animationRight = 'loading-3 1.5s linear forwards 1.8s';
          break;
        case 90:
          animationLeft = 'loading-5 1.5s linear forwards 1.8s';
          animationRight = 'loading-4 1.5s linear forwards 1.8s';
          break;
        case 100:
          animationLeft = 'loading-5 1.5s linear forwards 1.8s';
          animationRight = 'loading-5 1.5s linear forwards 1.8s';
          break;   
      }
      $(this).children().eq(0).children().eq(0).css('animation', animationRight);
      $(this).children().eq(1).children().eq(0).css('animation', animationLeft);
    });
  }

  $('#datePicker').datepicker({
    format: 'dd-mm-yyyy'
  })
  .on('hide', function(e) {
    var date = $("#dateValue").val();
    filterByDate(date);
  });

  function filterByDate(date){
    $.ajax({
      url: 'jobs-orders/home',
      data: { date: date },
      type: 'post',
        success: function (result) {
          if(!result.error){
            refreshingJobs(result)
          }
        },
        error: function (result) {
          alert('Ha ocurrido un error, por favor intenta de nuevo.')
        }
    });
  }

  function refreshingJobs(result) {
    var json = result;
    var htmlJob = "";

    for (var i = 0; i < json.length; i++){
      var percentCompleted =   Math.floor((1 - (json[i]['missing'] / json[i]['stepsNumber'])) * 100);

      htmlJob += '<a href="' + baseUrl + 'jobs-orders/checklist/' + json[i]['id']+ '">\
          <div class="slideanim"> \
            <div class="col-md-4 col-xs-12"> \
              <div class="panel panel-default text-center"> \
                <div class="panel-heading"> \
                  <h4>' + json[i]['description'] + '</h4> \
                </div> \
                <div class="panel-body">\
                  <div class="col-md-6" style="text-align: left">\
                    <label>Orden:</label><span>' + json[i]['job_number'] + '</span>\
                    <br/>\
                    <label>Fecha a envasar:</label><span>' + json[i]['creation_date'] + '</span>\
                    <br/>\
                    <label>Sku:</label><span>' + json[i]['sku'] + '</span>\
                    <br/>\
                    <label>Presentación:</label><span>' + json[i]['presentation'] + '</span>\
                    <br/>\
                    <label>No. de piezas:</label><span>' + json[i]['pieces'] + '</span>\
                  </div> \
                  <div class="col-md-6">\
                    <div class="progress blue" percent="' + percentCompleted + '">\
                      <span class="progress-left">\
                        <span class="progress-bar"></span>\
                      </span>\
                      <span class="progress-right">\
                        <span class="progress-bar"></span>\
                      </span>\
                      <div class="progress-value">' + percentCompleted + '%</div>\
                    </div>\
                  </div>\
                </div> \
              </div> \
            </div> \
          </div>\
        </a>'
    }

    $('#jobs-rows').empty();
    $('#jobs-rows').append(htmlJob);
    progressCircle();
  }
</script>
<style type="text/css">
    .progress{
        width: 150px;
        height: 150px;
        line-height: 150px;
        background: none;
        margin: 0 auto;
        box-shadow: none;
        position: relative;
    }
    .progress:after{
        content: "";
        width: 100%;
        height: 100%;
        border-radius: 50%;
        border: 2px solid #fff;
        position: absolute;
        top: 0;
        left: 0;
    }
    .progress > span{
        width: 50%;
        height: 100%;
        overflow: hidden;
        position: absolute;
        top: 0;
        z-index: 1;
    }
    .progress .progress-left{
        left: 0;
    }
    .progress .progress-bar{
        width: 100%;
        height: 100%;
        background: none;
        border-width: 2px;
        border-style: solid;
        position: absolute;
        top: 0;
    }
    .progress .progress-left .progress-bar{
        left: 100%;
        border-top-right-radius: 80px;
        border-bottom-right-radius: 80px;
        border-left: 0;
        -webkit-transform-origin: center left;
        transform-origin: center left;
    }
    .progress .progress-right{
        right: 0;
    }
    .progress .progress-value{
        width: 85%;
        height: 85%;
        border-radius: 50%;
        border: 2px solid #ebebeb;
        font-size: 32px;
        line-height: 125px;
        text-align: center;
        position: absolute;
        top: 7.5%;
        left: 7.5%;
    }
    .progress.blue .progress-bar{
        border-color: #049dff;
    }
    .progress.blue .progress-value{
        color: #049dff;
    }
    .progress .progress-right .progress-bar{
        left: -100%;
        border-top-left-radius: 80px;
        border-bottom-left-radius: 80px;
        border-right: 0;
        -webkit-transform-origin: center right;
        transform-origin: center right;
        /*animation: loading-5 1.8s linear forwards;*/
    }
    .progress.blue .progress-left .progress-bar{
        /*animation: loading-2 1.5s linear forwards 1.8s;*/
    }

    @keyframes loading-5{
        0%{
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        100%{
            -webkit-transform: rotate(180deg);
            transform: rotate(180deg);
        }
    }
    @keyframes loading-4{
        0%{
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        100%{
            -webkit-transform: rotate(144deg);
            transform: rotate(144deg);
        }
    }
    @keyframes loading-3{
        0%{
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        100%{
            -webkit-transform: rotate(90deg);
            transform: rotate(90deg);
        }
    }
    @keyframes loading-2{
        0%{
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        100%{
            -webkit-transform: rotate(36deg);
            transform: rotate(36deg);
        }
    }
    @keyframes loading-1{
        0%{
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        100%{
            -webkit-transform: rotate(126deg);
            transform: rotate(126deg);
        }
    }
    @media only screen and (max-width: 990px){
        .progress{ margin-bottom: 20px; }
    }
</style>
