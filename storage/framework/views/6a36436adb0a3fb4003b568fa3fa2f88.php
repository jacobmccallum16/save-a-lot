<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title'); ?></title>
    
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="min-vh-100 d-flex flex-column">
	<nav class="navbar navbar-expand-sm navbar-dark bg-success">
		<div class="container-fluid align-middle">
			<a class="navbar-brand badge text-bg-light text-success fs-5" href="index.html">Save-a-Lot</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto">
					<li class="nav-item">
						<a class="nav-link <?php echo $__env->yieldContent('activeHome'); ?>" aria-current="page" href="index">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?php echo $__env->yieldContent('activeShop'); ?>" href="/">Shop</a>
					</li>
                            <?php if(auth()->guard()->guest()): ?>
                            <?php if(Route::has('login')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(('Login')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?>

                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                    <a class="dropdown-item <?php echo $__env->yieldContent('activeCart'); ?>" href="cart">Cart</a>
                                    <a class="dropdown-item <?php echo $__env->yieldContent('activeAdmin'); ?>" href="admin">Admin</a>
                                </div>
                            </li>
                        <?php endif; ?>
				</ul>
				<form class="d-flex" role="search">
					<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-light" type="submit">Search</button>
				</form>
			</div>
		</div>
	</nav>

	<main class="container p-3 flex-grow-1">
		<?php $__env->startSection('content'); ?>
		<?php echo $__env->yieldSection(); ?>
	</main>

	<footer class="container-fluid p-1 bg-success text-center">
		<a class="navbar-brand badge text-bg-light text-success fs-6" href="index.html">Save-a-Lot</a>
	</footer>

</body>
</html>
<?php /**PATH /home/ec2-user/environment/savealot/resources/views/layouts/app.blade.php ENDPATH**/ ?>