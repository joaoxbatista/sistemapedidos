<?php $__env->startSection('title'); ?> Dashboard | Produtos <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('dashboard.order.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php if(count($cart->getItems()) > 0): ?>
<div class="col-md-12">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Desconto</h4>
			</div>

			<div class="panel-body">
				
				<?php if($cart->getDiscount()): ?>
						<a href="<?php echo e(route('cart.clear.discount')); ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Cancelar</a><br><br>
						<p> Preço <strong>R$ <?php echo e($cart->getTotalPrice()); ?></strong>.  </p>
						<p> Desconto  <strong>R$ <?php echo e($cart->getDiscount()); ?></strong>. </p>
						<p> Preço com desconto <strong>R$ <?php echo e($cart->getTotalPriceWithDiscount()); ?></strong>.</p>
					
				<?php else: ?>
			
				<?php echo e(Form::open(['route' => 'order.discount', 'method' => 'post'])); ?>

					<div class="col-md-2">
						<div class="form-group">
							<?php echo e(Form::label('discount', 'Valor do desconto')); ?>

							<?php echo e(Form::text('discount', '', ['class' => 'form-control'])); ?>

						</div>
						<div class="form-group">
							<?php echo e(Form::radio('discount_type', 'value')); ?>

							<?php echo e(Form::label('discount_type', 'valor real')); ?>

						</div>

						<div class="form-group">
							<?php echo e(Form::radio('discount_type', 'percent')); ?>

							<?php echo e(Form::label('discount_type', 'porcentagem')); ?>

						</div>

						<?php echo e(Form::submit('Adicionar', ['class' => 'btn btn-success'])); ?>

					</div>
				<?php echo e(Form::close()); ?>

				
				<?php endif; ?>


			</div>
		</div>
	</div>
</div>
<?php else: ?>
	<h4>É necessário que existam items no carrinho.</h4>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>