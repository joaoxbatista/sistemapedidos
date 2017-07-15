<?php $__env->startSection('title'); ?> Dashboard | Home <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<a href="<?php echo e(route('clients')); ?>" class="btn btn-default">Voltar</a><br><br>

<?php echo e(Form::open(['method' => 'post', 'route' => 'clients.store'])); ?>


	<!-- Informações Pessoais -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Informações pessoais</h4>
		</div>

		<div class="panel-body">
			<div class="form-group col-md-4">
				<?php echo e(Form::label('name', 'Name')); ?>

				<?php echo e(Form::text('name', '', ['class' => 'form-control', 'required' => true])); ?>

			</div>

			<div class="form-group col-md-3">
				<?php echo e(Form::label('cpf', 'CPF')); ?>

				<?php echo e(Form::text('cpf', '', ['class' => 'form-control', 'required' => true])); ?>


			</div>

			<div class="form-group col-md-3">
				<?php echo e(Form::label('cnpj', 'CNPJ')); ?>

				<?php echo e(Form::text('cnpj', '', ['class' => 'form-control'])); ?>

			</div>

			<div class="form-group col-md-2">
				<?php echo e(Form::label('limit_credit', 'Limite de crédito')); ?>

				<?php echo e(Form::text('limit_credit', '', ['class' => 'form-control'])); ?>

			</div>
		</div>
	</div><!--/ Informações Pessoais -->

	<!-- Informações de Contato -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Informações de contato</h4>
		</div>

		<div class="panel-body">
			<div class="form-group col-md-4">
				<?php echo e(Form::label('phone', 'Telefone')); ?>

				<?php echo e(Form::text('phone', '', ['class' => 'form-control', 'required' => true])); ?>

			</div>

			<div class="form-group col-md-4">
				<?php echo e(Form::label('email', 'E-mail')); ?>

				<?php echo e(Form::text('email', '', ['class' => 'form-control', 'required' => true])); ?>


			</div>
		</div>
	</div><!--/ Informações de Contato -->

	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Informações de localidade</h4>
		</div>
		<div class="panel-body">

			<div class="form-group col-md-4">
				<?php echo e(Form::label('state', 'Estado')); ?>

				<?php echo e(Form::text('state', '', ['class' => 'form-control', 'required' => true])); ?>

			</div>

			<div class="form-group col-md-4">
				<?php echo e(Form::label('city', 'Cidade')); ?>

				<?php echo e(Form::text('city', '', ['class' => 'form-control', 'required' => true])); ?>

			</div>

			<div class="form-group col-md-4">
				<?php echo e(Form::label('district', 'Bairro')); ?>

				<?php echo e(Form::text('district', '', ['class' => 'form-control'])); ?>

			</div>

			<div class="form-group col-md-4">
				<?php echo e(Form::label('street', 'Rua')); ?>

				<?php echo e(Form::text('street', '', ['class' => 'form-control'])); ?>


			</div>

			<div class="form-group col-md-2">
				<?php echo e(Form::label('cep', 'CEP')); ?>

				<?php echo e(Form::text('cep', '', ['class' => 'form-control'])); ?>


			</div>

		</div>
	</div>
<?php echo e(Form::hidden('user_id', Auth::user()->id )); ?>

<?php echo e(Form::submit('Salvar', ['class' => 'btn btn-success'])); ?>


<?php echo e(Form::close()); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>