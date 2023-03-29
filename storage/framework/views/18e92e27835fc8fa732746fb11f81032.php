<?php $__env->startSection('title', 'Cart'); ?>

<?php
$subtotal = 0;
$nextItem = 0;
$total = 0;
?>
<?php $__env->startSection('main'); ?>
<h1 class="h1 text-center">Cart</h1>
<div class="">
    <div class="col col-md-10 offset-md-1">
        <table class="table table-light table-striped table-bordered border-dark-subtle table-hover">
            <thead>
                <tr class="table-dark">
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php $__currentLoopData = $inventory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(session($item->id) > 0): ?>
                        <tr>
                            <td><?php echo e($item->prod_name); ?></td>
                            <td>$<?php echo e($item->prod_selling_price); ?></td>
                            <td><?php echo e(session($item->id)); ?></td>
                            <td>$<?php echo e(number_format($item->prod_selling_price * session($item->id), 2, '.', ',')); ?></td>
                            <?php
                                $nextItem = number_format($item->prod_selling_price * session($item->id), 2, '.', '');
                                $subtotal += $nextItem;
                            ?>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <tbody class="table-group-divider">
                <?php if(isset(Auth::user()->student)): ?>
                    <?php if(Auth::user()->student == 1): ?>
                    <tr>
                        <th colspan="3">Subtotal</th>
                        <th>$<?php echo e(number_format($subtotal, 2)); ?></th>
                    </tr>
                    <tr>
                        <td>Student Discount</td>
                        <td colspan="2" class="text-center">-10%</td>
                        <td>($<?php echo e(number_format($subtotal * (0.1),2)); ?>)</td>
                        <?php
                            $total = number_format($subtotal * 0.9, 2, '.', '');
                            session('total', number_format($total,2));
                        ?>
                    </tr>
                    <?php else: ?>
                        <?php
                            $total = number_format($subtotal * 1.0, 2, '.', '');
                            session('total', number_format($total,2));
                        ?>
                    <?php endif; ?>
                <?php endif; ?>

            </tbody>
            <tfoot class="table-group-divider">
                <tr class="table-success">
                    <th colspan="3">Total:</th>
                    <th>$<?php echo e(number_format($total, 2)); ?></th>
                </tr>
            </tfoot>
        </table>
        <div class="d-flex justify-content-between">
            <form action="/emptyCart" method="post" class="d-flex justify-content-end">
                <?php echo csrf_field(); ?>
                <input type="submit" class="btn btn-outline-danger rounded-5 px-3" value="Empty Cart">
            </form>
            <?php if(auth()->guard()->check()): ?>
                <form action="/cart/checkout" method="post" class="d-flex justify-content-end">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                    <input type="hidden" name="student" value="<?php echo e(Auth::user()->student); ?>">
                    <input type="submit" value="Confirm Purchase" class="btn btn-outline-success rounded-5 px-3">
                </form>
            <?php endif; ?>
            <?php if(auth()->guard()->guest()): ?>
            <div>
                <a href="/login" class="btn btn-outline-success rounded-5 px-3">Log in</a> or
                <a href="register" class="btn btn-outline-primary rounded-5 px-3">Create an Account</a> to checkout
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/jacobmccallum/laravelProjects/savealot/resources/views/cart.blade.php ENDPATH**/ ?>