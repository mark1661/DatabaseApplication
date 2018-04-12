<?php $__env->startSection('content'); ?>
<h1>Add Movie</h1>
<p>Add a new movie to the site! (Only  Admins)</p>
<hr>
<div class="form-group">
  <?php echo Form::open(['url' => 'admin/submitMovie', 'files' => true]); ?>

  <div class="form-group">
    <?php echo e(Form::label('moviename', 'Movie Name:')); ?>

    <?php echo e(Form::text('moviename', '', ['class' => 'form-control', 'placeholder' => 'Enter Movie Title'])); ?>

  </div>
  <div class="form-group">
    <?php echo e(Form::label('moviereleasedate', 'Movie Release Date:')); ?>

    <?php echo e(Form::date('moviereleasedate', '', ['class' => 'form-control'])); ?>

  </div>
  <div class="form-group">
    <?php echo e(Form::label('moviedirector', 'Movie Name:')); ?>

    <?php echo e(Form::text('moviedirector', '', ['class' => 'form-control', 'placeholder' => 'Enter Movie Director'])); ?>

  </div>
  <div class="form-group">
    <?php echo e(Form::label('movieposter', 'Movie Poster:')); ?>

    <?php echo e(Form::file('movieposter', ['accept' => '.jpg, .png'])); ?>

  </div>
  <div class="form-group">
    <?php echo e(Form::label('movieactors', 'Movie Actors:')); ?>

    <?php echo e(Form::text('movieactors', '', ['class' => 'form-control', 'placeholder' => 'Enter Movie Actors (comma separated if there is more than 1)'])); ?>

  </div>
  <?php echo Form::close(); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>