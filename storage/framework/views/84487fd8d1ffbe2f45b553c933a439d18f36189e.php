<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <?php
        $title = isset($title) ? $title : "Genquiz - a Quiz Platform";
        $description = isset($description) ? $description : "A platform to solve quizzes and share your created quizzes among your friend circle";
        $keywords = isset($keywords) ? $keywords : "genquiz, quiz, puzzles";
        $author = isset($author) ? $author : "Genquiz";
        $url = isset($url) ? $url : "http//genquiz.tk";
        $site_name = isset($site_name) ? $site_name : "genquiz.tk";
        $image_url = isset($image_url) ? $image_url : url('/images/Genquiz.png');
    ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e($title); ?></title>
    <meta name="description" content="<?php echo e($description); ?>">
    <meta name="keywords" content="<?php echo e($keywords); ?>">
    <meta name="author" content="<?php echo e($author); ?>">
    <link rel="canonical" href="<?php echo e($url); ?>"/>
    <meta property="og:title" content="<?php echo e($title); ?>" />
    <meta property="og:site_name" content="<?php echo e($site_name); ?>" />
    <meta property="og:image" content="<?php echo e($image_url); ?>"/>
    <meta property="og:description" content="<?php echo e($description); ?>">
    <meta property="og:url" content="<?php echo e($url); ?>"/>
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="<?php echo e($site_name); ?>">
    <meta name="twitter:title" content="<?php echo e($title); ?>">
    <meta name="twitter:description" content="<?php echo e($description); ?>">
    <meta name="twitter:creator" content="@genquiz">
    <meta name="twitter:image" content="<?php echo e($image_url); ?>">
    <meta name="twitter:url" content="<?php echo e($url); ?>">
    <link rel="shortcut icon" href="<?php echo e(url('/images/favicon.ico')); ?>" 
    alt="<?php echo e($description); ?> ,<?php echo e($keywords); ?>">
    <meta name="google-site-verification" content="" />
    <meta name="theme-color" content="#000000">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- Styles -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/profile.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/style-responsive.css')); ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php echo $__env->yieldContent('style'); ?>
</head>
<body>
    <section id="container" >
          <!-- **********************************************************************************************************************************************************
          TOP BAR CONTENT & NOTIFICATIONS
          *********************************************************************************************************************************************************** -->
          <!--header start-->
          <header class="header-bg navbar-fixed-top navbar">
                  <div class="sidebar-toggle-box">
                      <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
                  </div>
                <!--logo start-->
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <!-- <?php echo e(config('app.name', 'Laravel')); ?> -->
                    <img src="<?php echo e(url('images/Genquiz.png')); ?>" alt="Genquiz" width="50%" style="margin-top:-10px;">
                </a>
                <!--logo end-->
                <!-- <div class="nav notify-row" id="top_menu">
                    notification start
                    <ul class="nav top-menu">
                        inbox dropdown start
                        <li id="header_inbox_bar" class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-theme">5</span>
                            </a>
                            <ul class="dropdown-menu extended inbox">
                                <div class="notify-arrow notify-arrow-green"></div>
                                <li>
                                    <p class="green">You have 5 new messages</p>
                                </li>
                                <li>
                                    <a href="index.html#">
                                        <span class="photo"><img alt="avatar" src="assets/img/ui-zac.jpg"></span>
                                        <span class="subject">
                                        <span class="from">Zac Snider</span>
                                        <span class="time">Just now</span>
                                        </span>
                                        <span class="message">
                                            Hi mate, how is everything?
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="index.html#">
                                        <span class="photo"><img alt="avatar" src="assets/img/ui-divya.jpg"></span>
                                        <span class="subject">
                                        <span class="from">Divya Manian</span>
                                        <span class="time">40 mins.</span>
                                        </span>
                                        <span class="message">
                                         Hi, I need your help with this.
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="index.html#">
                                        <span class="photo"><img alt="avatar" src="assets/img/ui-danro.jpg"></span>
                                        <span class="subject">
                                        <span class="from">Dan Rogers</span>
                                        <span class="time">2 hrs.</span>
                                        </span>
                                        <span class="message">
                                            Love your new Dashboard.
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="index.html#">
                                        <span class="photo"><img alt="avatar" src="assets/img/ui-sherman.jpg"></span>
                                        <span class="subject">
                                        <span class="from">Dj Sherman</span>
                                        <span class="time">4 hrs.</span>
                                        </span>
                                        <span class="message">
                                            Please, answer asap.
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="index.html#">See all messages</a>
                                </li>
                            </ul>
                        </li>
                        inbox dropdown end
                    </ul>
                    notification end
                </div> -->
                <div class="top-menu">
                    <ul class="nav pull-right top-menu">
                        <?php if(Auth::check()): ?>
                            <li>
                                <a class="logout" href="<?php echo e(route('logout')); ?>"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo e(csrf_field()); ?>

                                </form>
                            </li>
                        <?php else: ?>
                            <li>
                                <a class="logout" href="<?php echo e(route('login')); ?>">Login</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </header>
          <!--header end-->
          <?php $show_sidebar = Auth::check() ? true : false;?>
            <?php if($show_sidebar): ?>
                <?php echo $__env->make('partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php else: ?>
                <div class="container-fluid">
                    <div class="darkblue-panel pn" style="margin-top: 60px ;color: White;">
                        <div class="darkblue-header">
                            <h1>QuizGen - A Quiz Platform</h1>
                            <h2>Create &nbsp * &nbsp Play &nbsp * &nbsp Share  </h2>
                        </div>
                    </div>
                    <hr>
                </div>
            <?php endif; ?>
              <section <?php if(Auth::check()): ?> id="main-content" <?php endif; ?> class="padding_25" style="margin-top:60px; ">
                        <?php echo $__env->yieldContent('content'); ?>
              </section><! --/wrapper -->
              <footer>
                  <div class="padding_25" style="text-align: center;background-color: #444c57; color: #fff;">
                       Made with <i class="fa fa-coffee" style="color: #f06868;"></i> by <span style="color: #42ca65">Aman Gupta</span> and <span style="color: #42ca65">Akhilendu Chaturvedi</span>
                  </div>
              </footer>
        <!-- /MAIN CONTENT -->
    <!-- Scripts -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="<?php echo e(URL::asset('js/jquery.dcjqaccordion.2.7.js')); ?>" ></script>
    <script src="<?php echo e(URL::asset('js/common-scripts.js')); ?>" ></script>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
