<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="col-md-4 col-md-offset-4">
        <hb-admin-login 
            action="<?php echo e(route('login')); ?>" 
            method="post"
            token="<?php echo e(csrf_token()); ?>"
        >
        </hb-admin-login>
    </div>    
</div>

<!-- <div class="conatiner">
    <div class="col-md-4 col-md-offset-4" id="form-login">
        <h3>Área administrativa</h3>
        <?php echo e(Form::open(['route' => 'login'])); ?>

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
</div> -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.simple', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>