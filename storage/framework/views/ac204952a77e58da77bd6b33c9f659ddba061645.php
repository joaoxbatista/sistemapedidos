<?php $__env->startSection('title'); ?> Dashboard | Home <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<a href="<?php echo e(route('products')); ?>" class="btn btn-default">Voltar</a><br><br>

    <div class="panel panel-danger">
        <div class="panel-heading">
            <h4>Apagar registro</h4>
        </div>
        <div class="panel-body">
            <p>Tem certeza que deseja remover o vendedor com as seguinte informações ?</p>

            <img width="180px" src="<?php echo e(asset('uploads/images/products/'.$product->image)); ?>" alt="<?php echo e($product->name); ?>">
            <p><strong>Código: </strong><?php echo e($product->id); ?></p>
            <p><strong>Nome: </strong><?php echo e($product->name); ?></p>
            <p><strong>Fornecedor: </strong><?php echo e($product->provider->name); ?></p>
            <p><strong>Preço unitário: </strong><?php echo e($product->unit_price); ?></p>
            <p><strong>Peso: </strong><?php echo e($product->weight); ?>Kg</p>
            <p><strong>Descrição: </strong><?php echo e($product->desc); ?></p>

            <?php echo e(Form::open(['method' => 'post', 'route' => 'products.destroy'])); ?>

            <?php echo e(Form::hidden('id', $product->id)); ?>

            <?php echo e(Form::submit('Deletar', ['class' => 'btn btn-danger'])); ?>

            <?php echo e(Form::close()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>