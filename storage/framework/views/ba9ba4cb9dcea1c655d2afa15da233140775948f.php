<!-- **********************************************************************************************************************************************************
MAIN SIDEBAR MENU
*********************************************************************************************************************************************************** -->
<!--sidebar start-->
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
        
            <p class="centered"><a href="<?php echo e(url('/profile')); ?>"><img src="<?php echo e(URL::asset('images/user.png')); ?>"  class="img-circle" width="60"></a></p>
            <h5 class="centered"><?php echo e(Auth::user()->username); ?> </h5>
              
            <li class="mt">
                <a  href="<?php echo e(url('/profile')); ?>">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sub-menu">
                <a  href="<?php echo e(url('profile/add-quiz')); ?>" >
                    <i class="fa fa-plus"></i>
                    <span>Add Quiz</span>
                </a>
            </li>

            <li class="sub-menu">
                <a  href="<?php echo e(url('profile/quizzes')); ?>" >
                    <i class="fa fa-question"></i>
                    <span>Your Quizzes</span>
                </a>
            </li>

            <li class="sub-menu">
                <a  href="<?php echo e(url('profile/played-quiz')); ?>" >
                    <i class="fa fa-futbol-o"></i>
                    <span>Played Quiz</span>
                </a>
            </li>

            
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
