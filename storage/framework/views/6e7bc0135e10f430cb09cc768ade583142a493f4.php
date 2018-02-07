<div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Parcelamento</h4>
		</div>
		<div class="panel-body">

			<?php if(is_null($cart->getParcels())): ?>
				<?php echo e(Form::open(['method' => 'post', 'route' => 'cart.add.parcels'])); ?>


				<div class="col-md-3">	
					<div class="form-group">
						<?php echo e(Form::label('parcels_quantity', 'Quantidade de parcelas')); ?>

						<?php echo e(Form::text('parcels_quantity', '', ['class' => 'form-control'])); ?>

					</div>
					<div style="margin-top: -10px; margin-bottom: 10px;">
						<?php echo e(Form::button('Adicionar parcelas', ['type' => 'submit', 'class' => 'btn btn-primary'])); ?>

					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<?php echo e(Form::label('parcels_interval', 'Intervalo de dias')); ?>

						<?php echo e(Form::text('parcels_interval', '', ['class' => 'form-control'])); ?>

					</div>
				</div>
				
				<?php echo e(Form::close()); ?>

			<?php else: ?>
				<a href="<?php echo e(route('cart.remove.parcels')); ?>">Limpar parcelas</a>

				<?php $__currentLoopData = $cart->getParcels(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parcel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="well">
						<p>Data do Pagamento <?php echo e($parcel['pay_date']->format('d/m/Y')); ?></p>
						<p>Valor  R$ <?php echo e($parcel['value']); ?> </p>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endif; ?>

		</div>
	</div>
</div>