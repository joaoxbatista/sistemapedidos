<?php $__env->startSection('title'); ?> Dashboard | Home <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

	<h3>Dashboard/Vendedor/Novo</h3>

	<a href="<?php echo e(route('sallers')); ?>" class="btn btn-default">Voltar</a><br><br>

	<?php echo e(Form::open(['method' => 'post', 'route' => 'sallers.store', 'files' => true])); ?>


	<h4>Informações do vendedor</h4>
	<div class="row">
		<div class="form-group col-md-4">
			<?php echo e(Form::label('name', 'Nome')); ?>

			<?php echo e(Form::text('name', '', ['class' => 'form-control'])); ?>

		</div>

		<div class="form-group col-md-4">
			<?php echo e(Form::label('cpf', 'CPF')); ?>

			<?php echo e(Form::text('cpf', '', ['class' => 'form-control'])); ?>

		</div>

		<div class="form-group col-md-4">
			<?php echo e(Form::label('payment', 'Salário')); ?>

			<?php echo e(Form::text('payment', '', ['class' => 'form-control'])); ?>

		</div>

		<div class="form-group col-md-4">
			<?php echo e(Form::label('file', 'Fotografia')); ?>

			<?php echo e(Form::file('file', ['class' => 'form-file'])); ?>

		</div>

	</div>

	<h4>Informações de acesso</h4>
	<div class="row">
		<div class="form-group col-md-4">
			<?php echo e(Form::label('email', 'E-mail')); ?>

			<?php echo e(Form::text('email', '', ['class' => 'form-control'])); ?>

		</div>

		<div class="form-group col-md-4">
			<?php echo e(Form::label('password', 'Senha')); ?>

			<?php echo e(Form::password('password', ['class' => 'form-control'])); ?>

		</div>

	</div>

	<?php echo e(Form::hidden('user_id', Auth::user()->id)); ?>

	<?php echo e(Form::submit('Salvar', ['class' => 'btn btn-success'])); ?>

	<?php echo e(Form::close()); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>