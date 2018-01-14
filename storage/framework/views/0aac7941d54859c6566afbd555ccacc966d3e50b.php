<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<title><?php echo $__env->yieldContent('title'); ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/app.css')); ?>">
</head>
<body>
	<div id="app">
		<?php echo $__env->yieldContent('content'); ?>
	</div>
	<script type="text/javascript" src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>
</html>