<?php $__env->startSection('content'); ?>
	<div class="container-fluid">
		<?php if(sizeof($quiz) > 0): ?>
			<div class="well table-responsive">
				<table class="table table-striped">
					<thead>
					    <tr>
						    <th class="col-md-1">#</th>
						    <th class="col-md-2">Title</th>
						    <th class="col-md-4">Description</th>
						    <th class="col-md-1">No. of Questions</th>
						    <th class="col-md-2">Edit Quiz</th>
						    <th class="col-md-2">Add Questions</th>
					    </tr>
					</thead>
				  	<tbody>
				  		<?php $count = 1; ?>
				  		<?php $__currentLoopData = $quiz; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $q): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						    <tr>
						    	<td scope="row" class="col-md-1"><?php echo e($count++); ?></td>
						    	<td class="col-md-2"><?php echo e(ucwords($q->title)); ?></td>
						      	<td class="col-md-4"><?php echo e($q->description); ?></td>
						      	<td class="col-md-1"><?php echo e($q->num_ques); ?></td>
						      	<td class="col-md-2"><a class="btn btn-warning" href="<?php echo e(url('profile/edit-quiz/' . $q->quiz_unique)); ?>">Edit</a></td>
						      	<td class="col-md-2"><a class="btn btn-primary" href="<?php echo e(url('profile/add-question/' . $q->quiz_unique)); ?>">Add</a></td>
						    </tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>

				<div class="text-center"><?php echo e($quiz->links()); ?></div>
			</div>
		<?php else: ?>
			<div class="alert alert-danger">No Quizzes Yet</div>
		<?php endif; ?>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>