<?php $__env->startSection('title'); ?> Dashboard | Home <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<h3>Dashboard - Cliente</h3>
<a href="<?php echo e(route('saller.clients')); ?>" class="btn btn-default">Voltar</a><br><br>
<div class="well">
	<h4>Contato</h4>
	<p><strong>Nome: </strong><?php echo e($client->name); ?></p>
	<p><strong>CPF: </strong><?php echo e($client->cpf); ?></p>
	<p><strong>CNPJ: </strong><?php echo e($client->cnpj); ?></p>
	<p><strong>Telefone: </strong><?php echo e($client->phone); ?></p>
	<p><strong>E-mail: </strong><?php echo e($client->email); ?></p>
	<p><strong>CEP:</strong><?php echo e($client->cep); ?></p>
	<p><strong>Bairro: </strong><?php echo e($client->street); ?></p>
	<p><strong>Rua: </strong><?php echo e($client->district); ?></p>
	<p><strong>Cidade: </strong><?php echo e($client->city); ?></p>
	<p><strong>Estado: </strong><?php echo e($client->state); ?></p>

</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.saller-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>