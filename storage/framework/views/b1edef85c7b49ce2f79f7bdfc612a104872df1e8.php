<?php $__env->startSection('title'); ?> Dashboard | Home <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

	<a href="<?php echo e(route('providers')); ?>" class="btn btn-default">Voltar</a><br><br>

	<!-- Informações Pessoais e Documento -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Informações Pessoais e Documentos.</h4>
		</div>
		<div class="panel-body">
			<?php echo e(Form::open(['method' => 'post', 'route' => 'providers.store'])); ?>

			<div class="row">
				<div class="form-group col-md-4">
					<?php echo e(Form::label('name', 'Name')); ?>

					<?php echo e(Form::text('name', '', ['class' => 'form-control', 'required' => true])); ?>

				</div>

				<div class="form-group col-md-2">
					<?php echo e(Form::label('cnpj', 'CNPJ')); ?>

					<?php echo e(Form::text('cnpj', '', ['class' => 'form-control', 'required' => true])); ?>


				</div>
			</div>

		</div>
	</div> <!--/ Informações Pessoais e Documento -->

	<!-- Informações de Contato -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Informações de Contato</h4>
		</div>

		<div class="panel-body">
			<div class="row">
				<div class="form-group col-md-2">
					<?php echo e(Form::label('phone', 'Telefone')); ?>

					<?php echo e(Form::text('phone', '', ['class' => 'form-control', 'required' => true])); ?>

				</div>

				<div class="form-group col-md-4">
					<?php echo e(Form::label('email', 'E-mail')); ?>

					<?php echo e(Form::text('email', '', ['class' => 'form-control', 'required' => true])); ?>


				</div>
			</div>
		</div>
	</div><!-- Informações de Contato -->

	<!-- Inforamções de Endereço -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Informações de Endereço</h4>
		</div>

		<div class="panel-body">
			<div class="row">
				<div class="form-group col-md-2">
					<?php echo e(Form::label('state', 'Estado')); ?>

					<?php echo e(Form::text('state', '', ['class' => 'form-control', 'required' => true])); ?>

				</div>

				<div class="form-group col-md-2">
					<?php echo e(Form::label('city', 'Cidade')); ?>

					<?php echo e(Form::text('city', '', ['class' => 'form-control', 'required' => true])); ?>

				</div>

				<div class="form-group col-md-4">
					<?php echo e(Form::label('street', 'Bairro')); ?>

					<?php echo e(Form::text('street', '', ['class' => 'form-control'])); ?>


				</div>

				<div class="form-group col-md-2">
					<?php echo e(Form::label('district', 'Rua')); ?>

					<?php echo e(Form::text('district', '', ['class' => 'form-control'])); ?>

				</div>

				<div class="form-group col-md-2">
					<?php echo e(Form::label('cep', 'CEP')); ?>

					<?php echo e(Form::text('cep', '', ['class' => 'form-control'])); ?>

				</div>

			</div>

			<?php echo e(Form::hidden('user_id', Auth::user()->id)); ?>

			<?php echo e(Form::submit('Salvar', ['class' => 'btn btn-success'])); ?>

			<?php echo e(Form::close()); ?>

		</div>
	</div><!-- Inforamções de Endereço -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>