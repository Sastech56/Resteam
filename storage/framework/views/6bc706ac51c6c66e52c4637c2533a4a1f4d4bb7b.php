<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    
    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div id="app">
        <?php if(auth()->guard()->guest()): ?> 
             
        <nav class="navbar  navbar-custom navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand logo" href="/"><img src="/img/ReXsteam.svg" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                    </li>

                </ul>
                </div>
            </div>
        </nav>
                    
        <?php endif; ?>
        <?php if(auth()->guard()->check()): ?>
            
       
        <?php if(Auth::user()->role==1): ?>
        <nav class="navbar  navbar-custom navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand logo" href="/"><img src="/img/ReXsteam.svg" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                    <a class="nav-link" href="/history">View Transaction History</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/cart">View Cart</a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo e(Auth::user()->name); ?>

                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <?php echo e(__('Logout')); ?>

                                </a>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                    <?php echo csrf_field(); ?>
                                </form>
    
                            </div>
                          </div>
                    </li>

                </ul>
                </div>
            </div>
        </nav>
        <?php elseif(Auth::user()->role==2): ?>
        <nav class="navbar  navbar-custom navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand logo" href="/"><img src="/img/ReXsteam.svg" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    
                    
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo e(Auth::user()->name); ?>

                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          
                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <?php echo e(__('Logout')); ?>

                        </a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                            <?php echo csrf_field(); ?>
                        </form>
                        </div>
                      </div>
                    </li>

                </ul>
                </div>
            </div>
        </nav>
        <?php endif; ?>
        <?php endif; ?>
        

    

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
</body>
</html>
<?php /**PATH C:\Users\Sayyid\Downloads\Semester 5\web Prog\Project lab\Web Prog\Laravel---ReXsteam\resources\views/layouts/app.blade.php ENDPATH**/ ?>