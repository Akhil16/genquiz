<?php $__env->startSection('content'); ?>
	<div class="container-fluid">
		<?php if(sizeof($playedquiz) > 0): ?>
			<div class="well table-responsive">
				<table class="table table-striped">
					<thead>
					    <tr>
						    <th class="col-md-1">#</th>
						    <th class="col-md-3">Title</th>
						    <th class="col-md-4">Image</th>
						    <th class="col-md-2">Max Score</th>
						    <th class="col-md-2">Play Again</th>
					    </tr>
					</thead>
				  	<tbody>
				  		<?php $count = 1; ?>
				  		<?php $__currentLoopData = $playedquiz; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						    <tr>
						    	<td scope="row" class="col-md-1"><?php echo e($count++); ?></td>
						    	<td class="col-md-3"><?php echo e(ucwords($pq->quiz->title)); ?></td>
						      	<td class="col-md-4"><img class="img-thumbnail" src="<?php echo e(URL::asset('uploads/quizcover/' . $pq->quiz->quiz_cover)); ?>" alt="<?php echo e(ucwords($pq->quiz->title) . ',' . ucwords($pq->quiz->description)); ?>"  style="height: 180px; width: 120px;"></td>
						      	<td class="col-md-2"><?php echo e($pq->score); ?></td>
						      	<td class="col-md-2"><a class="btn btn-warning" href="<?php echo e(url('quiz/' . $pq->quiz->quiz_slug)); ?>">Play</a></td>
						    </tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>

				<div class="text-center"><?php echo e($playedquiz->links()); ?></div>
			</div>
		<?php else: ?>
			<div class="alert alert-danger">No Quizzes Played Yet</div>
		<?php endif; ?>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>