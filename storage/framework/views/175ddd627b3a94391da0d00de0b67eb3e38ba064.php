<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $__env->yieldContent('title'); ?></title>

        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/app.css')); ?>">
        <?php echo $__env->yieldContent('styles'); ?>
    </head>
    <body>

        <div class="content">
            <div id="alert-area">
                <?php if(session()->has('success-message')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session()->get('success-message')); ?>

                    </div>
                <?php endif; ?>

                <?php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>

            <?php echo $__env->yieldContent('content'); ?>
        </div>

        <?php echo $__env->yieldContent('scripts'); ?>
    </body>
</html>
