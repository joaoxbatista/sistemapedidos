<?php $__env->startSection('title'); ?> Dashboard | Perfil <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <a href="<?php echo e(route('sallers')); ?>" class="btn btn-default">Voltar</a><br><br>

    <?php echo e(Form::open(['method' => 'post', 'route' => 'profile.update', 'files' => true])); ?>

    <?php echo e(Form::hidden('user_id', Auth::user()->id)); ?>

    <?php echo e(Form::hidden('id', $user->id)); ?>


    <!-- Informações Pessoais e Documentos -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Informações pessoais e documentos</h4>
        </div>

        <div class="panel-body">
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group col-md-4">
                        <?php echo e(Form::label('name', 'Nome')); ?>

                        <?php echo e(Form::text('name', $user->name , ['class' => 'form-control', 'required'])); ?>

                    </div>

                </div>
                <?php if($user->image != null): ?>
                    <div class="row">
                        <div class="col-md-4">
                            <img class="img-rounded" width="180px" src="<?php echo e(asset('uploads/images/users/'.$user->image)); ?>" alt="">
                        </div>
                    </div>
                <?php endif; ?>

                <div class="row">
                    <div class="form-group col-md-4">
                        <?php echo e(Form::label('file', 'Fotografia')); ?>

                        <?php echo e(Form::file('file', ['class' => 'form-file'])); ?>

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
                <?php echo e(Form::label('email', 'E-mail')); ?>

                <?php echo e(Form::text('email', $user->email , ['class' => 'form-control'])); ?>

            </div>
        </div>
    </div><!--/ Informaçoes de Acesso -->

    <?php echo e(Form::submit('Atualizar', ['class' => 'btn btn-success'])); ?>

    <?php echo e(Form::close()); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>