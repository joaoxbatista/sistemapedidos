<?php $__env->startSection('title'); ?> Dashboard | Cliente | Editar <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

	<a href="<?php echo e(route('products')); ?>" class="btn btn-default">Voltar</a><br><br>

	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Atualizar Produto</h4>
		</div>

		<div class="panel-body">
			<?php echo e(Form::open(['method' => 'post', 'route' => 'products.update', 'files' => true])); ?>

			<div class="row">
				<div class="form-group col-md-4">
					<?php echo e(Form::label('name', 'Nome')); ?>

					<?php echo e(Form::text('name', $product->name, ['class' => 'form-control', 'required' => true])); ?>

				</div>
				<div class="form-group col-md-3">
					<?php echo e(Form::label('provider_id', 'Fornecedor')); ?>

					<?php echo e(Form::select('provider_id', $providers , $product->provider_id ,['class' => 'form-control'])); ?>

				</div>

				<div class="form-group col-md-3">
					<?php echo e(Form::label('unit_price', 'Preço unitário')); ?>

					<?php echo e(Form::text('unit_price', $product->unit_price, ['class' => 'form-control', 'required' => true])); ?>

				</div>

				<div class="form-group col-md-2">
					<?php echo e(Form::label('weight', 'Peso')); ?>

					<?php echo e(Form::text('weight', $product->weight, ['class' => 'form-control', 'required' => true])); ?>

				</div>


			</div>

			<div class="row" style="margin-bottom: 20px;">
				<div class="col-md-2">
					<?php if(!is_null($product->image)): ?>
						<img width="120px" src="<?php echo e(asset('uploads/images/products/'.$product->image)); ?>" alt="<?php echo e($product->name); ?>">
					<?php endif; ?>
				</div>

				<div class="form-group col-md-6">
					<?php echo e(Form::label('file', 'Fotografia')); ?>

					<?php echo e(Form::file('file', ['class' => 'form-file'])); ?>

				</div>

			</div>

			<div class="row">
				<div class="form-group col-md-12">
					<?php echo e(Form::label('desc', 'Descrição')); ?>

					<?php echo e(Form::textarea('desc', $product->desc, ['class' => 'form-control'])); ?>

				</div>
			</div>

			<?php echo e(Form::hidden('id', $product->id)); ?>

			<?php echo e(Form::submit('Atualizar', ['class' => 'btn btn-success'])); ?>

			<?php echo e(Form::close()); ?>


		</div>
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>