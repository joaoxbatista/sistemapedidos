<?php $__env->startSection('title'); ?> Dashboard | Home <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<a href="<?php echo e(route('sellers')); ?>" class="btn btn-default">Voltar</a><br><br>

<!-- Informações Financeiras -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Informações financeiras</h4>
	</div>

	<div class="panel-body">

		<div class="form-group col-md-3">
			<p><strong>Tipo do pagamento: </strong>
				<?php if($seller->payment != null and $seller->comission == null): ?>
					Salário
				<?php elseif($seller->payment == null and $seller->comission != null): ?>
					Comissão
				<?php elseif($seller->payment != null and $seller->comission != null): ?>
					Salário e Comissão
				<?php endif; ?>
			</p>
			<p>
				<?php if($seller->payment != null and $seller->comission == null): ?>
					<strong>Valor: </strong> R$<?php echo e($seller->payment); ?>

				<?php elseif($seller->payment == null and $seller->comission != null): ?>
					<strong>Porcentagem: </strong> <?php echo e($seller->comission); ?>%
				<?php elseif($seller->payment != null and $seller->comission != null): ?>
					<strong>Valor e Porcentagem: </strong> R$<?php echo e($seller->payment); ?>, <?php echo e($seller->comission); ?>%
				<?php endif; ?>
			</p>
		</div>

	</div>
</div><!--/ Informações Financeiras -->

<!-- Informações Pessoais e Documentos -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Informações pessoais e documentos</h4>
	</div>

	<div class="panel-body">
		<div class="col-md-12">
			<div class="row">
				<div class="form-group col-md-4">
					<p><strong>Nome: </strong><?php echo e($seller->name); ?></p>
				</div>

				<div class="form-group col-md-4">
					<p><strong>CPF: </strong><?php echo e($seller->cpf); ?></p>
				</div>
			</div>

			
			<div class="row">
				<div class="form-group col-md-4">
					<p><strong>Fotografia: </strong></p>
					<img class="img-rounded" width="180px" src="<?php echo e(asset($seller->image)); ?>" alt="<?php echo e($seller->name); ?>">

				</div>
			</div>
		</div>
	</div>
</div><!--/ Informações Pessoais e Documentos -->

<!-- Informaçoes de Acesso -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Informações de acesso</h4>
	</div>

	<div class="panel-body">
		<div class="form-group col-md-4">
			<p><strong>E-mail: </strong><?php echo e($seller->email); ?></p>
		</div>

	</div>
</div><!--/ Informaçoes de Acesso -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>