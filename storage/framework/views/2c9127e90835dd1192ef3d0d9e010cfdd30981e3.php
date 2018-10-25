<?php $__env->startSection('style'); ?>

	<style type="text/css">
		
	</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<div class="container-fluid">
		<h1 class="text-center">Quiz Title : <?php echo e($quiz->title); ?></h1>
		<div class="col-md-12 brick">
			<?php if(isset($questions) && sizeof($questions) > 0): ?>
				<table class="table table-striped">
					<thead>
					    <tr>
						    <th>#</th>
						    <th>Question</th>
						    <th>Question Type</th>
						    <th>Edit Question</th>
					    </tr>
					</thead>
				  	<tbody>
				  		<?php $count = 1; ?>
				  		<?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $q): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						    <tr>
						    	<th scope="row" class="col-md-1"><?php echo e($count++); ?></th>
						    	<td class="col-md-7"><?php echo e(ucwords($q->question)); ?></td>
						      	<td class="col-md-2"><?php echo e(ucwords($q->question_type)); ?></td>
						      	<td class="col-md-2"><a href="<?php echo e(url('profile/edit-question' , [$quiz->quiz_unique , $q->question_unique])); ?>" class="btn btn-info">Edit</a></td>
						    </tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
			<?php else: ?>
				<h1 class="text-center">No Questions Yet</h1>
			<?php endif; ?>
		</div>
	
		<div class="col-md-12">
			<?php if(session()->has('message')): ?>
				<div class="alert alert-success">
				    <strong><?php echo e(session()->get('message')); ?></strong>
				</div>
			<?php endif; ?>
			<h1>Add New Question</h1>
			<form action="<?php echo e(url('profile/save-question')); ?>" method="post" id="add-question-form">
				<div class="form-group <?php echo e($errors->has('question') ? 'has-error' : ''); ?>" id="question_div">
				    <label>Question <?php echo e($quiz->num_ques + 1); ?></label>
				    <input type="text" class="form-control" name="question" value="<?php echo e(old('question')); ?>">
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
				    	<option value="single choice" selected>Single Choice</option>
				    	<option value="multiple choice">Multiple Choice</option>
				    	<option value="text">Text</option>
				    </select>
				</div>

				<div class="form-group"  id="options-list-div">
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
							<tr id="row_option_a" class="options-list-row">
								<td><input class="form-control option-input" type="text" name="option[]" placeholder="Please Enter Something" maxlength="80" value=""></td>
								<td><input class="form-check-input answer-radio" type="radio" name="radio" value="a" checked><input class="form-check-input answer-checkbox" type="checkbox" value="a" style="display: none;" disabled="disabled" checked></td>
								<td><button class="btn btn-warning delete-option-btn" value="a">Delete</button></td>
							</tr>
							<tr id="add-option-row">
								<td><button class="btn btn-primary" id="add-option-btn">Add Option</button></td>
							</tr>
						</tbody>
					</table>
					<div id="option_feedback"></div>
				</div>

				<div class="form-group" id="text-answer-div"  style="display: none;">
					<label>Answer</label>
					<input type="text" class="form-control" id="text-answer" value="">
				</div>

				<div id="answer_feedback"></div>

				<input type="hidden" name="answer" value="">
				<input type="hidden" name="num_ques" value="<?php echo e($quiz->num_ques + 1); ?>">
				<input type="hidden" name="quiz_unique" value="<?php echo e($quiz->quiz_unique); ?>">
				<?php echo e(csrf_field()); ?>

				<input type="submit" id="add-question-form-btn" class="btn btn-danger" value="Add Question">
			</form>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	<script type="text/javascript" src="<?php echo e(URL::asset('js/addquestion.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>