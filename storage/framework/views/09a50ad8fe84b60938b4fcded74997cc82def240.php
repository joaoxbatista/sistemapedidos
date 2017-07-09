<?php $__env->startSection('title'); ?> Dashboard | Home <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


<h3>Dashboard - Cliente - Create</h3>

<a href="/dashboard/clients/" class="btn btn-default">Voltar</a><br><br>

<?php echo e(Form::open(['method' => 'post', 'route' => 'clients.store'])); ?>

	
	<h3>Documentos</h3>
	<p>Área reservada para documentos e informações importantes.</p>
	<div class="row">
		
		<div class="form-group col-md-4">
			<?php echo e(Form::label('name', 'Name')); ?>

			<?php echo e(Form::text('name', '', ['class' => 'form-control', 'required' => true])); ?>

		</div>

		<div class="form-group col-md-4">
			<?php echo e(Form::label('cpf', 'CPF')); ?>

			<?php echo e(Form::text('cpf', '', ['class' => 'form-control', 'required' => true])); ?>


		</div>

		
	</div>

	<h3>Contato</h3>
	<p>Área reservada para informações relativas a formas de contato.</p>
	<div class="row">
		<div class="form-group col-md-4">
			<?php echo e(Form::label('phone', 'Telefone')); ?>

			<?php echo e(Form::text('phone', '', ['class' => 'form-control', 'required' => true])); ?>

		</div>

		<div class="form-group col-md-4">
			<?php echo e(Form::label('email', 'E-mail')); ?>

			<?php echo e(Form::text('email', '', ['class' => 'form-control', 'required' => true])); ?>


		</div>
	</div>

	<h3>Endereço</h3>
	<p>Área reservada para informações relativas ao endereço.</p>
	<div class="row">
		<div class="form-group col-md-2">
			<?php echo e(Form::label('cep', 'CEP')); ?>

			<?php echo e(Form::text('cep', '', ['class' => 'form-control'])); ?>


		</div>

		<div class="form-group col-md-3">
			<?php echo e(Form::label('street', 'Bairro')); ?>

			<?php echo e(Form::text('street', '', ['class' => 'form-control'])); ?>


		</div>


		<div class="form-group col-md-3">
			<?php echo e(Form::label('district', 'Rua')); ?>

			<?php echo e(Form::text('district', '', ['class' => 'form-control'])); ?>

		</div>
	</div>

	<div class="row">
		<div class="form-group col-md-4">
			<?php echo e(Form::label('city', 'Cidade')); ?>

			<?php echo e(Form::text('city', '', ['class' => 'form-control', 'required' => true])); ?>

		</div>

		<div class="form-group col-md-4">
			<?php echo e(Form::label('state', 'Estado')); ?>

			<?php echo e(Form::text('state', '', ['class' => 'form-control', 'required' => true])); ?>

		</div>
	</div>

	<div class="row">
		<div class="form-group col-md-4">
			<?php echo e(Form::hidden('user_id', Auth::user()->id )); ?>

			<?php echo e(Form::submit('Salvar', ['class' => 'btn btn-success'])); ?>

		</div>
	</div>
<?php echo e(Form::close()); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>