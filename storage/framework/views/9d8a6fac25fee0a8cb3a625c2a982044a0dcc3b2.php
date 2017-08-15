<?php $__env->startSection('title'); ?> Dashboard | Cadastro de cheques <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php echo e(Form::open(['method' => 'post', 'route' => 'checks.store'])); ?>

	
	<!-- Informações do Cheque -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Registro do cheque</h4>
		</div>

		<div class="panel-body">
			<div class="form-group col-md-4">
				<?php echo e(Form::label('holder_name', 'Nome do Títular')); ?>

				<?php echo e(Form::text('holder_name', '', ['class' => 'form-control', 'required' => true])); ?>

			</div>
			<div class="form-group col-md-4">
				<?php echo e(Form::label('value', 'Valor do cheque')); ?>

				<?php echo e(Form::text('value', '', ['class' => 'form-control', 'required' => true])); ?>

			</div>

			<div class="form-group col-md-4">
				<?php echo e(Form::label('bank', 'Banco')); ?>

				<?php echo e(Form::text('bank', '', ['class' => 'form-control', 'required' => true])); ?>

			</div>

			<div class="form-group col-md-4">
				<?php echo e(Form::label('agency', 'Agência')); ?>

				<?php echo e(Form::text('agency', '', ['class' => 'form-control', 'required' => true])); ?>

			</div>

			<div class="form-group col-md-4">
				<?php echo e(Form::label('acount_number', 'Número da conta')); ?>

				<?php echo e(Form::text('acount_number', '', ['class' => 'form-control', 'required' => true])); ?>

			</div>

			<div class="form-group col-md-4">
				<?php echo e(Form::label('cpf', 'CPF')); ?>

				<?php echo e(Form::text('cpf', '', ['class' => 'form-control', 'required' => true])); ?>

			</div>

			<div class="form-group col-md-4">
				<?php echo e(Form::label('cnpj', 'CNPJ')); ?>

				<?php echo e(Form::text('cnpj', '', ['class' => 'form-control', 'required' => true])); ?>

			</div>

		</div>
	</div><!--/ Informações Pessoais -->

<?php echo e(Form::submit('Salvar', ['class' => 'btn btn-success'])); ?>


<?php echo e(Form::close()); ?>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
	<script src="<?php echo e(asset('js/jquery.mask.min.js')); ?>"></script>
	<script>
		$(document).ready(function(){
			$('#cpf').mask('999.999.999-99');
            $('#cnpj').mask('99.999.999/9999-99');
            $('#cep').mask('99999-999');
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>