<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $__env->yieldContent('title'); ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="bootstrap.css"> -->
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css"> -->
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
						<a class="nav-link <?php echo $__env->yieldContent('activeShop'); ?>" href="shop">Shop</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Account</a>
						<ul class="dropdown-menu mb-2">
							<li><a class="dropdown-item <?php echo $__env->yieldContent('activeLogin'); ?>" href="login">Login</a></li>
							<li><a class="dropdown-item <?php echo $__env->yieldContent('activeRegister'); ?>" href="register">Register</a></li>
							<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item <?php echo $__env->yieldContent('activeCart'); ?>" href="cart">Cart</a></li>
							<li><a class="dropdown-item <?php echo $__env->yieldContent('activeAdmin'); ?>" href="admin">Admin</a></li>
						</ul>
					</li>
				</ul>
				<form class="d-flex" role="search">
					<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-light" type="submit">Search</button>
				</form>
			</div>
		</div>
	</nav>

	<main class="container p-3 flex-grow-1">
		<?php $__env->startSection('main'); ?>
		<?php echo $__env->yieldSection(); ?>
	</main>

	<footer class="container-fluid p-1 bg-success text-center">
		<a class="navbar-brand badge text-bg-light text-success fs-6" href="index.html">Save-a-Lot</a>
	</footer>

</body>
</html><?php /**PATH /home/ec2-user/environment/savealot/resources/views/layouts/base.blade.php ENDPATH**/ ?>