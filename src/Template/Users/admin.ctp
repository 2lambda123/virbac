<section class="content">
    <div class="row">
        <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3">                
            <div class="box box-warning">
                <div class="box-header">
                    <h3 class="box-title text-center"><?php echo __('Acceso'); ?></h3>
                </div>                        
                <form method="POST" action="<?php echo $this->request->webroot;?>users/admin">
	                <div class="box-body">
	                    	<fieldset>
	                        <div class="form-group">
	                            <label for="email" class="required">Email</label>
	                            <input type="text" id="email" name="email" class="form-control input-sm" >
	                        </div>                             
	                        <div class="form-group">
	                            <label for="password">Contraseña</label>
	                            <input type="password" name="password" id="password" class="form-control input-sm">
	                        </div>
	                    	</fieldset>
	                </div> 
	                <div class="box-footer">
	                    <div class="text-right">
	                        <input type="submit" value="Submit" class="btn btn-info">
	                    </div>
	                </div>
                </form>                                
            </div>
        </div>
    </div>
</section>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>      
<?= $this->Html->script('validation_login.js') ?>