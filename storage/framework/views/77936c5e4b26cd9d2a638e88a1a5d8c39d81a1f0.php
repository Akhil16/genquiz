<?php
    $title = "I scored " . $result->score . "% in quiz - " . $quiz->title . " - Can You?";
    $description = $quiz->description;
    $keywords = "quiz, " . $title . " " . str_replace(" ", ", ", $title);
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
			color: #000;
		}
	</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="container-fluid">
		<div class="bg-theme padding_25 mb">
			<div class="row">
				<div class="col-md-2 col-md-offset-1 col-sm-12 col-xs-12">
					<strong>Quiz : </strong>
				</div>
				<div class="col-md-9 col-sm-12 col-xs-12">
					<?php echo e(ucwords($quiz->title)); ?>

				</div>
				<div class="col-xs-12">&nbsp;</div>
			</div>
			<div class="row">
				<div class="col-md-2 col-md-offset-1  col-sm-12 col-xs-12">
					<strong>Description : </strong>
				</div>
				<div class="col-md-9  col-sm-12 col-xs-12">
					<?php echo e($quiz->description); ?>

				</div>
				<div class="col-xs-12">&nbsp;</div>
			</div>
			<div class="row">
				<div class="col-md-9 col-md-offset-3  col-sm-12 col-xs-12" style="font-size: 28px;">
					<?php echo e($result->player_user_unique ? ucwords($result->player->name) : "You"); ?> Scored <?php echo e($result->score); ?>%
				</div>
				<div class="mt col-md-offset-1 col-md-10 col-sm-12 col-xs-12">
					<a href="<?php echo e(url('/quiz/' . $quiz->quiz_slug)); ?>" class="btn btn-block btn-danger">Play Again</a>
				</div>
				<div class="col-xs-12">&nbsp;</div>
			</div>
		</div>
		<div class="well">
			<div class="row">
				<div class="col-md-9 col-md-offset-1 col-sm-12 col-xs-12" id="website-url"><?php echo e(url('result/quiz/' . $quiz->quiz_slug . '/play/' . $result->play_unique)); ?></div>
				<div class="col-md-2 col-sm-12 col-xs-12">
					<button class="btn btn-primary pull-right" id="copy-url-btn">Copy to Clipboard</button>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	<script type="text/javascript">
		$(document).ready(function() {

			$('#copy-url-btn').on('click' ,function(){

				var $temp = $("<input>");
				$("body").append($temp);
				$temp.val($('#website-url').text()).select();
				document.execCommand("copy");
				$temp.remove();
				$(this).removeClass('btn-primary').addClass('btn-danger').text('Copied..!');
				setTimeout(function() {
					$('#copy-url-btn').removeClass('btn-danger').addClass('btn-primary').text('Copy to Clipboard');
				} , 3000);
			});
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>