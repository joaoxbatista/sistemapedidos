<?php $__env->startSection('title'); ?> Dashboard | Home <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<h3>Dashboard - Fornecedores - Home</h3>
<a href="/dashboard" class="btn btn-default">Voltar</a>

<a href="/dashboard/providers/create" class="btn btn-success">Novo <i class="fa fa-plus"></i> </a><br><br>

<div class="table-responsive">
	<table id="data-table" class="table table-bordered">

		<thead>
			<tr>
				<th>name</th>
				<th>cnpj</th>
				<th>phone</th>
				<th>email</th>
				<th>cep</th>
				<th class="option-table-header"></th>
			</tr>
		</thead>

		<tbody>
			<?php $__currentLoopData = $providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($provider->name); ?></td>
				<td><?php echo e($provider->cnpj); ?></td>
				<td><?php echo e($provider->phone); ?></td>
				<td><?php echo e($provider->email); ?></td>
				<td><?php echo e($provider->cep); ?></td>
				<td>
					<ul class="option-table">
						<li><a href="/dashboard/providers/<?php echo e($provider->id); ?>" class="opt opt-view"><i class="fa fa-eye"></i></a></li>
						<li><a href="/dashboard/providers/<?php echo e($provider->id); ?>/edit" class="opt opt-edit"><i class="fa fa-pencil"></i></a></li>
						<li><a href="/dashboard/providers/<?php echo e($provider->id); ?>/delete" class="opt opt-delete"><i class="fa fa-trash"></i></a></li>
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