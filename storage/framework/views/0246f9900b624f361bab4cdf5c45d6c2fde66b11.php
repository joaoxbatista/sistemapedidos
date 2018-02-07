<?php $__env->startSection('title'); ?> Dashboard | Home <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <h3>Dashboard/Perfil</h3>
    <a href="<?php echo e(route('seller.dashboard')); ?>" class="btn btn-default">Voltar</a><br><br>



    <div class="panel panel-default">
        <div class="panel-heading">
            Informações financeiras
        </div>

        <div class="panel-body">
            <div class="col-md-2">
                <h4>Vendas</h4>
                <?php if($seller->sales != null): ?>
                    <p><?php echo e($seller->sales); ?></p>
                <?php else: ?>
                    <p>Nenhuma venda efetuada</p>
                <?php endif; ?>
            </div>

            <div class="col-md-2">
                <h4>Pagamento</h4>
                <?php if($seller->payment != null): ?>
                    <p>R$ <?php echo e($seller->payment); ?></p>
                <?php else: ?>
                    <p>Pagamento não definido</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="panel panel-default" id="perfil-contact">
        <div class="panel-heading">
            Informações da Conta
        </div>
        <div class="panel-body">
            <?php echo e(Form::open()); ?>

            <div class="row">
                <div class="form-group col-md-4">
                    <?php echo e(Form::label('name', 'Nome')); ?>

                    <?php echo e(Form::text('name', $seller->name, ['class' => 'form-control'])); ?>

                </div>

                <div class="form-group col-md-4">
                    <?php echo e(Form::label('email', 'E-mail')); ?>

                    <?php echo e(Form::email('email', $seller->email, ['class' => 'form-control'])); ?>

                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <img width="100px" src="<?php echo e(asset('uploads/images/sellers/'.$seller->image)); ?>" alt=""><br><br>
                    <?php echo e(Form::file('file', ['class' => 'form-file'])); ?>

                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <?php echo e(Form::button('<i class="fa fa-refresh"></i> Atualizar', ['class' => 'btn btn-success', 'type' => 'submit'])); ?>

                </div>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.seller-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>