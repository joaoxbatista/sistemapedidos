<?php $__env->startSection('title'); ?> Dashboard | Home <?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?> 

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<a href="<?php echo e(route('dashboard.home')); ?>" class="btn btn-default">Voltar</a>
<a href="<?php echo e(route('products.create')); ?>" class="btn btn-success">Novo <i class="fa fa-plus"></i></a> <br><br>

<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Tabela de Produtos</h4>
	</div>

	<div class="panel-body">
		<table id="data-table" class="table table-bordered">
			<thead>
			<tr>
				<th width="8%">Código</th>
				<th>Image</th>
				<th>Nome</th>
				<th>Preço</th>
				<th>Fornecedor</th>
				<th class="option-table-header"></th>
			</tr>
			</thead>

			<tbody>
			<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($product->id); ?></td>
					<td>
						<?php if(!is_null($product->image)): ?>
							<img width="80px" src="<?php echo e(asset('uploads/images/products/'.$product->image)); ?>" alt="<?php echo e($product->name); ?>">
						<?php else: ?>
							<img width="80px" src="<?php echo e(asset('uploads/images/products/no-image.png')); ?>" alt="<?php echo e($product->name); ?>">
						<?php endif; ?>
					</td>
					<td><?php echo e($product->name); ?></td>
					<td>R$ <?php echo e($product->unit_price); ?></td>
					<td><?php echo e($product->provider->name); ?></td>
					<td>
						<ul class="option-table">
							<li><a href="<?php echo e(route('products.show', [ 'id' => $product->id])); ?>" class="opt opt-view"><i class="fa fa-eye"></i></a></li>
							<li><a href="<?php echo e(route('products.edit', [ 'id' => $product->id])); ?>" class="opt opt-edit"><i class="fa fa-pencil"></i></a></li>
							<li><a href="<?php echo e(route('products.delete', ['id' => $product->id])); ?>" class="opt opt-delete"><i class="fa fa-trash"></i></a></li>
						</ul>
					</td>




				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		</table>
	</div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('js/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('js/custom-dataTables.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>