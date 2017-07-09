<?php $__env->startSection('title'); ?> Dashboard | Home <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<h3>Dashboard - producte - Create</h3>

<a href="/dashboard/products/" class="btn btn-default">Voltar</a><br><br>

<?php echo e(Form::open(['method' => 'post', 'route' => 'products.store', 'files' => true])); ?>

<div class="row">
	<div class="form-group col-md-4">
		<?php echo e(Form::label('name', 'Nome')); ?>

		<?php echo e(Form::text('name', '', ['class' => 'form-control', 'required' => true])); ?>

	</div>

	<div class="form-group col-md-2">
		<?php echo e(Form::label('unit_price', 'Preço unitário')); ?>

		<?php echo e(Form::text('unit_price', '', ['class' => 'form-control', 'required' => true])); ?>

	</div>

	<div class="form-group col-md-2">
		<?php echo e(Form::label('weight', 'Peso')); ?>

		<?php echo e(Form::text('weight', '', ['class' => 'form-control', 'required' => true])); ?>

	</div>

	<div class="form-group col-md-2">
		<?php echo e(Form::label('provider_id', 'Fornecedor')); ?>

		<?php echo e(Form::select('provider_id', $providers , [] ,['class' => 'form-control'])); ?>

	</div>
</div>

<div class="row">
	<div class="form-group col-md-6">
		<?php echo e(Form::file('file', ['class' => 'form-file'])); ?>

	</div>
</div>



<div class="row">
	<div class="form-group col-md-12">
		<?php echo e(Form::label('desc', 'Descrição')); ?>

		<?php echo e(Form::textarea('desc', '', ['class' => 'form-control'])); ?>

	</div>
</div>



<?php echo e(Form::hidden('user_id', Auth::user()->id )); ?>

<?php echo e(Form::submit('Save', ['class' => 'btn btn-success'])); ?>

<?php echo e(Form::close()); ?>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('template.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>