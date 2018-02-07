<?php $__env->startSection('title'); ?> Dashboard | Home <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<a href="<?php echo e(route('products')); ?>" class="btn btn-default">Voltar</a><br><br>

<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Informações do Produto</h4>
	</div>

	<div class="panel-body">
		<div class="row">
			<div class="col-md-4">
				<img width="180px" src="<?php echo e(asset('uploads/images/products/'.$product->image)); ?>" alt="<?php echo e($product->name); ?>">
			</div>
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-6">
						<h4>entrada de produtos</h4>
						<?php echo e(Form::open(['route' => 'products.add', 'method' => 'post'])); ?>

						<?php echo e(Form::hidden('id', $product->id)); ?>

						<div class="form-group">
							<?php echo e(Form::label('quantity', 'Quantidade')); ?>

							<?php echo e(Form::text('quantity', '',['class' => 'form-control'])); ?>

						</div>
						<?php echo e(Form::submit('Adicionar', ['class' => 'btn btn-success'])); ?>

						<?php echo e(Form::close()); ?>

					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<p><strong>Nome: </strong><?php echo e($product->name); ?></p>
						<p><strong>Fornecedor: </strong><?php echo e($product->provider->name); ?></p>
						<p><strong>Quantidade: </strong><?php echo e($product->quantity); ?></p>
					</div>
					<div class="col-md-6">
						<p><strong>Preço unitário: </strong><?php echo e($product->unit_price); ?></p>
						<p><strong>Peso: </strong><?php echo e($product->weight); ?>Kg</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<p><strong>Descrição: </strong><?php echo e($product->desc); ?></p>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>