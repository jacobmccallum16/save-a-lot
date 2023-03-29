<?php $__env->startSection('title', 'Home'); ?>
<?php $__env->startSection('activeHome', 'active'); ?>

<?php $__env->startSection('main'); ?>
<div id="carouselElement" class="container-sm-fluid p-3 d-flex row g-0">
    
    <div class="mx-auto carousel carousel-dark slide carousel-fade col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8 col-xxl-6" id="carouselFeatured" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php $__currentLoopData = $inventory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($item->prod_quantity > 0): ?>
            <?php if($item->prod_selling_price > 0): ?>
            <?php if($item->prod_picture != ""): ?>
                <div class="carousel-item <?php if($item->id == 2): ?> active <?php endif; ?>">
                    <div class="col">
                        <div class="card shadow-sm border-success">
                            <div class="row card-body">
                                <a id="pic" class="col-12 col-sm-12 col-md-12 text-decoration-none javascriptStyleThis" href="">
                                    <img class="card-img text-center" src='<?php echo e($item->prod_picture); ?>'>
                                </a>
                                <div id="description" class="col-12 col-sm-12 col-md-12 javascriptStyleThis">
                                    <div class="row gap-1 m-auto justify-content-center">
                                        <?php if(isset($item->prod_selling_price)): ?>
                                            <div class="col-auto badge rounded-pil rounded-5 text-bg-success">$<?php echo e($item->prod_selling_price); ?></div>
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
                </div>
            <?php endif; ?>
            <?php endif; ?>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselFeatured" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselFeatured" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base1b', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/jacobmccallum/laravelProjects/savealot/resources/views/index.blade.php ENDPATH**/ ?>