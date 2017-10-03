<aside class="right-side">
    <section class="content-header">
        <h1>
            <?php echo __('Productos'); ?>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">                
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo __('Agregar Producto'); ?></h3>
                    </div>                    
                    <?= $this->Form->create($product) ?>
                        <div class="box-body">
                            <fieldset>
                                <div class="form-group">
                                    <label for="Sku" class="required">SKU</label>
                                    <input type="number" id="Sku" name="sku" class="form-control input-sm">
                                </div>
                                <div class="form-group">
                                    <label for="Description" class="required">Descripción</label>
                                    <input type="text" id="Description" maxlength="128" name="description" class="form-control input-sm">
                                </div><div class="form-group">
                                    <label for="Presentation" class="required">Presentación</label>
                                    <input type="text" id="Presentation" maxlength="128" name="presentation" class="form-control input-sm">
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
<?= $this->Html->script('validation_products.js') ?>
