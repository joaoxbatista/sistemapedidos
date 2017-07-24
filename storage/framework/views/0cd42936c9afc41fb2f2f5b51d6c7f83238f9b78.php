<?php $__env->startSection('title'); ?> Dashboard | Home <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<a href="<?php echo e(route('orders')); ?>" class="btn btn-default">Voltar</a><br><br>

<ul class="nav nav-tabs">
	<li class="active"><a data-toggle="tab" href="#products">Produtos</a></li>
	<li><a data-toggle="tab" href="#cart">Carrinho <span class="badge badge-default"><?php echo e($cart->getTotalQuantity()); ?></span></a></li>
	<li><a data-toggle="tab" href="#add-client">Cliente</a></li>
	<li><a data-toggle="tab" href="#payment">Forma de Pagamento</a></li>
</ul>

<div class="tab-content">
	<div id="products" class="tab-pane fade in active">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Seleção de Produtos</h4>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table id="data-table" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Código</th>
								<th>Imagem</th>
								<th>Nome</th>
								<th>Preço unitário</th>
								<th>Fornecedor</th>
								<th width="40px">Quantidade</th>
								<th width="40px"></th>
							</tr>
						</thead>

						<tbody>
							<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($product->id); ?> </td>
								 <?php if($product->image != null): ?>
	                            <td><img width="60px" src="<?php echo e(asset('uploads/images/products/'.$product->image)); ?>" alt=""></td>
	                            <?php else: ?>
	                            <td><img width="60px" src="<?php echo e(asset('uploads/images/products/no-image.png')); ?>" alt=""></td>
	                            <?php endif; ?>
	                            <td><?php echo e($product->name); ?></td>
								<td><?php echo e($product->unit_price); ?></td>
								<td><?php echo e($product->provider->name); ?></td>
								<?php echo e(Form::open(['method' => 'post', 'route' => 'cart.add'])); ?>

								<td>
									<?php echo e(Form::hidden('product_id', $product->id, ['class' => 'form-control'])); ?>

									<?php echo e(Form::text('quantity', 1, ['class' => 'form-control'])); ?>

								</td>
								<td>
									<button type="sumbit" class="btn btn-success" style="float: right"><i class="fa fa-plus"></i></button>
								</td>
								<?php echo e(Form::close()); ?>

							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>
				</div>
				
			</div>
		</div>
	</div>

	<div id="cart" class="tab-pane fade">
		<?php echo $__env->make('dashboard.cart.cart', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>

	<div id="add-client" class="tab-pane fade">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Informações da cliente</h4>
			</div>
			<div class="panel-body">
				<?php if(!is_null($cart->getClient())): ?>
					<a class="btn btn-danger" href="<?php echo e(route('cart.remove.client')); ?>"> Remover</a> <br><br>
					<?php if($cart->getClient() != null): ?>
						<p><strong>Cliente: </strong><?php echo e($cart->getClient()->name); ?></p>

						<?php if($cart->getClient()->limit_credit != null): ?>
						<p><strong>Limite de Crédito: </strong><?php echo e($cart->getClient()->limit_credit); ?></p>
						<?php endif; ?>

					<?php endif; ?>

				<?php else: ?>
				<div class="col-md-3">
					<?php echo e(Form::open(['method' => 'post', 'route' => 'cart.add.client'])); ?>

					<div class="form-group">
				        <?php echo e(Form::label('client_id', 'Insira o código do cliente')); ?>

				        <?php echo e(Form::text('client_id', '', ['class' => 'form-control'])); ?>

				    </div>
				    <div style="margin-top: -10px; margin-bottom: 10px;">
				        <?php echo e(Form::submit('Adicionar', ['class' => 'btn btn-primary'])); ?>

				    </div>
					<?php echo e(Form::close()); ?>

				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<div id="payment" class="tab-pane fade">
		<a href="">Adicionar Prazo</a>
		<a href="">Adicionar Parcelas</a>
	</div>
	
	<div>
		
	</div>
	
</div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<style>
	section{
		margin-bottom: 20px;
	}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('js/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('js/custom-dataTables.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>