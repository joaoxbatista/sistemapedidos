<?php $__env->startSection('title'); ?> Dashboard | Home <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <h3>Dashboard/Perfil</h3>
    <a href="<?php echo e(route('dashboard.home')); ?>" class="btn btn-default">Voltar</a><br><br>

    <p><strong>Nome:</strong> <?php echo e($user->name); ?></p>
    <p><strong>E-mail:</strong> <?php echo e($user->email); ?></p>
    <p><strong>Telefone:</strong> <?php echo e($user->phone); ?></p>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>