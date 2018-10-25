<?php $__env->startSection('content'); ?>
	<div class="container-fluid">
		<h1 style="text-align: center;color: rgba(242, 58, 58, 0.84);
		"> Step: 1</h1>
		<hr>
		
		<div class="brick col-md-12">
			<?php if(session()->has('message')): ?>
				<div class="alert alert-success">
				    <strong><?php echo e(session()->get('message')); ?></strong>
				</div>
			<?php endif; ?>
			<h1>Add New Quiz</h1>
			<form action="<?php echo e(url('profile/save-quiz')); ?>" method="post" enctype="multipart/form-data">
				<div class="form-group <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
				    <label>Quiz Title</label>
				    <input type="text" class="form-control" name="title" maxlength="40">
				</div>

				<?php if($errors->has('title')): ?>
				    <div class="alert alert-danger">
				        <strong><?php echo e($errors->first('title')); ?></strong>
				    </div>
				<?php endif; ?>

				<div class="form-group <?php echo e($errors->has('description') ? 'has-error' : ''); ?>">
				    <label>Quiz Description</label>
				    <textarea class="form-control" name="description">
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

				<?php if($errors->has('quiz_cover')): ?>
				    <div class="alert alert-danger">
				        <strong><?php echo e($errors->first('quiz_cover')); ?></strong>
				    </div>
				<?php endif; ?>

				<input type="hidden" name="user_unique" value="<?php echo e(Auth::user()->user_unique); ?>">
				<?php echo e(csrf_field()); ?>

				<input type="submit" class="btn btn-danger" value="Add Quiz">
			</form>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>