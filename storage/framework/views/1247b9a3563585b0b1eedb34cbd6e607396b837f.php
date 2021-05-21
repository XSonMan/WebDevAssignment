<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md shadow-sm" style="background-color: darkred">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <div style="text-align: left">
                        <img src="<?php echo e(URL::to('flag.png')); ?>" width="120px" height="80px"/>
                    </div>
                </ul>

                <?php if( Auth::user()->is_admin == 1): ?>
                    <a  href="<?php echo e(route('admin.home')); ?>">
                        <div style="color:white" class="navbar-brand">
                            Home
                        </div>
                    </a>
                    <a style="color:black" href="<?php echo e(route('regrequest')); ?>">
                        <div style="color:white" class="navbar-brand">
                            Register Requests
                        </div>
                    </a>

                    <a style="color:black" href="<?php echo e(route('events.index')); ?>">
                        <div style="color:white" class="navbar-brand">
                            Event Management
                        </div>
                    </a>

                    <a style="color:black" href="<?php echo e(route('admin.dlist')); ?>">
                        <div style="color:white" class="navbar-brand">
                            Donate list (all)
                        </div>
                    </a>

            <?php else: ?>
                    <a  href="<?php echo e(route('home')); ?>">
                        <div style="color:white" class="navbar-brand">
                            Home
                        </div>
                    </a>
                    <a style="color:black" href="<?php echo e(route('list')); ?>">
                        <div style="color:white" class="navbar-brand">
                            Event List
                        </div>
                    </a>
                    <a style="color:black" href="<?php echo e(route('donate.index')); ?>">
                        <div style="color:white" class="navbar-brand">
                            Donate to an event
                        </div>
                    </a>

            <?php endif; ?>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    <?php if(auth()->guard()->guest()): ?>
                        <?php if(Route::has('login')): ?>
                            <li class="nav-item">
                                <a style="color:white" class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if(Route::has('register')): ?>
                            <li class="nav-item">
                                <a style="color:white" class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                            </li>
                        <?php endif; ?>
                    <?php else: ?>
                        <li class="nav-item dropdown">
                            <a style="color:white" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <?php echo e(Auth::user()->name); ?>

                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <?php echo e(__('Logout')); ?>

                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <?php echo $__env->yieldContent('content'); ?>
    </main>
</div>
</body>
</html>
<?php /**PATH C:\Users\XSonM\gitapps\laravel\GProject\resources\views/layouts/app.blade.php ENDPATH**/ ?>