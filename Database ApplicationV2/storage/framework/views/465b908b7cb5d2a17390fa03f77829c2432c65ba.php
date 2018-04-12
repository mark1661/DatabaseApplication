<?php $__env->startSection('content'); ?>
<h1>Support</h1>
<p>Got any issues? Report them here and our adminstrators can help you!</p>
<hr>
  <?php echo Form::open(['url' => 'contact/submit']); ?>

  <div class="form-group">
    <?php echo e(Form::label('name', 'Name')); ?>

    <?php echo e(Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter Name'])); ?>

  </div>
  <div class="form-group">
    <?php echo e(Form::label('email', 'E-Mail Address')); ?>

    <?php echo e(Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Enter email'])); ?>

  </div>
  <div class="form-group">
    <?php echo e(Form::label('message', 'Message')); ?>

    <?php echo e(Form::textarea('message', '', ['class' => 'form-control', 'placeholder' => 'Enter Message'])); ?>

  </div>
  <div>
    <?php echo e(Form::submit('Submit Support Ticket', ['class' => 'btn btn-primary'])); ?>

  </div>
  <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>