<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/login.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div id="seller-login">
    <div class="conatiner">
    <div class="col-md-4 col-md-offset-4" id="form-login">
        <h3>Área Vendedor</h3>
        <?php echo e(Form::open(['route' => 'seller.login'])); ?>

            <div class="form-group">
                <label for="">Insira seu e-mail</label>
                <?php echo e(Form::text('email', '', ['class' => 'form-control'])); ?>

            </div>

            <div class="form-group">
                <label for="">Insira sua senha</label>
                <?php echo e(Form::password('password',['class' => 'form-control'])); ?>

            </div>

            <?php echo e(Form::submit('Entrar', ['class' => 'btn btn-success'])); ?>

            <a href="<?php echo e(route('password.request')); ?>"> Esqueceu sua senha?</a>

        <?php echo e(Form::close()); ?>

    </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.simple', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>