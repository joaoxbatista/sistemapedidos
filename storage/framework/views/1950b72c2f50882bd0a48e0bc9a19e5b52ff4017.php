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

            <?php if(Auth::user()->image != null): ?>
                <img src="<?php echo e(asset('uploads/images/users/'.Auth::user()->image)); ?>" alt="" id="profile-image">
            <?php else: ?>
                <img src="<?php echo e(asset('imgs/img-profile.png')); ?>" alt="" id="profile-image">
            <?php endif; ?>

            <div id="content-profile-menu">
                <h3 id="profile-username">
                    <?php echo e(Str::words(Auth::user()->name, 2, '')); ?>

                </h3>

                <i class="fa fa-shopping-cart"></i> <?php echo e(Session::has('cart') ? Session::get('cart')->getTotalQuantity() : 0); ?> produtos

            </div>

        </div>

        <div id="content-side-menu">

            <div class="group-menu">
                <h3><i class="fa fa-circle-o-notch"></i> Gerência</h3>
                <nav>
                    <li><a href="<?php echo e(route('dashboard.home')); ?>"><i class="fa fa-dashboard"></i> Painel</a></li>
                    <li><a href="<?php echo e(route('providers')); ?>"><i class="fa fa-industry"></i> Fornecedores</a></li>
                    <li><a href="<?php echo e(route('products')); ?>"><i class="fa fa-archive"></i> Produtos</a></li>
                    <li><a href="<?php echo e(route('clients')); ?>"><i class="fa fa-group"></i> Clientes</a></li>
                    <li><a href="<?php echo e(route('orders')); ?>"><i class="fa fa-shopping-cart"></i> Pedidos</a></li>
                    <li><a href="<?php echo e(route('sellers')); ?>"><i class="fa fa-vcard"></i> Funcionários</a></li>
                </nav>
            </div>


            <div class="group-menu">
                <h3><i class="fa fa-circle-o-notch"></i> Configurações</h3>
                <nav>
                    <li><a href="<?php echo e(route('profile')); ?>"><i class="fa fa-user"></i> Profile</a></li>
                    <li><a href="<?php echo e(route('logout')); ?>"><i class="fa fa-power-off"></i>Sair</a></li>
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
        });
        $('#side-menu').perfectScrollbar();

        $("#side-menu").find(".ps-scrollbar-y-rail").css({"opacity":0});
    });
</script>

<?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
