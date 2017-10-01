<?php
 $cakeDescription = 'Virbac';
 ?>
<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?= $cakeDescription ?>:
            <?= $this->fetch('title') ?>
        </title>
        <?= $this->Html->meta('icon') ?>
        <?= $this->Html->css('font-awesome.min') ?>
        <?= $this->Html->css('main.css') ?>
        <?= $this->Html->css('bootstrap.min.css') ?>
        <?= $this->Html->css('datepicker.min.css') ?>

        <?= $this->Html->script('jquery-3.2.1.min.js') ?>
        <?= $this->Html->script('bootstrap.min.js') ?>
        <?= $this->Html->script('datepicker.min.js') ?>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>
    <body class="skin-blue">
        <aside class="left-side sidebar-offcanvas" style="margin-top: -80px;">
            <section class="sidebar">
                <ul class="sidebar-menu">
                    <li class="active">
                        <a href="<?php echo $this->request->webroot; ?>">
                            <i class="fa fa-bar-chart"></i> <span>Historial</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $this->request->webroot . 'jobs-orders';?>">
                            <i class="fa fa-briefcase"></i> <span><?php echo __('Ordenes de Trabajo'); ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $this->request->webroot . 'standars-lists';?>">
                            <i class="fa fa-file-text"></i> <span><?php echo __('Listas'); ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $this->request->webroot . 'products';?>">
                            <i class="fa fa fa-flask"></i> <span><?php echo __('Productos'); ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $this->request->webroot . 'users';?>">
                            <i class="fa fa-user"></i> <span><?php echo __('Usuarios'); ?></span>
                        </a>
                    </li>
                </ul>
            </section>
        </aside>

        <?php echo $this->fetch('content'); ?>
    </body>
</html>