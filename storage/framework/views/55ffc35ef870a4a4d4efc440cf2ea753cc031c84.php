<?php $__env->startSection('content'); ?>

<table class="table" id="datatable">
	<thead>
		
		<tr>
			<th>ID</th>
			<th>Nome</th>
		</tr>
	</thead>

</table>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	<script src="<?php echo e(asset('js/jquery.dataTables.js')); ?>"></script>
	<script src="<?php echo e(asset('js/custom-dataTables.js')); ?>"></script>
	<script>
		function dataTableProdutcs(){
			$("#datatable").DataTable({
				"ajax" : {
					"url" : "/cart/items"
				},
				"columns": [
		            { "data": "id" },
		            { "data": "name" },
		        ]
			});
		}
		$(function(){
			dataTableProdutcs();
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>