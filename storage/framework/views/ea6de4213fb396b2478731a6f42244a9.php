<?php $__env->startSection('content'); ?>
     <main class="container-fluid p-3 flex-grow-1">
		<div class="modal modal-signin position-static d-block" style="z-index: 955;" tabindex="-1" role="dialog" id="modalSignin">
			<div class="modal-dialog" role="document">
				<div class="modal-content rounded-4 shadow">
					<div class="modal-header p-5 pb-4 border-bottom-0">
						<h1 class="fw-bold mb-0 fs-2">Register</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body p-5 pt-0">
						<form class="" action="<?php echo e(route('user.store')); ?>" method="POST">
						    <?php echo e(csrf_field()); ?>

						    <div class="form-floating mb-3">
							<input type="text" class="form-control rounded-3" name="name" id="name" placeholder="FirstName LastName">
							<label for="name">Full Name</label>
							</div>
							<div class="form-floating mb-3">
							<input type="email" class="form-control rounded-3" name="email" id="email" placeholder="name@example.com">
							<label for="email">Email</label>
							</div>
							<div class="form-floating mb-3">
							<input type="password" class="form-control rounded-3" name="password" id="password" placeholder="Password">
							<label for="password">Password</label>
							</div>
							<button class="w-100 btn btn-lg rounded-3 btn-success" type="submit">Register</button>
						</form>
							<hr class="my-4">
							<p class="text-muted text-center">Already have an account? Login here</p>
							<div class="d-flex justify-content-center">
								<a class="mb-2 btn btn rounded-3 btn-dark" href="login.html">Login</a>
							</div>
					</div>
				</div>
			</div>
		</div>
	</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ec2-user/environment/savealot/resources/views/user/register.blade.php ENDPATH**/ ?>