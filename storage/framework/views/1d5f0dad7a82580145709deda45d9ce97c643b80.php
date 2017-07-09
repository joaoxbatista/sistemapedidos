<?php $__env->startSection('title'); ?> Dashboard | Home <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<h3>Dashboard/Vendedores/Home</h3>
<a href="<?php echo e(route('dashboard.home')); ?>" class="btn btn-default">Voltar</a>

<a href="<?php echo e(route('sallers.create')); ?>" class="btn btn-success">Novo <i class="fa fa-plus"></i> </a><br><br>

<div class="table-responsive">
	<table id="data-table" class="table table-bordered">
		<thead>
			<tr>
				<th>Nome</th>
				<th>CPF</th>
				<th>E-mail</th>
				<th>Salário</th>
				<th>Vendas</th>
				<th class="option-table-header"></th>
			</tr>
		</thead>

		<tbody>
			<?php $__currentLoopData = $sallers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $saller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($saller->name); ?></td>
					<td><?php echo e($saller->cpf); ?></td>
					<td><?php echo e($saller->email); ?></td>
					<td><?php echo e($saller->payment); ?></td>
					<th><?php echo e($saller->sales); ?></th>
					<td>
						<ul class="option-table">
							<li><a href="<?php echo e(route('sallers.show', ['id' => $saller->id])); ?>" class="opt opt-view"><i class="fa fa-eye"></i></a></li>
							<li><a href="<?php echo e(route('sallers.edit', ['id' => $saller->id])); ?>" class="opt opt-edit"><i class="fa fa-pencil"></i></a></li>
							<li><a href="<?php echo e(route('sallers.destroy', ['id' => $saller->id])); ?>" class="opt opt-delete"><i class="fa fa-trash"></i></a></li>
						</ul>
					</td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('js/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('js/custom-dataTables.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>