<?php $__env->startSection('title'); ?> Dashboard | Home <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<a href="<?php echo e(route('clients')); ?>" class="btn btn-default">Voltar</a><br><br>
<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Informações do Cliente</h4>
	</div>

	<div class="panel-body">
		<p><strong>Nome: </strong><?php echo e($client->name); ?></p>

		<p><strong>Limite de Crédito: </strong>R$<?php echo e($client->limit_credit); ?></p>
		<?php if($client->cnjp != null): ?>
			<p><strong>CNPJ: </strong><?php echo e($client->cnpj); ?></p>
		<?php else: ?>
			<p><strong>CPF: </strong><?php echo e($client->cpf); ?></p>
		<?php endif; ?>

		<p><strong>Telefone: </strong><?php echo e($client->phone); ?></p>
		<p><strong>E-mail: </strong><?php echo e($client->email); ?></p>
		<p><strong>CEP: </strong><?php echo e($client->cep); ?></p>
		<p><strong>Bairro: </strong><?php echo e($client->street); ?></p>
		<p><strong>Rua: </strong><?php echo e($client->district); ?></p>
		<p><strong>Cidade: </strong><?php echo e($client->city); ?></p>
		<p><strong>Estado: </strong><?php echo e($client->state); ?></p>
	</div>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Informações das compra</h4>
	</div>

	<div class="panel-body">
		<div class="table-responsive">
			<table id="data-table" class="table table-bordered">

				<thead>
				<tr>
					<th>Código</th>
					<th>Data de Compra</th>
					<th>Data do Pagamento</th>
					<th>Vendedor</th>
					<th>Total</th>
				</tr>
				</thead>

				<tbody>
				<?php $__currentLoopData = $client->orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						
						<td style="color: white; font-weight: bold;"
                        <?php if($order->status): ?>
                            class="label-success"
                        <?php else: ?>
                            class="label-danger"
                        <?php endif; ?>
                        >
                        	<?php echo e($order->id); ?>

                        </td>
						<td><?php echo e($order->buy_date); ?></td>
						<td><?php echo e($order->due_date); ?></td>
						<td>
							<?php if(isset($order->seller->name)): ?>
								<?php echo e($order->seller->id); ?> - <?php echo e($order->seller->name); ?>

							<?php else: ?>
								Sem vendedor					
							<?php endif; ?>
						</td>
						<td>R$ <?php echo e($order->total); ?></td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>