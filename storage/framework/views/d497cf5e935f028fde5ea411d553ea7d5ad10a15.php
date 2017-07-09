<?php $__env->startSection('content'); ?>
    <div class="container">
        <h3>Entrada de pedidos</h3>
        <div class="row">

            <div class=" col-md-2">
                <?php echo e(Form::open(['method' => 'post', 'route' => 'sales.add.product'])); ?>

                <div class="row">
                    <div class="form-group col-md-12">
                        <?php echo e(Form::label('product_id', 'Código do produto')); ?>

                        <?php echo e(Form::text('product_id', null, ['class' => 'form-control'])); ?>

                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                        <?php echo e(Form::label('quantity', 'Quantidade')); ?>

                        <?php echo e(Form::text('quantity', null, ['class' => 'form-control'])); ?>

                    </div>
                </div>


                <?php echo e(Form::button('Adicionar',['class' => 'btn btn-primary', 'type' => 'submit'])); ?>


                <?php echo e(Form::close()); ?>

            </div>

            <div class="col-md-2">
                <?php echo e(Form::open(['method' => 'post', 'route' => 'sales.add.saller'])); ?>

                <div class="row">
                    <div class="col-md-12 form-group">
                        <?php echo e(Form::label('saller_id', 'Código do Vendedor')); ?>

                        <?php echo e(Form::text('saller_id', null, ['class' => 'form-control'])); ?>


                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <?php echo e(Form::button('Adicionar',['class' => 'btn btn-primary', 'type' => 'submit'])); ?>

                    </div>
                </div>

                <?php echo e(Form::close()); ?>


            </div>

            <div class="col-md-2">
                <?php echo e(Form::open(['method' => 'post', 'route' => 'sales.add.client'])); ?>

                <div class="row">
                    <div class="col-md-12 form-group">
                        <?php echo e(Form::label('client_id', 'Código do Cliente')); ?>

                        <?php echo e(Form::text('client_id', null, ['class' => 'form-control'])); ?>


                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <?php echo e(Form::button('Adicionar',['class' => 'btn btn-primary', 'type' => 'submit'])); ?>

                    </div>
                </div>

                <?php echo e(Form::close()); ?>


            </div>




        </div>

        <?php echo $__env->make('dashboard.cart.cart', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.simple', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>