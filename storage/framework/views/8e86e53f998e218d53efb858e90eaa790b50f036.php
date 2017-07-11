<?php $__env->startSection('title'); ?> Produtos da Loja <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="container">
        <div class="col-md-3">

            <img src="<?php echo e(asset('uploads/images/products/'.$product->image)); ?>" alt="<?php echo e($product->image); ?>">
            <h3><?php echo e($product->name); ?></h3>
            <span clas="label-default">R$ <?php echo e($product->unit_price); ?></span>
            <p style="word-wrap: break-word;"><?php echo e($product->desc); ?></p>
        </div>
        <?php echo e($products->links()); ?>

    </div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.bootstrap', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>