<?php $__env->startSection('style'); ?>

	<style type="text/css">
		
	</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<div class="container-fluid">
		<h1 class="text-center">Quiz Title : <?php echo e($quiz->title); ?></h1>
			
		<div class="well">
			<?php if(session()->has('message')): ?>
				<div class="alert alert-success">
				    <strong><?php echo e(session()->get('message')); ?></strong>
				</div>
			<?php endif; ?>
			<h1>Edit Question</h1>
			<form action="<?php echo e(url('profile/update-question')); ?>" method="post" id="add-question-form">
				<div class="form-group <?php echo e($errors->has('question') ? 'has-error' : ''); ?>" id="question_div">
				    <label>Question <?php echo e($question->question_number); ?></label>
				    <input type="text" class="form-control" name="question" value="<?php echo e($question->question); ?>">
				</div>

				<div id="question_feedback" style="display: none;">
				</div>

				<?php if($errors->has('question')): ?>
				    <div class="alert alert-danger">
				        <strong><?php echo e($errors->first('question')); ?></strong>
				    </div>
				<?php endif; ?>

				<div class="form-group <?php echo e($errors->has('question_type') ? 'has-error' : ''); ?>">
				    <label>Question Type</label>
				    <select class="form-control" name="question_type" id="question_type">
				    	<option value="single choice" <?php if($question->question_type == "single choice"): ?> selected <?php endif; ?>>Single Choice</option>
				    	<option value="multiple choice" <?php if($question->question_type == "multiple choice"): ?> selected <?php endif; ?>>Multiple Choice</option>
				    	<option value="text" <?php if($question->question_type == "text"): ?> selected <?php endif; ?>>Text</option>
				    </select>
				</div>

				<div class="form-group"  id="options-list-div" <?php if($question->question_type == "text"): ?> style="display : none;" <?php endif; ?>>
					<label>Options :</label>
					<table class="table">
						<thead>
							<tr>
								<th>Content</th>
								<th>Answer</th>
								<th>Delete Option</th>
							</tr>
						</thead>
						<tbody id="options-list">
							<?php  $char_val = 97; ?> 
							<?php if($question->question_type !== "text"): ?>
								<?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr id="row_option_<?php echo e(chr($char_val)); ?>" class="options-list-row">
										<td><input class="form-control option-input" type="text" name="option[]" placeholder="Please Enter Something" maxlength="80" value="<?php echo e($opt->option_content); ?>"></td>
										<td><input class="form-check-input answer-radio" type="radio" name="radio" value="<?php echo e(chr($char_val)); ?>" <?php if($question->question_type !== "single choice"): ?> style="display : none;" disabled="disabled" <?php endif; ?> <?php if(strpos($question->answer , $opt->option_unique) !== false): ?> checked <?php endif; ?>><input class="form-check-input answer-checkbox" type="checkbox" value="<?php echo e(chr($char_val)); ?>" <?php if($question->question_type !== "multiple choice"): ?> style="display : none;" disabled="disabled" <?php endif; ?> 
										<?php if(strpos($question->answer , $opt->option_unique) !== false): ?> checked <?php endif; ?>></td>
										<td><button class="btn btn-warning delete-option-btn" value="<?php echo e(chr($char_val)); ?>">Delete</button></td>
									</tr>
									<?php
										$char_val++; 
									?> 
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php else: ?>
								<tr id="row_option_a" class="options-list-row">
									<td><input class="form-control option-input" type="text" name="option[]" placeholder="Please Enter Something" maxlength="80" value=""></td>
									<td><input class="form-check-input answer-radio" type="radio" name="radio" value="a" checked><input class="form-check-input answer-checkbox" type="checkbox" value="a" style="display: none;" disabled="disabled" checked></td>
									<td><button class="btn btn-warning delete-option-btn" value="a">Delete</button></td>
								</tr>
								<?php  
									$char_val++; 
								?>
							<?php endif; ?>
							<tr id="add-option-row">
								<td><button class="btn btn-primary" id="add-option-btn" <?php if(($char_val - 97) == 4): ?> style="display: none;" <?php endif; ?>>Add Option</button></td>
							</tr>
						</tbody>
					</table>
					<div id="option_feedback"></div>
				</div>

				<div class="form-group" id="text-answer-div"  <?php if($question->question_type !== "text"): ?> style="display : none;" <?php endif; ?>>
					<label>Answer</label>
					<input type="text" class="form-control" id="text-answer" 
					value="<?php if($question->question_type == 'text')  echo $options[0]->option_content; ?>">
				</div>

				<div id="answer_feedback"></div>

				<input type="hidden" name="answer" value="">
				<input type="hidden" name="quiz_unique" value="<?php echo e($quiz->quiz_unique); ?>">
				<input type="hidden" name="question_unique" value="<?php echo e($question->question_unique); ?>">
				<?php echo e(csrf_field()); ?>

				<input type="submit" id="add-question-form-btn" class="btn btn-danger" value="Update Question">
			</form>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	<script type="text/javascript" src="<?php echo e(URL::asset('js/addquestion.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>