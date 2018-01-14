<?php $__env->startSection('title'); ?> Dashboard | Home <?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?> 

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="header">
				<h4 class="title">Gerêncie seus produtos</h4>
				<p class="category">Clique no nome do produto para visualizar</p>
				<br>
				<a href="<?php echo e(route('admin-dashboard.products.create')); ?>" class="btn btn-success">Novo <i class="fa fa-plus"></i></a>
			</div>
			
			<div class="content table-responsive ">
				<table class="table table-hover table-striped" id="data-table">
					<thead>
						<tr>
							<th>Código</th>
							<th>Nome</th>
							<th>Preço</th>
							<th>Categoria</th>
							<th>Fornecedor</th>
						</tr>
					</thead>

					<tbody>
						<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($product->id); ?></td>
							<td>
								<a href="<?php echo e(route('admin-dashboard.products.show', [ 'id' => $product->id])); ?>">
									<?php echo e($product->name); ?>

								</a>
							</td>
							<td>R$ <?php echo e($product->unit_price); ?></td>
							<td>
								<?php if( $product->category): ?>
									<?php echo e($product->category->name); ?>

								<?php else: ?>
									sem categoria
								<?php endif; ?>
							</td>
							<td><?php echo e($product->provider->name); ?></td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>

			</div>
		</div>
	</div>
</div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('js/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('js/custom-dataTables.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.admin-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>