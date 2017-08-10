<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

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
    <?= $this->Html->css('vendor/bootstrap/bootstrap') ?>
    <?= $this->Html->css('vendor/glyphicons/glyphicons') ?>
    <?= $this->Html->css('font-awesome.min') ?>
    <?= $this->Html->css('ionicons.min') ?>
    <?= $this->Html->css('main.css') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>

    <?= $this->Html->script('jquery-3.2.1.min.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body class="skin-blue">
    <header class="header">
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="navbar-btn sidebar-toggle hidden-lg" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-user"></i>
                            <span><?php /*echo $this->Session->read('Auth.User.global_id'); */?><i class="caret"></i></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header bg-light-blue">

                            </li>
                            <!-- Menu Body -->
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?php /*echo $this->webroot; */?>users/profile" class="btn btn-default btn-flat">Perfil</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php /*echo $this->webroot; */?>users/logout" class="btn btn-default btn-flat">Salir</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="separator"></div>
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <aside class="left-side sidebar-offcanvas">
            <section class="sidebar">
                <ul class="sidebar-menu">
                    <li class="active">
                        <a href="<?php echo $this->request->webroot . 'jobs-orders';?>">
                            <i class="fa fa-home"></i> <span>Inicio</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $this->request->webroot . 'jobs-orders';?>">
                            <i class="fa fa-users"></i> <span><?php echo __('Ordenes de Trabajo'); ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $this->request->webroot . 'standars-lists';?>">
                            <i class="fa fa-file-text"></i> <span><?php echo __('Listas'); ?></span>
                        </a>
                    </li>
                </ul>
            </section>
        </aside>
        
        <?php echo $this->fetch('content'); ?>
        
        <div id="sql-dump" class="right-side">
            <?php //echo $this->element('sql_dump'); ?>
        </div>
    </div>
    <script type="text/javascript">

    </script>
<body>

</body>
</html>
