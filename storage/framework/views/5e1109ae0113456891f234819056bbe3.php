<?php $__env->startSection('title', 'Shop'); ?>
<?php $__env->startSection('activeShop', 'active'); ?>

<?php $__env->startSection('main'); ?>
<div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3 row-cols-xxl-4 g-3">
	<?php $__currentLoopData = $inventory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(strpos($item->prod_name, $_SESSION['search']) != false): ?>
    <?php if($item->prod_quantity > 0): ?>
    <?php if($item->prod_selling_price > 0): ?>
		<div class="col">
			<div class="card h-100 shadow border-success">
				<div class="row card-body">
					<a class="col-4 col-sm-4 col-md-12 text-decoration-none" href="">
						<img class="card-img text-center" src='../<?php echo e($item->prod_picture); ?>'>
					</a>
						<div class="col-8 col-sm-8 col-md-12">
						<div class="row gap-1 m-auto">
							<?php if(isset($item->prod_selling_price)): ?>
								<div class="col-auto badge rounded-pil text-bg-success">$<?php echo e($item->prod_selling_price); ?></div>
							<?php endif; ?>
							<?php if(isset($item->prod_units)): ?>
								<div class="col-auto badge rounded-pil text-bg-secondary"><?php echo e($item->prod_units); ?></div>
							<?php endif; ?>
							<?php if(isset($item->prod_size)): ?>
								<div class="col-auto badge rounded-pil text-bg-dark"><?php echo e($item->prod_size); ?>g</div>
                                <?php if(isset($item->prod_selling_price)): ?>
                                    <div class="col-auto badge rounded-pil text-dark bg-success-subtle">$<?php echo e(number_format($item->prod_selling_price / $item->prod_size * 100, 2)); ?>/100g</div>
                                <?php endif; ?>
							<?php endif; ?>
						</div>
							<h4 class="card-title my-0"><?php echo e($item->prod_name); ?></h4>
							<p class="card-text m-0">
								<?php echo e($item->prod_description); ?>

							</p>
						</div>
				</div>
				<div class="card-footer d-flex justify-content-evenly align-items-center">
                    <?php
                        if (session()->has("$item->id")) {

                        } else {
                            session(["$item->id" => 0]);
                        }
                    ?>
                    <?php if(session("$item->id") != 0): ?>
                    <form class="" action="shop/<?php echo e($item->id); ?>/removeFromCart" method="post">
                        <?php echo csrf_field(); ?>
						<input type="submit" class="btn btn-sm btn-outline-danger rounded-5 px-3" value="-">
					</form>
                    <div class="btn btn-sm btn-light rounded-5 px-3"><?php echo e(session("$item->id")); ?></div>
                    <?php endif; ?>
					<form class="" action="shop/<?php echo e($item->id); ?>/addToCart" method="post">
                        <?php echo csrf_field(); ?>
						<input type="submit" class="btn btn-sm btn-outline-success rounded-5 px-3" value="+">
					</form>
				</div>
			</div>
		</div>
    <?php endif; ?>
    <?php endif; ?>
    <?php endif; ?>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/jacobmccallum/laravelProjects/savealot/resources/views/shop/search.blade.php ENDPATH**/ ?>