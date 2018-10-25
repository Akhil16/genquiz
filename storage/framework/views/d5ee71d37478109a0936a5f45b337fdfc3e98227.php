<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 ">
           <div class="shadow padding_25">
               <h1 class="text-center">Login</h1>
               <hr class="hr-red">            
               <form class="form-horizontal" method="POST" action="<?php echo e(route('login')); ?>">
                   <?php echo e(csrf_field()); ?>


                   <div class="form-group<?php echo e($errors->has('username') ? ' has-error' : ''); ?>">
                       <label for="username" class="col-md-6 control-label">Username / E-Mail Address</label>

                       <div class="col-md-6">
                           <input id="username" type="text" class="form-control" name="username" value="<?php echo e(old('username')); ?>" required autofocus>

                           <?php if($errors->has('username')): ?>
                               <span class="help-block">
                                   <strong><?php echo e($errors->first('username')); ?></strong>
                               </span>
                           <?php endif; ?>
                       </div>
                   </div>

                   <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                       <label for="password" class="col-md-6 control-label">Password</label>

                       <div class="col-md-6">
                           <input id="password" type="password" class="form-control" name="password" required>

                           <?php if($errors->has('password')): ?>
                               <span class="help-block">
                                   <strong><?php echo e($errors->first('password')); ?></strong>
                               </span>
                           <?php endif; ?>
                       </div>
                   </div>

                   <div class="form-group">
                       <div class="col-md-12">
                           <div class="checkbox">
                               <label>
                                   <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Remember Me
                               </label>
                           </div>
                       </div>
                   </div>

                   <div class="form-group">
                       <div class="col-md-12">
                           <button type="submit" class="btn button-custom btn-block btn-custom-blue">
                               Login
                           </button>
                       </div>
                   </div>
               </form>
                   Not Signed Up yet ? Do not Worry and <a href="<?php echo e(url('/register')); ?>">Signup</a> 
           </div>
                
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>