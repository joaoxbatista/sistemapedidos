<?php $__env->startSection('title'); ?> Dashboard | Home <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<a href="<?php echo e(route('clients')); ?>" class="btn btn-default">Voltar</a><br><br>
<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Informações do Cliente</h4>
	</div>

	<div class="panel-body">
		<p><strong>Nome: </strong><?php echo e($client->name); ?></p>

		<p><strong>Limite de Crédito: </strong>R$<?php echo e($client->limit_credit); ?></p>
		<?php if($client->cnjp != null): ?>
			<p><strong>CNPJ: </strong><?php echo e($client->cnpj); ?></p>
		<?php else: ?>
			<p><strong>CPF: </strong><?php echo e($client->cpf); ?></p>
		<?php endif; ?>

		<p><strong>Telefone: </strong><?php echo e($client->phone); ?></p>
		<p><strong>E-mail: </strong><?php echo e($client->email); ?></p>
		<p><strong>CEP: </strong><?php echo e($client->cep); ?></p>
		<p><strong>Bairro: </strong><?php echo e($client->street); ?></p>
		<p><strong>Rua: </strong><?php echo e($client->district); ?></p>
		<p><strong>Cidade: </strong><?php echo e($client->city); ?></p>
		<p><strong>Estado: </strong><?php echo e($client->state); ?></p>
	</div>
</div>

<div class="panel panel-defaul">
	<div class="panel-heading">
		<h4>Compras</h4>
	</div>

	<div class="panel-body">
		<?php echo e($client->orders); ?>

	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>