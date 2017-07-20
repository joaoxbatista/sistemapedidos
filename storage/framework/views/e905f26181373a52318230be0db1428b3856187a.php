<?php $__env->startSection('content'); ?>

    <section>
        <h3>Informações da Compra</h3>
        <table>
            <tbody>
            <tr>
                <td width="10%"><strong>Código</strong></td>
                <td><?php echo e($order->id); ?></td>
            </tr>

            <tr>
                <td width="10%"><strong>Data de compra</strong></td>
                <td><?php echo e($order->buy_date); ?></td>
            </tr>

            <tr>
                <td width="10%"><strong>Total a ser pago</strong></td>
                <td>R$ <?php echo e($order->total); ?></td>
            </tr>

            </tbody>
        </table>
    </section>

    <?php if($order->seller): ?>
        <section>
            <h3>Informações do Vendedor</h3>
            <table>
                <tbody>

                <tr>
                    <td width="10%"><strong>Código</strong></td>
                    <td><?php echo e($order->seller->id); ?></td>
                </tr>

                <tr>
                    <td width="10%"><strong>Nome</strong></td>
                    <td><?php echo e($order->seller->name); ?></td>
                </tr>

                </tbody>
            </table>
        </section>
    <?php endif; ?>

    <?php if($order->cliente): ?>
        <section>
            <h3>Informações do Cliente</h3>
            <table>
                <tbody>

                <tr>
                    <td width="10%"><strong>CPF</strong></td>
                    <td><?php echo e($order->client->cpf); ?></td>
                </tr>

                <tr>
                    <td width="10%"><strong>Nome</strong></td>
                    <td><?php echo e($order->client->name); ?></td>
                </tr>

                <tr>
                    <td width="10%"><strong>Endereço</strong></td>
                    <td>CEP: <?php echo e($order->client->cep); ?>; Rua: <?php echo e($order->client->street); ?>; Bairro: <?php echo e($order->client->district); ?>; Cidade: <?php echo e($order->client->city); ?>; Estado: <?php echo e($order->client->state); ?>. </td>
                </tr>

                </tbody>
            </table>
        </section>
    <?php endif; ?>

    <section>
        <h3>Informações dos Items</h3>
        <table>
            <thead>
            <tr>
                <th>Produto</th>
                <th>Preço unitário</th>
                <th>Quantidade</th>
                <th>Subtotal</th>
            </tr>
            </thead>

            <tbody>
            <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($item->name); ?></td>
                    <td>R$ <?php echo e($item->unit_price); ?></td>
                    <td><?php echo e($item->pivot->qtd_itens); ?></td>
                    <td>R$ <?php echo e($item->pivot->total); ?> </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>

            <tfoot>
            <tr>
                <td></td>
                <td></td>
                <td><strong>Total</strong></td>
                <td class="total">R$ <?php echo e($order->total); ?></td>
            </tr>
            </tfoot>
        </table>
    </section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.pdf', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>