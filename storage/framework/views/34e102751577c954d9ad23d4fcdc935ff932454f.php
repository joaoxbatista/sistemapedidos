<?php $__env->startSection('title'); ?> Dashboard | Home <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<h3>Dashboard - Cliente - Home</h3>
<a href="/dashboard/" class="btn btn-default">Voltar</a>

<a href="/dashboard/clients/create" class="btn btn-success">Novo <i class="fa fa-plus"></i></a><br><br>

<div class="table-responsive">
	<table id="data-table" class="table table-bordered">
		
		<thead>
			<tr>
				<th>Código</th>
				<th>Nome</th>
				<th>CPF</th>
				<th>Telefone</th>
				<th>E-mail</th>
				<th>CEP</th>
				<th class="option-table-header"></th>
			</tr>
		</thead>

		<tbody>
			<?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($client->id); ?></td>
				<td><?php echo e($client->name); ?></td>
				<td><?php echo e($client->cpf); ?></td>
				<td><?php echo e($client->phone); ?></td>
				<td><?php echo e($client->email); ?></td>
				<td><?php echo e($client->cep); ?></td>
				<td>

				<ul class="option-table">
					<li><a href="/dashboard/clients/<?php echo e($client->id); ?>" class="opt opt-view"><i class="fa fa-eye"></i></a></li>
					<li><a href="/dashboard/clients/<?php echo e($client->id); ?>/edit" class="opt opt-edit"><i class="fa fa-pencil"></i></a></li>
					<li><a href="/dashboard/clients/<?php echo e($client->id); ?>/delete" class="opt opt-delete"><i class="fa fa-trash"></i></a></li>
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