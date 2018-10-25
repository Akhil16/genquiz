<?php
    $title = $quiz->title;
    $description = $quiz->description;
    $keywords = "quiz, " . $title . " " . $description;
    $author = "Genquiz";
    $url = "http://genquiz.tk";
    $site_name = "genquiz.tk";
    if($quiz->quiz_cover !== "quiz-default-cover.png") {
    	$image_url = url('/images/' . $quiz->quiz_cover);
    }
?>


<?php $__env->startSection('style'); ?>
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
	<style type="text/css">
		body {
			font-family: 'Oswald', sans-serif;
			font-size: 18px;
		}
		ul > a {
			text-decoration: none;
		}
		ul > a:link {
		    text-decoration: none;
		}

		ul > a:visited {
		    text-decoration: none;
		}

		ul > a:hover {
		    text-decoration: none;
		}

		ul > a:active {
		    text-decoration: none;
		}
		.selected{
			color: #666;
			position: relative;
		    display: block;
		    padding: 10px 15px;
		    background-color: #fff;
	        border: 1px solid #f1a909;
	        box-shadow: 0 0 20px 2px #f1a909;
		}

		.list-group-item-correct{
			background-color: #47f449;
			border: 2px solid steelblue;
			box-shadow: 0 0 20px 2px #428bca;			
		}
	</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="container-fluid mt">
		<div id="quiz-well">
			<div class="bg-theme padding_25">
				<div class="row">
					<div class="col-md-2 col-md-offset-1 col-sm-6 col-xs-6 mb">
								<img class="img-thumbnail" src="<?php echo e(URL::asset('uploads/quizcover/' . $quiz->quiz_cover)); ?>" alt="<?php echo e(ucwords($quiz->title) . ',' . ucwords($quiz->description)); ?>"  style="height: 180px; width: 120px;
								border: 5px solid #666; box-shadow: 0 0 15px #666;">
							</div>
							<div  class="col-md-9 col-sm-6 col-xs-6">
								<div class="row">
									<div class="col-md-2 col-md-offset-1 col-sm-12 col-xs-12">
										<strong>Title:</strong>
									</div>
									<div class="col-md-9 col-sm-12 col-xs-12">
										<?php echo e(ucwords($quiz->title)); ?>

									</div>
									<div class="col-xs-12">&nbsp;</div>
								</div>
								<div class="row">
									<div class="col-md-2 col-md-offset-1  col-sm-12 col-xs-12">
										<strong>Description:</strong>
									</div>
									<div class="col-md-9  col-sm-12 col-xs-12" style="text-overflow:ellipsis;overflow:hidden;height: 70px;">
										<?php echo e($quiz->description); ?>

									</div>
							<div class="col-xs-12">&nbsp;</div>
						</div>
					</div>
					<div class="row mt">
						<div class="col-md-10 col-md-offset-1 col-xs-12">
							<?php if(sizeof($result) > 0): ?> 
				              <button class="btn btn-danger btn-block"  id="start-quiz-btn">Continue Quiz</button> 
				            <?php else: ?> 
				              <button class="btn btn-primary btn-block"  id="start-quiz-btn">Start Quiz</button> 
				            <?php endif; ?> 
						</div>
						<form id="start-quiz-form" method="post">
						<?php if(Auth::check()): ?>
							<input type="hidden" name="player_user_unique" value="<?php echo e(Auth::user()->user_unique); ?>">
							<?php if(sizeof($result) > 0): ?> 
				               <input type="hidden" name="endtime" value="<?php echo e(date('Y-m-d H:i:s' , (strtotime($result->created_at) + $quiztime))); ?>"> 
				               <input type="hidden" name="question_number" value="<?php echo e($result->completed_question); ?>"> 
				               <input type="hidden" name="play_unique" value="<?php echo e($result->play_unique); ?>"> 
				               <input type="hidden" name="continue_quiz" value="true"> 
				             <?php endif; ?> 
						<?php endif; ?>
							<input type="hidden" name="quiz_unique" value="<?php echo e($quiz->quiz_unique); ?>">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	
	<script>
		var start_quiz_url = "<?php echo e(url('quiz/play/' . $quiz->quiz_slug)); ?>";
		var result_base_url = "<?php echo e(url('result/quiz')); ?>" + "/"; 
	</script>
	<script type="text/javascript" src="<?php echo e(URL::asset('js/playquiz.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>