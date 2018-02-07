<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" />
    
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

	<link rel="icon" type="image/png" href="<?php echo e(asset('assets/img/favicon.ico')); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title><?php echo $__env->yieldContent('title'); ?></title>

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/app.css')); ?>">
    
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Animation library for notifications   -->
    <link href="<?php echo e(asset('css/animate.min.css')); ?>" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="<?php echo e(asset('css/light-bootstrap-dashboard.css')); ?>" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo e(asset('css/demo.css')); ?>" rel="stylesheet" />

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

    <link href="<?php echo e(asset('css/pe-icon-7-stroke.css')); ?>" rel="stylesheet" />


</head>
<body>

<div class="wrapper" id="app">
    <div class="sidebar" data-color="green" data-image="<?php echo e(asset('img/sidebar-2.jpg')); ?>">

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="<?php echo e(route('admin-dashboard.index')); ?>" class="simple-text">
                    hbioss.pedidos
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="<?php echo e(route('admin-dashboard.index')); ?>">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('admin-dashboard.profile.index')); ?>">
                        <i class="pe-7s-user"></i>
                        <p>Perfil</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('admin-dashboard.business.setting.index')); ?>">
                        <i class="pe-7s-tools"></i>
                        <p>Configurações</p>
                    </a>
                </li>

                <li>
                    <a href="<?php echo e(route('admin-dashboard.clients.index')); ?>">
                        <i class="pe-7s-users"></i>
                        <p>Clientes</p>
                    </a>
                </li>

                <li>
                    <a href="<?php echo e(route('admin-dashboard.stock')); ?>">
                        <i class="pe-7s-note2"></i>
                        <p>Estoque</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('admin-dashboard.reports')); ?>">
                        <i class="pe-7s-news-paper"></i>
                        <p>Relatórios</p>
                    </a>
                </li>
               
                <li>
                    <a href="<?php echo e(route('admin-dashboard.orders.index')); ?>">
                        <i class="pe-7s-cart"></i>
                        <p>Pedidos</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand"><?php echo $__env->yieldContent('title'); ?></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="<?php echo e(route('logout')); ?>">
                                <p class="hidden-lg hidden-md"> <i class="fa fa-power-off"></i> Sair</p>
                            </a>
                        </li>
                    </ul>
                </div>
                    
            </div>
        </nav>

        <div class="content">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
</div>
    
    <!--   Core JS Files   -->
    <script src="<?php echo e(asset('js/jquery-1.10.2.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/app.js')); ?>"></script>
    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="<?php echo e(asset('js/bootstrap-checkbox-radio-switch.js')); ?>"></script>

    <!--  Notifications Plugin    -->
    <script src="<?php echo e(asset('js/bootstrap-notify.js')); ?>"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="<?php echo e(asset('js/light-bootstrap-dashboard.js')); ?>"></script>

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="<?php echo e(asset('js/demo.js')); ?>"></script>

    <?php echo $__env->yieldContent('scripts'); ?>

</body>
    

</html>
