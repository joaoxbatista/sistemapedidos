<?php $__env->startSection('title'); ?> Dashboard | Home <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<a href="<?php echo e(route('providers')); ?>" class="btn btn-default">Voltar</a><br><br>
<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Iformações do Fornecedor</h4>
	</div>

	<div class="panel-body">
		<p><strong>Nome: </strong><?php echo e($provider->name); ?></p>
		<p><strong>CPF: </strong><?php echo e($provider->cnpj); ?></p>
		<p><strong>Telefone: </strong><?php echo e($provider->phone); ?></p>
		<p><strong>E-mail: </strong><?php echo e($provider->email); ?></p>
		<p><strong>CEP:</strong><?php echo e($provider->cep); ?></p>
		<p><strong>Bairro: </strong><?php echo e($provider->street); ?></p>
		<p><strong>Rua: </strong><?php echo e($provider->district); ?></p>
		<p><strong>Cidade: </strong><?php echo e($provider->city); ?></p>
		<p><strong>Estado: </strong><?php echo e($provider->state); ?></p>

	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>