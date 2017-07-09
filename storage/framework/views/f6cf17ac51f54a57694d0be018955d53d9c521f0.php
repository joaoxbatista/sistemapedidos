
<h3>Carrinho de Compras</h3>
<?php if(count($cart->getItems()) > 0): ?>
<?php echo e(Form::open(['method' => 'post', 'route' => 'sales.order.store'])); ?>

<?php echo e(Form::hidden('buy_date', \Carbon\Carbon::now())); ?>


<div class="row" style="margin-bottom: 10px;">
    <div class="col-md-12">
        <?php echo e(Form::submit('Finalizar' , ['class' => 'btn btn-success '])); ?>

        <?php echo e(Form::close()); ?>


        <a href="<?php echo e(route('cart.print')); ?>" class="btn btn-primary ">Imprimir</a>
        <a href="<?php echo e(route('cart.clear')); ?>" class="btn btn-danger ">Cancelar</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
       <div class="row">
           <div class="col-md-12">
               <div class="panel panel-default">
                   <div class="panel-heading">
                       <h3>Informações da compra</h3>
                   </div>
                   <div class="panel-body">

                       <?php if($cart->getSaller() != null): ?>
                           <p><strong>Vendedor: </strong><?php echo e($cart->getSaller()->name); ?></p>
                       <?php endif; ?>

                       <?php if($cart->getClient() != null): ?>
                           <p><strong>Cliente: </strong><?php echo e($cart->getClient()->name); ?></p>
                       <?php endif; ?>
                   </div>
               </div>
           </div>
       </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="5%"></th>
                    <th>Produto</th>
                    <th width="5%">Quantidade</th>
                    <th width="5%">Preço unitário</th>
                    <th width="10%">Subtotal</th>

                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $cart->getItems(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><a href="<?php echo e(route('cart.remove', ['id' => $item->product->id])); ?>" class="btn btn-danger"><i class="fa fa-times"></i></a></td>
                    <td><?php echo e($item->product->name); ?></td>
                    <td><?php echo e($item->quantity); ?></td>
                    <td>R$ <?php echo e($item->product->unit_price); ?></td>
                    <td>R$ <?php echo e($item->price); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><strong>Total</strong></td>
                    <td>R$ <?php echo e($cart->getTotalPrice()); ?></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>



<?php else: ?>
<div class="alert alert-info">
    Carrinho vazio
</div>
<?php endif; ?>
