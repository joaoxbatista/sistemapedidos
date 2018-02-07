	<div id="products" class="tab-pane fade in active">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Seleção de Produtos</h4>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table id="data-table" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Código</th>
								<th>Imagem</th>
								<th>Nome</th>
								<th>Preço unitário</th>
								<th>Fornecedor</th>
								<th width="40px">Quantidade</th>
								<th width="40px"></th>
							</tr>
						</thead>

						<tbody>
							<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($product->id); ?> </td>
								<?php if($product->image != null): ?>
								<td><img width="60px" src="<?php echo e(asset('uploads/images/products/'.$product->image)); ?>" alt=""></td>
								<?php else: ?>
								<td><img width="60px" src="<?php echo e(asset('uploads/images/products/no-image.png')); ?>" alt=""></td>
								<?php endif; ?>
								<td><?php echo e($product->name); ?></td>
								<td><?php echo e($product->unit_price); ?></td>
								<td><?php echo e($product->provider->name); ?></td>
								<input type="hidden" class="id-product" value="<?php echo e($product->id); ?>">

								<td><input type="text" class="form-control product-quantity"></td>

								<td><button class="btn-add-product btn btn-success">Adicionar</button></td>
								<!-- <?php echo e(Form::open(['method' => 'post', 'route' => 'cart.add'])); ?>

								<td>
									<?php echo e(Form::hidden('product_id', $product->id, ['class' => 'form-control'])); ?>

									<?php echo e(Form::text('quantity', 1, ['class' => 'form-control'])); ?>

								</td>
								<td>
									<button type="sumbit" class="btn btn-success" style="float: right"><i class="fa fa-plus"></i></button>
								</td>
								<?php echo e(Form::close()); ?>

							</tr> -->
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>
				</div>
				
			</div>
		</div>
	</div>

