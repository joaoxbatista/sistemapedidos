<?php $__env->startSection('title'); ?> Dashboard | Home <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<h3>Dashboard - Pedidos - Novo</h3>

<a href="<?php echo e(route('saller.orders')); ?>" class="btn btn-default">Voltar</a><br><br>


<div class="table-responsive">
    <table id="data-table" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Preço unitário</th>
                <th>Fornecedor</th>
                <th width="10%">Quantidade</th>
                <th class="option-table-header"></th>
            </tr>
        </thead>

        <tbody>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($product->id); ?> </td>
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


<?php echo $__env->make('dashboard.cart.cart', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('js/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('js/custom-dataTables.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.saller-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>