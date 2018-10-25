<?php $__env->startSection('style'); ?>
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
	<style type="text/css">
		body {
			font-family: 'Oswald', sans-serif;
			font-size: 18px;
		}
	</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
	<div class="container-fluid"> 
		<h1>Quizzes : <hr></h1>                     
      <div class="row">
      <!-- SERVER STATUS PANELS -->
        <?php if(sizeof($quizzes) > 0): ?>
	        <?php $__currentLoopData = $quizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>              	              	
				<div class="col-md-4 mb" style="margin: 5px;">
					<div class="row bg-theme padding_25">
						<div class="col-md-6 col-xs-6">
							<img class="img-thumbnail img-responsive" src="<?php echo e(URL::asset('uploads/quizcover/' . $quiz->quiz_cover)); ?>" alt="<?php echo e(ucwords($quiz->title) . ',' . ucwords($quiz->description)); ?>"  style="height: 180px; width: 120px;
							border: 5px solid #666; box-shadow: 0 0 15px #666;">
						</div>
						<div  class="col-md-6 col-xs-6 ">
							<div class="row">
								<div class="col-xs-12">
									<strong>Title :</strong>
								</div>
								<div class="col-xs-12" style="height: 50px;">
									<?php echo e(ucwords($quiz->title)); ?>

								</div>
								<div class="col-xs-12">&nbsp;</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<strong>Description:</strong>
								</div>
								<div class="col-xs-12" style="text-overflow:ellipsis;overflow:hidden;height: 70px;">
									<?php echo e($quiz->description); ?>

								</div>
								<div class="col-xs-12">&nbsp;</div>
							</div>
						</div>
						<div class="row" >
				            <div class="col-md-12 ml mr ">
				            	<a href="<?php echo e(url('quiz/' . $quiz->quiz_slug)); ?>">
				            			<button class="btn btn-primary btn-block"  id="start-quiz-btn">Play Quiz</button>
				            	</a>
				            </div>
						</div>
					</div>
				</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<div class="text-center">
				<?php echo e($quizzes->links()); ?>

			</div>
		<?php else: ?>
			<div>No Quizzes</div>
		<?php endif; ?>
		
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>