
	<div class="panel panel-defaul">	
		<div class="panel-heading">	
			<h4></h4>
		</div>

		<div class="panel-body">	
			<?php echo e(Form::open(['method' => 'post', 'route' => 'orders.store'])); ?>

			<?php echo e(Form::button('Finalizar', ['type' => 'submit', 'class' => 'btn btn-success'])); ?>

			<?php echo e(Form::close()); ?>

		</div>
	</div>

