<?php $__env->startSection('title'); ?> Dashboard | Home <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
	<a href="<?php echo e(route('sallers')); ?>" class="btn btn-default">Voltar</a><br><br>

	<div class="panel panel-danger">
		<div class="panel-heading">
			<h4>Apagar registro</h4>
		</div>

		<div class="panel-body">
			<p>Tem certeza que deseja remover o vendedor com as seguinte informações ?</p>
			<p><strong>Nome: </strong><?php echo e($saller->name); ?></p>
			<p><strong>CPF: </strong><?php echo e($saller->cpf); ?></p>
			<?php echo e(Form::open(['method' => 'post', 'route' => 'sallers.destroy'])); ?>

			<?php echo e(Form::hidden('id', $saller->id)); ?>

			<?php echo e(Form::submit('Deletear', ['class' => 'btn btn-danger'])); ?>

			<?php echo e(Form::close()); ?>

		</div>
	</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>