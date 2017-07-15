<?php $__env->startSection('title'); ?> Dashboard | Cliente | Editar <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<a href="<?php echo e(route('clients')); ?>" class="btn btn-default">Voltar</a><br><br>

<?php echo e(Form::open(['method' => 'post', 'route' => 'clients.update'])); ?>


<!-- Informações Pessoais -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Informações pessoais</h4>
	</div>

	<div class="panel-body">
		<div class="form-group col-md-4">
			<?php echo e(Form::label('name', 'Name')); ?>

			<?php echo e(Form::text('name', $client->name, ['class' => 'form-control', 'required' => true])); ?>

		</div>

		<div class="form-group col-md-3">
			<?php echo e(Form::label('cpf', 'CPF')); ?>

			<?php echo e(Form::text('cpf', $client->cpf, ['class' => 'form-control', 'required' => true])); ?>


		</div>

		<div class="form-group col-md-3">
			<?php echo e(Form::label('cnpj', 'CNPJ')); ?>

			<?php echo e(Form::text('cnpj', $client->cnpj, ['class' => 'form-control'])); ?>

		</div>

		<div class="form-group col-md-2">
			<?php echo e(Form::label('limit_credit', 'Limite de crédito')); ?>

			<?php echo e(Form::text('limit_credit', $client->limit_credit, ['class' => 'form-control'])); ?>

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

			<?php echo e(Form::text('phone', $client->phone, ['class' => 'form-control', 'required' => true])); ?>

		</div>

		<div class="form-group col-md-4">
			<?php echo e(Form::label('email', 'E-mail')); ?>

			<?php echo e(Form::text('email', $client->email, ['class' => 'form-control', 'required' => true])); ?>


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

			<?php echo e(Form::text('state', $client->state, ['class' => 'form-control', 'required' => true])); ?>

		</div>

		<div class="form-group col-md-4">
			<?php echo e(Form::label('city', 'Cidade')); ?>

			<?php echo e(Form::text('city', $client->city, ['class' => 'form-control', 'required' => true])); ?>

		</div>

		<div class="form-group col-md-4">
			<?php echo e(Form::label('district', 'Bairro')); ?>

			<?php echo e(Form::text('district', $client->street, ['class' => 'form-control'])); ?>

		</div>

		<div class="form-group col-md-4">
			<?php echo e(Form::label('street', 'Rua')); ?>

			<?php echo e(Form::text('street', $client->street, ['class' => 'form-control'])); ?>


		</div>

		<div class="form-group col-md-2">
			<?php echo e(Form::label('cep', 'CEP')); ?>

			<?php echo e(Form::text('cep', $client->cep, ['class' => 'form-control'])); ?>

		</div>

	</div>
</div>

<?php echo e(Form::hidden('id', $client->id)); ?>

<?php echo e(Form::submit('Atualizar', ['class' => 'btn btn-success'])); ?>


<?php echo e(Form::close()); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>