<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="token" id="token" content="<?php echo e(csrf_token()); ?>">
    <title>CRUD LaraVue</title>
    <link rel="stylesheet" href="<?php echo e(asset('bootstrap/dist/css/bootstrap.min.css')); ?>">
  </head>
  <body>
    <div class="container">
      <?php echo $__env->yieldContent('content'); ?>
    </div>

    <script src="js/vendor.js" charset="utf-8"></script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
  </body>
</html>
