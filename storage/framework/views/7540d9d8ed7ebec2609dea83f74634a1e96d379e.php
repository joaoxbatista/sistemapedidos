<?php $__env->startSection('title'); ?> Dashboard | Home <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<h3>Dashboard - Cliente - Home</h3>

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
			</tr>
		</thead>

		<tbody>
			<?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($client->id); ?></td>
				<td><a href="<?php echo e(route('saller.clients.show', ['id' => $client->id])); ?>"><?php echo e($client->name); ?></a></td>
				<td><?php echo e($client->cpf); ?></td>
				<td><?php echo e($client->phone); ?></td>
				<td><?php echo e($client->email); ?></td>
				<td><?php echo e($client->cep); ?></td>
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
<?php echo $__env->make('template.saller-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>