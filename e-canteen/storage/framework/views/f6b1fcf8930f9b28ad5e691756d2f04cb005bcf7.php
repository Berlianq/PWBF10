

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
                        <span>Detail Pesanan Saya</span>
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
                                <th class="text-left">Makanan</th>
                                <th>Jumlah/Quantitas</th>
                                <th>Harga Beli</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $pesanan->pesananDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="shoping__cart__item">
                                    <img src="<?php echo e(asset('storage/'.$detail->food->image)); ?>" alt="" class="img-thumbnail"
                                        width="100">
                                    <h5><?php echo e($detail->food->name); ?></h5>
                                </td>
                                <td class="shoping__cart__total">
                                    <?php echo e($detail->jumlah); ?>

                                </td>
                                <td>
                                    <?php echo e(number_format($detail->harga_beli,
                                    2,',','.')); ?>

                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ACER\Documents\GitHub\PWBF10\e-canteen\resources\views/home/pesanan-saya-detail.blade.php ENDPATH**/ ?>