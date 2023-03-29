<?php $__env->startSection('title', 'Inventory'); ?>
<?php $__env->startSection('activeInventory', 'active'); ?>

<?php $__env->startSection('main'); ?>
<h1>Inventory</h1>
<div class="row g-3">
    <div class="col-md-3 d-lg-none"></div>
    <div class="col-12 col-md-6 col-lg-4 col-xxl-3">
        <div class="card h-100 shadow-sm border-success">
            <div class="row card-body">
                <a class="col-4 col-md-12 text-decoration-none" href="">
                    <img class="card-img text-center" src='../<?php echo e($item->prod_picture); ?>'>
                </a>
                    <div class="col-8 col-md-12">
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
                        <h4 class="card-title my-0 text-center"><?php echo e($item->prod_name); ?></h4>
                        <p class="card-text m-0 text-center">
                            <?php echo e($item->prod_description); ?>

                        </p>
                    </div>
            </div>
            <div class="card-footer p-2">
                <div class=" d-flex justify-content-evenly align-items-center">
                    <?php
                        if (session()->has("$item->id")) {

                        } else {
                            session(["$item->id" => 0]);
                        }
                    ?>
                    <?php if(session("$item->id") != 0): ?>
                        <?php if(session("$item->id") == 0): ?>
                            <input type="submit" class="btn btn-sm btn-secondary rounded-5 px-3" value="min">
                            <?php else: ?>
                            <form class="" action="shop/<?php echo e($item->id); ?>/removeFromCart" method="post">
                                <?php echo csrf_field(); ?>
                                <input type="submit" class="btn btn-sm btn-outline-danger rounded-5 px-3" value="-">
                            </form>
                        <?php endif; ?>
                        <a class="btn btn-sm btn-light rounded-5 px-3" href="cart"><?php echo e(session("$item->id")); ?> in cart</a>
                    <?php endif; ?>
                    <?php if(session("$item->id") < $item->prod_quantity): ?>
                        <form class="" action="../shop/<?php echo e($item->id); ?>/addToCart" method="post">
                            <?php echo csrf_field(); ?>
                            <input type="submit" class="btn btn-sm btn-outline-success rounded-5 px-3" value="+">
                    </form>
                        <?php else: ?>
                        <input type="submit" class="btn btn-sm btn-secondary rounded-5 px-3" value="max">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 d-lg-none"></div>

    <div class="col-12 col-lg-8 col-xxl-9">
        <div class="">
            <form method="POST" action="edit">
                <?php echo csrf_field(); ?>
                <div class="">
                    <div class="">
                        <h1 class="fs-5">Edit Product</h1>
                    </div>
                    <div class="row">
                        <div class="mb-1 mb-sm-3 col-3 col-sm-4">
                            <label for="id">ID</label>
                            <input id="id" type="number" class="form-control rounded-3" name="id" value="<?php echo e($item->id); ?>" required>
                        </div>
                        <div class="mb-1 mb-sm-3 col-9 col-sm-8">
                            <label for="prod_name">Name</label>
                            <input id="prod_name" type="text" class="form-control rounded-3" name="prod_name" value="<?php echo e($item->prod_name); ?>" required>
                        </div>
                        <div class="mb-1 mb-sm-3 col-12 col-sm-12">
                            <label for="prod_description">Description</label>
                            <textarea name="prod_description" id="prod_description" rows="3" class="form-control rounded-3"><?php echo e($item->prod_description); ?></textarea>
                        </div>
                        <div class="mb-1 mb-sm-3 col-6 col-sm-6">
                            <label for="prod_purchase_price">Purchase Price</label>
                            <div class="input-group rounded-3 col">
                                <span class="input-group-text">$</span>
                                <input id="prod_purchase_price" type="text" class="form-control" name="prod_purchase_price" value="<?php echo e($item->prod_purchase_price); ?>">
                            </div>
                        </div>
                        <div class="mb-1 mb-sm-3 col-6 col-sm-6">
                            <label for="prod_selling_price">Selling Price</label>
                            <div class="input-group rounded-3 col">
                                <span class="input-group-text">$</span>
                                <input id="prod_selling_price" type="text" class="form-control" name="prod_selling_price" value="<?php echo e($item->prod_selling_price); ?>">
                            </div>
                        </div>
                        <div class="mb-1 mb-sm-3 col-6 col-sm-4">
                            <label for="prod_units" class="center">Units (eg. 5x102g)</label>
                            <div class="input-group rounded-3">
                                <input id="prod_units" type="text" class="form-control" name="prod_units" value="<?php echo e($item->prod_units); ?>">
                            </div>
                        </div>
                        <div class="mb-1 mb-sm-3 col-6 col-sm-4">
                            <label for="prod_size">Size (grams)</label>
                            <div class="input-group rounded-3">
                                <input id="prod_size" type="number" class="form-control" name="prod_size" value="<?php echo e($item->prod_size); ?>">
                                <span class="input-group-text">g</span>
                            </div>
                        </div>
                        <div class="mb-1 mb-sm-3 col-4 col-sm-4">
                            <label for="prod_quantity">Quantity</label>
                            <div class="input-group rounded-3">
                                <input id="prod_quantity" type="number" class="form-control" name="prod_quantity" value="<?php echo e($item->prod_quantity); ?>">
                            </div>
                        </div>
                        <div class="mb-1 mb-sm-3 col-8 col-sm-4">
                            <label for="prod_quantity">Expiry Date</label>
                            <div class="input-group rounded-3">
                                <input id="prod_exp_date" type="date" class="form-control" name="prod_exp_date" value="<?php echo e($item->prod_exp_date); ?>">
                            </div>
                        </div>
                        <div class="mb-1 mb-sm-3 col-12 col-sm-8">
                            <label for="prod_picture">Picture URL</label>
                            <div class="input-group rounded-3">
                                <input id="prod_picture" type="text" class="form-control" name="prod_picture" value="<?php echo e($item->prod_picture); ?>">
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
                    <div class="d-flex flex-row-reverse justify-content-start">
                        <input type="submit" class="btn btn-primary rounded-5 px-3" value="Save changes">
                        <a href="../inventory" type="button" class="btn btn-secondary rounded-5 px-3 mx-3">Close</a>
                        <div class="flex-grow-1"></div>
                        <button class="btn btn-sm btn-danger rounded-5 px-3" type="button" data-bs-toggle="modal" data-bs-target="#<?php echo e($item->id); ?>-Modal">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="<?php echo e($item->id); ?>-Modal" tabindex="-1" aria-labelledby="<?php echo e($item->id); ?>-ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="<?php echo e($item->id); ?>-ModalLabel">Are you sure you want to delete this item?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6>Seriously it'll be gone!</h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-5 px-3" data-bs-dismiss="modal">No go back!</button>
                <form action="../inventory/<?php echo e($item->id); ?>/destroy" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="submit" class="btn btn-danger rounded-5 px-3" value="Delete">
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/jacobmccallum/laravelProjects/savealot/resources/views/inventory/edit.blade.php ENDPATH**/ ?>