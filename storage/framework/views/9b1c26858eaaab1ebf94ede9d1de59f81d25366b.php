<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title'); ?></title>

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/app.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/perfect-scrollbar.min.css')); ?>">

    <?php echo $__env->yieldContent('styles'); ?>
</head>
<body>

<div id="app">

    
    <div id="side-menu">


        <div id="profile-menu">

           
            <img src="<?php echo e(asset(Auth::user()->image)); ?>" alt="" id="profile-image">
            

            <div id="content-profile-menu">
                <h3 id="profile-username">
                    <?php echo e(Str::words(Auth::user()->name, 2, '')); ?>

                </h3>

            </div>

        </div>

        <div id="content-side-menu">

            <div class="group-menu">
                <h3><i class="fa fa-circle-o-notch"></i> Gerência</h3>
                <nav>
                    <li><a href="<?php echo e(route('seller.dashboard')); ?>"><i class="fa fa-dashboard"></i> Painel</a></li>

                    <li><a href="<?php echo e(route('seller.product')); ?>"><i class="fa fa-archive"></i> Produtos</a></li>
                    <li><a href="<?php echo e(route('seller.clients')); ?>"><i class="fa fa-group"></i> Clientes</a></li>
                    <li><a href="<?php echo e(route('seller.orders')); ?>"><i class="fa fa-shopping-cart"></i> Pedidos</a></li>

                </nav>
            </div>


            <div class="group-menu">
                <h3><i class="fa fa-circle-o-notch"></i> Configurações</h3>
                <nav>
                    <li><a href="<?php echo e(route('seller.profile')); ?>"><i class="fa fa-user"></i> Profile</a></li>
                    <li><a href="<?php echo e(route('seller.logout')); ?>"><i class="fa fa-power-off"></i>Sair</a></li>
                </nav>
            </div>


        </div>

    </div>
    <div id="content">

        <div id="alert-area">
            <?php if(session()->has('success-message')): ?>
                <div class="alert alert-success">
                    <?php echo e(session()->get('success-message')); ?>

                </div>
            <?php endif; ?>

            <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>

        <?php echo $__env->yieldContent('content'); ?>
    </div>
</div>

<!-- Importação dos Scrips JS-->
<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/perfect-scrollbar.jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/menu.js')); ?>"></script>
<script>
    $(document).ready(function(){
        $('#content').perfectScrollbar({
            wheelSpeed: 6
        });
        $('#side-menu').perfectScrollbar();

        $("#side-menu").find(".ps-scrollbar-y-rail").css({"opacity":0});
    });
</script>

<?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
