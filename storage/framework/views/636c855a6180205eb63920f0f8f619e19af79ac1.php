<?php $__env->startSection('title'); ?> Dashboard | Home <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<a href="<?php echo e(route('products')); ?>" class="btn btn-default">Voltar</a><br><br>

<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Novo Categoria</h4>
	</div>

	<div class="panel-body">
		<?php echo e(Form::open(['method' => 'post', 'route' => 'categories.store'])); ?>

		<div class="row">
			<div class="form-group col-md-4">
				<?php echo e(Form::label('name', 'Nome')); ?>

				<?php echo e(Form::text('name', '', ['class' => 'form-control', 'required' => true])); ?>

			</div>
		</div>

		<div class="row">
			<div class="form-group col-md-12">
				<?php echo e(Form::label('desc', 'Descrição')); ?>

				<?php echo e(Form::textarea('desc', '', ['class' => 'form-control'])); ?>

			</div>
		</div>

		<?php echo e(Form::hidden('user_id', Auth::user()->id )); ?>

		<?php echo e(Form::submit('Salvar', ['class' => 'btn btn-success'])); ?>

		<?php echo e(Form::close()); ?>


	</div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('template.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>