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
        <?= $this->Html->css('main.css') ?>
        <?= $this->Html->css('font-awesome.min.css') ?>
        <?= $this->Html->css('bootstrap.min.css') ?>
        <?= $this->Html->css('datepicker.min.css') ?>

        <?= $this->Html->script('jquery-3.2.1.min.js') ?>
        <?= $this->Html->script('jquery-validate.min.js') ?>
        <?= $this->Html->script('bootstrap.min.js') ?>
        <?= $this->Html->script('datepicker.min.js') ?>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>
    <body class="skin-blue" style="background-color: #f9f9f9">
        <aside class="left-side sidebar-offcanvas" style="margin-top: -80px; position: fixed">
            <section class="sidebar">
                <ul class="sidebar-menu">
                    <li class="active">
                        <a href="<?php echo $this->request->webroot; ?>">
                            <i class="fa fa-bar-chart"></i> <span>Historial</span>
                        </a>
                    </li>
                    <?php if ($this->request->session()->read('Auth.type') == 'admin'): ?>
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
                        <li>
                            <a href="<?php echo $this->request->webroot . 'users/logout';?>" onClick="return confirm('¿Está seguro que quiere cerrar sesión?')">
                                <i class="fa fa-power-off"></i> <span><?php echo __('Cerrar Sesión'); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </section>
        </aside>

        <?php echo $this->fetch('content'); ?>
    </body>
</html>