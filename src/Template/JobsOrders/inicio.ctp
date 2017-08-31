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
 <div class="text-center">
    <h2>
    <?php
$ddate = date("Y-m-d");
$date = new DateTime($ddate);
$week = $date->format("W");
echo "Semana: $week";
?>
    </h2>
    <h4><?php echo date("Y-m-d h:i:sa")  ?></h4>
Año  <select id="year" class="dropdown">
      <option value="" class="label">Selecciona</option>
  <?php 
for ($x = 5; $x >=1; $x--) {?>
    <option value="1"> <?php echo date('Y')+$x;?> </option>
 <?php  
} 
?>
<option value="1"> <?php echo date('Y');?> </option>
  <?php 
for ($x = 1; $x <=5; $x++) {?>
    <option value="1"> <?php echo date('Y')-$x;?> </option>
 <?php  
} 
?>
</select> 
Semana  <select id="week" class="dropdown">
     Dia<option value="" class="label">Selecciona</option>
     <?php 
for ($x = 0; $x <= 52; $x++) {?>
    <option value="1"> <?php echo "$x";?> </option>
 <?php  
} 
?>
</select>
<button id="btnfiltrar" type="button" class="btn btn-default">Filtrar</button>
  </div>

  <br><br><br>
<?php foreach ($jobsOrders as $jobsOrder): ?>
<a href="#"><div id="pricing" class="">
  <div class="slideanim">
    <div class="col-md-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h4><?php echo $jobsOrder->description?></h4>
        </div>
        <div class="panel-body">
          <p><strong>SKU            </strong><?php echo $jobsOrder->sku?></p>
          <p><strong>Presentación   </strong><?php echo $jobsOrder->presentation?></p>
          <p><strong>Numero de piezas </strong><?php echo $jobsOrder->pieces?></p>
        </div>
        <div class="panel-footer">
        </div>
      </div>      
    </div>       
  </div>
</div>
</a>
<?php endforeach; ?>

     </section>
</aside>
<script type="text/javascript">
  $('#btnfiltrar').on('click', function(){
    var year = $('#year').val(),
        week =  $('#week').val();


    if(!(year && week)) {
      console.log('Define los campos');
      return false;
    }

    $.ajax({
        url: 'filterByDate',
        data: { year: year, week: week },
        type: 'post',
          success: function (result) {

            if(!result.error){
              alert('Error');
            }
          },
          error: function (result) {
            alert('Ha ocurrido un error por favor intenta de nuevo.');
        }
      });
  });

</script>


