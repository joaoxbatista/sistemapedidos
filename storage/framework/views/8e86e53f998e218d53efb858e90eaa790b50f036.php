<?php $__env->startSection('title'); ?> Produtos da Loja <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row" style="margin-top: 50px;">
		<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		        <div class="col-md-3">
		            <?php if($product->image != null): ?>
		            	<img class="img-rounded" src="<?php echo e(asset('uploads/images/products/'.$product->image)); ?>" alt="<?php echo e($product->image); ?>">
		            <?php else: ?>
		            	<img width="240" height="240" src="<?php echo e(asset('uploads/images/products/no-image.png')); ?>" alt="sem imagem">
		            <?php endif; ?>
		            
		            <h4><?php echo e($product->name); ?></h4>
		            <p class="label label-success">R$ <?php echo e($product->unit_price); ?></p><br><br>
		            <p style="word-wrap: break-word;"><?php echo e(Str::words($product->desc, 14, '...')); ?></p>
		            <a class="btn btn-primary" href="<?php echo e(route('products.show', ['id' => $product->id])); ?>">Visualizar</a>
		        </div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	
	</div>
	<?php echo e($products->links()); ?>

</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.bootstrap', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>