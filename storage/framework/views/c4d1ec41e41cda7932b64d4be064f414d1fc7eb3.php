<a href="<?php echo e(route('orders')); ?>" class="btn btn-default">Voltar</a>

<a href="<?php echo e(route('orders.create')); ?>" class="btn btn-primary">Produtos</a>

<a href="<?php echo e(route('cart')); ?>" class="btn btn-primary">Carrinho</a>

<a href="<?php echo e(route('orders.clients')); ?>" class="btn btn-primary">Cliente</a>

<?php if($cart->getClient()): ?>
	<a href="<?php echo e(route('orders.parcels')); ?>" class="btn btn-primary">Parcelamento</a>
<?php endif; ?>

<a href="<?php echo e(route('orders.discount')); ?>" class="btn btn-primary">Desconto</a>

<a href="<?php echo e(route('orders.finish')); ?> " class="btn btn-primary">Finalizar</a>

<br><br>
