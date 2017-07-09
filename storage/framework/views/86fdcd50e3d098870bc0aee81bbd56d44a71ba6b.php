<?php $__env->startSection('title'); ?> Dashboard | Home <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<h3>Dashboard - Fornecedores - View</h3>
<a href="<?php echo e(route('sallers')); ?>" class="btn btn-default">Voltar</a><br><br>
<div class="well">
	<p><strong>Nome: </strong><?php echo e($saller->name); ?></p>
	<p><strong>CPF: </strong><?php echo e($saller->cpf); ?></p>
	<p><strong>Salário: </strong><?php echo e($saller->payment); ?></p>
	<p><strong>Vendas: </strong><?php echo e($saller->sales); ?></p>
	<p><strong>E-mail: </strong><?php echo e($saller->email); ?></p>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>