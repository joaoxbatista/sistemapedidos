<?php $__env->startSection('title'); ?> Dashboard | Produtos <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <a href="<?php echo e(route('saller.product')); ?>" class="btn btn-default">Voltar</a><br><br>
    <div class="well">
        <p><strong>Nome: </strong><?php echo e($product->name); ?></p>
        <img src="<?php echo e(asset('uploads/images/products/'.$product->image)); ?>" alt="<?php echo e($product->name); ?>">
        <p><strong>Preço unitário: </strong><?php echo e($product->unit_price); ?></p>
        <p><strong>Validade: </strong><?php echo e($product->expiration); ?></p>
        <p><strong>Peso: </strong><?php echo e($product->weight); ?>Kg</p>
        <p><strong>Descrição: </strong><?php echo e($product->desc); ?></p>
        <p><strong>Fornecedor: </strong><?php echo e($product->provider->name); ?></p>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.saller-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>