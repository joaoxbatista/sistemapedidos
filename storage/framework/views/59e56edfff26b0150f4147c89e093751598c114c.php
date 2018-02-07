<?php $__env->startSection('title'); ?> Home - SGP Hbioss <?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/home.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?> 

<div id="app">

	<section id="login-bar">
		<a href="<?php echo e(route('login')); ?>">Administração</a>	
		<a href="">Funcionário</a>	
	</section>

	<section id="tools">
		<div class="container">
			<div class="row">
				<div class="col-md-3 tool">
					<div class="header text-center">
						<h3><i class="fa fa-shopping-basket"></i></h3>
						<h4>Estoque</h4>
					</div>
					<div class="content">
						<p class="text-justify">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
						</p>
					</div>
				</div>

				<div class="col-md-3 tool">
					<div class="header text-center">
						<h3><i class="fa fa-line-chart"></i></h3>
						<h4>Relatórios</h4>
					</div>
					<div class="content">
						<p class="text-justify">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
						</p>
					</div>
				</div>


				<div class="col-md-3 tool">
					<div class="header text-center">
						<h3><i class="fa fa-users"></i></h3>
						<h4>Clientes</h4>
					</div>
					<div class="content">
						<p class="text-justify">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
						</p>
					</div>
				</div>


				<div class="col-md-3 tool">
					<div class="header text-center">
						<h3><i class="fa fa-vcard-o"></i></h3>
						<h4>Funcionários</h4>
					</div>
					<div class="content">
						<p class="text-justify">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
						</p>
					</div>
				</div>


			</div>
		</div>
	</section>	
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.simple', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>