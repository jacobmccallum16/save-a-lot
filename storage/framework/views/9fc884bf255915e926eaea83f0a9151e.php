<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $__env->yieldContent('title'); ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
	
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css"> -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="min-vh-100 d-flex flex-column">
	<nav class="navbar navbar-expand-sm navbar-dark bg-success">
		<div class="container-fluid align-middle">
			<a class="navbar-brand badge text-bg-light text-success fs-5 rounded-5" href="../index">Save-a-Lot</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto">
					<li class="nav-item">
						<a class="nav-link <?php echo $__env->yieldContent('activeHome'); ?>" aria-current="page" href="../index">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?php echo $__env->yieldContent('activeShop'); ?>" href="../shop">Shop</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php if(auth()->guard()->check()): ?>
                                <?php echo e(Auth::user()->name); ?>

                            <?php endif; ?>
                            <?php if(auth()->guard()->guest()): ?>
                                Account
                            <?php endif; ?>
                        </a>
						<ul class="dropdown-menu mb-2">
                            <?php if(auth()->guard()->check()): ?>
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    <?php echo e(__('Logout')); ?>

                                </a>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                    <?php echo csrf_field(); ?>
                                </form>
                            <?php endif; ?>
                            <?php if(auth()->guard()->guest()): ?>
                                <li><a class="dropdown-item <?php echo $__env->yieldContent('activeLogin'); ?>" href="../login">Login</a></li>
                                <li><a class="dropdown-item <?php echo $__env->yieldContent('activeRegister'); ?>" href="../register">Register</a></li>
                            <?php endif; ?>
							<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item <?php echo $__env->yieldContent('activeCart'); ?>" href="cart">Cart</a></li>
                            <?php if(isset(Auth::user()->email)): ?>
                                <?php if(Auth::user()->email == "saladmin@localhost"): ?>
                                    <li><a class="dropdown-item <?php echo $__env->yieldContent('activeAdmin'); ?>" href="../admin">Admin</a></li>
                                    <li><a class="dropdown-item <?php echo $__env->yieldContent('activeInventory'); ?>" href="../inventory">Inventory</a></li>
                                <?php endif; ?>
                            <?php endif; ?>
						</ul>
					</li>
				</ul>
				<form class="d-flex" action="../search" method="get" role="search">
                    <input class="form-control me-2 rounded-5 px-3" type="search" name="search" placeholder="Search" aria-label="Search">
                    <input class="btn btn-outline-light rounded-5 px-3" type="submit" value="Search">
				</form>
			</div>
		</div>
	</nav>

	<main class="container p-3 flex-grow-1">
		<?php echo $__env->yieldContent('main'); ?>
	</main>

	<footer class="container-fluid p-1 bg-success text-center">
		<a class="navbar-brand badge text-bg-light text-success fs-6" href="../index">Save-a-Lot</a>
	</footer>

</body>
</html>
<?php /**PATH /Users/jacobmccallum/laravelProjects/savealot/resources/views/layouts/base2.blade.php ENDPATH**/ ?>