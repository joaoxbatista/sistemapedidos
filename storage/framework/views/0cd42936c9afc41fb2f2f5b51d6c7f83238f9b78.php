<?php $__env->startSection('title'); ?> Dashboard | Home <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<a href="<?php echo e(route('orders')); ?>" class="btn btn-default">Voltar</a><br><br>

<!-- Tabela de produtos -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Tabela de produtos</h4>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table id="products" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Quantidade</th>
                </tr>
                </thead>

                <!-- <tbody>
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
                </tbody> -->
            </table>
        </div>
    </div>
</div><!--/ Tabela de produtos -->

<?php echo $__env->make('dashboard.cart.cart', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('js/jquery.dataTables.js')); ?>"></script>
<script>
    $(function(){
        //Pega todos os produtos
        var products = $('#products').DataTable( {
            "ajax": "/api/products",
            "columns": [
                { "data": "id", 
                    "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                    $(nTd).html("<a href='api/add-to-cart/"+oData.id+"'>"+oData.name+"</a>");
                    }
                },
                { "data": "name" },
                { "data": "quantity" },
            ]
        } );

        $('.odd').click(
            function()
            {
                alert('clicou');
            }
        );
    });
</script>
<script src="<?php echo e(asset('js/custom-dataTables.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>