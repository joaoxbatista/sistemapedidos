<?php $__env->startSection('title'); ?> Dashboard | Home <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<a href="<?php echo e(route('dashboard.home')); ?>" class="btn btn-default">Voltar</a>

<a href="<?php echo e(route('sellers.create')); ?>" class="btn btn-success">Novo <i class="fa fa-plus"></i> </a><br><br>
<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Tabela de vendedores</h4>
	</div>

	<div class="panel-body">

		<div class="table-responsive">
			<table id="data-table" class="table table-bordered">
				<thead>
				<tr>
					<th width="40px">Código</th>
					<th width="80px">Imagem</th>
					<th>Nome</th>
					<th>CPF</th>
					<th class="option-table-header"></th>
				</tr>
				</thead>

				<tbody>
				<?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($seller->id); ?></td>
						<td>

							<img class="img-rounded" width="80px" src="<?php echo e(asset($seller->image)); ?>" alt="">

						</td>
						<td><?php echo e($seller->name); ?></td>
						<td><?php echo e($seller->cpf); ?></td>
						<td>
							<ul class="option-table">
								<li><a href="<?php echo e(route('sellers.show', ['id' => $seller->id])); ?>" class="opt opt-view"><i class="fa fa-eye"></i></a></li>
								<li><a href="<?php echo e(route('sellers.edit', ['id' => $seller->id])); ?>" class="opt opt-edit"><i class="fa fa-pencil"></i></a></li>
								<li><a href="<?php echo e(route('sellers.delete', ['id' => $seller->id])); ?>" class="opt opt-delete"><i class="fa fa-trash"></i></a></li>
							</ul>
						</td>
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
<?php echo $__env->make('template.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>