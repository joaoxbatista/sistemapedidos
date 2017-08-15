<?php $__env->startSection('title'); ?> Dashboard | Produtos <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('dashboard.order.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php if(count($cart->getItems()) > 0): ?>
<div class="col-md-12">
	<div class="row">
		<div class="panel panel-default">	
			<div class="panel-heading">	
				<h4>Finalizar pedido</h4>
			</div>
			
			<div class="panel-body">	
				<p class="alert alert-info">Por favor, verifique as informações antes finalizar o processo!</p>
				
				<!-- Informações do Cliente -->
				<?php if($cart->getClient()): ?>
					<h4>Informações do cliente</h4>
					<p><strong>Cliente: </strong><?php echo e($cart->getClient()->name); ?></p>
					<p><strong><?php echo e($cart->getClient()->getIdentify(true
					)); ?> : </strong><?php echo e($cart->getClient()->getIdentify()); ?></p>

	                <?php if($cart->getClient()->limit_credit != null): ?>
	                <p><strong>Limite de Crédito: </strong> R$<?php echo e($cart->getClient()->limit_credit); ?></p>
	                <?php endif; ?>
					<hr>
				<?php endif; ?>
				
				<!-- Informações da Parcela -->
				<?php if($cart->getParcels()): ?>
					<h4>Informações do parcelamento</h4>
					<?php $__currentLoopData = $cart->getParcels(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $parcel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="well">
						<p><strong><?php echo e($index+1); ?>ª Parcela</strong></p>
						<p><strong>Data do Pagamento:</strong> <?php echo e($parcel['pay_date']->format('d/m/Y')); ?></p>
						<p><strong>Valor:</strong> R$<?php echo e($parcel['value']); ?> </p>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>


				<?php echo e(Form::open(['method' => 'post', 'route' => 'orders.store'])); ?>

				<?php echo e(Form::button('Finalizar', ['type' => 'submit', 'class' => 'btn btn-success'])); ?>

				<?php echo e(Form::close()); ?>

			</div>
		</div>
	</div>
</div>
<?php else: ?>
	<h4>É necessário que existam items no carrinho.</h4>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>