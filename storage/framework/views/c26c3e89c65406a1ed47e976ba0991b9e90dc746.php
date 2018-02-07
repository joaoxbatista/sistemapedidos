<?php $__env->startSection('title'); ?> Home - SGP Hbioss <?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/home.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?> 
   <div class="container">
        
        <div class="title-content">
        	<img src="<?php echo e(asset('imgs/cart.png')); ?>" class="image-center">
        	<h3 class="title-home">Sistema de Pedidos</h3>
        </div>
        <div class="home-navegation">
        	<nav>
	        	<li><a href="">Documentação</a></li>
	        	<li><a href="">Contato</a></li>
	        	<li><a href="<?php echo e(route('dashboard.home')); ?>">Administrador</a></li>
	        	<li><a href="<?php echo e(route('seller.login')); ?>">Vendedor</a></li>
	        </nav>
        </div>
        
   </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.simple', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>