<?php $__env->startSection('content'); ?>
	<div class="container-fluid">
		<div class="well">
			<?php if(session()->has('message')): ?>
				<div class="alert alert-success">
				    <strong><?php echo e(session()->get('message')); ?></strong>
				</div>
			<?php endif; ?>
			<h1>Edit Quiz</h1>
			<form action="<?php echo e(url('profile/update-quiz')); ?>" method="post" enctype="multipart/form-data">
				<div class="form-group <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
				    <label>Quiz Title</label>
				    <input type="text" class="form-control" name="title" maxlength="40" value="<?php echo e($quiz->title); ?>">
				</div>

				<?php if($errors->has('title')): ?>
				    <div class="alert alert-danger">
				        <strong><?php echo e($errors->first('title')); ?></strong>
				    </div>
				<?php endif; ?>

				<div class="form-group <?php echo e($errors->has('description') ? 'has-error' : ''); ?>">
				    <label>Quiz Description</label>
				    <textarea class="form-control" name="description"><?php echo e($quiz->description); ?>

				    </textarea>
				</div>

				<?php if($errors->has('description')): ?>
				    <div class="alert alert-danger">
				        <strong><?php echo e($errors->first('description')); ?></strong>
				    </div>
				<?php endif; ?>

				<div class="form-group <?php echo e($errors->has('quiz_cover') ? 'has-error' : ''); ?>">
				    <label>Quiz Cover (optional)</label>
				    <input type="file" name="quiz_cover" class="form-control">
				</div>

				<div>
					<img  class="img-thumbnail" src="<?php echo e(URL::asset('uploads/quizcover/' . $quiz->quiz_cover)); ?>" alt="<?php echo e(ucwords($quiz->title) . ',' . ucwords($quiz->description)); ?>"  style="height: 180px; width: 120px;">
				</div>
				<br>

				<?php if($errors->has('quiz_cover')): ?>
				    <div class="alert alert-danger">
				        <strong><?php echo e($errors->first('quiz_cover')); ?></strong>
				    </div>
				<?php endif; ?>

				<input type="hidden" name="old_title" value="<?php echo e($quiz->title); ?>">
				<input type="hidden" name="quiz_unique" value="<?php echo e($quiz->quiz_unique); ?>">
				<?php echo e(csrf_field()); ?>

				<input type="submit" class="btn btn-danger" value="Update Quiz">
			</form>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>