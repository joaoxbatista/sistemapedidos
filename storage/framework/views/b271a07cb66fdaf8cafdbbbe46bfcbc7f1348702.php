<?php $__env->startSection('title'); ?> Dashboard | Cliente | Editar <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<h3>Dashboard - Cliente - Editar</h3>

	<a href="/dashboard/clients/" class="btn btn-default">Voltar</a>

	
	<?php echo e(Form::open(['method' => 'post', 'route' => 'clients.update'])); ?>

	<div class="form-group">
		<?php echo e(Form::label('name', 'Name')); ?>

		<?php echo e(Form::text('name', $client->name, ['class' => 'form-control', 'required' => true])); ?>

	</div>

	<div class="form-group">
		<?php echo e(Form::label('cpf', 'CPF')); ?>

		<?php echo e(Form::text('cpf', $client->cpf, ['class' => 'form-control', 'required' => true])); ?>

		
	</div>

	<div class="form-group">
		<?php echo e(Form::label('phone', 'Telefone')); ?>

		<?php echo e(Form::text('phone', $client->phone, ['class' => 'form-control', 'required' => true])); ?>

	</div>

	<div class="form-group">
		<?php echo e(Form::label('email', 'E-mail')); ?>

		<?php echo e(Form::text('email', $client->email, ['class' => 'form-control', 'required' => true])); ?>

		
	</div>

	<div class="form-group">
		<?php echo e(Form::label('cep', 'CEP')); ?>

		<?php echo e(Form::text('cep', $client->cep, ['class' => 'form-control'])); ?>

		
	</div>

	<div class="form-group">
		<?php echo e(Form::label('street', 'Bairro')); ?>

		<?php echo e(Form::text('street', $client->street, ['class' => 'form-control'])); ?>

		
	</div>


	<div class="form-group">
		<?php echo e(Form::label('district', 'Rua')); ?>

		<?php echo e(Form::text('district', $client->district, ['class' => 'form-control'])); ?>

	</div>
	
	<div class="form-group">
		<?php echo e(Form::label('city', 'Cidade')); ?>

		<?php echo e(Form::text('city', $client->city, ['class' => 'form-control', 'required' => true])); ?>

	</div>

	<div class="form-group">
		<?php echo e(Form::label('state', 'Estado')); ?>

		<?php echo e(Form::text('state', $client->state, ['class' => 'form-control', 'required' => true])); ?>

	</div>

	<?php echo e(Form::hidden('id', $client->id)); ?>


	<?php echo e(Form::submit('Save', ['class' => 'btn btn-success'])); ?>

	<?php echo e(Form::close()); ?>

	
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>