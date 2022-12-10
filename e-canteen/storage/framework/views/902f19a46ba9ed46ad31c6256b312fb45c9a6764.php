

<?php $__env->startSection('content'); ?>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?php echo e(asset('img/breadcrumb.jpg')); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shop</h2>
                    <div class="breadcrumb__option">
                        <a href="<?php echo e(route('home.index')); ?>">Beranda</a>
                        <span>Keranjang Belanja Anda</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Produk</th>
                                <th>Harga</th>
                                <th>Banyak</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $foods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $food): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="shoping__cart__item">
                                    <img src="<?php echo e(asset('storage/'.$food->image)); ?>" alt="" class="img-thumbnail"
                                        width="200">
                                    <h5><?php echo e($food->name); ?></h5>
                                </td>
                                <td class="shoping__cart__price">
                                    <p>Rp. <?php echo e(number_format($food->price, 2,',','.')); ?></p>
                                </td>
                                <td class="shoping__cart__quantity">
                                    <form action="<?php echo e(route('cart.add', $food)); ?>" method="post" class="quantity">
                                        <?php echo csrf_field(); ?>
                                        <div class="pro-qty">
                                            <input type="text" value="<?php echo e(session('cart')[$food->id]['quantity']); ?>">
                                        </div>
                                        <button type="submit" class="primary-btn btn btn-sm">Update Banyak</button>
                                    </form>
                                </td>
                                <td class="shoping__cart__total">
                                    <p>
                                        Rp. <?php echo e(number_format($food->price * session('cart')[$food->id]['quantity'],
                                        2,',','.')); ?>

                                    </p>
                                </td>
                                <td class="shoping__cart__item__close">
                                    <form action="<?php echo e(route('cart.remove', $food)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>

                                        <button class="btn btn-sm btn-light">
                                            <span class="icon_close"></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="<?php echo e(route('home.foods')); ?>" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                </div>
            </div>
            <div class="col-lg-6">

            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Total Keranjang Belanja</h5>
                    <ul>
                        <li>Total <span>Rp. <?php echo e(number_format($total,
                                2,',','.')); ?></span></li>
                    </ul>
                    <form action="<?php echo e(route('home.pesan')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="mb-2">
                            <label for="description">Keterangan</label>
                            <textarea name="description" id="description" cols="30" rows="5"
                                class="form-control"></textarea>
                        </div>
                        <button class="btn w-100 primary-btn">Pesan Sekarang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ACER\Documents\GitHub\PWBF10\e-canteen\resources\views/home/cart-foods.blade.php ENDPATH**/ ?>