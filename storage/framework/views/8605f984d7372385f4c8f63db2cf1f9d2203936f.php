<?php $__env->startSection('title'); ?> Perfil <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


<?php echo e(Form::open(['method' => 'post', 'route' => 'admin-dashboard.profile.update', 'files' => true])); ?>

<?php echo e(Form::hidden('user_id', Auth::user()->id)); ?>

<?php echo e(Form::hidden('id', $user->id)); ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="header">
                    <h4 class="title">Atualizar Perfil</h4>
                </div>
                <div class="content">
                    <form>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <?php echo e(Form::label('name', 'Nome')); ?>

                                    <?php echo e(Form::text('name', $user->name , ['class' => 'form-control', 'required'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('email', 'E-mail')); ?>

                                    <?php echo e(Form::text('email', $user->email , ['class' => 'form-control'])); ?>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('file', 'Fotografia')); ?>

                                    <?php echo e(Form::file('file', ['class' => 'form-file'])); ?>

                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-info btn-fill pull-right">Atualizar Perfil</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">

            <hb-profile :user="<?php echo e($user); ?>"></hb-profile>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.admin-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>