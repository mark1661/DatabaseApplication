<?php $__env->startSection('content'); ?>
  <h1>Log In</h1>
  <div class="panel-heading">
    <h3 class="panel-title">Please log in with your username and password</h3>
  </div>
  <hr>
  <?php echo Form::open(['url' => 'login/submit']); ?>

  <div class="form-group">
    <?php echo e(Form::label('username', 'Username:')); ?>

    <?php echo e(Form::text('username', '', ['class' => 'form-control', 'placeholder' => 'Enter Username'])); ?>

  </div>
  <div class="form-group">
    <?php echo e(Form::label('password', 'Password:')); ?>

    <?php echo e(Form::password('password', array('class' => 'form-control', 'placeholder' => 'Enter Password'))); ?>

  </div>
  <div>
    <?php echo e(Form::submit('Submit', ['class' => 'btn btn-success'])); ?>

  </div>
  <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>