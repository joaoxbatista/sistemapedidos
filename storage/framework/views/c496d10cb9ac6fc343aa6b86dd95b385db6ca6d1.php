<?php $__env->startSection('title'); ?> Dashboard | Home <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Tabela de Produtos</h4>
    </div>

    <div class="panel-body">
        <div class="table-responsive">
            <table id="data-table" class="table table-bordered">
                <thead>
                    <tr>
                        <th width="8%">Código</th>
                        <th>Nome</th>
                        <th>Imagem</th>
                        <th>Preço</th>

                    </tr>
                </thead>

                <tbody>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($product->id); ?></td>
                        <td><a href="<?php echo e(route('seller.product.view', ['id' => $product->id ])); ?>"><?php echo e($product->name); ?></a></td>
                        <td><img height="100px" src="<?php echo e(asset('uploads/images/products/'.$product->image)); ?>" alt="<?php echo e($product->name); ?>"></td>
                        <td>R$ <?php echo e($product->unit_price); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('js/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('js/custom-dataTables.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.seller-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>