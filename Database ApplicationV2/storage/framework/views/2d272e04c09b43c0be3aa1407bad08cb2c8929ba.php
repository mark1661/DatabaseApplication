<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MyMovieList</title>
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body>
    <?php echo $__env->make('inc.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="container">
      <?php if(Request::is('/')): ?>
        <?php echo $__env->make('inc.showcase', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php endif; ?>
      <div class="row">
        <div class="col-md-8 col-lg-8">
          <?php echo $__env->make('inc.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php echo $__env->yieldContent('content'); ?>
        </div>
        <div class="col-md-4 col-lg-4">
          <?php echo $__env->make('inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
      </div>
    </div>

    <footer id="footer" class="text-center">
      <p>Copyright 2018 &copy; MyMovieList</p>
    </footer>
  </body>
</html>
