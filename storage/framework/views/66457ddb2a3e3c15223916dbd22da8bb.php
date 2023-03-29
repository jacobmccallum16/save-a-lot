<?php $__env->startSection('title', 'Inventory'); ?>
<?php $__env->startSection('activeInventory', 'active'); ?>

<?php $__env->startSection('main'); ?>
<h1>Inventory</h1>
<div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3 row-cols-xxl-4 g-3">
	<?php $__currentLoopData = $inventory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="col">
			<div class="card h-100 shadow-sm border-success">
				<div class="row card-body">
					<a class="col-4 col-sm-4 col-sm-12 text-decoration-none" href="">
						<img class="card-img text-center" src='<?php echo e($item->prod_picture); ?>'>
					</a>
						<div class="col-8 col-sm-8 col-sm-12">
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
				<div class="card-footer">
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?php echo e($item->id); ?>Model">
						Edit
					</button>
					<!-- Modal -->
					<div class="modal fade" id="<?php echo e($item->id); ?>Model" tabindex="-1" aria-labelledby="<?php echo e($item->id); ?>ModelLabel" aria-hidden="true">
						<div class="modal-dialog">
                            <form action="">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="<?php echo e($item->id); ?>ModelLabel">Edit Product</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body row">

                                        <div class="mb-1 mb-sm-3 col-3 col-sm-4">
                                            <label for="id-<?php echo e($item->id); ?>">ID</label>
                                            <input id="id-<?php echo e($item->id); ?>" type="number" class="form-control rounded-3" name="id-<?php echo e($item->id); ?>" value="<?php echo e($item->id); ?>" required>
                                        </div>
                                        <div class="mb-1 mb-sm-3 col-9 col-sm-8">
                                            <label for="id-<?php echo e($item->id); ?>">Name</label>
                                            <input id="prod_name-<?php echo e($item->id); ?>" type="text" class="form-control rounded-3" name="prod_name-<?php echo e($item->id); ?>" value="<?php echo e($item->prod_name); ?>" required>
                                        </div>
                                        <div class="mb-1 mb-sm-3 col-12 col-sm-12">
                                            <label for="prod_description-<?php echo e($item->id); ?>">Description</label>
                                            <textarea name="prod_description-<?php echo e($item->id); ?>" id="prod_description-<?php echo e($item->id); ?>" rows="3" class="form-control rounded-3"><?php echo e($item->prod_description); ?></textarea>
                                        </div>
                                        <div class="mb-1 mb-sm-3 col-6 col-sm-6">
                                            <label for="prod_purchase_price-<?php echo e($item->id); ?>">Purchase Price</label>
                                            <div class="input-group rounded-3 col">
                                                <span class="input-group-text">$</span>
                                                <input id="prod_purchase_price-<?php echo e($item->id); ?>" type="text" class="form-control" name="prod_purchase_price-<?php echo e($item->id); ?>" value="<?php echo e($item->prod_purchase_price); ?>">
                                            </div>
                                        </div>
                                        <div class="mb-1 mb-sm-3 col-6 col-sm-6">
                                            <label for="prod_selling_price-<?php echo e($item->id); ?>">Selling Price</label>
                                            <div class="input-group rounded-3 col">
                                                <span class="input-group-text">$</span>
                                                <input id="prod_selling_price-<?php echo e($item->id); ?>" type="text" class="form-control" name="prod_selling_price-<?php echo e($item->id); ?>" value="<?php echo e($item->prod_selling_price); ?>">
                                            </div>
                                        </div>
                                        <div class="mb-1 mb-sm-3 col-6 col-sm-4">
                                            <label for="prod_units-<?php echo e($item->id); ?>" class="center">Units</label>
                                            <div class="input-group rounded-3">
                                                <input id="prod_units-<?php echo e($item->id); ?>" type="text" class="form-control" name="prod_units-<?php echo e($item->id); ?>" value="<?php echo e($item->prod_units); ?>">
                                            </div>
                                        </div>
                                        <div class="mb-1 mb-sm-3 col-6 col-sm-4">
                                            <label for="prod_size-<?php echo e($item->id); ?>">Size</label>
                                            <div class="input-group rounded-3">
                                                <input id="prod_size-<?php echo e($item->id); ?>" type="number" class="form-control" name="prod_size-<?php echo e($item->id); ?>" value="<?php echo e($item->prod_size); ?>">
                                                <span class="input-group-text">g</span>
                                            </div>
                                        </div>
                                        <div class="mb-1 mb-sm-3 col-4 col-sm-4">
                                            <label for="prod_quantity-<?php echo e($item->id); ?>">Quantity</label>
                                            <div class="input-group rounded-3">
                                                <input id="prod_quantity-<?php echo e($item->id); ?>" type="number" class="form-control" name="prod_quantity-<?php echo e($item->id); ?>" value="<?php echo e($item->prod_size); ?>">
                                            </div>
                                        </div>
                                        <div class="mb-1 mb-sm-3 col-8 col-sm-4">
                                            <label for="prod_quantity-<?php echo e($item->id); ?>">Expiry Date</label>
                                            <div class="input-group rounded-3">
                                                <input id="prod_exp_date-<?php echo e($item->id); ?>" type="date" class="form-control" name="prod_exp_date-<?php echo e($item->id); ?>" value="<?php echo e($item->prod_exp_date); ?>">
                                            </div>
                                        </div>
                                        <div class="mb-1 mb-sm-3 col-12 col-sm-8">
                                            <label for="prod_picture-<?php echo e($item->id); ?>">Picture URL</label>
                                            <div class="input-group rounded-3">
                                                <input id="prod_picture-<?php echo e($item->id); ?>" type="text" class="form-control" name="prod_picture-<?php echo e($item->prod_picture); ?>" value="<?php echo e($item->prod_picture); ?>">
                                            </div>
                                        </div>
                                        <div class="mb-1 mb-sm-3 col-12 col-sm-6">
                                            <label for="created_at-<?php echo e($item->id); ?>">Created at</label>
                                            <div class="input-group rounded-3">
                                                <input id="created_at-<?php echo e($item->id); ?>" type="datetime-local" class="form-control" name="created_at-<?php echo e($item->id); ?>" value="<?php echo e($item->created_at); ?>" disabled readonly>
                                            </div>
                                        </div>
                                        <div class="mb-1 mb-sm-3 col-12 col-sm-6">
                                            <label for="updated_at-<?php echo e($item->id); ?>">Updated at</label>
                                            <div class="input-group rounded-3">
                                                <input id="updated_at-<?php echo e($item->id); ?>" type="datetime-local" class="form-control" name="updated_at-<?php echo e($item->id); ?>" value="<?php echo e($item->updated_at); ?>" disabled readonly>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-primary" value="Save changes">
                                    </div>
                                </div>
                            </form>
						</div>
					</div>
					<!-- Above is template -->
				</div>
			</div>
		</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/jacobmccallum/laravelProjects/savealot/resources/views/inventory/index.blade.php ENDPATH**/ ?>